$(document).ready(function() {
    $('.dropdown-item').click(function() {
        var measure = $(this).text();
        $('.shop-prices').find('.selected-unit').text(measure);
    })
})