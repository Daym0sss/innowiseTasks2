<?php

?>

<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Add new user</title>
    </head>
    <body>
        <h2>Fill information about new user</h2>
        <form method="post" action="../add_click.php">
            <label for="emailInput">E-mail</label> <input type="text" id='emailInput' class='form-control' name="email"> <br>

            <labeL for="nameInput">Name</labeL> <input type="text" id='nameInput' class='form-control' name="name"> <br>

            <labeL for="genderSelect">Gender</labeL> <br>
            <select id='genderSelect' class='form-control' name="gender">
                <option value="male">male</option>
                <option value="female">female</option>
            </select> <br><br>

            <label for="statusSelect">Status</label> <br>
            <select id='statusSelect' class='form-control' name="status">
                <option value="active">active</option>
                <option value="inactive">inactive</option>
            </select> <br><br>

            <input type="submit" class='btn btn-primary' value="Add">
        </form>
    </body>
</html>
