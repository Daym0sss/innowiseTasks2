<?php

class App
{
    private $controller;
    private $action;

    public function __construct()
    {
        $controller = "";
        foreach (PATHS as $path)
        {
            if (URL == $path['url'])
            {
                $this->controller = $path['controller'];
                $this->action = $path['action'];
                break;
            }
        }
        if ($this->controller == "")
        {
            $this->error404();
        }
        else
        {
            require CONTROLLER_PATH . $this->controller . ".php";
        }
    }

    public function run()
    {
        $obj = new $this->controller();
        $method = $this->action;
        $obj->$method();
    }

    public function error404()
    {
        header('HTTP/1.0 404 Not Found', true, 404);
    }
}