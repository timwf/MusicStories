jQuery(document).ready(function () {
    jQuery(".navbtn").click(function () {
        jQuery("body").toggleClass("menu-active");
        jQuery("header.header").toggleClass("header-menu-active");
        if (jQuery(".site-nav").is(':hidden')) {
            jQuery(".site-nav").slideDown();
        } else {
            jQuery(".site-nav").slideUp();
        }
        jQuery(this).toggleClass("is-active");
    });

    jQuery('.acc__title').click(function (j) {

        if (jQuery(this).next().is(":visible")) {
            jQuery(this).next().slideUp();
            jQuery(this).removeClass("active");
            // jQuery(this).closest("section").next().addClass("aos-animate");
        } else {
            jQuery(this).next().slideDown();
            jQuery(this).addClass("active");
        }

        setTimeout(function () {
            AOS.refresh();
        }, 300);
        j.preventDefault();
    });



    jQuery('.sub-filter > li > a').click(function (j) {
        jQuery(this).parent().toggleClass("active-item");
        
j.preventDefault();
    });


    jQuery('.story-filter > li > a').click(function (j) {

        if (jQuery(this).next().is(":visible")) {
            jQuery(this).next().slideUp();
            jQuery(this).removeClass("active");
            // jQuery(this).closest("section").next().addClass("aos-animate");
        } else {
            jQuery('.story-filter > li > a').removeClass("active");
            jQuery('.sub-filter-sec').slideUp();
            jQuery(this).next().slideDown();
            jQuery(this).addClass("active");
        }
j.preventDefault();
    });


    jQuery('.hero, .slider').slick({
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        arrows: false
    });


    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 150) {
            jQuery(".site-nav, .header").addClass("sticky");
            jQuery(".site-nav, .header").removeClass("notSticky");
        } else {
            jQuery(".site-nav, .header").removeClass("sticky");
            jQuery(".site-nav, .header").addClass("notSticky");
        }
    });

    if(jQuery(".acc__title").length > 0) {
        jQuery(".acc__title:first").addClass("active");
        jQuery(".acc__panel:first").show();
    }
    AOS.init({
        duration: 1000,
        delay: 300,
        once: true,
        // offset: 120,
        // placement: 'bottom'
    });
});









var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = jQuery('.site-nav').outerHeight();

jQuery(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = jQuery(this).scrollTop();
    
    // Make scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If scrolled down and past the navbar, add class .nav-up.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        jQuery('.header-wrapp').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + jQuery(window).height() < jQuery(document).height()) {
            jQuery('.header-wrapp').removeClass('nav-up').addClass('nav-down');
        }
    }
  
    lastScrollTop = st;
}