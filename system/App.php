<?php

class App
{
    private $controller;
    private $action;
    private $argument;

    public function __construct()
    {
        $controller = "";
        foreach (PATHS as $path)
        {
            if (preg_match_all($path['regexUrl'],URL) == 1)
            {
                $this->controller = $path['controller'];
                if ($path['parameters'] == 1)
                {
                    $routes = explode('/',URL);
                    if (preg_match_all("/^\d+$/",$routes[count($routes)-1]))
                    {
                        $this->argument = $routes[count($routes) - 1];
                    }
                }
                $this->action = $path['action'];
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
        if (isset($this->argument))
        {
            $obj->$method($this->argument);
        }
        else
        {
            $obj->$method();
        }

    }

    public function error404()
    {
        header('HTTP/1.0 404 Not Found', true, 404);
    }
}