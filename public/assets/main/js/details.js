$(document).ready(function() {
    $('.modal_open').click(function(e) {
        e.preventDefault();
        var modID = $(this).attr('data-target');
        $('#' + modID).find('.popup').addClass('show');
    })
    $('.popup__close').click(function(e) {
        e.preventDefault();
        $(this).closest('.popup').removeClass('show');
    })
})