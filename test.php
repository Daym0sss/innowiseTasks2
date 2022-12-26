<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/tasks/task2/system/Database.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/tasks/task2/system/IRequest.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/tasks/task2/database/REST_API.php';

    $handler = REST_API::getInstance();
    var_dump($handler->create('Ivan Lodnya', 'lavandos322@gmail.com','male','active'));