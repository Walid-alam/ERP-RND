jQuery(function ($) {
	
	'use strict';

	// -------------------------------------------------------------
	//  Demo Pages
	// -------------------------------------------------------------
	$(function () {
		$('.demo-chooser .toggler').on('click', function(event){
			event.preventDefault();
			$(this).closest('.demo-chooser').toggleClass('opened');
		});
	});

    // -------------------------------------------------------------
    //  ScrollUp Minimum setup
    // -------------------------------------------------------------
    $(function () {

	  	$.scrollUp({
			scrollText: '<i class="fa fa-arrow-up"></i>', 
			scrollDistance: 15, 
			scrollFrom: 'bottom',
	  	});
	});

    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------
    (function () {  
        $('.collapse').on('show.bs.collapse', function() {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-default').addClass('active-process');
        });

        $('.collapse').on('hide.bs.collapse', function() {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-default').removeClass('active-process');
        });
    }());  

	// -------------------------------------------------------------
    // Progress Bar
    // -------------------------------------------------------------
    $('.skill').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $.each($('div.progress-bar'),function(){
                $(this).css('width', $(this).attr('aria-valuenow')+'%');
            });
            $(this).unbind('inview');
        }
    });  

    // -------------------------------------------------------------
    //  Magnific Popup
    // -------------------------------------------------------------

    (function() {
	    $('.image-link').magnificPopup({
        	type: 'image',
          	gallery:{
	            enabled:true,
	        }
	    });
    }());

	
	// -------------------------------------------------------------
    //  portfolio filter
    // -------------------------------------------------------------
	$(window).load(function(){
		var winDow = $(window);		
		var $container = $('.portfolio-filter');	  
		$container.isotope({
			itemSelector : '.portfolio',
			layoutMode : 'masonry',
			// disable resizing
			resizable: false,
			// set columnWidth to a percentage of container width
			masonry: {
			  	columnWidth: $container.width() / 12
			},
		});

		// update columnWidth on window resize
		$(window).resize(function(){
			$container.isotope({
			  	// set columnWidth to a percentage of container width
			  	masonry: {
					columnWidth: $container.width() / 12

			  	}
			});
		});

		$('.portfoli-menu a').click(function(){
		   	var selector = $(this).attr('data-filter');

		   	$container.isotope({

			 	filter: selector,
				animationOptions: {
				   	duration: 750,
					easing: 'linear',
					queue: false,
			 	}
		   });
		   return false;
		});

		var $optionSets = $('.portfoli-menu'),

		$optionLinks = $optionSets.find('a');

		$optionLinks.click(function() {
		  	var $this = $(this);

		  	// don't proceed if already selected
		  	if ( $this.hasClass('active') ) {
				return false;
		  	}
		  	var $optionSet = $this.parents('.portfoli-menu');
		  	$optionSet.find('.active').removeClass('active');
		  	$this.addClass('active');
		  	
		  	// make option object dynamically, i.e. { filter: '.my-filter-class' }
		  	var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-filter');

		  	// parse 'false' as false boolean

		  	value = value === 'false' ? false : value;

		  	options[ key ] = value;

		  	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
				// changes in layout modes need extra logic
				changeLayoutMode( $this, options )
		 	} else {
				// otherwise, apply new options
				$container.isotope( options );
			}	  

		  	return false;
		});
	});

	// -------------------------------------------------------------
    //  Owl Carousel
    // -------------------------------------------------------------
    (function() {
        $(".portfolio-slider").owlCarousel({
            items:4,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:4
				}
			},
            nav:true,
            autoplay:true,
            dots:false,
            nav:true,
            navText: [
              	"<i class='fa fa-angle-left'></i>",
              	"<i class='fa fa-angle-right'></i>"
            ],
        });
    }()); 

    (function() {
        $(".testimonial-slider").owlCarousel({
            items:2,
			responsive:{
				0:{
					items:1,
					dots:false
				},
				600:{
					items:2
				},
				1000:{
					items:2
				}
			},
            nav:false,
            autoplay:true, 
			dots:true,
        });
    }());

	(function() {
        $("#brand-carousel").owlCarousel({
            items:6,
			responsive:{
				0:{
					items:3,
				},
				600:{
					items:4,
				},
				1000:{
					items:6,
				}
			},
            nav:false,
            autoplay:true,
        });
    }());

    (function() {
        $("#footer-brand-carousel").owlCarousel({
            items:6,
			responsive:{
				0:{
					items:3,
				},
				600:{
					items:4,
				},
				1000:{
					items:6,
				}
			},
            nav:false,
            autoplay:true,
        });
    }());
});