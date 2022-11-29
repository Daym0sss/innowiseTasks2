function switchToUserAddition()
{
    window.location.href ='http://localhost/tasks/task2/users/new';
}

function deleteConfirmation(id)
{
    var del = confirm("Are you sure you want to delete this user?");
    if (del)
    {
        window.location.href = "http://localhost/tasks/task2/users/delete/" + id;
    }
}

function tryEnterDataAgain(link)
{
    window.location.href = link;
}

function switchToPageByNum(link)
{
    window.location.href = link;
}