
/** home page slick initialized */
$(document).ready(function () {
    // hero banner
    $('.hero-banner__wrapper').slick({
        prevArrow: false,
        nextArrow: false,
        dots: true,
        speed: 400,
        autoplay: false,
    });

    //sale banner 
    $('.sale-banner__wrapper').slick( {
        prevArrow: false,
        nextArrow: false,
    });

    // normal product carousel
    const slidesToShow = 4;
    const productCarouselConfig = {
        infinite: false,
        slidesToShow,
        slidesToScroll: 1,
        prevArrow: '<button class="icon-btn prev-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="icon-btn next-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 768, // Define a breakpoint where the configuration changes
                settings: {
                    slidesToShow: 2, // Adjust slidesToShow for screens narrower than 768px
                }
            },
            {
                breakpoint: 992, // Define another breakpoint if needed
                settings: {
                    slidesToShow: 3, // Adjust slidesToShow for screens narrower than 992px
                }
            },
            // Add more breakpoints and settings as needed
        ]
    }
    const numberOfProductCarousel = 4;
    slickInit('.product__wrapper--normal--slick__', numberOfProductCarousel, productCarouselConfig);

    function slickInit (className, numberOfCarousel, config) {
        let i = 1;
        while(i <= numberOfCarousel) {
            $(`${className}${i}`).slick(config);
            i++;
        }
    }


    // Function to destroy and reinitialize Slick sliders for a specific tab
    function handleTabSwitch(newTabSelector) {
        // Loop through each Slick slider within the tab
        $(newTabSelector + ' .product__wrapper--normal').each(function () {
            // Destroy the Slick slider in the previous tab
            $(this).slick('unslick');

            // Reinitialize the Slick slider in the new tab
            $(this).slick(productCarouselConfig);
        });
    }

    // Event listener for tab switch (assuming you have a tab click event)
    $('.tab__item').on('click', function () {
        const newTabSelector = '.panel__item.active'; // Get the selector for the new tab
        handleTabSwitch(newTabSelector); // Handle tab switch
    });
    
    // most love product carousel
    const numberOfMostLoveCarousel = 2;
    const mostLoveProductConfig = {
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button class="icon-btn prev-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="icon-btn next-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-right"></i></button>',
    }
    slickInit('.product-slick__wrapper__' , numberOfMostLoveCarousel, mostLoveProductConfig);
    // normal product carousel

    // partner section 
    $('.partner__slick-carousel').slick({
        autoplay: true,
        dots: true,
        // speed: ,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: false,
        nextArrow: false,
        responsive: [
            {
                breakpoint: 768, // Define a breakpoint where the configuration changes
                settings: {
                    slidesToShow: 2, // Adjust slidesToShow for screens narrower than 768px
                }
            },
            {
                breakpoint: 992, // Define another breakpoint if needed
                settings: {
                    slidesToShow: 3, // Adjust slidesToShow for screens narrower than 992px
                }
            },
            // Add more breakpoints and settings as needed
        ]
    });

    

});


/** shop page slick initialized */
$(document).ready(function () {
    $('.feature-category__wrapper').slick({
        arrows: false,
        dots: false,
        variableWidth: true
    });
});

/** day picker */
$(document).ready(function () {
    $('#shop-filter__day-picker').dayPicker();
})