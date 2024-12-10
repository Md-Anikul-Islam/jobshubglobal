(function ($) {
    "use strict";

    var windowOn = $(window);

    // sticky header js
    windowOn.on("scroll", function () {
        var scroll = windowOn.scrollTop();
        if (scroll < 100) {
            $("#job-hub-global").removeClass("header-sticky");
        } else {
            $("#job-hub-global").addClass("header-sticky");
        }
    });

    /**
     * Hero Image Slider
     */
    let heroSlider = new Swiper(".heroSlider", {
        spaceBetween: 30,
        grabCursor: true,
        effect: "fade",
        loop: true,
        // autoplay: {
        // 	delay: 4000,
        // 	disableOnInteraction: false,
        // },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    /**
     * Counter Up
     */
    $(".number").counterUp({ time: 3000 });
})(jQuery);
