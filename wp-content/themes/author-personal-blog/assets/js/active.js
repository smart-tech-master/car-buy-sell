(function($) {
    "use strict";
    if ($.fn.menumaker) {
        let menuArgs = {
            title: "Menu", // The text of the button which toggles the menu
            breakpoint: 767, // The breakpoint for switching to the mobile view
            format: "multitoggle" // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
        };
        let cssmenu = $("#cssmenu").menumaker(menuArgs);
        var siteNavigation = $('#cssmenu').children('ul');
        siteNavigation.find('a').on('focus blur', function() {
            let parentEl = $(this).parents('.menu-item, .page_item');
            let menufocus = parentEl.toggleClass('focus');
            if (parentEl.hasClass('focus')) {
                parentEl.children('.sub-menu').css('display', 'block');
                parentEl.children('.submenu-button').addClass('submenu-opened');
            }
        });
    }
    $(window).on('scroll', function() {
        var topspace = $(this).scrollTop();
        if (topspace > 300) {
            $('.scrooltotop').css('display', 'block');
        } else {
            $('.scrooltotop').css('display', 'none');
        }
    });
    $('.scrooltotop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });
    $('.contact-form').parents('.entry-content').addClass('contact-form-parent');
    $('table').addClass('table-bordered table').wrap('<div class="table-responsive"></div>');
    $('.shop_table').removeClass('table-bordered');
    $('.navigation.pagination').addClass('Page navigation example');
    $('.navigation.pagination div.nav-links').wrapInner('<ul class="pagination"></ul>');
    $('div.nav-links ul.pagination * ').wrap('<li class="page-item"></li>');
    $('p.wp-block-tag-cloud a').removeAttr('style');
    /* search template script*/
    $('.search-icon-wrapper a').on('click', function(event) {
        event.stopPropagation();
        event.preventDefault();
        $('.popup-search-template-area').toggleClass('visible');
        $('.widget_search input').focus();
    });
    $('.search-template-content-area-inner .container').on('click', function(event) {
        event.stopPropagation();
    });
    $('.popup-search-template-area').on('click', function() {
        $(this).removeClass('visible');
    });
    $('.search-template-hide-button a').on('click', function(event) {
        event.stopPropagation();
        event.preventDefault();
        $('.popup-search-template-area').removeClass('visible');
    });
    /*Book Purchase Website LIst Container*/
    var buyNowBtn = $('a.buy-now-button');
    var webListContainer = $('ul.website-list-container');
    buyNowBtn.on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).siblings('.website-list-container').toggleClass('open');
    });
    webListContainer.on('click', function(e) {
        e.stopPropagation();
        $(this).addClass('open');
    });
    $('body').on('click', function(e) {
        e.stopPropagation();
        webListContainer.removeClass('open');
    });

    // end mobile scripT
})(jQuery);

jQuery(window).on('load', function() {
    var $ = jQuery;
    $('#preloader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });
    /*Book Slider*/
    var booksSliders = $('.books-slider-active');
    booksSliders.each(function(index) {
        var slideToShow = $(this).attr('data-slideToshow');
        $(this).slick({
            slidesToShow: slideToShow,
            slidesToScroll: 1,
            arrows: true,
            fade: false,
            nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
            prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    });
    $('#sbi_images').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        arrows: true,
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
        rows: 0,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
    // start product slider script
    $('.active-single-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.active-thumbnail-gallery',
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
    });
    $('.active-thumbnail-gallery').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.active-single-gallery',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        arrows: true,
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
    });

    $('.active-product-related-post-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arros: true,
        centerMode: false,
        focusOnSelect: true,
        nextArrow: '<div class="slick-next"><i class="fa fa-arrow-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-arrow-left"></i></div>',
    });
    // On before slide change
    $('.scrooltotop').css('display', 'none');

    var $grid = $('.masonry_active').imagesLoaded(function() {
        $grid.masonry({
            itemSelector: '.blog-grid-layout',
        });
    });

});