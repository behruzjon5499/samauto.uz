$( function() {
	$('.top-banner__slider').slick({
        arrows: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
    //     autoplay: true,
  		// autoplaySpeed: 4000,
        prevArrow: '<button type="button" class="single__arrow single__arrow--left"><span class="single__icon"><img src="images/img35.png" alt="" class="" /></span></button>',
        nextArrow: '<button type="button" class="single__arrow single__arrow--right"><span class="single__icon"><img src="images/img34.png" alt="" class="" /></span></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    arrows: false,
                }
            },
        ]
    });
    $('.custom__slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<button class="slider__button slider__button-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button class="slider__button slider__button-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            },
        ],
    });
    $('.custom__slider-3').slick({
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button class="slider__button custom-button3--left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button class="slider__button custom-button3--right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 524,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
    });
    $('.custom__slider-3video').slick({
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button class="slider__button custom-button3v--left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button class="slider__button custom-button3v--right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 524,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
    });
    $('.custom__slider-3insta').slick({
        arrows: true,
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<button class="slider__button custom-button3i--left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow: '<button class="slider__button custom-button3i--right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 524,
                settings: {
                    slidesToShow: 1
                }
            }
        ],
    });

    var mobile__button = false;
    $('.nav-mobile__button').click(function(e) {
    	e.preventDefault();
        if(mobile__button)
        {
            $('.main-nav__menu').animate({"margin-left": '-=250'},{ duration: 200}, 200).delay(500);
            mobile__button = false;
        }
        else
        {
            $('.main-nav__menu').animate({"margin-left": '+=250'},{ duration: 200}, 200).delay(500);
            mobile__button = true;
        }
    });

    $('.alphabet__link').on('click', function(e) {
        e.preventDefault();
        var word = $(this).data('type');
        // $('.masonry__item').hide('fast');
        // $('.masonry__item[data-type="'+word+'"]').show('fast');
        $('.masonry__item').each(function(index, item) {
            if($(this).data('type') == word){
                $(this).show();
            } else{
                $(this).hide();
            }
        });
    });
    if($('select').is($('.custom__select'))){
        $('.custom__select').select2({
            minimumResultsForSearch: -1
        });
    }
    $('.product__content--anchor').click(function () { 
        var element = $($(this).attr("href"));

        if (!element.length) return false;

        var destination = element.offset().top;

        $('html, body').animate( { scrollTop: destination }, 400 );
            return false;
    });
    function tabToggle (subject, object){
        $('.'+subject).on('click', function(e) {
            e.preventDefault();
            var selector = $(this).attr('href');
            var $tab = $(selector);
            $('.'+subject).removeClass(subject+'--active');
            $(this).addClass(subject+'--active');
            if(selector){
                $('.'+object).removeClass(object+'--active');
                $tab.addClass(object+'--active');
                $('.'+object).hide();
                $($tab).fadeIn(600);
            }
        });
    };
    tabToggle('product-content__link--js', 'product-toggle__item');
    tabToggle('payment-nav__link', 'payment__content');
    tabToggle('personaliation-nav__link', 'personaliation__content');
    
    var switchActive = false;
    $('.custom__switcher').on('click', function() {
        if(switchActive){
            $(this).removeClass('custom__switcher--active');
            $('.modal__content--signup').removeClass('modal__content--active');
            $('.modal__content--signin').addClass('modal__content--active');
            $('.modal__content--signup').hide();
            $('.modal__content--signin').fadeIn(600);
            switchActive = false;
        } else{
            $(this).addClass('custom__switcher--active');
            $('.modal__content--signin').removeClass('modal__content--active');
            $('.modal__content--signup').addClass('modal__content--active');
            $('.modal__content--signin').hide();
            $('.modal__content--signup').fadeIn(600);
            switchActive = true;
        }
    });
    $('.adres-add__box').hide();
    $('.buttom-add__adress--js').on('click', function(e) {
        e.preventDefault();
        // $('.adres-add__box').toggleClass('adres-add__box--active');
        $('.adres-add__box').fadeToggle(600);
    });
});