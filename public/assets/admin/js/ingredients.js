$(document)
    .ready(function () {

    })
    .on('click', '.dropdown-item', function () {
        console.log("Asdasd")
        $('.unit-selector').attr('data-selected', $(this).attr('data-id'))

        var measure = $(this).text();
        $('.shop-prices').find('.selected-unit').text(measure);
    })
    .on('click', '.ci_action-create', function () {
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
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.ita-edit', function () {
        let self = $(this)
        let ingrid_id = self.attr('data-id')
        $.ajax({
            url: '/admin/ingredients/partial-edit-form',
            type: 'POST',
            dataType: 'html',
            data: {
                INGRID_ID: ingrid_id
            },
            success: function (response) {
                $('#edit_modal-ingrid').find('.modal-body').html(response)
                $('#edit_modal-ingrid').find('.ema-save').attr('data-id', ingrid_id)
                $('#edit_modal-ingrid').modal('show')
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

        $.ajax({
            url: '/admin/api/ingredients/' + store_id,
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
    .on('click', '.ema-save', function () {
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
        let ingrid_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/ingredients/' + ingrid_id,
            type: 'PUT',
            dataType: 'json',
            data: {
                ID: ingrid_id,
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
                $('#store_edit_modal').modal('hide')
                location.reload()
            },
            error: function (xhr, status, error) {
                // console.log(xhr.responseJSON.messages)
                console.error('Error:', error);
            }
        });
    })