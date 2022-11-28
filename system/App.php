<?php

class App
{
    private $controller;
    private $action;
    private $argument;

    public function __construct()
    {
        $controller = "";
        $this->argument = -1;
        foreach (PATHS as $path)
        {
            if (URL == $path['url'])
            {
                $this->controller = $path['controller'];
                $this->action = $path['action'];
                break;
            }
            else if (($path['url'] == '/users/edit/' || $path['url'] == '/users/delete/' || $path['url'] == '/users/') && stripos(URL,$path['url']) == 0)
            {
                $id = substr(URL, strlen($path['url']));
                if (preg_match_all("/^\+?\d+$/", $id) && $id[0] != '0')
                {
                    $this->argument = $id;
                    $this->controller = $path['controller'];
                    $this->action = $path['action'];
                    break;
                }
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
        if ($this->argument != -1)
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