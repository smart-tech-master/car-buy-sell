jQuery(document).ready(function ($) {

    //search
    $('.header-search .search').on('click', function (e) {
        $('.header-search .header-search-wrap').slideToggle();
        e.stopPropagation();
    });

    $('.header-search form.search-form').on('click', function (e) {
        e.stopPropagation();
    });

    $('.header-search .header-search-wrap .close').on('click', function (e) {
        $('.header-search .header-search-wrap').slideToggle();
        e.stopPropagation();
    });

    $('html').on('click', function () {
        $('.header-search .header-search-wrap').slideUp();
    });

    //stickybar
    $('.top-bar-close').on('click', function () {
        $('.notification-wrapper').toggleClass('active');
        $('.header-top').slideToggle();
    });

    $("#menu-opener").on('click', function () {
        $("body").addClass("menu-open");
        $(".mobile-menu-wrapper .primary-menu-list").addClass("toggled");
    });

    $(".mobile-menu-wrapper .close-main-nav-toggle ").on('click', function () {
        $("body").removeClass("menu-open");
        $(".mobile-menu-wrapper .primary-menu-list").removeClass("toggled");
    });

    //mobile-menu
    $('<button class="angle-down"> </button>').insertAfter($(".main-navigation.mobile-navigation ul .menu-item-has-children > a"));
    $('.main-navigation.mobile-navigation ul li .angle-down').on('click', function () {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

    $('.menu li a, .menu li').on('focus', function () {
        $(this).parents('li').addClass('focus');
    }).blur(function () {
        $(this).parents('li').removeClass('focus');
    });

    //backtotop
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 200) {
            $('.scroll-to-top').addClass('show');
        } else {
            $('.scroll-to-top').removeClass('show');
        }
    });

    $('.scroll-to-top').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
    });

    var slider_auto, slider_loop, rtl;

    if (fbp_data.auto == '1') {
        slider_auto = true;
    } else {
        slider_auto = false;
    }

    if (fbp_data.loop == '1') {
        slider_loop = true;
    } else {
        slider_loop = false;
    }

    if (fbp_data.rtl == '1') {
        rtl = true;
    } else {
        rtl = false;
    }

    //bannerhomepage

    if ($('.slider-one .item-wrap .container .item').length > 0) {
        $('.slider-one .item-wrap .container .item').owlCarousel({
            loop: slider_loop,
            dots: false,
            responsiveClass: true,
            items: 1,
            margin: 0,
            animateOut: fbp_data.animation,
            autoplay: slider_auto,
            autoplayTimeout: fbp_data.speed,
            rtl: rtl,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                },
                1025: {
                    items: 1,
                    nav: false,
                    loop: slider_loop
                },
                1026: {
                    nav: true,
                }
            }
        });
    }

    //accessibility
    $(".menu li, .menu li a").on('focus', function () {
        $(this).parents('li').addClass('focus');
    }).blur(function () {
        $(this).parents('li').removeClass('focus');
    });

});