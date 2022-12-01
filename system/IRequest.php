<?php

interface IRequest
{
    public function create($name, $email, $gender, $status);

    public function edit($id, $name, $email, $gender, $status);

    public function getList();

    public function getById($id);

    public function delete($id);
}