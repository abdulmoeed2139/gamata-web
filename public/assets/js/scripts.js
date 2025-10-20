/*
*************************
    Header Functions
*************************
*/

$(document).ready(function () {
    function handleMenu() {
        const isMobile = $(window).width() <= 1200;

        if (isMobile) {
            $(".main-menu-btn").off("click").on("click", function (e) {
                e.stopPropagation();
                $(".main-menu").toggleClass("active").slideToggle(400);
                $(this).toggleClass("open");
                console.log('clicked working');
            });

            $(".main-menu").off("click").on("click", function (e) {
                e.stopPropagation();
            });

            $(document).off("click.menuClose").on("click.menuClose", function (event) {
                if (!$(event.target).closest(".main-menu-btn, .main-menu").length) {
                    $(".main-menu").slideUp(400).removeClass("active");
                    $(".main-menu-btn").removeClass("open");
                }
            });
        }
        else {
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
    $('.wishlist').on('click', function () {
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
$('.stats-desc-2').on('click', function () {
    $(this).toggleClass('open');
});
$(document).on('click', function (e) {
    if (!$(e.target).closest('.stats-desc-2').length) {
        $('.stats-desc-2').removeClass('open');
    }
});


window.addEventListener("scroll", function () {
    const header = document.querySelector("header");

    // Sirf tab chale jab screen width >= 1200 ho
    if (window.innerWidth >= 1200) {
        if (window.scrollY > 50) {
            header.classList.add("is-sticky");
        } else {
            header.classList.remove("is-sticky");
        }
    } else {
        // Agar mobile/tablet ho to sticky class hata do
        header.classList.remove("is-sticky");
    }
});



window.addEventListener("scroll", function () {
    const header = document.querySelector(".nav-container");

    if (window.innerWidth < 1200) {
        if (window.scrollY > 50) {
            header.classList.add("is-sticky");
        } else {
            header.classList.remove("is-sticky");
        }
    } else {
        // Agar desktop ho to sticky class hata do
        header.classList.remove("is-sticky");
    }
});


var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl, {
        trigger: window.innerWidth < 768 ? 'click' : 'hover'
    })
})

document.addEventListener("DOMContentLoaded", function () {
    var input = document.querySelector("#mobile");
    window.intlTelInput(input, {
        initialCountry: "lk", // default Sri Lanka
        preferredCountries: ["lk", "pk", "in"],
        separateDialCode: true
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const languages = document.querySelectorAll(".lan");

    // Get current locale from URL path instead of localStorage
    const pathSegments = window.location.pathname.split('/');
    const currentLocale = pathSegments[1] && ['en', 'si', 'ta'].includes(pathSegments[1]) ? pathSegments[1] : 'en';

    // Set active class based on current URL locale
    languages.forEach(lang => {
        if (lang.dataset.lang === currentLocale) {
            lang.classList.add("active");
        } else {
            lang.classList.remove("active");
        }
    });

    // Update localStorage with current locale
    localStorage.setItem("selectedLang", currentLocale);

    // Handle click events
    languages.forEach(lang => {
        lang.addEventListener("click", function (e) {
            e.preventDefault();

            languages.forEach(l => l.classList.remove("active"));
            this.classList.add("active");

            const selectedLang = this.dataset.lang;
            localStorage.setItem("selectedLang", selectedLang);

            const currentPath = window.location.pathname.split('/').slice(2).join('/');
            window.location.href = `/${selectedLang}/${currentPath}`;
        });
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".auth-btn");

    buttons.forEach(button => {
        if (!button.querySelector(".spinner")) {
            const spinner = document.createElement("span");
            spinner.classList.add("spinner");
            spinner.style.display = "none";
            spinner.innerHTML = `
          <img src="{{ asset('assets/Images/iconn.png') }}" 
               alt="Gamata Logo"
               class="login-logo-uni">
        `;
            button.appendChild(spinner);
        }

        const spinner = button.querySelector(".spinner");
        const originalHTML = button.innerHTML;
        const icon = button.querySelector("img");
        const pleaseWaitText = "Please wait";


        window.addEventListener("pageshow", function () {
            button.classList.remove("loading");
            if (spinner) spinner.style.display = "none";
            if (icon) icon.style.display = "";
            button.style.pointerEvents = "auto";
            button.innerHTML = originalHTML;
        });

        button.addEventListener("click", function (e) {

            // Button disable aur loading state
            button.classList.add("loading");
            button.style.pointerEvents = "none";

            spinner.style.display = "inline-block";
            button.innerHTML = `
            <span>${pleaseWaitText}...</span>  <span class="spinner">

            </span>
            `;

            // Store for later restoration
            button._originalHTML = originalHTML;

            // Spinner animation (optional)
            // const newImg = button.querySelector(".spin-anim");
            //   if (newImg) {
            //     newImg.style.transition = "transform 0.3s linear";
            //     newImg.style.animation = "spin 1s linear infinite";
            //   }

            // setTimeout(() => {
            //     button.classList.remove("loading");
            //     button.innerHTML = originalHTML;
            //     button.style.pointerEvents = "auto";
            // }, 1000);
        });
    });

    // Add this function to remove loading state
    window.removeButtonLoading = function(button) {
        if (button && button._isLoading) {
            button.classList.remove("loading");
            button.innerHTML = button._originalHTML;
            button.style.pointerEvents = "auto";
            button._isLoading = false;
        }
    };
});


document.addEventListener("DOMContentLoaded", function () {
    const subscribeButtonUnique = document.getElementById("subscribeBtn");

    subscribeButtonUnique.addEventListener("click", function (e) {

        // Disable button and show loading text + spinner
        subscribeButtonUnique.innerHTML = `
      Submitting...
    `;
        subscribeButtonUnique.style.pointerEvents = "none";
        subscribeButtonUnique.classList.add("unique-loading");

        // Simulate a successful subscription (e.g., 2 seconds delay)
        setTimeout(() => {
            // Reset button to original state
            subscribeButtonUnique.innerHTML = `
        <svg><use xlink:href="#btn_arr"></use></svg>
        Subscribe
      `;
            subscribeButtonUnique.style.pointerEvents = "auto";
            subscribeButtonUnique.classList.remove("unique-loading");
        }, 2000);
    });

});


document.addEventListener("DOMContentLoaded", function () {
    const langLinks = document.querySelectorAll(".lan");

    langLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            // e.preventDefault();

            const selectedLang = this.getAttribute("data-lang");
            const currentPath = window.location.pathname.split('/').slice(2).join('/');
            // Example: /en/index → ['en','index'] → index

            window.location.href = `/${selectedLang}/${currentPath}`;
        });
    });
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

$('.product-thumb-carousel .item').on('click', function () {
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

$('.product-thumb-carousel .item').on('click', function () {
    var dataId = $(this).data('id');
    var productImgCarousel = $('.product-img-carousel');
    productImgCarousel.trigger("to.owl.carousel", [dataId, 300, true]);
});


//shop sorting filter 
const gridViewBtn = document.getElementById('gridViewBtn');
const listViewBtn = document.getElementById('listViewBtn');
const productContainer = document.getElementById('food-list');

gridViewBtn.addEventListener('click', () => {
    productContainer.classList.add('grid-view');
    productContainer.classList.remove('list-view');
    gridViewBtn.classList.add('active');
    listViewBtn.classList.remove('active');
});



listViewBtn.addEventListener('click', () => {
    productContainer.classList.add('list-view');
    productContainer.classList.remove('grid-view');
    listViewBtn.classList.add('active');
    gridViewBtn.classList.remove('active');
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



