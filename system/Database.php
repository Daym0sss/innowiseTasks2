<?php

abstract class Database
{
    public static $instance = null;
    protected $conn;

    public function getConnection()
    {
        return $this->conn;
    }

    public static function getInstance()
    {

    }
}