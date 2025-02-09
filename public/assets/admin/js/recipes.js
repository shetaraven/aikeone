$(document)
    .on('input', '.search-input', function () {
        let self = $(this)
        globalSearchHelper({ search_elem: self })
    })
    .on('click', '.steps-action-add', function () {
        let existing_steps = $('.steps-container').length
        existing_steps++
        $('.steps-action-del').addClass('g-hidden')

        $('.steps-area').append($('.steps-container').eq(0).clone())
        let last_step = $('.steps-area').find('.steps-container').last()
        last_step.find('.steps-action-del').show()
        last_step.find('textarea').val('')
        last_step.find('.step-num span').text(parseInt(existing_steps));
        last_step.find('.steps-action-del').removeClass('g-hidden')
        last_step.addClass('added-steps');
    })
    .on('click', '.steps-action-del', function () {
        $(this).closest('.steps-container').remove();

        let existing_steps = $('.steps-container').length
        if (existing_steps <= 2) {
            $('.steps-action-del').addClass('g-hidden');
        } else {
            let last_step = $('.steps-area').find('.steps-container').last()
            last_step.find('.steps-action-del').removeClass('g-hidden')
        }

        $('.steps-container').each(function (index, elem) {
            $(elem).find('.step-num span').text(parseInt(index + 1));
        })
    })
    .on('click', '.action-modal-open-ingreds', function () {
        let selected_ingreds = []
        let selected_recipes = []
        $('.ingred-row').each(function () {
            if ($(this).attr('data-type') == 0) {
                selected_ingreds.push({
                    'type': $(this).attr('data-type'),
                    'id': $(this).find('.ingreds-container').attr('data-id'),
                })
            } else {
                selected_recipes.push({
                    'type': $(this).attr('data-type'),
                    'id': $(this).find('.ingreds-container').attr('data-id'),
                })
            }
        })

        $.ajax({
            url: '/admin/recipes/partial-ingreds-list',
            type: 'POST',
            dataType: 'html',
            data: {
                'SELECTED_INGREDS': selected_ingreds,
                'SELECTED_RECIPES': selected_recipes
            },
            success: function (response) {

                $('#modal-ingreds-list').find('.modal-body').find('.contain-ingred_list').html(response)
                $('#modal-ingreds-list').modal('show')
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
    .on('click', '#ingreds-action-select', function () {
        let selected_ingreds = []
        let selected_recipes = []
        $('#modal-ingreds-list').find('.checkbox-ingred').each(function () {
            if ($(this).is(':checked')) {
                if ($(this).attr('data-type') == 0) {
                    selected_ingreds.push({
                        'type': $(this).attr('data-type'),
                        'id': $(this).attr('data-id'),
                    })
                } else {
                    selected_recipes.push({
                        'type': $(this).attr('data-type'),
                        'id': $(this).attr('data-id'),
                    })
                }
            }
        })

        $.ajax({
            url: '/admin/recipes/partial-ingreds-set',
            type: 'POST',
            dataType: 'html',
            data: {
                'SELECTED_INGREDS': selected_ingreds,
                'SELECTED_RECIPES': selected_recipes
            },
            success: function (response) {
                $('.no-ingreds').fadeOut()
                $('.contain-ingreds').find('.placement').fadeIn().append(response)
                $('#modal-ingreds-list').modal('hide')
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })
    .on('click', '.remove-ingred', function () {
        let self = $(this)
        let ringred_id = self.closest('.ingred-row').attr('data-id')
        let ingred_type = self.attr('data-type')

        let url = ingred_type == 0 ? '/admin/api/recipe-ingredients/' : '/admin/api/recipe-sub/'
        if (ringred_id) {
            $.ajax({
                url: url + ringred_id,
                type: 'DELETE',
                dataType: 'html',
                success: function (response) {

                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        self.closest('.ingred-row').remove()

        if ($('.ingred-row').length <= 0) {
            $('.no-ingreds').show()
        }
    })
    .on('change', '#rfi-image', function (e) {
        const file = e.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('.recipe_img_preview').find('img').prop('src', e.target.result)
            };
            reader.readAsDataURL(file);
        }
    })
    .on('click', '.action-save_recipe', function () {
        if (validateForm('form-recipe')) {
            let formdata = new FormData()

            let recipe_id = $('.form-recipe').find('.rfi-id').val()

            formdata.append('ID', recipe_id)
            formdata.append('TITLE', $('.form-recipe').find('.rfi-title').val())
            formdata.append('DETAILS', $('.form-recipe').find('.rfi-details').val())
            formdata.append('VISIBILITY', $('.form-recipe').find('.rfi-type').val())
            formdata.append('TIME', $('.form-recipe').find('.rfi-time').val())
            formdata.append('SERVINGS', $('.form-recipe').find('.rfi-servings').val())

            let recipe_image = $('.form-recipe').find('#rfi-image')[0].files[0];
            if (recipe_image) {
                formdata.append('IMAGE', recipe_image)
            }

            $('.form-recipe').find('.rfi-category').each(function (i, e) {
                if ($(this).is(':checked')) {
                    formdata.append('CATEGORIES[]', $(this).val())
                }
            })

            $('.form-recipe').find('.steps-container').each(function (i, e) {
                let value = $(this).find('textarea').val()
                if (value) {
                    formdata.append('INSTRUCTIONS[]', JSON.stringify({
                        'ID': $(this).attr('data-id'),
                        'ORDER': i + 1,
                        'INSTRUCTION': $(this).find('textarea').val()
                    }))
                }
            })

            $('.form-recipe').find('.ingred-row').each(function (i, e) {
                let value = $(this).find('.ic-vol').val()
                if (value) {
                    formdata.append('INGREDIENTS[]', JSON.stringify({
                        'ID': $(this).attr('data-id'),
                        'TYPE': $(this).attr('data-type'),
                        'INGRED_ID': $(this).find('.ingreds-container').attr('data-id'),
                        'VOLUME': value,
                        'UNIT_MEASURE_ID': $(this).find('.ic-unit_measure').attr('data-id'),
                    }))
                }
            })


            $.ajax({
                url: '/admin/api/' + (recipe_id ? 'recipes/' + recipe_id : 'recipes'),
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (!recipe_id) {
                        clearForms('form-recipe')
                    }
                    showSuccess();
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    showError('Store Name Already Existing!');
                }
            });
        } else {
            showError('Fill Up all the required Fields!');
        }
    })
    .on('click', '.rta-delete', function () {
        let self = $(this)
        let recipe_id = self.attr('data-id')

        $.ajax({
            url: '/admin/api/recipes/' + recipe_id,
            type: 'DELETE',
            success: function (response) {
                globalSearchHelper({ search_elem: $('.search-input') })
                pageLoading('hide')
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    })

function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchIngreds');
    filter = input.value.toUpperCase();
    ul = document.getElementById("ingreds-list");
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