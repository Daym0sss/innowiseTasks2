function deleteClick()
{
    var confirm=window.confirm("Are you sure?");
    if (confirm)
    {
        var email=document.getElementById("email").value;
        $.ajax({
            url: 'http://localhost/task1/application/view/deleteUser.php',
            method: 'post',
            dataType: 'json',
            data: {key: email},
            success: function (data)
            {
                if (data=="check email")
                {
                    document.body.innerHTML="Check entered email<br>";
                    document.body.innerHTML+="<button><a href='http://localhost/task1/application/view/delete_view.php'>Get back to user delete page</a></button>";
                }
                else if (data=="no user")
                {
                    document.body.innerHTML="There is no such user<br>";
                    document.body.innerHTML+="<button><a href='http://localhost/task1/application/view/delete_view.php'>Get back to user delete page</a></button>";
                }
                else if (data=="deleted")
                {
                    document.body.innerHTML="User has been deleted<br>";
                    document.body.innerHTML+="<button><a href='http://localhost/task1/'>Get back to main page</a></button>";
                }
            },
            error: function (error)
            {
                console.log(error.text);
            }

        })
    }
}