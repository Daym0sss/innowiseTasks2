<?php

class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[2]))
        {
            if ($routes[2] != "index.php")
            {
                $controller_name = $routes[2];
            }
        }

        if (!empty($routes[3]))
        {
            $action_name = $routes[3];
        }

        $model_name = "Model_" . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "../model/" . $model_file;
        if (file_exists($model_path))
        {
            include '../model/' . $model_file;
        }

        $controller_file = strtolower($controller_name) . ".php";
        $controller_path = "../controller/" . $controller_file;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/task1/application/controller/" . $controller_file))
        {
            include $_SERVER['DOCUMENT_ROOT'] . "/task1/application/controller/" . $controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            Route::ErrorPage404();
        }
    }


    static function ErrorPage404()
    {
        $host = 'https://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}