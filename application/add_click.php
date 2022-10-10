<?php
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
        echo "
                Entered email is invalid<br><br>
                <button class='btn btn-warning'><a href='http://localhost/task1/application/view/add_view.php'>Get back to user addition page</a></button>
                </body>
                </html>";
    }
    else
    {
        $resultName=explode(" ",$name);
        if (count($resultName)!=2)
        {
            echo "You must enter name like: 'Ivan Ivanov' <br><br>
                  <button class='btn btn-warning'><a href='http://localhost/task1/application/view/add_view.php'>Get back to user addition page</a></button>
                  </body>
                  </html>";
        }
        else if (strlen($resultName[0])>0 and strlen($resultName[1])>0)
        {
            $connect=new mysqli("localhost","root","mynewpassword","innowisedb");
            $sql="INSERT INTO Users(email,name,gender,status) VALUES(\"$email\",\"$name\",\"$gender\",\"$status\")";
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
                <button class='btn btn-warning'><a href='http://localhost/task1/application/view/add_view.php'>Get back to user addition page</a></button>
                </body>
                </html>";
        }
    }
