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
            if ($pageNum == null)
            {
                $pageNum = 1;
            }
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

            $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views");
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate('main.html');
            echo $template->render(array(
                'currentPage' => $pageNum,
                'links' => $links,
                'users' => $users
            ));
        }
    }

}