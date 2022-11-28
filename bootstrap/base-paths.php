<?php
    $paths = [];

    $paths[] = [
        'url' => '/',
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    ];

    $paths[] = [
        'url' => '/index.php',
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    ];

    $paths[] = [
        'url' => '/users/new',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'new'
    ];

    $paths[] = [
        'url' => '/users/create',
        'method' => 'POST',
        'controller' => 'UserController',
        'action' => 'create'
    ];

    $paths[] = [
        'url' => '/users/',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'getById'
    ];

    $paths[] = [
        'url' => '/users/edit/',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'edit'
    ];

    $paths[] = [
        'url' => '/users/update/',
        'method' => 'PUT',
        'controller' => 'UserController',
        'action' => 'update'
    ];

    $paths[] = [
        'url' => '/users/delete/',
        'method' => 'DELETE',
        'controller' => 'UserController',
        'action' => 'delete'
    ];
    define('PATHS', $paths);