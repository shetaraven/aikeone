/**
 * Main
 */

'use strict';

let menu, animate;

(function () {
    // Initialize menu
    //-----------------

    let layoutMenuEl = document.querySelectorAll('#layout-menu');
    layoutMenuEl.forEach(function (element) {
        menu = new Menu(element, {
            orientation: 'vertical',
            closeChildren: false
        });
        // Change parameter to true if you want scroll animation
        window.Helpers.scrollToActive((animate = false));
        window.Helpers.mainMenu = menu;
    });

    // Initialize menu togglers and bind click on each
    let menuToggler = document.querySelectorAll('.layout-menu-toggle');
    menuToggler.forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            window.Helpers.toggleCollapsed();
        });
    });

    // Display menu toggle (layout-menu-toggle) on hover with delay
    let delay = function (elem, callback) {
        let timeout = null;
        elem.onmouseenter = function () {
            // Set timeout to be a timer which will invoke callback after 300ms (not for small screen)
            if (!Helpers.isSmallScreen()) {
                timeout = setTimeout(callback, 300);
            } else {
                timeout = setTimeout(callback, 0);
            }
        };

        elem.onmouseleave = function () {
            // Clear any timers set to timeout
            document.querySelector('.layout-menu-toggle').classList.remove('d-block');
            clearTimeout(timeout);
        };
    };
    if (document.getElementById('layout-menu')) {
        delay(document.getElementById('layout-menu'), function () {
            // not for small screen
            if (!Helpers.isSmallScreen()) {
                document.querySelector('.layout-menu-toggle').classList.add('d-block');
            }
        });
    }

    // Display in main menu when menu scrolls
    let menuInnerContainer = document.getElementsByClassName('menu-inner'),
        menuInnerShadow = document.getElementsByClassName('menu-inner-shadow')[0];
    if (menuInnerContainer.length > 0 && menuInnerShadow) {
        menuInnerContainer[0].addEventListener('ps-scroll-y', function () {
            if (this.querySelector('.ps__thumb-y').offsetTop) {
                menuInnerShadow.style.display = 'block';
            } else {
                menuInnerShadow.style.display = 'none';
            }
        });
    }

    // Init helpers & misc
    // --------------------

    // Init BS Tooltip
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Accordion active class
    const accordionActiveFunction = function (e) {
        if (e.type == 'show.bs.collapse' || e.type == 'show.bs.collapse') {
            e.target.closest('.accordion-item').classList.add('active');
        } else {
            e.target.closest('.accordion-item').classList.remove('active');
        }
    };

    const accordionTriggerList = [].slice.call(document.querySelectorAll('.accordion'));
    const accordionList = accordionTriggerList.map(function (accordionTriggerEl) {
        accordionTriggerEl.addEventListener('show.bs.collapse', accordionActiveFunction);
        accordionTriggerEl.addEventListener('hide.bs.collapse', accordionActiveFunction);
    });

    // Auto update layout based on screen size
    window.Helpers.setAutoUpdate(true);

    // Toggle Password Visibility
    window.Helpers.initPasswordToggle();

    // Speech To Text
    window.Helpers.initSpeechToText();

    // Manage menu expanded/collapsed with templateCustomizer & local storage
    //------------------------------------------------------------------

    // If current layout is horizontal OR current window screen is small (overlay menu) than return from here
    if (window.Helpers.isSmallScreen()) {
        return;
    }

    // If current layout is vertical and current window screen is > small

    // Auto update menu collapsed/expanded based on the themeConfig
    window.Helpers.setCollapsed(true, false);
})();

$(document).on('click', '.unit-selector a.dropdown-item', function () {
    $(this).closest('.input-group').find('.selected-unit').text($(this).text());
})

function clearForms(formClass) {
    $('.' + formClass).find('.form-control').val('');
    if (formClass == 'form-recipe') {
        $('.rfi-type').val(1);
        $('.recipe_img_preview img').attr('src', '/assets/admin/img/default-img.jpg')
        $('.added-steps').remove();
        $('.remove-ingred').click();
        $('.checkbox').find('.form-check-input').prop('checked', false);
    }
}

function validateForm(formClass) {
    $('.load-backdrop').show();
    $('body').css('overflow', 'hidden');
    var proceed = [];
    $('.' + formClass).find('.required .form-control').each(function () {
        if ($(this).val() == '') {
            $(this).closest('.required').addClass('error');
            proceed.push(false);
        } else {
            proceed.push(true);
        }
    })
    $('.' + formClass).find('.required.checkbox').each(function () {
        if ($(this).find('.form-check-input').is(':checked')) {
            proceed.push(true);
        } else {
            $(this).addClass('error');
            proceed.push(false);
        }
    })

    return (proceed.includes(false)) ? false : true;
}

function showError(text) {
    $('.load-backdrop').fadeOut();
    $('body').css('overflow', 'auto');
    $('#warningTop span').text(text);
    $('#warningTop').fadeIn();
    setTimeout(function () {
        $(window).scrollTop(0);
        setTimeout(function () {
            $('#warningTop').fadeOut();
        }, 5000)
    }, 100)
}

function showSuccess() {
    $('.load-backdrop').fadeOut();
    $('body').css('overflow', 'auto');
    $('#success-alert').addClass('show');
    setTimeout(function () {
        setTimeout(function () {
            $('#success-alert').removeClass('show');
        }, 2000)
    }, 1000)
}

function pageLoading(action) {
    if(action == 'show') {
        $('.load-backdrop').show();
    } else {
        $('.load-backdrop').hide();
    }
}

function globalSearchHelper({ search_elem }) {
    let ongoingAjaxReq;
    let requestDebounce;
    
    let queryString = window.location.search;
    let urlParams = new URLSearchParams(queryString);
    let current_page = urlParams.get('page_admin');

    let refreshLink = search_elem.attr('data-url')
    let search_val = search_elem.val()
    let page = current_page ? current_page : 1

    refreshLink = refreshLink + '?page_admin=' + page + '&search=' + search_val
    history.replaceState(null, '', refreshLink);

    clearTimeout(requestDebounce)

    requestDebounce = setTimeout(() => {
        if (ongoingAjaxReq) {
            ongoingAjaxReq.abort()
        }

        ongoingAjaxReq = $.ajax({
            url: refreshLink,
            type: 'POST',
            dataType: 'html',
            data: {
                search: search_val
            },
            success: function (response) {
                response = JSON.parse(response)
                $('.gsh-data_table').find('tbody').html(response.table_data)
                $('.gsh-data_pager').html(response.pager)
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }, 500);
}

$(document)
    .on('change', '.required .form-control', function () {
        if ($(this).val() != '') {
            $(this).closest('.required').removeClass('error');
        }
    })
    .on('click', '.checkbox .form-check', function () {
        console.log($(this).find('.form-check-input').is(':checked'))
        if ($(this).find('.form-check-input').is(':checked')) {
            $(this).closest('.required').removeClass('error');
        }
    })