<?php
    $id=$_POST['id'];
    echo "
        <html>
    <head>
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3\" crossorigin=\"anonymous\">
        <title>Deleting confirmation</title>
    </head>
    <body>
        <h2>Are you sure you want to delete this user?</h2> <br>
        <form method='post' action='../delete_click.php'>
            <input type='submit' class='btn btn-primary' name='yes' value='Yes'>
            <input type='submit' class='btn btn-primary' name='no' value='No'>
            <input type='hidden' name='id' value='$id'>
        </form>
    </body>
</html>
";


