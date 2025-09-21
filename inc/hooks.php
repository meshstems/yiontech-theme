<?php
/**
 * Theme hooks
 */

// Add body classes
function yiontech_body_classes($classes) {
    // Add class if using Elementor header
    if (get_theme_mod('yiontech_header_style', 'default') === 'elementor') {
        $classes[] = 'elementor-header-active';
    }
    
    // Add class if using Elementor footer
    if (get_theme_mod('yiontech_footer_style', 'default') === 'elementor') {
        $classes[] = 'elementor-footer-active';
    }
    
    // Add class if using prebuilt homepage
    if (is_front_page() && get_theme_mod('yiontech_use_prebuilt_homepage', false)) {
        $classes[] = 'prebuilt-homepage';
    }
    
    return $classes;
}
add_filter('body_class', 'yiontech_body_classes');

// Add custom logo support
function yiontech_custom_logo_setup() {
    $logo = get_theme_mod('yiontech_logo');
    if (!empty($logo)) {
        add_theme_support('custom-logo', array(
            'height'      => 50,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        ));
    }
}
add_action('after_setup_theme', 'yiontech_custom_logo_setup');

// Enqueue admin scripts
function yiontech_enqueue_admin_scripts($hook) {
    if ('appearance_page_yiontech-settings' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('yiontech-admin', YIONTECH_URI . '/assets/js/admin.js', array('jquery'), YIONTECH_VERSION, true);
    }
}
add_action('admin_enqueue_scripts', 'yiontech_enqueue_admin_scripts');