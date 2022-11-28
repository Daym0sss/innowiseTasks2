<?php


class LocalDB extends Database implements IRequest
{
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $dbName = DATABASE;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbName);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new LocalDB();
        }
        return self::$instance;
    }

    public function create($name, $email, $gender, $status)
    {
        $sql = "INSERT INTO Users(name, email, gender, status) VALUES('" . $name . "', '" . $email . "', '" . $gender . "', '" . $status . "')";
        $this->conn->query($sql);
    }

    public function edit($id, $name, $email, $gender, $status)
    {
       $sql = "UPDATE Users SET name='" . $name . "', email='" . $email . "', gender='" . $gender . "', status='" . $status . "' WHERE id=$id";
       $this->conn->query($sql);
    }

    public function getList()
    {
        $sql = "SELECT * FROM Users";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM Users WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Users WHERE id=$id";
        $this->conn->query($sql);
    }
}