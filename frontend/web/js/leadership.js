// parent item click

var current_id = 0;

/*$('.levelOne .item').on('click', function(){

	if($(this).hasClass('main')) return false;

    current_id = $(this).data('id');

	$(this).addClass('main');
	var _index = $(this).index();

	$('.levelOne .item').each(function(){
		var _this = $(this);
		if($(this).hasClass('main')) {
			if(_index == 2) {
				$(this).css({
					'transform': 'translateX(-200%)',
					'transition-delay': '.5s',
					'transition-timing-function': 'linear',
				});
				setTimeout(function(){
					$(_this).css({'transition': '0s', 'transform': 'translateX(0%)'})
				}, 900);
			}
			else if(_index == 1) {
				$(this).css({
					'transform': 'translateX(-100%)',
					'transition-delay': '.5s',
					'transition-timing-function': 'linear',
				});
				setTimeout(function(){
					$(_this).css({'transition': '0s', 'transform': 'translateX(0%)'})
				}, 900);
			}
		}
		else {
			$(this).css({
				'transform': 'scale(.5)',
				'opacity': '0'
			});
			setTimeout(function(){
				_this.hide();
			}, 900);
		}
	});


	$(function () {

        if(current_id>0 ) {
            $.get("/get-workers?id=" + current_id, function (data) {
                $(".levelOne .workers").html(data);
            });
        }

        setTimeout(function(){
			$('.sliderTeam').css({'opacity': '1', 'transition-delay': '.3s' });
			$('.sliderTeam').slick({
				infinite: false,
			    slidesToShow: 3,
			    slidesToScroll: 1,
			    arrows: true,
			    draggable: true,
			    prevArrow: '<div class="prev"><img src="assets/images/prev-arrow.png" alt="" /></div>',
			    nextArrow: '<div class="next"><img src="assets/images/next-arrow.png" alt="" /></div>',
			    dots: false,
			    touchThreshold: 20,
			    responsive: [
			    	{
			    		breakpoint: 1300,
			    		settings: {
			    			slidesToShow: 2
			    		}
			    	}
			    ]
			});
			$('.sliderTeam .item .wrap').css({'transform': 'translateY(0)', 'opacity': '1'});

			var names = 0;
			var days = 0;
			var contacts = 0;

			$(".small_item .names").each(function () {
				var h_block = parseInt($(this).height());
				if(h_block > names) {
				  names = h_block;
				};
			});
			$(".small_item .names").height(names);

			$(".small_item .days").each(function () {
				var h_block = parseInt($(this).height());
				if(h_block > days) {
				  days = h_block;
				};
			});
			$(".small_item .days").height(days);

			$(".small_item .contacts").each(function () {
				var h_block = parseInt($(this).height());
				if(h_block > contacts) {
				  contacts = h_block;
				};
			});
			$(".small_item .contacts").height(contacts);

        }, 900)
    });

	var text = $('.site_bread span').text().split(" ").shift();
	var spanText = $(this).find('.name').text().split(" ").shift();
   	$('.site_bread .centerBox span').before('<a href="" id="levelOne" data-id="'+current_id+'">'+text+'</a>');
    $('.site_bread span').text(spanText);

});*/


// have a child items click

$(document).on('click', '.have_a_child', function(){

    current_id = $(this).data('id');

	$('.levelOne').fadeOut(100);

	setTimeout(function(){
		$('.levelOne').remove();
		$(function () {

           if(current_id>0) {

               $.get("/get-workers?id=" + current_id + '&child=1', function (data) {
                   $(".leadership_page").html(data);
               });
           }

	    });
	}, 400)

	setTimeout(function(){
		$('.sliderTeam').slick({
			infinite: false,
		    slidesToShow: 3,
		    slidesToScroll: 1,
		    arrows: true,
		    draggable: true,
		    prevArrow: '<div class="prev"><img src="assets/images/prev-arrow.png" alt="" /></div>',
		    nextArrow: '<div class="next"><img src="assets/images/next-arrow.png" alt="" /></div>',
		    dots: false,
		    touchThreshold: 20,
		    responsive: [
		    	{
		    		breakpoint: 1300,
		    		settings: {
		    			slidesToShow: 2
		    		}
		    	},
				{
					breakpoint: 900,
					settings: {
						dots: true,
						slidesToShow: 2
					}
				},
				{
					breakpoint: 650,
					settings: {
						dots: true,
						slidesToShow: 1
					}
				}
		    ]
		});

		var names = 0;
		var days = 0;
		var contacts = 0;

		$(".small_item .names").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > names) {
			  names = h_block;
			};
		});
		$(".small_item .names").height(names);

		$(".small_item .days").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > days) {
			  days = h_block;
			};
		});
		$(".small_item .days").height(days);

		$(".small_item .contacts").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > contacts) {
			  contacts = h_block;
			};
		});
		$(".small_item .contacts").height(contacts);

		$('.levelTwo').css('opacity', '1');

	}, 700);

});

$('.big_item.have_a_child').click(function () {
	var text = $('.site_bread span').text().split(" ").shift();
	$('.site_bread .centerBox span').before('<a href="/about/leadership" class="preload">'+text+'</a>');
	var spanText = $(this).find('.name').text().split(" ").shift();
	$('.site_bread span').text(spanText).data('id',current_id);
});

$(document).on('click', '.small_item.have_a_child', function(){
	var spanText = $(this).find('.name').text().split(" ").shift();
	$('.site_bread span').text(spanText).data('id',current_id);
});

if($('.min768').is(':visible')){
	$(window).on('load', function(){
		var names = 0;
		var days = 0;
		var contacts = 0;

		$(".big_item .names").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > names) {
				names = h_block;
			};
		});
		$(".big_item .names").height(names);

		$(".big_item .days").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > days) {
				days = h_block;
			};
		});
		$(".big_item .days").height(days);

		$(".big_item .contacts").each(function () {
			var h_block = parseInt($(this).height());
			if(h_block > contacts) {
				contacts = h_block;
			};
		});
		$(".big_item .contacts").height(contacts);
	});
}

$(window).on('load', function () {
	$('.leadership_page .levelOne .leaders').slick({
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		draggable: true,
		dots: true,
		responsive: [
			{
				breakpoint: 900,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					adaptiveHeight: true,
				}
			}
		]
	});
})