$(document)
    .on('click', '.cs_action-create', function() {
        let store_name = $('.form-create_store').find('#csi-name').val()
        let store_comment = $('.form-create_store').find('#csi-comment').val()

        $.ajax({
            url: '/admin/api/stores',
            type: 'POST',
            data: {
                NAME: store_name,
                COMMENT: store_comment,
            },
            success: function(response) {
                // console.log('Success:', response);
                $('#success-alert').addClass('show');
                clearForms('form-create_store')
                setTimeout(function() {
                    $('#success-alert .btn-close').click();
                }, 2000)
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sta-delete', function() {
        let self = $(this)
        store_id = self.attr('data-id')

        $('#del_modal-ingrid').find('.sta-delete-proceed').attr('data-id',store_id);
        $('#del_modal-ingrid').modal('show')

    })
    .on('click','.sta-delete-proceed', function(){
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'DELETE',
            success: function(response) {
                // console.log('Success:', response);
                location.reload()
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sta-edit', function() {
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/stores/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                STORE_ID: store_id
            },
            success: function(response) {
                console.log('Success:', response);

                $('#edit_modal-ingrid').find('.modal-body').html(response)
                $('#edit_modal-ingrid').modal('show')
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sem-save', function() {
        let store_name = $('#edit_modal-ingrid').find('.esi-name').val()
        let store_comment = $('#edit_modal-ingrid').find('.esi-comment').val()

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'PUT',
            data: {
                NAME: store_name,
                COMMENT: store_comment,
            },
            success: function(response) {
                $('#edit_modal-ingrid').modal('hide')
                location.reload()
            },
            error: function(xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })