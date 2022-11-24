<?php
    $paths = array();

    $paths[] = array(
        'url' => '/',
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    );

    $paths[] = array(
        'url' => '/index.php',
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    );

    $paths[] = array(
        'url' => '/users/new',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'new'
    );

    $paths[] = array(
        'url' => '/users/create',
        'method' => 'POST',
        'controller' => 'UserController',
        'action' => 'create'
    );

    define('PATHS', $paths);