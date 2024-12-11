$(document)
    .on('click', '.action-go_back', function (e) {
        e.preventDefault();
        window.history.back();
    })
    .on('click', '.modal_open', function (e) {
        e.preventDefault();

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
            },
            error: function (xhr, status, error) {
                console.error('Error:', error)
            }
        });
    })
    .on('click', '.popup__close', function (e) {
        e.preventDefault();

        let self = $(this)
        self.closest('.popup').removeClass('show');
    })
    .on('click', '.bookmark-btn', function () {
        let self    = $(this)
        let rid     = self.attr('data-rid')
        let is_fave = parseInt(self.attr('data-fav'))

        $.ajax({
            url: '/api/' + ( is_fave ? 'user-fav/' + rid : 'user-fav' ),
            type: ( is_fave ? 'DELETE' : 'POST' ),
            dataType: 'json',
            data: {
                'RECIPE_ID': rid
            },
            success: function (response) {
                console.log(is_fave)
                // switch icon
                if( is_fave ) {
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