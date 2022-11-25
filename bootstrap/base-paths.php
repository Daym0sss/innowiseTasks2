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

    $paths[] = array(
        'url' => '/users/',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'getById'
    );

    $paths[] = array(
        'url' => '/users/edit/',
        'method' => 'GET',
        'controller' => 'UserController',
        'action' => 'edit'
    );

    $paths[] = array(
        'url' => '/users/update/',
        'method' => 'PUT',
        'controller' => 'UserController',
        'action' => 'update'
    );

    $paths[] = array(
        'url' => '/users/delete/',
        'method' => 'DELETE',
        'controller' => 'UserController',
        'action' => 'delete'
    );
    define('PATHS', $paths);