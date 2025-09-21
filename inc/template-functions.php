<?php
/**
 * Template Functions
 */

// Custom logo
function yiontech_custom_logo() {
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    } else {
        $logo = get_theme_mod('yiontech_logo');
        if (!empty($logo)) {
            echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home"><img src="' . esc_url($logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="custom-logo"></a>';
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home">' . get_bloginfo('name') . '</a>';
        }
    }
}

// Primary menu
function yiontech_primary_menu() {
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'primary-menu',
        'container'      => false,
        'fallback_cb'    => 'yiontech_primary_menu_fallback',
    ));
}

function yiontech_primary_menu_fallback() {
    echo '<ul class="primary-menu">';
    echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add a menu', 'yiontech') . '</a></li>';
    echo '</ul>';
}

// Footer menu
function yiontech_footer_menu() {
    wp_nav_menu(array(
        'theme_location' => 'footer',
        'menu_class'     => 'footer-menu',
        'container'      => false,
        'fallback_cb'    => false,
    ));
}

// Pagination
function yiontech_pagination() {
    the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('&laquo; Previous', 'yiontech'),
        'next_text' => __('Next &raquo;', 'yiontech'),
    ));
}

// Post meta
function yiontech_post_meta() {
    echo '<div class="entry-meta">';
    echo '<span class="posted-on">' . __('Posted on', 'yiontech') . ' <time class="entry-date published" datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time></span>';
    echo '<span class="byline"> ' . __('by', 'yiontech') . ' <span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
    echo '</div>';
}

// Post thumbnail
function yiontech_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }
    
    echo '<div class="post-thumbnail">';
    the_post_thumbnail('large');
    echo '</div>';
}

// Entry footer
function yiontech_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'yiontech'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'yiontech') . '</span>', $categories_list); // WPCS: XSS OK.
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'yiontech'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'yiontech') . '</span>', $tags_list); // WPCS: XSS OK.
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'yiontech'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Edit <span class="screen-reader-text">%s</span>', 'yiontech'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
}