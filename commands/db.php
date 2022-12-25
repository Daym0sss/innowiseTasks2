<?php
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/config_bootstrap/base-config.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/system/Seeds.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/system/Migrations.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/database/migrations/m2022_11_25_create_users_table.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/database/seeds/UserFactory.php";

    /*
     * $migration = new CreateUserTable(); initialize migration object
     * $migration->up(); method for creating users table
     * $migration->down(); method for deleting users table
     */

    /*
     *  $seed = new UserFactory(10); initialize seed object
     *  $seed->run();  method for fulfill table with test data.txt
     */