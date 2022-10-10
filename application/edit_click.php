<?php
    $id=$_POST['id'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $status=$_POST['status'];

    echo "
        <html>
            <head>
                <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
                <title>Confirm addition</title>
                <style>
                    a
                    {
                        text-decoration: none;
                    }
                </style>
            </head>
            <body>
    ";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Entered email is invalid<br><br>
            <button class='btn btn-warning'><a href='http://localhost/task1/'>Get back to main page</a></button>
            </body>
            </html>";
    }
    else
    {
        $resultName=explode(" ",$name);
        if (count($resultName)!=2)
        {
            echo "You must enter name like: 'Ivan Ivanov' <br><br>
                    <button class='btn btn-warning'><a href='http://localhost/task1/'>Get back to main page</a></button>
                   </body>
                   </html>";
        }
        else if (strlen($resultName[0])>0 and strlen($resultName[1])>0)
        {
            $connect=new mysqli("localhost","root","mynewpassword","innowisedb");
            $sql="UPDATE Users SET email=\"$email\", name=\"$name\", gender=\"$gender\", status=\"$status\" WHERE id=$id";
            if ($connect->query($sql))
            {
                ob_start();
                $url="http://localhost/task1/";
                header('Location: ' . $url);
                ob_end_flush();
            }
            $connect->close();
        }
        else
        {
            echo "You must enter name like: 'Ivan Ivanov' <br><br>
                  <button class='btn btn-warning'><a href='http://localhost/task1/'>Get back to main page</a></button>
                  </body>
                  </html>";
        }
    }