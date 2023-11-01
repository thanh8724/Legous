
// hero banner
$(document).ready(function () {
    $('.hero-banner__wrapper').slick({
        prevArrow: false,
        nextArrow: false,
    });

    // Initialize Slick Slider for each carousel
    jQuery('.product-slick__wrapper').each(function () {
        var target = jQuery(this).data('slick');

        jQuery(this).slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
        });
    });

    // Add click handlers for previous and next buttons
    jQuery('.carousel-navigation .prev-btn').click(function () {
        var target = jQuery(this).data('target');
        jQuery('.product-slick__wrapper[data-slick="' + target + '"]').slick('slickPrev');
    });

    jQuery('.carousel-navigation .next-btn').click(function () {
        var target = jQuery(this).data('target');
        jQuery('.product-slick__wrapper[data-slick="' + target + '"]').slick('slickNext');
    });

});