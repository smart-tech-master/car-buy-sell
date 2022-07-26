jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function coupons_deals_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function coupons_deals_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var coupons_deals_Keyboard_loop = function (elem) {
    var coupons_deals_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var coupons_deals_firstTabbable = coupons_deals_tabbable.first();
    var coupons_deals_lastTabbable = coupons_deals_tabbable.last();
    /*set focus on first input*/
    coupons_deals_firstTabbable.focus();

    /*redirect last tab to first input*/
    coupons_deals_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            coupons_deals_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    coupons_deals_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            coupons_deals_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        coupons_deals_Keyboard_loop($('.menu-brand.primary-nav'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});