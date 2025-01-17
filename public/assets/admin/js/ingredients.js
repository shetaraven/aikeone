$(document)
    .ready(function () {

    })
    .on('input', '.search-input', function () {
        let self = $(this)
        globalSearchHelper({ search_elem: self })
    })
    .on('click', '.dropdown-item', function () {
        console.log("Asdasd")
        $('.unit-selector').attr('data-selected', $(this).attr('data-id'))

        var measure = $(this).text();
        $('.shop-prices').find('.selected-unit').text(measure);
    })
    .on('click', '.ci_action-create', function () {
        if (validateForm('form-create_ingredient')) {
            let ingred_name = $('.form-create_ingredient').find('.cii-name').val()
            let ingred_vol = $('.form-create_ingredient').find('.cii-vol').val()
            let ingred_unit_measure = $('.form-create_ingredient').find('.unit-selector').attr('data-selected')
            let ingred_weight = $('.form-create_ingredient').find('.cii-weight').val()
            let ingred_cal = $('.form-create_ingredient').find('.cii-cal').val()
            let ingred_fat = $('.form-create_ingredient').find('.cii-fat').val()
            let ingred_sugar = $('.form-create_ingredient').find('.cii-sugar').val()
            let ingred_protein = $('.form-create_ingredient').find('.cii-protein').val()
            let ingred_carbs = $('.form-create_ingredient').find('.cii-carbs').val()
            let ingred_comment = $('.form-create_ingredient').find('.cii-comment').val()

            let store_prices = []
            $('.store_row').each(function () {
                if ($(this).find('.sr-price').val()) {
                    store_prices.push({
                        'store_id': $(this).attr('data-id'),
                        'price': $(this).find('.sr-price').val(),
                    })
                }
            })

            $.ajax({
                url: '/admin/api/ingredients',
                type: 'POST',
                data: {
                    NAME: ingred_name,
                    VOLUME: ingred_vol,
                    UNIT_MEASURE_ID: ingred_unit_measure,
                    WEIGHT: ingred_weight,
                    CALORIES: ingred_cal,
                    FAT: ingred_fat,
                    SUGAR: ingred_sugar,
                    PROTEIN: ingred_protein,
                    CARBS: ingred_carbs,
                    COMMENT: ingred_comment,
                    STORE_PRICES: store_prices
                },
                success: function (response) {
                    console.log('Success:', response);
                    clearForms('form-create_ingredient')
                    showSuccess();
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseJSON.messages)
                    console.error('Error:', error);
                    showError('Store Name Already Existing!');
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })
    .on('click', '.ita-edit', function () {
        let self = $(this)
        let ingred_id = self.attr('data-id')
        $.ajax({
            url: '/admin/ingredients/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                INGRED_ID: ingred_id
            },
            success: function (response) {
                $('#edit_modal-ingred').find('.modal-body').html(response)
                $('#edit_modal-ingred').find('.ema-save').attr('data-id', ingred_id)
                $('#edit_modal-ingred').modal('show')
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.ita-delete', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $('#del_modal-ingred').find('.ita-delete-proceed').attr('data-id', store_id);
        $('#del_modal-ingred').modal('show')

    })
    .on('click', '.ita-delete-proceed', function () {
        let self = $(this)
        store_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/ingredients/' + store_id,
            type: 'DELETE',
            success: function (response) {
                globalSearchHelper({search_elem: $('.search-input')})
                $('#del_modal-ingred').modal('hide')
                pageLoading('hide')
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.ema-save', function () {
        if (validateForm('form-create_ingredient')) {
            let ingred_name = $('.form-create_ingredient').find('.eii-name').val()
            let ingred_vol = $('.form-create_ingredient').find('.cii-vol').val()
            let ingred_unit_measure = $('.form-create_ingredient').find('.unit-selector').attr('data-selected')
            let ingred_weight = $('.form-create_ingredient').find('.eii-weight').val()
            let ingred_cal = $('.form-create_ingredient').find('.eii-cal').val()
            let ingred_fat = $('.form-create_ingredient').find('.eii-fat').val()
            let ingred_sugar = $('.form-create_ingredient').find('.eii-sugar').val()
            let ingred_protein = $('.form-create_ingredient').find('.eii-protein').val()
            let ingred_carbs = $('.form-create_ingredient').find('.eii-carbs').val()
            let ingred_comment = $('.form-create_ingredient').find('.eii-comment').val()

            let store_prices = []
            $('.store_row').each(function () {
                if ($(this).find('.sr-price').val()) {
                    store_prices.push({
                        'id': $(this).attr('data-key'),
                        'store_id': $(this).attr('data-id'),
                        'price': $(this).find('.sr-price').val(),
                    })
                }
            })

            let self = $(this)
            let ingred_id = self.attr('data-id')

            $.ajax({
                url: '/admin/api/ingredients/' + ingred_id,
                type: 'PUT',
                dataType: 'json',
                data: {
                    ID: ingred_id,
                    NAME: ingred_name,
                    VOLUME: ingred_vol,
                    UNIT_MEASURE_ID: ingred_unit_measure,
                    WEIGHT: ingred_weight,
                    CALORIES: ingred_cal,
                    FAT: ingred_fat,
                    SUGAR: ingred_sugar,
                    PROTEIN: ingred_protein,
                    CARBS: ingred_carbs,
                    COMMENT: ingred_comment,
                    STORE_PRICES: store_prices,
                },
                success: function (response) {
                    globalSearchHelper({search_elem: $('.search-input')})
                    pageLoading('hide');

                    $('#edit_modal-ingred').modal('hide')
                },
                error: function (xhr, status, error) {
                    // console.log(xhr.responseJSON.messages)
                    console.error('Error:', error);
                    showError('Store Name Already Existing!');
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })