jQuery(document).ready(function() {
	
	"use strict";
	// Your custom js code goes here.
	/* photoswipe
    * ----------------------------------------------------- */
	var clPhotoswipe = function() {
        var items = [],
            $pswp = $('.pswp')[0],
            $folioItems = $('.item-folio');

            // get items
            $folioItems.each( function(i) {

                var $folio = $(this),
                    $thumbLink =  $folio.find('.thumb-link'),
                    $title = $folio.find('.item-folio__title'),
                    $caption = $folio.find('.item-folio__caption'),
                    $titleText = '<h4>' + $.trim($title.html()) + '</h4>',
                    $captionText = $.trim($caption.html()),
                    $href = $thumbLink.attr('href'),
                    $size = $thumbLink.data('size').split('x'),
                    $width  = $size[0],
                    $height = $size[1];
         
                var item = {
                    src  : $href,
                    w    : $width,
                    h    : $height
                }

                if ($caption.length > 0) {
                    item.title = $.trim($titleText + $captionText);
                }

                items.push(item);
            });

            // bind click event
            $folioItems.each(function(i) {

                $(this).on('click', function(e) {
                    e.preventDefault();
                    var options = {
                        index: i,
                        showHideOpacity: true
                    }

                    // initialize PhotoSwipe
                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });

            });

    };
	
	var cierraMenu = function(){
		$('.probootstrap-nav.hidden-xs ul li a').on('click', function(){
			$('body').removeClass('show');
			$('.probootstrap-burger-menu').removeClass('active');
		});
	}
	
	/*----------------------------------------
		Slider
	----------------------------------------*/
	var flexSlider = function() {
	  $('.flexslider').flexslider({
	    animation: "fade",
	    prevText: "",
	    nextText: "",
	    slideshowSpeed: 2000, // speed of slides
	    animationSpeed: 600,
	    slideshow: true,
	    directionNav: false,
	    controlNav: true
	  });
	  $('.flexslider2').flexslider({
	    animation: "fade",
	    prevText: "",
	    nextText: "",
	    slideshowSpeed: 2000, // speed of slides
	    animationSpeed: 600,
	    slideshow: true,
	    directionNav: false,
	    controlNav: false
	  });
	}
	
	/*----------------------------------------
		Document Ready 
	----------------------------------------*/
	$(document).ready(function(){
		clPhotoswipe();
		cierraMenu();
	});
	
	
	$(window).load(function(){
		flexSlider();
	});

});