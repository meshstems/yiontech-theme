(function($) {
    'use strict';
    
    // Mobile menu toggle
    $('.menu-toggle').on('click', function() {
        $('.main-navigation').toggleClass('toggled');
    });
    
    // Sticky header
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.site-header').addClass('sticky');
        } else {
            $('.site-header').removeClass('sticky');
        }
    });
    
    // Smooth scroll
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
                return false;
            }
        }
    });
    
    // Add animation to elements
    $('.animate-on-scroll').each(function() {
        var $this = $(this);
        
        $this.waypoint(function() {
            $this.addClass('animated');
        }, {
            offset: '80%'
        });
    });
    
})(jQuery);