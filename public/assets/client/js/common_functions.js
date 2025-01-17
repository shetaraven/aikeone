$(document)
    .on('click', '.rand_category-tab', function () {
        $('.rand_category-tab').removeClass('active')

        let self = $(this)
        self.addClass('active')

        getCategoryRecipes(self.attr('data-id'))
    })

function getCategoryRecipes(category_id) {
    $.ajax({
        url: '/home/partials-category-recipes',
        type: 'POST',
        dataType: 'html',
        data: {
            'CATEGORY_ID': category_id
        },
        success: function (response) {
            $('.rand_category-recipes').find('.tab-pane.active').html(response)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
}