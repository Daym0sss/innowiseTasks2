<?php

class User
{
    public $id;
    public $name;
    public $email;
    public $gender;
    public $status;

    public function __construct($id, $name, $email, $gender, $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->status = $status;
    }
}