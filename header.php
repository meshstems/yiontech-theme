<?php
/**
 * Header template
 */

$header_style = get_theme_mod('yiontech_header_style', 'default');
$elementor_header_id = get_theme_mod('yiontech_elementor_header_id', '');

// Check if we should use Elementor header
if ($header_style === 'elementor' && !empty($elementor_header_id)) {
    // Load Elementor header template
    get_template_part('templates/elementor-header');
    return;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php yiontech_custom_logo(); ?>
        </div>
        
        <nav id="site-navigation" class="main-navigation">
            <?php yiontech_primary_menu(); ?>
        </nav>
    </div>
</header>