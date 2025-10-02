/*
*************************
    Header Functions
*************************
*/

$(document).ready(function () {
    function handleMenu() {
        const isMobile = $(window).width() <= 1200;

        if (isMobile) {
            $(".main-menu-btn").on("click", function () {
                $(".main-menu").toggleClass("active").slideToggle(400);
                $(this).toggleClass("open");
            });

            $(document).on("click", function (event) {
                if (!$(event.target).closest(".main-menu-btn, .main-menu").length) {
                    $(".main-menu").slideUp(400).removeClass("active");
                    $(".main-menu-btn").removeClass("open");
                }
            });
        } else {
            $(".main-menu-btn, .main-menu").off("click");
        }

        // Move language selector
        const language = $('.language');
        isMobile ? $('.main-menu').append(language) : $('.nav-icons').append(language);

        // Search bar visibility on mobile
        if (isMobile) {
            $(".search-bar").show().css("display", "flex");
        }
    }

    // Initial setup
    handleMenu();

    // On window resize, reapply logic
    $(window).resize(handleMenu);

    // Search toggle for desktop
    $(".search-toggle").click(function () {
        if ($(window).width() > 1200) { // Only on desktop
            $(".search-bar").stop(true, true).slideToggle(400);
        }
    });

    // Wishlist Heart Color
    $('.wishlist').on('click', function() {
        $(this).toggleClass('active');
    });

    $(".filter-header").click(function () {
        let filterContent = $(this).next(".filter-content"); // Select only the clicked filter's content
        let toggleIcon = $(this).find(".toggle-icon");

        // Slide toggle only the clicked one
        filterContent.slideToggle(300);

        // Toggle the plus/minus icon for the clicked one
        toggleIcon.text(toggleIcon.text() === "−" ? "+" : "−");
    });
});

function slidrerOnlyMobile(elem, breakpoint, args) {
	
    if ($(elem)[0]) {
        var s = $(elem);
        
        if (window.innerWidth < breakpoint) {
            s.owlCarousel(args)
		} else s.addClass("off"); 
		
        $(window).resize(function (e) {
            if (window.innerWidth < breakpoint) {
                if ($(elem).hasClass("off")) {
                    s.owlCarousel(args);
                    s.removeClass("off")
                }
            } else $(elem).hasClass("off") || (s.addClass("off").trigger("destroy.owl.carousel"), s.find(".owl-stage-outer").children(":eq(0)").unwrap())
        })
    }
}
//for dropdown account page
$('.stats-desc-2').on('click', function() {
    $(this).toggleClass('open');
});
$(document).on('click', function(e) {
    if (!$(e.target).closest('.stats-desc-2').length) {
        $('.stats-desc-2').removeClass('open');
    }
});



/*
*****************
     Sliders
*****************
*/

// Banner Slider
$(document).ready(function () {
    $(".banner-slider").owlCarousel({
        items: 1,
        loop: 0,
        margin: 0,
        autoplay: 0,
        nav: 0,
        dots: 0,
        smartSpeed: 1000,
        responsive: {
            1200: {
                nav: 1,
                navText: [
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
                ],
            },
        },
    });
});

// Steps Slider (Mobile Only)
var welSlider = $(".steps-cards");
var welArgs = {
    items: 1,
    dots: 0,
    loop: 0,
    stagePadding: 60,
    nav: 0,
    margin: 13,
    autoplay: 0,
    responsive: {
        768: {
            items: 2,
        },
    },
};
slidrerOnlyMobile(welSlider, 992, welArgs);

// Steps Slider (Mobile Only)
var welSlider = $(".hm-food-slider");
var welArgs = {
    items: 1,
    dots: 0,
    loop: 0,
    stagePadding: 20,
    nav: 1,
    margin: 10,
    autoplay: 0,
    navText: [
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
    ],
};
slidrerOnlyMobile(welSlider, 768, welArgs);

// Location Slider (Mobile Only)
var welSlider = $(".address-slider");
var welArgs = {
    items: 1,
    dots: 0,
    loop: 0,
    stagePadding: 20,
    nav: 1,
    margin: 10,
    autoplay: 0,
    navText: [
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
    ],
    responsive: {
        992: {
            items: 2,
        },
    },
};
slidrerOnlyMobile(welSlider, 1200, welArgs);

// Team Slider
$(document).ready(function () {
    $(".team-slider").owlCarousel({
        items: 1,
        loop: 0,
        margin: 10,
        stagePadding: 20,
        autoplay: 0,
        nav: 0,
        dots: 0,
        smartSpeed: 1000,
        responsive: {
            768: {
                items: 2,
            },
            1200: {
                stagePadding: 0,
                items: 3,
                margin: 0,
                nav: 1,
                navText: [
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
                ],
            },
        },
    });
});

// Team Slider
$(document).ready(function () {
    $(".community-slider").owlCarousel({
        items: 1,
        loop: 0,
        margin: 10,
        stagePadding: 20,
        autoplay: 0,
        nav: 0,
        dots: 0,
        smartSpeed: 1000,
        responsive: {
            768: {
                items: 2,
            },
            1200: {
                stagePadding: 0,
                items: 3,
                margin: 20,
                nav: 1,
                navText: [
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
                    '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
                ],
            },
        },
    });
});

// Team Slider
$(document).ready(function () {
    $(".journal-carousel").owlCarousel({
        items: 1,
        loop: 0,
        margin: 10,
        stagePadding: 20,
        autoplay: 0,
        nav: 1,
        dots: 0,
        smartSpeed: 1000,
        navText: [
            '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
            '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
        ],
        responsive: {
            768: {
                items: 2,
            },
            1200: {
                stagePadding: 0,
                items: 2,
                margin: 0,
                nav: 1, 
            },
        },
    });
});

// Product Inner Slider
$('.product-thumb-carousel').owlCarousel({
    items: 3,
    dots: 0,
    nav: 1,
    margin: 10,
    mouseDrag: 0,
    touchDrag: 0,
    pullDrag: 0,
    freeDrag: 0,
    navText: [
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
        '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
    ],
    responsive: {
        0: {
            items: 3
        },
        768: {
            items: 3
        }
    }
});

$('.product-thumb-carousel .item').on('click', function(){
    var dataId = $(this).data('id');
    var productImgCarousel = $('.product-img-carousel');
    productImgCarousel.trigger("to.owl.carousel", [dataId, 300, true]);
});

$('.product-img-carousel').owlCarousel({
    items: 1,
    dots: 0,
    nav: 0,
    mouseDrag: 0,
    touchDrag: 0,
    pullDrag: 0,
    freeDrag: 0,
});

$('.product-thumb-carousel').owlCarousel({
    items: 3,
    dots: 0,
    nav: 0,
    margin: 10,
    mouseDrag: 0,
    touchDrag: 0,
    pullDrag: 0,
    freeDrag: 0,
    responsive: {
        0: {
            items: 3
        },
        768: {
            items: 4
        }
    }
});

$('.product-thumb-carousel .item').on('click', function(){
    var dataId = $(this).data('id');
    var productImgCarousel = $('.product-img-carousel');
    productImgCarousel.trigger("to.owl.carousel", [dataId, 300, true]);
});

// Team Slider
$(document).ready(function () {
    $(".product-slider").owlCarousel({
        items: 1,
        loop: 0,
        margin: 10,
        stagePadding: 20,
        autoplay: 0,
        nav: 1,
        dots: 0,
        smartSpeed: 1000,
        navText: [
            '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#left_arr"></use></svg>', 
            '<svg width="20" height="20" aria-hidden="true"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#right_arr"></use></svg>'
        ],
        responsive: {
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                stagePadding: 0,
                items: 4,
                margin: 0,
                nav: 1, 
            },
        },
    });
});

$('.ant-tab-buttons .ant-tab-btn').on('click', function(){
    console.log('clicked');
    $('.ant-tab-buttons .ant-tab-btn').removeClass('active');
    $(this).addClass('active');

});

$('.ant-acc-inner').on('click', function () {
    var $accordion = $(this).closest('.ant-accordion');
    var $content = $accordion.find('.ant-acc-content');
    var $icon = $(this).find('.toggle-icon svg');

    // Slide toggle the content
    $content.stop(true, true).slideToggle(300);

    // Toggle the rotate class on the icon
    $icon.toggleClass('rotated');
});

//for Time Picker
$(function () {
    // Toggle dropdown open/close within .ant-timer-picker
    $('.ant-timer-picker .ant-select').on('click', function (e) {
        e.stopPropagation(); // prevent bubbling
        const $currentDropdown = $(this).closest('.ant-dropdown');

        // Close other dropdowns in the timer picker
        $('.ant-timer-picker .ant-dropdown').not($currentDropdown).removeClass('open');

        // Toggle the clicked one
        $currentDropdown.toggleClass('open');
    });

    // Handle option click
    $('.ant-timer-picker .ant-options li').on('click', function () {
        const $option = $(this);
        const $dropdown = $option.closest('.ant-dropdown');
        const value = $option.data('value');
        const text = $option.text();

        // Update visible box
        $dropdown.find('.ant-select').text(text);

        // Set hidden input value
        $dropdown.find('input[type="hidden"]').val(value);

        // Highlight selected option
        $option.addClass('active').siblings().removeClass('active');

        // Close dropdown
        $dropdown.removeClass('open');
    });

    // Close dropdowns when clicking outside
    $(document).on('click', function () {
        $('.ant-timer-picker .ant-dropdown').removeClass('open');
    });
});

//for Dropdown
$(function () {
    $('.ant-dropdown .dropdown-select').on('click', function (e) {
        e.stopPropagation();
        const $dropdown = $(this).closest('.ant-dropdown');
        $('.ant-dropdown').not($dropdown).removeClass('open');
        $dropdown.toggleClass('open');
    });

    $('.ant-dropdown .dropdown-options li').on('click', function () {
        const $li = $(this);
        const text = $li.text();
        const value = $li.data('value');
        const $dropdown = $li.closest('.ant-dropdown');

        $dropdown.find('.selected-text').text(text);
        $dropdown.find('input[type="hidden"]').val(value);
        $dropdown.removeClass('open');
    });

    $(document).on('click', function () {
        $('.ant-dropdown').removeClass('open');
    });
});



