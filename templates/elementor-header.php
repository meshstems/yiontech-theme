<?php
/**
 * Elementor Header Template
 */

$elementor_header_id = get_theme_mod('yiontech_elementor_header_id', '');

if (!empty($elementor_header_id)) {
    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($elementor_header_id);
}