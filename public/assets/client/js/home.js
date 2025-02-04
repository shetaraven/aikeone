$(document)
    .ready(function () {
        $('.rand_category-tab.active').click()
    })
    .on('click', '.action-search', function (e) {
        e.preventDefault()
        let search = $('.inp-search_recipe').val()
        if (search) {
            window.location.replace('recipes?search=' + search)
        }
    })