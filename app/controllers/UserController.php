<?php

class UserController
{
    private $user;

    public function new()
    {
        require VIEW_PATH . "users/new.html";
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
                $error .= "Name field is invalid<br>";
            }
            if (!$emailValidate)
            {
                $error .= "E-mail field is invalid<br>";
            }

            $link = "http://localhost/tasks/task2/users/new";
            $rel = "../assets/css/styles.css";
            $src = "../assets/javascript/script.js";

            require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users/invalid_data.html";
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
        require VIEW_PATH . "users/edit.html";
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
                $error .= "Name field is invalid<br>";
            }
            if (!$emailValidate)
            {
                $error .= "E-mail field is invalid<br>";
            }
            $link = "http://localhost/tasks/task2/users/edit/" . $id;
            $rel = "../../assets/css/styles.css";
            $src = "../../assets/javascript/script.js";

            require $_SERVER['DOCUMENT_ROOT'] . "/tasks/task2/app/views/users/invalid_data.html";
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
        if (count($nameParts) <= 1)
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