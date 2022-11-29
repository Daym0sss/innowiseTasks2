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

    public function deleteGroup($id_arr)
    {
        foreach ($id_arr as $id)
        {
            $sql = "DELETE FROM Users WHERE id=$id";
            $this->conn->query($sql);
        }
    }

    public function getByPageNum($from_record_number,$records_per_page)
    {
        $sql = "SELECT * FROM Users LIMIT $from_record_number, $records_per_page";
        return $this->conn->query($sql);
    }

    public function pagesCount($records_per_page)
    {
        $sql = "SELECT COUNT(id) FROM Users";
        $result = $this->conn->query($sql);
        $records = 0;
        foreach ($result as $row)
        {
            $records = $row['COUNT(id)'];
        }
        if ($records % $records_per_page != 0)
        {
            return $records / $records_per_page + 1;
        }
        else
        {
            return $records / $records_per_page;
        }
    }
}