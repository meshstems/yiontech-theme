<?php
/**
 * Main template file
 *
 * @package YionTech
 * @since 1.0.0
 */

get_header();

if (is_front_page() && get_theme_mod('yiontech_use_prebuilt_homepage', false)) {
    get_template_part('templates/prebuilt-homepage');
} else {
    ?>
    <div class="container">
        <div class="site-content">
            <div class="content-area">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php yiontech_post_thumbnail(); ?>
                            
                            <header class="entry-header">
                                <?php
                                if (is_singular()) :
                                    the_title('<h1 class="entry-title">', '</h1>');
                                else :
                                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                endif;
                                
                                yiontech_post_meta();
                                ?>
                            </header>
                            
                            <div class="entry-content">
                                <?php
                                the_content(sprintf(
                                    wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'yiontech'),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ));
                                
                                wp_link_pages(array(
                                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'yiontech'),
                                    'after'  => '</div>',
                                ));
                                ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    
                    <?php yiontech_pagination(); ?>
                    
                <?php else : ?>
                    <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'yiontech'); ?></p>
                <?php endif; ?>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
    <?php
}

get_footer();