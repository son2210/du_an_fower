//Slider
jQuery('.feature-post-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    arrows: true,
    dots: true,
    loop:true,
    autoplaySpeed: 5000,
    responsive: [{
            breakpoint: 1030,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        },
        {
            breakpoint: 900,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

jQuery('.slider-post-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    dots: true,
    autoplaySpeed: 5000
});


var slickrtl = false;

if(jQuery('body').hasClass('rtl')) {

    slickrtl = true

} 

jQuery('.feature-carousel-slider').slick({

    rtl: slickrtl,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    loop:true,
    cssEase: 'linear',
    dotsClass: 'custom_paging',
    customPaging: function(slider, i) {
        //FYI just have a look at the object to find available information
        //press f12 to access the console in most browsers
        //you could also debug or look in the source
        return '<span>' + '0' + (i + 1) + '</span>' + '<span>' + '0' + slider.slideCount + '</span>';
    }
});
jQuery('.slider-insta').slick({
    slidesToShow: 5,
    slidesToScroll: 1
});
jQuery('h4.title-bdr b').each(function() {
    var me = jQuery(this);
    me.html(me.html().replace(/^(\w+)/, '<span>$1</span>'));
});
jQuery(document).ready(function() {
    jQuery(".search-submit").wrap('<span class="search_btn"><i class="fas fa-search"></i></span>');
});



jQuery(document).ready(function() {
    jQuery('#btn-rollover, .menu-close-mobile, .overlay-body-nav').on("click", function(e) {
        e.preventDefault();

        jQuery('.navbar-moblie-custom').toggleClass('menu-active');
        jQuery('.overlay-body-nav').toggleClass('menu-active');
    });

    jQuery('.navbar-nav-mobile .menu-item-has-children > a').on("click", function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('subMenu-open');
        jQuery(this).parent().find('>ul').slideToggle(450);
    });

    jQuery('.sldm-widget-toggle').on("click", function(e) {
        e.preventDefault();
        jQuery(jQuery(this).data('target')).slideToggle(300);
    });
});

// ===== Scroll to Top ====
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) { // If page is scrolled more than 50px
        jQuery('#return-to-top').fadeIn(200); // Fade in the arrow
    } else {
        jQuery('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
});

jQuery('#return-to-top').on('click', function(e) {
    e.preventDefault();
    jQuery('body,html').animate({
        scrollTop: 0 // Scroll to top of body
    }, 500);
});


jQuery('#search_popup').on('click', function(e) {
    jQuery('#popup_search').focus()

});