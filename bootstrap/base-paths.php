<?php
    $paths = [];

    $paths[] = [
        'url' => '/',
        'regexUrl' => '/^\/$/',
        'parameters' => 0,
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    ];

    $paths[] = [
        'url' => '/index.php',
        'regexUrl' => '/^\/index.php$/',
        'parameters' => 0,
        'method' => 'GET',
        'controller' => 'AppController',
        'action' => 'index'
    ];

    $paths[] = [
        'url' => '/users/new',
        'regexUrl' => '/^\/users\/new$/',
        'parameters' => 0,
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'new'
    ];

    $paths[] = [
        'url' => '/users/create',
        'regexUrl' => '/^\/users\/create$/',
        'parameters' => 0,
        'method' => 'POST',
        'controller' => 'UserController',
        'action' => 'create'
    ];

    $paths[] = [
        'url' => '/users/',
        'regexUrl' => '/^\/users\/[1-9][0-9]*$/',
        'parameters' => 1,
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'getById'
    ];

    $paths[] = [
        'url' => '/users/edit/',
        'regexUrl' => '/^\/users\/edit\/[1-9][0-9]*$/',
        'parameters' => 1,
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'edit'
    ];

    $paths[] = [
        'url' => '/users/update',
        'regexUrl' => '/^\/users\/update$/',
        'parameters' => 0,
        'method' => 'PUT',
        'controller' => 'UserController',
        'action' => 'update'
    ];

    $paths[] = [
        'url' => '/users/delete/',
        'regexUrl' => '/^\/users\/delete\/[1-9][0-9]*$/',
        'parameters' => 1,
        'method' => 'DELETE',
        'controller' => 'UserController',
        'action' => 'delete'
    ];
    define('PATHS', $paths);