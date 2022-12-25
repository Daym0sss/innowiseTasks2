function deleteConfirmation(id,e)
{
    var del = confirm("Are you sure you want to delete this user?");
    if (del)
    {
        this.form.submit();
    }
    else
    {
        e.preventDefault();
    }
}

function checkAll()
{
    $('body input:checkbox').prop('checked', true);
}

function uncheckAll()
{
    $('body input:checkbox').prop('checked', false);
}

function addPageToPostRequest(pressed_value)
{
    document.getElementById('pressed_button').value = pressed_value;
    this.form.submit();
}

function deleteSelected(db)
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
               data: {ids : id_arr, currentDB : db},
               success: function(data)
               {
                   window.location.href = 'http://localhost/tasks/task2/';
               }
            });
    }
}

function changeDB()
{
   $('#dbForm').submit();
}