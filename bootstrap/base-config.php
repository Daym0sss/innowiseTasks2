<?php
    $url = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    define('URL', substr($url,12));
    define('METHOD', $method);
    define('CONTROLLER_PATH', $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/controllers/");
    define('VIEW_PATH', $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/");