<?php

class UserController
{
    private $user;

    public function new()
    {
        $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users");
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('new.html');
        echo $template->render(array());
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        $nameValidate = $this->validateName($name);
        $emailValidate = $this->validateEmail($email);

        if ($nameValidate && $emailValidate)
        {
            $instance = LocalDB::getInstance();
            $instance->create($name, $email, $gender, $status);
            header("Location: http://localhost/tasks/task2/");
        }
        else
        {
            $error = "";
            if (!$nameValidate)
            {
                $error .= "Name field is invalid ";
            }
            if (!$emailValidate)
            {
                $error .= "E-mail field is invalid";
            }

            $link = "http://localhost/tasks/task2/users/new";
            $src = "../assets/javascript/script.js";

            $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users");
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate('invalid_data.html');
            echo $template->render(array(
                'link' => $link,
                'src' => $src,
                'error' => $error
            ));
        }

    }

    public function getById($id)
    {
        $instance = LocalDB::getInstance();
        $result = $instance->getById($id);
        foreach ($result as $row)
        {
            $this->user = new User($row['id'], $row['name'], $row['email'], $row['gender'], $row['status']);
            break;
        }
    }

    public function edit($id)
    {
        $this->getById($id);

        $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users");
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('edit.html');
        echo $template->render(array(
            'id' => $this->user->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'gender' => $this->user->gender,
            'status' => $this->user->status
        ));;
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];

        $nameValidate = $this->validateName($name);
        $emailValidate = $this->validateEmail($email);
        if ($nameValidate && $emailValidate)
        {
            $instance = LocalDB::getInstance();
            $instance->edit($id, $name, $email, $gender, $status);
            header("Location: http://localhost/tasks/task2/");
        }
        else
        {
            $error = "";
            if (!$nameValidate)
            {
                $error .= "Name field is invalid ";
            }
            if (!$emailValidate)
            {
                $error .= "E-mail field is invalid";
            }

            $link = "http://localhost/tasks/task2/users/edit/" . $id;
            $src = "../assets/javascript/script.js";

            $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users");
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate('invalid_data.html');
            echo $template->render(array(
                'link' => $link,
                'error' => $error,
                'src' => $src
            ));
        }
    }

    public function delete($id)
    {
        $instance = LocalDB::getInstance();
        $instance->delete($id);
        header("Location: http://localhost/tasks/task2/");
    }

    public function deleteGroup()
    {
        $id_arr = $_POST['ids'];
        $instance = LocalDB::getInstance();
        $instance->deleteGroup($id_arr);
        echo json_encode('ok');
    }

    private function validateName($name): bool
    {
        $nameParts = explode(' ', $name);
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if (count($nameParts) < 1)
        {
            return false;
        }
        else
        {
            foreach ($nameParts as $part)
            {
                for($i = 0; $i < strlen($part); $i++)
                {
                    if (!(stripos($characters, $part[$i]) >= 0))
                    {
                        return false;
                    }
                }
            }
            return true;
        }
    }

    private function validateEmail($email): bool
    {
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}