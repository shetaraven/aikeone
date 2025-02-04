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

$(document)
    .on('click', '#recipe-list label', function () {
        if ($($(this).find('.form-check-input').is(':checked'))) {
            $('#recipe-list .form-check-input').prop('checked', false);
            $(this).find('.form-check-input').prop('checked', true);
        }
    })
    .on('click', '.btn-change_featured', function () {
        let self = $(this)
        let order = self.attr('data-order')

        $.ajax({
            url: '/admin/dashboard/partial-not-featured',
            type: 'GET',
            dataType: 'html',
            data: {

            },
            success: function (response) {
                $('#ChooseRecipe').find('.modal-body').html(response)
                $('#ChooseRecipe').modal('show')
                $('.btn-update_featured').attr('data-order', order)
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.btn-update_featured', function () {
        let self = $(this)
        let order = self.attr('data-order')
        let new_rid = $('.to_feature').find('input:checked').val()

        $.ajax({
            url: '/admin/api/dashboard',
            type: 'POST',
            dataType: 'json',
            data: {
                ORDER: order,
                RECIPE_ID: new_rid
            },
            success: function (response) {
                $('#ChooseRecipe').modal('hide')
                refreshFeaturedList()
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.btn-set_exchange_rate', function () {
        let self = $(this)
        let new_rate = $('.inp-exchange_rate').val()
        console.log(new_rate)
        $.ajax({
            url: '/admin/api/system/rate/update',
            type: 'POST',
            dataType: 'json',
            data: {
                RATE: new_rate
            },
            success: function (response) {
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })

function refreshFeaturedList() {
    $.ajax({
        url: '/admin/dashboard/partial-featured-list',
        type: 'GET',
        dataType: 'html',
        data: {
            
        },
        success: function (response) {
            $('.contain-featured_list').find('.card-body ul').html(response)
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
        }
    });
}