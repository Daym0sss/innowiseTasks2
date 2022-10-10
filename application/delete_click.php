<?php
    if (isset($_POST['yes']))
    {
        $connect=new mysqli("localhost","root","mynewpassword","innowisedb");
        $id=$_POST['id'];
        $sql="DELETE FROM Users WHERE id=$id";
        $connect->query($sql);
        $connect->close();
    }
    ob_start();
    $url="http://localhost/task1/";
    header('Location: ' . $url);
    ob_end_flush();
