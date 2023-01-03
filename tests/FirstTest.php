<?php

namespace tests\task2\tests;

require  "/var/www/html/web/tasks/task2/app/models/User.php";
require "/var/www/html/web/tasks/task2/system/IRequest.php";
require "/var/www/html/web/tasks/task2/system/Database.php";
require "/var/www/html/web/tasks/task2/database/REST_API.php";
require "/var/www/html/web/tasks/task2/system/Seeds.php";
require "/var/www/html/web/tasks/task2/database/seeds/UserFactory.php";

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    /**
     * @test
     * @covers REST_API
     */
    public function checkNotEmptyUsersData()
    {
        $handler = \REST_API::getInstance();
        $data = $handler->getList();
        $this->assertNotEmpty($data);
        $this->assertNotEmpty($data[0]['name']);
    }

    /**
     * @test
     * @covers REST_API
     */
    public function checkUserCreation()
    {
        $handler = \REST_API::getInstance();
        $factory = new \UserFactory();
        $name = $factory->randomName();
        $email = $factory->randomEmail();
        $gender = $factory->randomGender();
        $status = $factory->randomStatus();
        $result = $handler->create($name, $email, $gender, $status);
        $this->assertEquals("HTTP/2 201",$result[0]);
    }

    /**
     * @test
     * @covers REST_API
     */
    public function checkUserDeletion()
    {
        $handler = \REST_API::getInstance();
        $users = $handler->getList();
        $id = $users[0]['id'];
        $result = $handler->delete($id);
        $this->assertEquals("HTTP/2 204",$result[0]);
    }

    /**
     * @test
     * @covers REST_API
     */
    public function checkUserUpdate()
    {
        $handler = \REST_API::getInstance();

        $users = $handler->getList();
        $id = $users[0]['id'];
        $name = $users[0]['name'];
        $email = $users[0]['email'];
        $gender = $users[0]['gender'];
        $status = $users[0]['status'];

        if ($status == "active")
        {
            $status = "inactive";
        }
        else
        {
            $status = "active";
        }

        $result = $handler->edit($id, $name, $email, $gender, $status);
        $this->assertEquals("HTTP/2 200",$result[0]);
        $newStatus = json_decode($result[24])->{'status'};
        $this->assertEquals($status, $newStatus);
    }
}
