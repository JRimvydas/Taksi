<?php

namespace Core;

class View
{
    protected $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * renders array to template (is paduoto array sugeneruoja template)
     *
     * @param $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render($template_path)
    {
        if (!file_exists($template_path)) {
            throw (new \Exception("Template with file name: " . "$template_path Does not exist!"));
        }
        $data = $this->data;

        ob_start();
        require $template_path;

        return ob_get_clean();
    }

    public function &getData()
    {
        return $this->data;
    }
}