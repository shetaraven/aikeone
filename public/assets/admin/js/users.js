function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchRecipe');
    filter = input.value.toUpperCase();
    ul = document.getElementById("recipe-list");
    li = ul.getElementsByTagName('label');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

$(document)
    .on('click', '.uta-edit', function () {
        let self = $(this)
        let user_id = self.attr('data-id')

        $.ajax({
            url: '/admin/users/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                USER_ID: user_id
            },
            success: function(response) {
                $('#EditModal').find('.modal-body').html(response)
                $('#EditModal').find('.uta-update').attr('data-id', user_id)
                $('#EditModal').modal('show')
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.uta-update', function() {
        console.log("asd")
        let self = $(this)
        let user_id = self.attr('data-id')
        let user_type = $('#select-user_type').val()
        console.log( user_type )

        $.ajax({
            url: '/admin/api/users/' + user_id,
            type: 'PUT',
            dataType: 'json',
            data: {
                USER_TYPE_ID: user_type
            },
            success: function(response) {
                $('#EditModal').modal('hide')
                location.reload()
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })