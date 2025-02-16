$(document)
    .ready(function () {
        $('.rand_category-tab.active').click()
    })
    .on('click', '.action-go_back', function (e) {
        e.preventDefault();
        window.history.back();
    })
    .on('click', '.modal_open', function (e) {
        e.preventDefault();
        $('body').css('overflow', 'hidden');
        resizeModal($(this).attr('data-target'));

        let self = $(this)
        let type_id = self.attr('data-type');
        let rid = self.attr('data-rid')
        let url = ''

        switch (parseInt(type_id)) {
            case 0:
                url = '/recipes/partials-ingreds-calc/' + rid
                break
            case 1:
                url = '/recipes/partials-nutri-vals/' + rid
                break
            case 2:
                url = '/recipes/partials-serving-calc/' + rid
                break
        }

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {},
            success: function (response) {
                let modal_id = self.attr('data-target');
                $('#' + modal_id).find('.append_area').html(response.data.html_content)
                $('#' + modal_id).find('.popup').addClass('show')
                $('#convert_php').prop('checked', false)

                if (type_id == 1) {
                    $('#nutriServings').html($('#servings-count').text());
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error)
            }
        });
    })
    .on('click', '.popup__close', function (e) {
        e.preventDefault();
        $('body').css('overflow', 'auto');

        let self = $(this)
        self.closest('.popup').removeClass('show');
    })
    .on('click', '.bookmark-btn', function () {
        let self = $(this)
        let rid = self.attr('data-rid')
        let is_fave = parseInt(self.attr('data-fav'))

        $.ajax({
            url: '/api/' + (is_fave ? 'user-fav/' + rid : 'user-fav'),
            type: (is_fave ? 'DELETE' : 'POST'),
            dataType: 'json',
            data: {
                'RECIPE_ID': rid
            },
            success: function (response) {
                console.log(is_fave)
                // switch icon
                if (is_fave) {
                    console.log(0)
                    self.removeClass('bi-bookmark-heart-fill')
                    self.addClass('bi-bookmark-heart')
                    self.attr('data-fav', 0)
                } else {
                    console.log(1)
                    self.removeClass('bi-bookmark-heart')
                    self.addClass('bi-bookmark-heart-fill')
                    self.attr('data-fav', 1)
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })

$('#calculate-serv').click(function (e) {
    e.preventDefault();
    var Servings = parseInt($('#servings-count').text());
    var CalServings = parseInt($(this).parent().find('input').val());
    console.log('Serving: ' + Servings)
    $('#serving-modal .curr_volume').each(function () {
        console.log(parseInt($(this).text()))
        var inServ = (parseInt($(this).text()) / Servings);
        var CurUnit = $(this).parent().find('.curr_unit').text();

        $(this).closest('tr').find('.curr_cal_val').text((inServ * CalServings).toFixed(2) + ' ' + CurUnit);
        $('.no_servings').text(CalServings);
    })
})

function resizeModal(elem) {
    var body = $('#' + elem).find('.popup-inner').outerHeight();
    var head = $('#' + elem).find('.popup__photo').outerHeight();
    $('#' + elem).find('.popup__text').css('height', (body - head))
}

$('#convert_php').change(function () {
    if ($(this).is(':checked')) {
        $('.sek_price').hide();
        $('.php_price').fadeIn();
    } else {
        $('.php_price').hide();
        $('.sek_price').fadeIn();
    }
})