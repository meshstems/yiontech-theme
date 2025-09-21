<?php
get_header(); ?>

<div class="container">
    <div class="site-content">
        <div class="content-area">
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('content', get_post_type());

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'yiontech') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'yiontech') . '</span> <span class="nav-title">%title</span>',
                    )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div><!-- .content-area -->
        
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer();