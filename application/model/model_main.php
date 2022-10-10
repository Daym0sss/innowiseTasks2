<?php

class Model_Main extends Model
{
    public function get_data()
    {
        $connect=new mysqli("localhost","root","mynewpassword","innowisedb");
        $sql="SELECT * FROM Users";
        $result=$connect->query($sql);
        $array=array();
        foreach ($result as $row)
        {
            $temp=array();
            $temp[] = $row['id'];
            $temp[] = $row['email'];
            $temp[] = $row['name'];
            $temp[] = $row['gender'];
            $temp[] = $row['status'];
            $array[] = $temp;
        }
        $connect->close();
        return $array;
    }
}