<?php

class UserFactory extends Seeds
{
    public function run()
    {
        $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        for($i = 0; $i < 10; $i++)
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
            $result .= $characters[$i];
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