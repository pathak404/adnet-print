function qsa(sel) {
    return Array.apply(null, document.querySelectorAll(sel));
}

function qs(sel) {
    return document.querySelector(sel);
}

function searchInput(e) {
    e.preventDefault();
    let width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    let searchInputEle = qs(".site-header form.search .search-input");
    if (width <= 767) {
        searchInputEle.classList.toggle("opened");
    }
    if (width <= 440) {
        qs(".site-header form.search").classList.toggle("opened");
        // add hidden to content
        generateHidden("div#page-content");
    }
    if (searchInputEle.classList.contains("opened")) {
        searchInputEle.focus();
    }
}


qs(".navbar-nav.nav-mobile").addEventListener("click", event => {
    if (event.target.nodeName === 'SPAN' || event.target.nodeName === 'I' && event.target.classList.contains("open")) {
        let target = event.target.getAttribute("data-target") || event.target.parentNode.getAttribute("data-target");
        if (target) {
            qs(`#${target}`).classList.add("show");
        }
    }
    if (event.target.nodeName === 'P' || event.target.nodeName === 'I' && event.target.classList.contains("close")) {
        event.target.closest(".mob-menu-container").classList.remove("show");
    }
});


function generateHidden(sel) {
    if (qs(`${sel} div.hidden`) != null) {
        qs(`div.hidden`).remove();
        return true;
    }
    if (qs(`${sel} div.hidden`) == null) {
        ele = document.createElement("div");
        ele.classList.add("hidden");
        qs(sel).insertAdjacentElement("afterbegin", ele);
    }
}


const swiperPopularProducts = new Swiper('.popular-products', {
    // Navigation arrows
    navigation: {
        nextEl: '.popular-products-button-next',
        prevEl: '.popular-products-button-prev',
    },
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 10,
    breakpoints: {
        450: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        992: {
            slidesPerView: 5,
        },
        1200: {
            slidesPerView: 6,
        }
    }
});


const swiperTrendingProducts = new Swiper('.trending-products', {
    // Navigation arrows
    navigation: {
        nextEl: '.trending-products-button-next',
        prevEl: '.trending-products-button-prev',
    },
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 10,
    breakpoints: {
        450: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        },
        992: {
            slidesPerView: 5,
        },
        1200: {
            slidesPerView: 6,
        }
    }
});
const swiperBrandedClothing = new Swiper('.branded-clothing', {
    // Navigation arrows
    navigation: {
        nextEl: '.branded-clothing-button-next',
        prevEl: '.branded-clothing-button-prev',
    },
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 10,
    breakpoints: {
        450: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        }
    }
});

const swiperExploreCategories = new Swiper('.explore-categories', {
    // Navigation arrows
    navigation: {
        nextEl: '.explore-categories-button-next',
        prevEl: '.explore-categories-button-prev',
    },
    slidesPerView: 2,
    slidesPerGroup: 2,
    spaceBetween: 10,
    breakpoints: {
        450: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 4,
        }
    }
});


const swiperProductSwiper = new Swiper('.ProductSwiper', {
    direction: "vertical",
    // Navigation arrows
    navigation: {
        nextEl: '.ProductSwiper-button-next',
        prevEl: '.ProductSwiper-button-prev',
    },
    slidesPerView: 5,
    loop: true,
    slideToClickedSlide: true,
});
swiperProductSwiper.on("slideChange, slideChangeTransitionEnd", (e) => {
    // console.log(e);
    qs(".single-product div.product-img img").src = qs(".swiper-slide-active img").src;
});

const swiperProductSwiper_mobile = new Swiper('.ProductSwiper-mobile', {
    pagination: {
        el: ".ProductSwiper-mobile-pagination",
        clickable: true,
    },
});

if (qsa('.single-product .variable-items-wrapper[data-attribute_name="attribute_color"] > li')[0] !== null) {
    qsa('.single-product .variable-items-wrapper[data-attribute_name="attribute_color"] > li').forEach((ele) => {
        ele.innerText = "";
        let color = ele.getAttribute("data-value");
        color.toLowerCase();
        ele.setAttribute("style", `color:${color};background-color:${color};`);
    });
}


jQuery(document).ready(function ($) {

    $(document).on('click', 'button.cart-plus, button.cart-minus', function () {

        const qty = $(this).parent('.quantity').find('.qty');
        const val = parseFloat(qty.val());
        const max = parseFloat(qty.attr('max'));
        const min = parseFloat(qty.attr('min'));
        const step = parseFloat(qty.attr('step'));

        if ($(this).is('.cart-plus')) {
            if (max && (max <= val)) {
                qty.val(max).change();
            } else {
                qty.val(val + step).change();
            }
        } else {
            if (min && (min >= val)) {
                qty.val(min).change();
            } else if (val > 1) {
                qty.val(val - step).change();
            }
        }
        $("[name='update_cart']").trigger("click");
    });


    $(".woocommerce-cart input.qty[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });

    // update cart icon badge on item remove
    $(document).on('click', '.cart_item .product-remove', function () {
        qsa(".adnet_cart_item_count").forEach(ele => {
            let count = ele.innerText - 1;
            if(count <= 0){
                ele.classList.add("d-none");
            }else{
                ele.innerText = count;
            }
        });
    });


    // Copy the inputed coupon code to WooCommerce hidden default coupon field
    $('.coupon-form input[name="coupon_code"]').on('input change', function () {
        $('form.checkout_coupon input[name="coupon_code"]').val($(this).val());
        console.log($(this).val()); // Uncomment for testing
    });

    // On button click, submit WooCommerce hidden default coupon form
    $('.coupon-form button[name="apply_coupon"]').on('click', function () {
        $('form.checkout_coupon').submit();
        console.log('click: submit form'); // Uncomment for testing
    });

});