<?php
/**
 * Plugin recommendation
 */

add_action('tgmpa_register', 'yiontech_register_required_plugins');

function yiontech_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Elementor',
            'slug'      => 'elementor',
            'required'  => true,
        ),
        array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => true,
        ),
        array(
            'name'      => 'Tutor LMS',
            'slug'      => 'tutor',
            'required'  => true,
        ),
        array(
            'name'      => 'Elementor Pro',
            'slug'      => 'elementor-pro',
            'source'    => 'https://yiontech.com/plugins/elementor-pro.zip',
            'required'  => false,
        ),
    );

    $config = array(
        'id'           => 'yiontech',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa($plugins, $config);
}