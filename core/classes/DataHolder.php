<?php

namespace Core;

class DataHolder
{

    public function __construct(array $data = null)
    {
        if ($data) {
            $this->_setData($data);
        }
    }

    public function __set($property_key, $value)
    {
        $setter = $this->_getSetterFor($property_key);
        if ($setter) {
            $this->{$setter}($value);
        }
    }

    public function __get($property_key)
    {
        $getter = $this->_getGetterFor($property_key);
        if ($getter) {
            return $this->{$getter}();
        }
    }

    public function _setData(array $data)
    {
        foreach ($data as $property_key => $value) {
            $setter = $this->_getSetterFor($property_key);
            if ($setter) {
                $this->$setter($value);
            }
        }
    }

    public function _getData()
    {
        $data = [];

        foreach ($this->_getPropertyKeys() as $property_key) {
            $method_name = $this->_getGetterFor($property_key);
            $property = $this->$method_name();

            if ($property !== null) {
                $data[$property_key] = $property;
            }
        }

        return $data;
    }

    private function _getSetterFor($property_key)
    {
        $method = $this->_keyToMethod('set', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }
        return null;
    }

    private function _keyToMethod($prefix, $property_key)
    {
        return str_replace('_', '', $prefix . $property_key);
    }


    private function _getGetterFor($property_key)
    {
        $method = $this->_keyToMethod('get', $property_key);
        if (method_exists($this, $method)) {
            return $method;
        }
        return null;
    }

    private function _methodToKey($prefix, $method_name)
    {
        $camel_case = preg_replace("/^{$prefix}/", '', $method_name);
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $camel_case));
    }

    private function _getPropertyKeys()
    {
        $properties = [];
        $methods = get_class_methods($this);
        foreach ($methods as $method) {
            if ($method === strstr($method, 'get')) {
                $method = $this->_methodToKey('get', $method);
                $properties[] = $method;
            }
        }
        return $properties;
    }

}