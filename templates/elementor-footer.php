<?php
/**
 * Elementor Footer Template
 */

$elementor_footer_id = get_theme_mod('yiontech_elementor_footer_id', '');

if (!empty($elementor_footer_id)) {
    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($elementor_footer_id);
}