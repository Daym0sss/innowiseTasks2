<h2>Welcome!</h2>

<?php
    if (count($data)==0)
    {
        echo "There is still no information about users in put database, but you can add it<br>";
    }
    else
    {
        echo "<table class='table table-dark table-bordered'>
                  <caption>Users information</caption>
                  <tr>
                    <th>E-mail</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>";

        foreach ($data as $row)
        {
            echo "<tr>
            <td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
            <td>
            
            <form method='post' action='application/view/edit_view.php'>
                <input type='submit' class='btn btn-primary'  value='Edit'>
                <input type='hidden' name='id' value='$row[0]'>
            </form>
            
            <form method='post' action='application/view/delete_view.php'>
                <input type='submit' class='btn btn-primary'  value='Delete'>
                <input type='hidden' name='id' value='$row[0]'>
            </form>
            
            </td>
                </tr>";
        }

        echo "</table><br>";

        echo "<form action='application/view/add_view.php'>
                <input type='submit' class='btn btn-primary'  value='Add'>
               </form>";
    }
?>
