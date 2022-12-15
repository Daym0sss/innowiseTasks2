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
        if(!self::$instance || get_class(self::$instance) != "LocalDB")
        {
            self::$instance = new LocalDB();
        }
        return self::$instance;
    }

    public function create($name, $email, $gender, $status)
    {
        $sql = "INSERT INTO Users(name, email, gender, status) VALUES('" . $name . "', '" . $email . "', '" . $gender . "', '" . $status . "')";
        try
        {
            $this->conn->query($sql);
        }
        catch (SQLiteException $e)
        {
            $e->getMessage();
        }
    }

    public function edit($id, $name, $email, $gender, $status)
    {
       $sql = "UPDATE Users SET name='" . $name . "', email='" . $email . "', gender='" . $gender . "', status='" . $status . "' WHERE id=$id";
       try
       {
         $this->conn->query($sql);
       }
       catch (SQLiteException $e)
       {
         $e->getMessage();
       }
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
        try
        {
          $this->conn->query($sql);
        }
        catch (SQLiteException $e)
        {
          $e->getMessage();
        }
    }

    public function deleteGroup($id_arr)
    {
        foreach ($id_arr as $id)
        {
            $sql = "DELETE FROM Users WHERE id=$id";
            try
            {
              $this->conn->query($sql);
            }
            catch (SQLiteException $e)
            {
              $e->getMessage();
            }
        }
    }

    public function getByPageNum($from_record_number,$records_per_page)
    {
        $sql = "SELECT * FROM Users LIMIT $from_record_number, $records_per_page";
        return $this->conn->query($sql);
    }

    public function pagesCount($records_per_page)
    {
        $sql = "SELECT CEILING(COUNT(*)/10) AS users_count FROM Users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count;
    }
}