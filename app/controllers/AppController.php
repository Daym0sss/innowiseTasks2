<?php

class AppController
{
    public function index()
    {
        $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $result = $connection->query("SELECT * FROM Users");
        $users = [];
        foreach ($result as $row)
        {
            $users[] = new User($row['id'], $row['name'], $row['email'], $row['gender'], $row['status']);
        }

        require VIEW_PATH . 'main.html';
    }

}