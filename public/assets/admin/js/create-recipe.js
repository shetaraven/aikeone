function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('searchIngrids');
    filter = input.value.toUpperCase();
    ul = document.getElementById("ingrids-list");
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

var StepCount = 2;
$('#addSteps').click(function() {
    $('.steps-container').find('button').css('visibility', 'hidden');
    $('.steps-area').append($('.steps-container').eq(0).clone());
    $('.steps-area').find('.steps-container').eq(StepCount).find('button').css('visibility', 'visible');
    $('.steps-area').find('.steps-container').eq(StepCount).find('.step-num span').text(parseInt(StepCount + 1));
    StepCount++;
})

var allIngrids = [{
        id: 0,
        type: 1, // 1 = ingrids only, 2 = recipe 
        url: '',
        title: 'Soufflé pastry pie ice',
        unit: 'mg'
    },
    {
        id: 1,
        type: 2, // 1 = ingrids only, 2 = recipe 
        url: 'http://localhost:8888/admin/recipes/create-form',
        title: 'Bear claw cake biscuit',
        unit: ''
    },
    {
        id: 2,
        type: 1, // 1 = ingrids only, 2 = recipe 
        url: '',
        title: 'Tart tiramisu cake',
        unit: 'g'
    },
    {
        id: 3,
        type: 1, // 1 = ingrids only, 2 = recipe 
        url: '',
        title: 'Bonbon toffee muffin',
        unit: 'ml'
    },
    {
        id: 4,
        type: 1, // 1 = ingrids only, 2 = recipe 
        url: '',
        title: 'Dragée tootsie roll',
        unit: 'kg'
    }

];
var selectedIngrids = [];
var removedIngrids = [];

$('#openIngridsModal').click(function() {
    var ingridsListTemp = '';
    for (let index = 0; index < allIngrids.length; index++) {
        ingridsListTemp += '<label class="list-group-item"><input class="form-check-input me-3" type="checkbox" value="' + allIngrids[index].id + '" data-type="' + allIngrids[index].type + '"><span>' + allIngrids[index].title + '</span></label>';
    }
    $('#ingrids-list').html(ingridsListTemp);

    setTimeout(function() {
        for (let index = 0; index < selectedIngrids.length; index++) {
            const element = selectedIngrids[index];
            $('.form-check-input[value="' + element + '"').prop('checked', true);
        }
    }, 100)
})

$('#generateIngrids').click(function() {
    if (removedIngrids.length > 0) {
        for (let index = 0; index < removedIngrids.length; index++) {
            const element = removedIngrids[index];
            $('.with-ingrids .placement').find('#ingrids-input-' + element).closest('.row').remove();
        }
    }
    var finTemp = '';
    if (selectedIngrids.length > 0) {
        for (let index = 0; index < selectedIngrids.length; index++) {
            const element = selectedIngrids[index];
            if (!$('.with-ingrids .placement').find('#ingrids-input-' + element).length > 0) {
                if (allIngrids[element].type == 1) {
                    finTemp += '<div class="row ingrids-temp ingrids-only mb-3"><div class="col-12"><label class="form-label">' + allIngrids[element].title + '</label><div class="input-group input-group-merge"><input type="text" class="form-control" id="ingrids-input-' + allIngrids[element].id + '"><span class="input-group-text">' + allIngrids[element].unit + '</span><button class="btn btn-outline-danger remove-ingrids" data-id="' + allIngrids[element].id + '" type="button">X</button></div></div></div>';
                } else {
                    finTemp += '<div class="row ingrids-temp ingrids-recipe mb-3"><div class="col-12"><label class="form-label" for="' + allIngrids[element].id + '">' + allIngrids[element].title + '<span style="margin-left:10px"><a href="' + allIngrids[element].url + '" target="_blank">' + allIngrids[element].url + '</a></span></label><div class="input-group"><input type="text" class="form-control" placeholder="" id="ingrids-input-' + allIngrids[element].id + '"><span class="input-group-text selected-unit">g</span><button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button><ul class="dropdown-menu dropdown-menu-end unit-selector"><li><a class="dropdown-item" href="javascript:void(0);">g</a></li><li><a class="dropdown-item" href="javascript:void(0);">mg</a></li><li><a class="dropdown-item" href="javascript:void(0);">Kg</a></li><li><a class="dropdown-item" href="javascript:void(0);">ml</a></li><li><a class="dropdown-item" href="javascript:void(0);">L</a></li><li><a class="dropdown-item" href="javascript:void(0);">Whole</a></li><li><a class="dropdown-item" href="javascript:void(0);">Half</a></li><li><a class="dropdown-item" href="javascript:void(0);">pc/pcs</a></li><li><a class="dropdown-item" href="javascript:void(0);">tbsp</a></li><li><a class="dropdown-item" href="javascript:void(0);">tsp</a></li><li><a class="dropdown-item" href="javascript:void(0);">ounce</a></li><li><a class="dropdown-item" href="javascript:void(0);">pound</a></li><li><a class="dropdown-item" href="javascript:void(0);">cup</a></li></ul><button class="btn btn-outline-danger remove-ingrids" data-id="' + allIngrids[element].id + '" type="button">X</button></div></div></div>'
                }
            }
        }

        $('.with-ingrids .placement').append(finTemp);
        $('.ingrids-temp').fadeIn();
        $('.no-ingrids').hide();
    } else {
        $('.no-ingrids').show();
    }
    $('.btn-close:visible').click();
})

function removeValArr(val, array) {
    const index = array.indexOf(val);
    array.splice(index, 1);
}

$(document)
    .on('click', '.delSteps', function() {
        $(this).closest('.steps-container').remove();
        StepCount--;
        if (StepCount != 2) {
            $('.steps-area').find('.steps-container').eq(parseInt(StepCount - 1)).find('button').css('visibility', 'visible');
        }
    })
    .on('click', '.remove-ingrids', function() {
        $(this).closest('.row').remove();
        removeValArr($(this).attr('data-id'), selectedIngrids);
        if (selectedIngrids.length <= 0) {
            $('.no-ingrids').show();
        }
    })
    .on('click', '#ingrids-list .form-check-input', function() {
        if ($(this).is(':checked')) {
            selectedIngrids.push($(this).val());
            removeValArr($(this).val(), removedIngrids);
        } else {
            removedIngrids.push($(this).val());
            removeValArr($(this).val(), selectedIngrids);
        }
    })