(function($) {
    'use strict';
    
    // Header style
    wp.customize('yiontech_header_style', function(value) {
        value.bind(function(newval) {
            // Update header style
            if (newval === 'elementor') {
                $('.site-header').addClass('elementor-header');
            } else {
                $('.site-header').removeClass('elementor-header');
            }
        });
    });
    
    // Footer style
    wp.customize('yiontech_footer_style', function(value) {
        value.bind(function(newval) {
            // Update footer style
            if (newval === 'elementor') {
                $('.site-footer').addClass('elementor-footer');
            } else {
                $('.site-footer').removeClass('elementor-footer');
            }
        });
    });
    
    // Hero title
    wp.customize('yiontech_hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').text(newval);
        });
    });
    
    // Hero description
    wp.customize('yiontech_hero_description', function(value) {
        value.bind(function(newval) {
            $('.hero-description').text(newval);
        });
    });
    
    // Hero primary button text
    wp.customize('yiontech_hero_primary_button_text', function(value) {
        value.bind(function(newval) {
            $('.hero-primary-button').text(newval);
        });
    });
    
    // Hero secondary button text
    wp.customize('yiontech_hero_secondary_button_text', function(value) {
        value.bind(function(newval) {
            $('.hero-secondary-button').text(newval);
        });
    });
    
    // Hero student count
    wp.customize('yiontech_hero_student_count', function(value) {
        value.bind(function(newval) {
            $('.student-count').text(newval);
        });
    });
    
    // Hero student text
    wp.customize('yiontech_hero_student_text', function(value) {
        value.bind(function(newval) {
            $('.student-text').text(newval);
        });
    });
    
})(jQuery);