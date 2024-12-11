$(document).ready(function() {
    $('.slick-carousel').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button class="custom-prev-btn"><i class="bi-chevron-left"></i></button>',
        nextArrow: '<button class="custom-next-btn"><i class="bi-chevron-right"></i></button>',
        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true
            }
        }]
    });
    $('.slick-carousel-recent').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button class="custom-prev-btn"><i class="bi-chevron-left"></i></button>',
        nextArrow: '<button class="custom-next-btn"><i class="bi-chevron-right"></i></button>',
        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true
            }
        }]
    });
});

$(window).scroll(function(){
    scrollIntoView()
})

function scrollIntoView()
{
      var docViewTop = $(window).scrollTop();
      if (docViewTop > 100){
        $(".featured-card").fadeIn();
      }else{
        $(".featured-card").fadeOut();
      }
 }

$(document).load(function(){
    $('.slick-prev').html('<i class="bi-chevron-left"></i>')
})