<?php

class AppController
{
    public function index($pageNum = null)
    {
        $instance = Pager::getInstance();
        $result = ($pageNum == null)? $instance->getPage(1) : $instance->getPage($pageNum);
        if ($result == null)
        {
            header('HTTP/1.0 404 Not Found', true, 404);
        }
        else
        {
            $users = [];
            foreach ($result as $row)
            {
                $users[] = new User($row['id'], $row['name'], $row['email'], $row['gender'], $row['status']);
            }

            $links = [];
            for($i = 1;$i <= $instance->getPagesCount(); $i++)
            {
                $links[] = 'http://localhost/tasks/task2/' . $i;
            }

            require VIEW_PATH . 'main.html';
        }
    }

}