<?php

class AppController
{
    public function index()
    {
        $instance = LocalDB::getInstance();
        $result = $instance->getList();
        $users = [];
        foreach ($result as $row)
        {
            $users[] = new User($row['id'], $row['name'], $row['email'], $row['gender'], $row['status']);
        }

        require VIEW_PATH . 'main.html';
    }

}