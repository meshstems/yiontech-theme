<?php
/**
 * Footer template
 */

$footer_style = get_theme_mod('yiontech_footer_style', 'default');
$elementor_footer_id = get_theme_mod('yiontech_elementor_footer_id', '');

// Check if we should use Elementor footer
if ($footer_style === 'elementor' && !empty($elementor_footer_id)) {
    // Load Elementor footer template
    get_template_part('templates/elementor-footer');
    return;
}
?>
<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="footer-widgets">
            <div class="footer-widget">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            
            <div class="footer-widget">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
            
            <div class="footer-widget">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
        </div>
        
        <div class="site-info">
            <?php yiontech_footer_menu(); ?>
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'yiontech'); ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>