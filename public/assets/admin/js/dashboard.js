function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchRecipe');
    filter = input.value.toUpperCase();
    ul = document.getElementById("recipe-list");
    li = ul.getElementsByTagName('label');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("span")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

$(document).
on('click', '#recipe-list label', function() {
    if ($($(this).find('.form-check-input').is(':checked'))) {
        $('#recipe-list .form-check-input').prop('checked', false);
        $(this).find('.form-check-input').prop('checked', true);
    }
})