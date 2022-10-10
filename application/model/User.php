<?php

namespace model;
class User
{
    private $email;
    private $name;
    private $gender;
    private $status;

    public function __construct($email, $name, $gender, $status)
    {
        $this->email = $email;
        $this->name = $name;
        $this->gender = $gender;
        $this->status = $status;
    }

    public function __get($prop)
    {
        return $this->{$prop};
    }

    public function __set($prop, $value)
    {
        $this->{$prop} = $value;
    }
}