<?php
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/database/migrations/m2022_11_25_create_users_table.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/database/seeds/UserFactory.php";

    /*
     * $migration = new CreateUserTable(); initialize migration object
     * $migration->up(); method for creating users table
     * $migration->down(); method for deleting users table
     */

    /*
     *  $seed = new UserFactory(); initialize seed object
     *  $seed->run();  method for fulfill table with test data
     */