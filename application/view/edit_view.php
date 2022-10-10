<?php
    $connect=new mysqli("localhost","root","mynewpassword","innowisedb");
    $id=$_POST['id'];
    $sql="SELECT * FROM Users WHERE id=$id";

    $email="";
    $name="";
    $gender="";
    $status="";

    foreach ($connect->query($sql) as $row)
    {
        $email=$row['email'];
        $name=$row['name'];
        $gender=$row['gender'];
        $status=$row['status'];
    }

    echo "
    <html>
        <head>
            <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
            <title>User edit page</title>
        </head>
        <body>
            <h2>Set new values for the fields</h2>
            <br>
            
            <form method='post' action='../edit_click.php'>
                <label for='floatingInput'>E-mail</label>  
                <input type='text' class='form-control' id='floatingInput' name='email' value='$email' > <br>
                <label for='floatingInput1'>Name</label>  
                <input type='text'   class='form-control'name='name' id='floatingInput1' value='$name'> <br>
        ";
            echo "  <label for='genderSelect'>Gender</label> <br>
                    <select  id='genderSelect' class='form-control' name='gender'>";
            if ($gender=="male")
            {
                echo "<option value='male' selected='selected'>male</option>";
                echo "<option value='female'>female</option>";
            }
            else
            {
                echo "<option value='male'>male</option>";
                echo "<option value='female' selected='selected'>female</option>";
            }
            echo "</select> <br><br>";

            echo "  <label for='statusSelect'>Status</label> <br>
                    <select id='statusSelect' class='form-control' name='status'>";
            if ($status=="active")
            {
                echo "<option value='active' selected='selected'>active</option>";
                echo "<option value='inactive'>inactive</option>";
            }
            else
            {
                echo "<option value='active'>active</option>";
                echo "<option value='inactive' selected='selected'>inactive</option>";
            }
            echo "<select> <br><br>";

            echo "<input type='submit' class='btn btn-primary' value='Edit'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "</form>
                    </body>
                 </html>";
