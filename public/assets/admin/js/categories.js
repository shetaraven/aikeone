$(document)
    .on('input', '.search-input', function () {
        let self = $(this)
        globalSearchHelper({search_elem: self})
    })
    .on('click', '.cc_action-create', function () {
        if (validateForm('form-create_category')) {
            let label = $('.form-create_category').find('#cci-label').val()
            let description = $('.form-create_category').find('#cci-description').val()

            $.ajax({
                url: '/admin/api/categories',
                type: 'POST',
                data: {
                    LABEL: label,
                    DESCRIPTION: description,
                },
                success: function (response) {
                    clearForms('form-create_category')
                    showSuccess();
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
    .on('click', '.rcta-edit', function () {
        let self = $(this)
        rc_id = self.attr('data-id')

        $.ajax({
            url: '/admin/categories/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                RC_ID: rc_id
            },
            success: function (response) {
                $('#edit_modal-category').find('.modal-body').html(response)
                $('#edit_modal-category').find('.rcem-save').attr('data-id', rc_id)
                $('#edit_modal-category').modal('show')
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.rcem-save', function () {
        if (validateForm('form-edit_rc')) {
            let self = $(this)
            let rc_id = self.attr('data-id')
            let label = $('.form-edit_rc').find('.erci-label').val()
            let description = $('.form-edit_rc').find('.erci-description').val()

            $.ajax({
                url: '/admin/api/categories/' + rc_id,
                type: 'PUT',
                data: {
                    LABEL: label,
                    DESCRIPTION: description,
                },
                success: function (response) {
                    $('#edit_modal-category').modal('hide')
                    globalSearchHelper({search_elem: $('.search-input')})

                    pageLoading('hide')
                },
                error: function (xhr, status, error) {
                    showError('Store Name Already Existing!');
                    console.error('Error:', error);
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })
    .on('click', '.rcta-delete', function () {
        let self = $(this)
        category_id = self.attr('data-id')

        $('#del_modal-category').find('.rcta-delete-proceed').attr('data-id', category_id);
        $('#del_modal-category').modal('show')

    })
    .on('click', '.rcta-delete-proceed', function () {
        let self = $(this)
        category_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/categories/' + category_id,
            type: 'DELETE',
            success: function (response) {
                globalSearchHelper({search_elem: $('.search-input')})
                $('#del_modal-category').modal('hide')
                pageLoading('hide')
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })