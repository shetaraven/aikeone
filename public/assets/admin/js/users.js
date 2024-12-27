function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchRecipe');
    filter = input.value.toUpperCase();
    ul = document.getElementById("priv-recipe-list");
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
        let self = $(this)
        let user_id = self.attr('data-id')
        let user_type = $('#select-user_type').val()

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
    .on('click', '.uta-delete', function() {
        let self = $(this)
        let user_id = self.attr('data-id')
        let status_type = self.attr('data-type') == 0 ? 1 : 0

        $.ajax({
            url: '/admin/api/users/' + user_id,
            type: 'PUT',
            dataType: 'json',
            data: {
                UPDATE_TO: status_type
            },
            success: function(response) {
                location.reload()
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.uta-show_modal', function () {
        let self = $(this)
        let user_id = self.attr('data-id')

        $.ajax({
            url: '/admin/users/partial-priv-recipe-list',
            type: 'POST',
            dataType: 'html',
            data: {
                USER_ID: user_id
            },
            success: function(response) {
                $('#ChooseRecipe').modal('show')
                $('#ChooseRecipe').find('.modal-body').html(response)
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
    .on('change', '.checkbox-priv_recipe', function() {
        let self = $(this)
        let user_id = $('#priv-recipe-list').attr('data-uid')
        let pr_id = self.val()
        let pr_is_checked = self.is(':checked')

        let uprl_id = self.closest('.list-group-item').attr('data-prl-id')

        $.ajax({
            url:  '/admin/api/priv-recipe-link' +( pr_is_checked ? '' : '/' + uprl_id ),
            type: pr_is_checked ? 'POST' : 'DELETE',
            dataType: 'json',
            data: {
                USER_ID: user_id,
                PRIV_RECIPE_ID: pr_id,
            },
            success: function(response) {
                
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })