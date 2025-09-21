<?php
get_header(); ?>

<div class="container">
    <div class="site-content">
        <div class="content-area">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Search Results for: %s', 'yiontech'), '<span>' . get_search_query() . '</span>');
                        ?>
                    </h1>
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part('content', 'search');

                endwhile;

                yiontech_pagination();

            else :
                get_template_part('content', 'none');

            endif;
            ?>
        </div><!-- .content-area -->
        
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer();