$(document)
    .on('click', '.cs_action-create', function () {
        let store_name = $('.form-create_store').find('#csi-name').val()
        let store_comment = $('.form-create_store').find('#csi-comment').val()

        $.ajax({
            url: '/admin/api/stores',
            type: 'POST',
            data: {
                NAME: store_name,
                COMMENT: store_comment,
            },
            success: function (response) {
                console.log('Success:', response);
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sta-delete', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'DELETE',
            success: function (response) {
                // console.log('Success:', response);
                location.reload()
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sta-edit', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'GET',
            success: function (response) {
                console.log('Success:', response);

                $('#store_edit_modal').find('#store-name').val(response.NAME)
                $('#store_edit_modal').find('#store-comment').val(response.COMMENT)
                $('#store_edit_modal').find('.sem-save').attr('data-id', store_id)
                $('#store_edit_modal').modal('show')
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sem-save', function () {
        let store_name = $('#store_edit_modal').find('#store-name').val()
        let store_comment = $('#store_edit_modal').find('#store-comment').val()

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'PUT',
            data: {
                NAME: store_name,
                COMMENT: store_comment,
            },
            success: function (response) {
                $('#store_edit_modal').modal('hide')
                location.reload()
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })