<?php

class UserFactory extends Seeds
{
    public function run($limit)
    {
        $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        for($i = 0; $i < $limit; $i++)
        {
            $sql = "INSERT INTO Users(name, email, gender, status) VALUES('" . $this->randomName() . "', '" . $this->randomEmail() . "', '" . $this->randomGender() . "', '" . $this->randomStatus() . "')";
            $connection->query($sql);
        }
    }

    public function randomName(): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = "";
        for ($i = 0; $i < 20; $i++)
        {
            $result .= $characters[rand(0,strlen($characters)-1)];
        }

        return $result;
    }

    public function randomEmail(): string
    {
        return $this->randomName() . "@gmail.com";
    }

    public function randomGender(): string
    {
        $genders = ['male', 'female'];
        return $genders[rand(0,1)];
    }

    public function randomStatus(): string
    {
        $statuses = ['active', 'inactive'];
        return $statuses[rand(0,1)];
    }
}