$(document)
    .on('input', '.search-input', function () {
        let self = $(this)
        globalSearchHelper({ search_elem: self })
    })
    .on('click', '.cs_action-create', function () {
        if (validateForm('form-create_store')) {
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
                    // console.log('Success:', response);
                    clearForms('form-create_store')
                    showSuccess();
                },
                error: function (xhr, status, error) {
                    // $('.required').addClass('error');
                    showError('Store Name Already Existing!');
                    console.error('Error:', error);
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })
    .on('click', '.sta-delete', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $('#del_modal-store').find('.sta-delete-proceed').attr('data-id', store_id);
        $('#del_modal-store').modal('show')

    })
    .on('click', '.sta-delete-proceed', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/stores/' + store_id,
            type: 'DELETE',
            success: function (response) {
                globalSearchHelper({search_elem: $('.search-input')})
                $('#del_modal-store').modal('hide')
                pageLoading('hide')
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
            url: '/admin/stores/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                STORE_ID: store_id
            },
            success: function (response) {
                console.log('Success:', response);

                $('#edit_modal-store').find('.modal-body').html(response)
                $('#edit_modal-store').modal('show')
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.sem-save', function () {
        if (validateForm('template-edit_store')) {
            let store_name = $('#edit_modal-store').find('.esi-name').val()
            let store_comment = $('#edit_modal-store').find('.esi-comment').val()

            $.ajax({
                url: '/admin/api/stores/' + store_id,
                type: 'PUT',
                data: {
                    NAME: store_name,
                    COMMENT: store_comment,
                },
                success: function (response) {
                    globalSearchHelper({search_elem: $('.search-input')})
                    $('#edit_modal-store').modal('hide')
                    pageLoading('hide')
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseJSON.messages)
                    showError('Store Name Already Existing!');
                    console.error('Error:', error);
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })