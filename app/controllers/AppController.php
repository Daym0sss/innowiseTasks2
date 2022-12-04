<?php

class AppController
{
    public function index($pageNum = null)
    {
      session_start();
      /*
       * check for redirects from page selection and DB selection
       */
      if (isset($_POST['db']))
      {
          $db = forward_static_call(array($_POST['db'], 'getInstance'));
      }
      /*
       * check for redirects from update, delete and create methods
       */
      else if (isset($_SESSION['db']))
      {
          $db = forward_static_call(array($_SESSION['db'], 'getInstance'));
      }
      /*
       * the last case if we just open the main page
       */
      else
      {
          $db = LocalDB::getInstance();
      }
      unset($_SESSION['db']);
      session_write_close();
      $pager = Pager::getInstance();
      if (!$pageNum)
      {
          $pageNum = $_POST['pressed_button'] ?? 1;
      }
      $result = $pager->getPage($pageNum);
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
        for($i = 1;$i <= $pager->getPagesCount(); $i++)
        {
          $links[] = 'http://localhost/tasks/task2/' . $i;
        }

        if ($pageNum > $pager->getPagesCount())
        {
            $pageNum = $pager->getPagesCount();
        }

        $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views");
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('main.html');
        echo $template->render(array(
          'currentPage' => $pageNum,
          'links' => $links,
          'users' => $users,
          'db' => get_class(Database::$instance)
        ));
      }
    }
}