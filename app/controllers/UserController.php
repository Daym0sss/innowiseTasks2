<?php

class UserController
{
    public function new()
    {
        require VIEW_PATH . "users/new.html";
    }

    public function create()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}