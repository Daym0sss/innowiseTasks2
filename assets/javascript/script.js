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

function checkAll()
{
    $('body input:checkbox').prop('checked', true);
}

function uncheckAll()
{
    $('body input:checkbox').prop('checked', false);
}

function deleteSelected()
{
    var checked = $(':checkbox:checked').length;
    if (checked === 0)
    {
        alert('No users were selected');
    }
    else
    {
        var id_arr = [];
        $('input:checkbox:checked').each(function()
        {
           var id = $(this).attr('id');
           id_arr.push(id);
        });

        $.ajax(
            {
               url: 'http://localhost/tasks/task2/users/deleteGroup',
               type: 'POST',
               dataType: 'json',
               data: {ids : id_arr},
               success: function()
               {
                   switchToPageByNum('http://localhost/tasks/task2/');
               }
            });
    }
}