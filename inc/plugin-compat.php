<?php
/**
 * Plugin Compatibility Functions
 */

// WooCommerce Compatibility
function yiontech_woocommerce_setup() {
    // Remove default WooCommerce wrappers
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    
    // Add custom wrappers
    add_action('woocommerce_before_main_content', 'yiontech_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'yiontech_wrapper_end', 10);
    
    // Declare WooCommerce support
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'yiontech_woocommerce_setup');

function yiontech_wrapper_start() {
    echo '<div class="container"><div class="site-content"><div class="content-area">';
}

function yiontech_wrapper_end() {
    echo '</div>';
    get_sidebar();
    echo '</div></div>';
}

// Elementor Compatibility
function yiontech_elementor_setup() {
    // Add Elementor theme support
    add_theme_support('elementor-pro');
    add_theme_support('elementor-theme-builder');
    
    // Override Elementor location for header/footer
    if (did_action('elementor/loaded')) {
        add_action('elementor/theme/register_locations', function($elementor_theme_manager) {
            $elementor_theme_manager->register_location('header');
            $elementor_theme_manager->register_location('footer');
        });
    }
}
add_action('after_setup_theme', 'yiontech_elementor_setup');

// Tutor LMS Compatibility
function yiontech_tutor_setup() {
    // Remove default Tutor LMS wrappers
    remove_action('tutor_course/archive/before_loop', 'tutor_course_archive_before_loop', 10);
    remove_action('tutor_course/archive/after_loop', 'tutor_course_archive_after_loop', 10);
    
    // Add custom wrappers
    add_action('tutor_course/archive/before_loop', 'yiontech_wrapper_start', 10);
    add_action('tutor_course/archive/after_loop', 'yiontech_wrapper_end', 10);
    
    // Declare Tutor LMS support
    add_theme_support('tutor');
}
add_action('after_setup_theme', 'yiontech_tutor_setup');

// WPML Compatibility
function yiontech_wpml_setup() {
    // Add WPML support
    add_theme_support('wpml');
}
add_action('after_setup_theme', 'yiontech_wpml_setup');

// Yoast SEO Compatibility
function yiontech_yoast_setup() {
    // Add Yoast SEO breadcrumbs support
    add_theme_support('yoast-seo-breadcrumbs');
}
add_action('after_setup_theme', 'yiontech_yoast_setup');