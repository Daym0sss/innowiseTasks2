<?php

interface IRequest
{
    public function create($name, $email, $gender, $status);

    public function edit($id, $name, $email, $gender, $status);

    public function getList();

    public function getById($id);

    public function delete($id);

    public function deleteGroup($id_arr);

    public function getByPageNum($from_record_number, $records_per_page);

    public function pagesCount($records_per_page);
}