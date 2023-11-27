
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
        slidesToShow: 4,
        slidesToScroll: 1,
        swipeToSlide: true,
        swipe: true,
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
        swipeToSlide: true,
        prevArrow: '<button class="icon-btn prev-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="icon-btn next-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-right"></i></button>',
    }
    slickInit('.product-slick__wrapper__' , numberOfMostLoveCarousel, mostLoveProductConfig);
    // normal product carousel

    // partner section 
    $('.partner__slick-carousel').slick({
        autoplay: true,
        dots: true,
        swipe: true,
        swipeToSlide: true,
        slidesToShow: 4,
        // slidesToScroll: 1,
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
        variableWidth: true,
        swipeToSlide: true
    });
    $('.feature-product__wrapper').slick({
        infinite: false,
        dots: true,
        variableWidth: true,
        swipeToSlide: true,
        prevArrow: '<button class="icon-btn prev-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="icon-btn next-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-right"></i></button>',
    });
});

/** accordion handler */
$(document).ready(function () {
    (function ($) {

        var allPanels = $('.accordion > .accordion__content').hide();

        $('.accordion > .accordion__top').click(function () {
            allPanels.slideUp(200);
            $(this).next().slideDown(200);
            return false;
        });

    })($);
});


/** tab respon handler */
$(document).ready(function() {
    $(window).resize(function () {
        if ($(document).width() < 1300) {
            $('.tabs').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                prevArrow: false,
                nextArrow: false,
                swipeToSlide: true,
                variableWidth: true,
                swipe: true,
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
        } else {
            $('.tabs').slick('unslick');
        }
    });
    $('.tabs').slick({
        slidesToShow: 4,
        slidesToScroll: 1,

        infinite: false,
        arrows: false,
        prevArrow: false,
        nextArrow: false,
        swipeToSlide: true,
        variableWidth: true,
        swipe: true,
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

/** product gallery handler */
$(document).ready(function () {
    $('.gallery__thumbnails').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        swipeToSlide: true,
        swipe: true,
        infinite: false,
        arrowns: false,
        prevArrow: '<button class="icon-btn prev-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-left"></i></button>',
        nextArrow: '<button class="icon-btn next-btn box-shadow1" style="background: white; color: black"><i class="fal fa-chevron-right"></i></button>',
    });
});

/** mobile keyword */
$(document).ready(function () {
    $('.keyword__wrapper ').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        arrows: false,
        prevArrow: false,
        nextArrow: false,
        swipeToSlide: true,
        variableWidth: true,
        swipe: true,
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

/** search handler */
$(document).ready(() => {
    $('.search__product__wrapper').hide();
    $('.search__form__input').keyup(() => {
        let val = $('.search__form__input').val();
        if (val == "") {
            $('.search__product__wrapper').hide();
        } else {
            $('.search__product__wrapper').show();
        }
        $.post('./views/libs/search.php', {
            search: val,
        }, (data) => {
            $(".search__product__wrapper").html(data);
        });
    });
})


/** email validation  */
// $(document).ready(function () {
//     const emailInput = $('#email-input');
//     const emailValidationStatus = $('#email-validation-status');
//     const form = $('#register__form');

//     form.on('submit', function (event) {
//         const email = emailInput.val();
//         const isValidEmail = validateEmail(email);

//         if (!isValidEmail) {
//             emailValidationStatus.text('Invalid email');
//             emailValidationStatus.css('color', 'red');
//             event.preventDefault(); // Prevent form submission
//             return;
//         }

//         emailValidationStatus.text('Checking email availability...');
//         emailValidationStatus.css('color', 'gray');

//         checkEmailAvailability(email, function (isAvailable) {
//             if (!isAvailable) {
//                 emailValidationStatus.text('Email already exists');
//                 emailValidationStatus.css('color', 'red');
//                 event.preventDefault(); // Prevent form submission
//             }
//             // Form submission continues if email is valid and available
//         });
//     });

//     function validateEmail(email) {
//         // Regular expression for email validation
//         const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//         return emailRegex.test(email);
//     }

//     function checkEmailAvailability(email, callback) {
//         $.ajax({
//             url: './views/libs/emailValidator.php',
//             type: 'POST',
//             data: { email: email },
//             success: function (response) {
//                 const isAvailable = (response === 'available');
//                 callback(isAvailable);
//             }
//         });
//     }
// });