<?php

class CreateUserTable extends Migrations
{
    public function up()
    {
       $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
       $sql = "CREATE TABLE IF NOT EXISTS Users(id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(50) NOT NULL, email varchar(50) NOT NULL, gender varchar(6) NOT NULL, status varchar(8) NOT NULL)";
       $connection->query($sql);
    }

    public function down()
    {
        $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $sql = "DROP TABLE Users";
        $connection->query($sql);
    }
}