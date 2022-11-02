'use strict';

(function ($) {

    // =====Catage menu====
    $('.hero__categories__all').on('click', function () {
        $('.hero__categories ul').slideToggle(400);
    });

    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    /*------------------
           Background Set
       --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".mobile__menu__overlay").on('click', function () {
        $(".mobile__menu__wrapper").removeClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });


    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

})(jQuery)