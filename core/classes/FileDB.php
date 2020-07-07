<?php

namespace Core;

class FileDb
{
    private $file_name;
    private $data;

    /**
     * FileDatabase constructor.
     * @param string $file_name
     */
    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * change all data
     *
     * @param array $data_array
     */
    public function setData(array $data_array)
    {
        $this->data = $data_array;
    }

    /**
     * Įrašo visus duomenis į failą.
     */
    public function save(): bool
    {
        $json_string = json_encode($this->data);
        $file = file_put_contents($this->file_name, $json_string);

        if ($file !== false) {
            return true;
        }

        return false;
    }

    /**
     * Gaunam masyvą duomenų iš failo.
     * @return bool
     */
    public function load(): bool
    {
        if (file_exists($this->file_name)) {
            $json_string = file_get_contents($this->file_name);
            if ($json_string !== false) {
                $this->data = json_decode($json_string, true);
                return true;
            }
        }

        $this->data = [];
        return false;
    }

    /**
     * return array of data
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * if data with index $table_name exist return false else creates data with given index
     *
     * @param string $table_name
     * @return bool
     */
    public function createTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            return false;
        }
        $this->data[$table_name] = [];
        return true;
    }

    /**
     * check if Table with given name exists
     *
     * @param string $table_name
     * @return bool
     */
    public function tableExists(string $table_name): bool
    {
        return isset($this->data[$table_name]);
    }

    /**
     * delete Table from db
     *
     * @param string $table_name
     * @return bool
     */
    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            return true;
        }
        return false;
    }

    /**
     * clean Table[$table_name] to empty array
     *
     * @param $table_name
     * @return bool
     */
    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            return true;
        }
        return false;
    }

    /**
     * if exists Table or not exists row  inserts new row  by row_id or auto increment
     *
     * @param string $table_name
     * @param array $row
     * @param int|null $row_id
     * @return bool|int|string|null
     */
    public function insertRow(string $table_name, array $row, int $row_id = null)
    {
        if (!$this->tableExists($table_name) || $this->rowExists($table_name, $row_id)) {
            return false;
        }

        if ($row_id) {
            $this->data[$table_name][$row_id] = $row;
        } else {
            $this->data[$table_name][] = $row;
            $row_id = array_key_last($this->data[$table_name]);
        }

        return $row_id;
    }

    /**
     * check if row exists
     *
     * @param string $table_name
     * @param int|null $row_id
     * @return bool
     */
    public function rowExists(string $table_name, $row_id): bool
    {
        return isset($this->data[$table_name][$row_id]);
    }

    /**
     *insert new row if row not exists
     *
     * @param string $table_name
     * @param array $row
     * @param int $row_id
     * @return bool|int
     */
    public function insertRowIfNotExists(string $table_name, array $row, int $row_id)
    {
        if (!$this->rowExists($table_name, $row_id)) {
            $this->insertRow($table_name, $row, $row_id);
            return $row_id;
        }
        return false;
    }

    /**
     * update row from an object array by $row_id index
     *
     * @param string $table_name
     * @param array $row
     * @param int $row_id
     * @return bool
     */
    public function updateRow(string $table_name, array $row, int $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            return true;
        }
        return false;
    }

    /**
     * delete row from an object array by $row_id index
     *
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function deleteRow(string $table_name, int $row_id): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            unset($this->data[$table_name][$row_id]);
            return true;
        }
        return false;
    }

    /**
     * Get row from an object array by $row_id index
     *
     * @param string $table_name
     * @param int $row_id
     * @return bool
     */
    public function getRowById(string $table_name, int $row_id)
    {
        if ($this->rowExists($table_name, $row_id)) {
            return $this->data[$table_name][$row_id];
        }
        return false;
    }

    /**
     * grazina masyva su visais rastais indexais ir ju reiksmemis
     *
     * @param string $table_name
     * @param array $conditions
     * @return array
     */
    public function getRowsWhere(string $table_name, array $conditions): array
    {
        $rows = [];

        foreach ($this->data[$table_name] ?? [] as $row_id => $row) {
            $conditions_met = true;

            foreach ($conditions as $condition_key => $condition) {
                if ($row[$condition_key] !== $condition) {
                    $conditions_met = false;
                    break;
                }
            }
            if ($conditions_met) {
                $row['id'] = $row_id;
                $rows[$row_id] = $row;

            }
        }
        return $rows;
    }

    /**
     * @param string $table_name
     * @param array $conditions
     * @return bool|mixed
     */
    public function getRowWhere(string $table_name, array $conditions)
    {
        if (!$conditions) {
            return false;
        }

        foreach ($this->data[$table_name] ?? [] as $row) {
            $conditions_met = true;

            foreach ($conditions as $condition_id => $condition) {
                if ($row[$condition_id] !== $condition) {
                    $conditions_met = false;
                    break;
                }
            }

            if ($conditions_met) {
                return $row;
            }
        }

        return false;
    }
}