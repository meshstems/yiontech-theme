<?php
/**
 * YionTech Theme Functions
 */

// Define constants
define('YIONTECH_VERSION', '1.0.0');
define('YIONTECH_DIR', get_template_directory());
define('YIONTECH_URI', get_template_directory_uri());

// Theme setup
function yiontech_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Add Elementor support
    add_theme_support('elementor');
    add_theme_support('elementor-pro');
    add_theme_support('elementor-fit-to-top');
    add_theme_support('elementor-default-colors');
    
    // Add Tutor LMS support
    add_theme_support('tutor');
    
    // Add custom logo
    add_theme_support('custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'yiontech'),
        'footer'  => __('Footer Menu', 'yiontech'),
    ));
    
    // Add editor styles
    add_editor_style('assets/css/editor-style.css');
    
    // Add custom image sizes
    add_image_size('yiontech-course-thumb', 400, 300, true);
    add_image_size('yiontech-hero', 1920, 800, true);
}
add_action('after_setup_theme', 'yiontech_setup');

// Enqueue scripts and styles
function yiontech_scripts() {
    // Main stylesheet
    wp_enqueue_style('yiontech-style', get_stylesheet_uri(), array(), YIONTECH_VERSION);
    
    // WooCommerce styles
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('yiontech-woocommerce', YIONTECH_URI . '/assets/css/woocommerce.css', array('yiontech-style'), YIONTECH_VERSION);
    }
    
    // Tutor LMS styles
    if (function_exists('tutor')) {
        wp_enqueue_style('yiontech-tutor', YIONTECH_URI . '/assets/css/tutor.css', array('yiontech-style'), YIONTECH_VERSION);
    }
    
    // Elementor styles
    if (did_action('elementor/loaded')) {
        wp_enqueue_style('yiontech-elementor', YIONTECH_URI . '/assets/css/elementor.css', array('yiontech-style'), YIONTECH_VERSION);
    }
    
    // Elementor widgets styles
    if (did_action('elementor/loaded')) {
        wp_enqueue_style('yiontech-elementor-widgets', YIONTECH_URI . '/assets/css/elementor-widgets.css', array('yiontech-style'), YIONTECH_VERSION);
    }
    
    // Main script
    wp_enqueue_script('yiontech-main', YIONTECH_URI . '/assets/js/main.js', array('jquery'), YIONTECH_VERSION, true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'yiontech_scripts');

// Register widget areas
function yiontech_widgets_init() {
    // Sidebar
    register_sidebar(array(
        'name'          => __('Sidebar', 'yiontech'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'yiontech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    // Footer widgets
    register_sidebar(array(
        'name'          => __('Footer 1', 'yiontech'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'yiontech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'yiontech'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'yiontech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'yiontech'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'yiontech'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'yiontech_widgets_init');

// Include required files
require_once YIONTECH_DIR . '/inc/hooks.php';
require_once YIONTECH_DIR . '/inc/plugin-compat.php';
require_once YIONTECH_DIR . '/inc/template-functions.php';
require_once YIONTECH_DIR . '/inc/customizer/class-yiontech-customizer.php';
require_once YIONTECH_DIR . '/theme-settings.php';

// Register Elementor widgets
function yiontech_register_elementor_widgets() {
    require_once YIONTECH_DIR . '/inc/elementor-widgets/class-yiontech-course-card-widget.php';
    require_once YIONTECH_DIR . '/inc/elementor-widgets/class-yiontech-hero-section-widget.php';
    require_once YIONTECH_DIR . '/inc/elementor-widgets/class-yiontech-testimonials-widget.php';
    
    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\YionTech_Course_Card_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\YionTech_Hero_Section_Widget() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\YionTech_Testimonials_Widget() );
}
add_action('elementor/widgets/register', 'yiontech_register_elementor_widgets');

// Add custom widget category
function yiontech_add_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'yiontech-widgets',
        [
            'title' => __( 'YionTech Widgets', 'yiontech' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'yiontech_add_elementor_widget_categories');

// Enqueue Elementor widgets styles
function yiontech_enqueue_elementor_widgets_styles() {
    wp_enqueue_style('yiontech-elementor-widgets', YIONTECH_URI . '/assets/css/elementor-widgets.css', array(), YIONTECH_VERSION);
}
add_action('elementor/frontend/after_enqueue_styles', 'yiontech_enqueue_elementor_widgets_styles');

// TGMPA Plugin Activation
require_once YIONTECH_DIR . '/inc/tgm-plugin-activation.php';

// Set content width
if (!isset($content_width)) {
    $content_width = 1200;
}



