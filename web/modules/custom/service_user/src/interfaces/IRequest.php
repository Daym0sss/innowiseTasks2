<?php

namespace Drupal\service_user\interfaces;

interface IRequest
{
    public function getList();

    public function createUser($parameters);

    public function deleteUser($parameters);

    public function updateUser($parameters);

    public function getUserDetails($parameters);
}