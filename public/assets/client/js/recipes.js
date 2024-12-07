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
        let self = $(this)
        let rid = self.attr('data-id')

        $.ajax({
            url: '/recipes/toggle-recipe-fav',
            type: 'POST',
            dataType: 'json',
            data: {
                recipe_id: rid
            },
            success: function (response) {
                
            },
            error: function (xhr, status, error) {
                // session error
                // window.location.replace(JSON.parse(xhr.responseJSON.message).path)
            }
        });
    })