<?php
/**
 * YionTech Theme Settings
 */

// Create theme options page
function yiontech_theme_settings_page() {
    add_menu_page(
        __( 'YionTech Theme Settings', 'yiontech' ),
        __( 'YionTech Settings', 'yiontech' ),
        'manage_options',
        'yiontech-settings',
        'yiontech_theme_settings_page_html',
        'dashicons-admin-settings',
        60
    );
    
    // Add submenu pages
    add_submenu_page(
        'yiontech-settings',
        __( 'General Settings', 'yiontech' ),
        __( 'General', 'yiontech' ),
        'manage_options',
        'yiontech-settings',
        'yiontech_theme_settings_page_html'
    );
    
    add_submenu_page(
        'yiontech-settings',
        __( 'Header Settings', 'yiontech' ),
        __( 'Header', 'yiontech' ),
        'manage_options',
        'yiontech-header-settings',
        'yiontech_header_settings_page_html'
    );
    
    add_submenu_page(
        'yiontech-settings',
        __( 'Footer Settings', 'yiontech' ),
        __( 'Footer', 'yiontech' ),
        'manage_options',
        'yiontech-footer-settings',
        'yiontech_footer_settings_page_html'
    );
    
    add_submenu_page(
        'yiontech-settings',
        __( 'Homepage Settings', 'yiontech' ),
        __( 'Homepage', 'yiontech' ),
        'manage_options',
        'yiontech-homepage-settings',
        'yiontech_homepage_settings_page_html'
    );
    
    add_submenu_page(
        'yiontech-settings',
        __( 'Student Management', 'yiontech' ),
        __( 'Students', 'yiontech' ),
        'manage_options',
        'yiontech-student-management',
        'yiontech_student_management_page_html'
    );
    
    add_submenu_page(
        'yiontech-settings',
        __( 'Integration Settings', 'yiontech' ),
        __( 'Integration', 'yiontech' ),
        'manage_options',
        'yiontech-integration-settings',
        'yiontech_integration_settings_page_html'
    );
}
add_action('admin_menu', 'yiontech_theme_settings_page');

// Register theme settings
function yiontech_register_settings() {
    // General Settings
    register_setting('yiontech_general_settings_group', 'yiontech_logo');
    register_setting('yiontech_general_settings_group', 'yiontech_site_layout');
    register_setting('yiontech_general_settings_group', 'yiontech_primary_color');
    register_setting('yiontech_general_settings_group', 'yiontech_secondary_color');
    register_setting('yiontech_general_settings_group', 'yiontech_typography');
    register_setting('yiontech_general_settings_group', 'yiontech_enable_preloader');
    register_setting('yiontech_general_settings_group', 'yiontech_enable_back_to_top');
    
    // Header Settings
    register_setting('yiontech_header_settings_group', 'yiontech_header_style');
    register_setting('yiontech_header_settings_group', 'yiontech_elementor_header_id');
    register_setting('yiontech_header_settings_group', 'yiontech_header_transparent');
    register_setting('yiontech_header_settings_group', 'yiontech_header_sticky');
    
    // Footer Settings
    register_setting('yiontech_footer_settings_group', 'yiontech_footer_style');
    register_setting('yiontech_footer_settings_group', 'yiontech_elementor_footer_id');
    register_setting('yiontech_footer_settings_group', 'yiontech_footer_copyright_text');
    
    // Homepage Settings
    register_setting('yiontech_homepage_settings_group', 'yiontech_use_prebuilt_homepage');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_title');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_description');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_primary_button_text');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_primary_button_link');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_secondary_button_text');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_secondary_button_link');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_student_count');
    register_setting('yiontech_homepage_settings_group', 'yiontech_hero_student_text');
    register_setting('yiontech_homepage_settings_group', 'yiontech_features_title');
    register_setting('yiontech_homepage_settings_group', 'yiontech_courses_title');
    register_setting('yiontech_homepage_settings_group', 'yiontech_testimonials_title');
    
    // Student Management Settings
    register_setting('yiontech_student_settings_group', 'yiontech_enable_student_registration');
    register_setting('yiontech_student_settings_group', 'yiontech_student_approval_required');
    register_setting('yiontech_student_settings_group', 'yiontech_student_document_types');
    register_setting('yiontech_student_settings_group', 'yiontech_student_profile_fields');
    
    // Integration Settings
    register_setting('yiontech_integration_settings_group', 'yiontech_tutor_lms_integration');
    register_setting('yiontech_integration_settings_group', 'yiontech_elementor_integration');
    register_setting('yiontech_integration_settings_group', 'yiontech_woocommerce_integration');
    register_setting('yiontech_integration_settings_group', 'yiontech_other_lms_integration');
}
add_action('admin_init', 'yiontech_register_settings');

// Theme settings page HTML
function yiontech_theme_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings" class="active"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_general_settings_group');
                    do_settings_sections('yiontech_general_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Logo Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_logo"><?php _e('Site Logo', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <div class="yiontech-logo-preview">
                                        <?php
                                        $logo = get_theme_mod('yiontech_logo');
                                        if (!empty($logo)) {
                                            echo '<img src="' . esc_url($logo) . '" alt="' . esc_attr(get_bloginfo('name')) . '" />';
                                        }
                                        ?>
                                    </div>
                                    <input type="hidden" name="yiontech_logo" id="yiontech_logo" value="<?php echo esc_attr($logo); ?>" />
                                    <button type="button" class="button yiontech-upload-logo-button"><?php _e('Upload Logo', 'yiontech'); ?></button>
                                    <button type="button" class="button yiontech-remove-logo-button"><?php _e('Remove Logo', 'yiontech'); ?></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Layout Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_site_layout"><?php _e('Site Layout', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_site_layout" id="yiontech_site_layout">
                                        <option value="boxed" <?php selected(get_theme_mod('yiontech_site_layout', 'boxed'), 'boxed'); ?>><?php _e('Boxed Layout', 'yiontech'); ?></option>
                                        <option value="full-width" <?php selected(get_theme_mod('yiontech_site_layout', 'boxed'), 'full-width'); ?>><?php _e('Full Width Layout', 'yiontech'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Color Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_primary_color"><?php _e('Primary Color', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="color" name="yiontech_primary_color" id="yiontech_primary_color" value="<?php echo esc_attr(get_theme_mod('yiontech_primary_color', '#0073aa')); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_secondary_color"><?php _e('Secondary Color', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="color" name="yiontech_secondary_color" id="yiontech_secondary_color" value="<?php echo esc_attr(get_theme_mod('yiontech_secondary_color', '#ff6b6b')); ?>" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Typography Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_typography"><?php _e('Typography', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_typography" id="yiontech_typography">
                                        <option value="system" <?php selected(get_theme_mod('yiontech_typography', 'system'), 'system'); ?>><?php _e('System Fonts', 'yiontech'); ?></option>
                                        <option value="google" <?php selected(get_theme_mod('yiontech_typography', 'system'), 'google'); ?>><?php _e('Google Fonts', 'yiontech'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Feature Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_enable_preloader"><?php _e('Enable Preloader', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_enable_preloader" id="yiontech_enable_preloader" value="1" <?php checked(get_theme_mod('yiontech_enable_preloader', false), true); ?> />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_enable_back_to_top"><?php _e('Enable Back to Top Button', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_enable_back_to_top" id="yiontech_enable_back_to_top" value="1" <?php checked(get_theme_mod('yiontech_enable_back_to_top', true), true); ?> />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        jQuery(document).ready(function($) {
            // Logo upload
            $('.yiontech-upload-logo-button').click(function(e) {
                e.preventDefault();
                
                var image = wp.media({
                    title: '<?php _e('Upload Logo', 'yiontech'); ?>',
                    multiple: false
                }).open()
                .on('select', function() {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $('#yiontech_logo').val(image_url);
                    
                    // Update logo preview
                    var image_id = uploaded_image.toJSON().id;
                    var image_html = '<img src="' + image_url + '" alt="<?php _e('Logo', 'yiontech'); ?>" />';
                    $('.yiontech-logo-preview').html(image_html);
                });
            });
            
            // Logo remove
            $('.yiontech-remove-logo-button').click(function(e) {
                e.preventDefault();
                $('#yiontech_logo').val('');
                $('.yiontech-logo-preview').html('');
            });
        });
    </script>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
        
        .yiontech-logo-preview {
            margin-bottom: 10px;
            max-width: 200px;
            max-height: 100px;
            overflow: hidden;
        }
        
        .yiontech-logo-preview img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <?php
}

// Header settings page HTML
function yiontech_header_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings" class="active"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_header_settings_group');
                    do_settings_sections('yiontech_header_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Header Style', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_header_style"><?php _e('Header Style', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_header_style" id="yiontech_header_style">
                                        <option value="default" <?php selected(get_theme_mod('yiontech_header_style', 'default'), 'default'); ?>><?php _e('Default Header', 'yiontech'); ?></option>
                                        <option value="transparent" <?php selected(get_theme_mod('yiontech_header_style', 'default'), 'transparent'); ?>><?php _e('Transparent Header', 'yiontech'); ?></option>
                                        <option value="elementor" <?php selected(get_theme_mod('yiontech_header_style', 'default'), 'elementor'); ?>><?php _e('Elementor Header', 'yiontech'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Elementor Header Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_elementor_header_id"><?php _e('Select Elementor Header Template', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_elementor_header_id" id="yiontech_elementor_header_id">
                                        <option value=""><?php _e('Select a template', 'yiontech'); ?></option>
                                        <?php
                                        $elementor_templates = get_posts(array(
                                            'post_type' => 'elementor_library',
                                            'posts_per_page' => -1,
                                            'meta_query' => array(
                                                array(
                                                    'key' => '_elementor_template_type',
                                                    'value' => 'header',
                                                )
                                            )
                                        ));
                                        
                                        foreach ($elementor_templates as $template) {
                                            echo '<option value="' . esc_attr($template->ID) . '" ' . selected(get_theme_mod('yiontech_elementor_header_id', ''), $template->ID, false) . '>' . esc_html($template->post_title) . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="description"><?php _e('Select an Elementor header template to use as your site header.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Header Options', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_header_transparent"><?php _e('Transparent Header', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_header_transparent" id="yiontech_header_transparent" value="1" <?php checked(get_theme_mod('yiontech_header_transparent', false), true); ?> />
                                    <p class="description"><?php _e('Make the header transparent on homepage.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_header_sticky"><?php _e('Sticky Header', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_header_sticky" id="yiontech_header_sticky" value="1" <?php checked(get_theme_mod('yiontech_header_sticky', true), true); ?> />
                                    <p class="description"><?php _e('Make the header sticky when scrolling.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
    </style>
    <?php
}

// Footer settings page HTML
function yiontech_footer_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings" class="active"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_footer_settings_group');
                    do_settings_sections('yiontech_footer_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Footer Style', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_footer_style"><?php _e('Footer Style', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_footer_style" id="yiontech_footer_style">
                                        <option value="default" <?php selected(get_theme_mod('yiontech_footer_style', 'default'), 'default'); ?>><?php _e('Default Footer', 'yiontech'); ?></option>
                                        <option value="elementor" <?php selected(get_theme_mod('yiontech_footer_style', 'default'), 'elementor'); ?>><?php _e('Elementor Footer', 'yiontech'); ?></option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Elementor Footer Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_elementor_footer_id"><?php _e('Select Elementor Footer Template', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <select name="yiontech_elementor_footer_id" id="yiontech_elementor_footer_id">
                                        <option value=""><?php _e('Select a template', 'yiontech'); ?></option>
                                        <?php
                                        $elementor_templates = get_posts(array(
                                            'post_type' => 'elementor_library',
                                            'posts_per_page' => -1,
                                            'meta_query' => array(
                                                array(
                                                    'key' => '_elementor_template_type',
                                                    'value' => 'footer',
                                                )
                                            )
                                        ));
                                        
                                        foreach ($elementor_templates as $template) {
                                            echo '<option value="' . esc_attr($template->ID) . '" ' . selected(get_theme_mod('yiontech_elementor_footer_id', ''), $template->ID, false) . '>' . esc_html($template->post_title) . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="description"><?php _e('Select an Elementor footer template to use as your site footer.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Copyright Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_footer_copyright_text"><?php _e('Copyright Text', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_footer_copyright_text" id="yiontech_footer_copyright_text" value="<?php echo esc_attr(get_theme_mod('yiontech_footer_copyright_text', '© ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.')); ?>" class="regular-text" />
                                    <p class="description"><?php _e('Enter the copyright text for the footer.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
    </style>
    <?php
}

// Homepage settings page HTML
function yiontech_homepage_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings" class="active"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_homepage_settings_group');
                    do_settings_sections('yiontech_homepage_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Homepage Layout', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_use_prebuilt_homepage"><?php _e('Use Prebuilt Homepage', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_use_prebuilt_homepage" id="yiontech_use_prebuilt_homepage" value="1" <?php checked(get_theme_mod('yiontech_use_prebuilt_homepage', false), true); ?> />
                                    <p class="description"><?php _e('Check this box to use the prebuilt homepage template instead of the default WordPress homepage.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Hero Section Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_title"><?php _e('Hero Title', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_title" id="yiontech_hero_title" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_title', 'Welcome to Footprint School of Business')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_description"><?php _e('Hero Description', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <textarea name="yiontech_hero_description" id="yiontech_hero_description" rows="5" class="large-text"><?php echo esc_textarea(get_theme_mod('yiontech_hero_description', 'Transform your career with our industry-leading business courses designed for professionals.')); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_primary_button_text"><?php _e('Primary Button Text', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_primary_button_text" id="yiontech_hero_primary_button_text" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_primary_button_text', 'Start Learning Now')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_primary_button_link"><?php _e('Primary Button Link', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_primary_button_link" id="yiontech_hero_primary_button_link" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_primary_button_link', '#')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_secondary_button_text"><?php _e('Secondary Button Text', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_secondary_button_text" id="yiontech_hero_secondary_button_text" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_secondary_button_text', 'Enroll Now')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_secondary_button_link"><?php _e('Secondary Button Link', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_secondary_button_link" id="yiontech_hero_secondary_button_link" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_secondary_button_link', '#')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_student_count"><?php _e('Student Count', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_student_count" id="yiontech_hero_student_count" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_student_count', '12k+')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_hero_student_text"><?php _e('Student Text', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_hero_student_text" id="yiontech_hero_student_text" value="<?php echo esc_attr(get_theme_mod('yiontech_hero_student_text', 'Join happy students')); ?>" class="regular-text" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Section Titles', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_features_title"><?php _e('Features Section Title', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_features_title" id="yiontech_features_title" value="<?php echo esc_attr(get_theme_mod('yiontech_features_title', 'Why Choose Our Courses')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_courses_title"><?php _e('Courses Section Title', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_courses_title" id="yiontech_courses_title" value="<?php echo esc_attr(get_theme_mod('yiontech_courses_title', 'Popular Courses')); ?>" class="regular-text" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_testimonials_title"><?php _e('Testimonials Section Title', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="text" name="yiontech_testimonials_title" id="yiontech_testimonials_title" value="<?php echo esc_attr(get_theme_mod('yiontech_testimonials_title', 'What Our Students Say')); ?>" class="regular-text" />
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
    </style>
    <?php
}

// Student management page HTML
function yiontech_student_management_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management" class="active"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_student_settings_group');
                    do_settings_sections('yiontech_student_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Student Registration Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_enable_student_registration"><?php _e('Enable Student Registration', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_enable_student_registration" id="yiontech_enable_student_registration" value="1" <?php checked(get_theme_mod('yiontech_enable_student_registration', true), true); ?> />
                                    <p class="description"><?php _e('Allow students to register on your site.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_student_approval_required"><?php _e('Student Approval Required', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_student_approval_required" id="yiontech_student_approval_required" value="1" <?php checked(get_theme_mod('yiontech_student_approval_required', true), true); ?> />
                                    <p class="description"><?php _e('Require admin approval for new student registrations.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Student Document Settings', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_student_document_types"><?php _e('Document Types', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <textarea name="yiontech_student_document_types" id="yiontech_student_document_types" rows="5" class="large-text"><?php echo esc_textarea(get_theme_mod('yiontech_student_document_types', "Clearance Form\nStudent Handbook\nID Proof\nTranscript")); ?></textarea>
                                    <p class="description"><?php _e('Enter the document types that students can upload. One per line.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Student Profile Fields', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_student_profile_fields"><?php _e('Profile Fields', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <textarea name="yiontech_student_profile_fields" id="yiontech_student_profile_fields" rows="5" class="large-text"><?php echo esc_textarea(get_theme_mod('yiontech_student_profile_fields', "Student ID\nDepartment\nYear of Study\nPhone Number\nAddress")); ?></textarea>
                                    <p class="description"><?php _e('Enter additional profile fields for students. One per line.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
                
                <div class="yiontech-settings-section">
                    <h2><?php _e('Student Management', 'yiontech'); ?></h2>
                    <div class="yiontech-student-management">
                        <div class="tablenav top">
                            <div class="alignleft actions bulkactions">
                                <button type="button" class="button action" id="add-new-student"><?php _e('Add New Student', 'yiontech'); ?></button>
                            </div>
                            <br class="clear">
                        </div>
                        
                        <table class="wp-list-table widefat fixed striped students">
                            <thead>
                                <tr>
                                    <th scope="col" class="manage-column column-cb check-column">
                                        <input type="checkbox" id="cb-select-all-1">
                                    </th>
                                    <th scope="col" class="manage-column column-name"><?php _e('Name', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-email"><?php _e('Email', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-status"><?php _e('Status', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-date"><?php _e('Registration Date', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-actions"><?php _e('Actions', 'yiontech'); ?></th>
                                </tr>
                            </thead>
                            <tbody id="the-list">
                                <?php
                                $students = get_users(array('role' => 'student'));
                                foreach ($students as $student) {
                                    $status = get_user_meta($student->ID, 'student_status', true);
                                    $status = empty($status) ? 'pending' : $status;
                                    ?>
                                    <tr>
                                        <th scope="row" class="check-column">
                                            <input type="checkbox" name="student[]" value="<?php echo esc_attr($student->ID); ?>">
                                        </th>
                                        <td class="column-name">
                                            <?php echo esc_html($student->display_name); ?>
                                        </td>
                                        <td class="column-email">
                                            <?php echo esc_html($student->user_email); ?>
                                        </td>
                                        <td class="column-status">
                                            <span class="status-<?php echo esc_attr($status); ?>"><?php echo esc_html(ucfirst($status)); ?></span>
                                        </td>
                                        <td class="column-date">
                                            <?php echo esc_html(date_i18n(get_option('date_format'), strtotime($student->user_registered))); ?>
                                        </td>
                                        <td class="column-actions">
                                            <a href="#" class="button view-student" data-student-id="<?php echo esc_attr($student->ID); ?>"><?php _e('View', 'yiontech'); ?></a>
                                            <a href="#" class="button edit-student" data-student-id="<?php echo esc_attr($student->ID); ?>"><?php _e('Edit', 'yiontech'); ?></a>
                                            <?php if ($status === 'pending') : ?>
                                                <a href="#" class="button approve-student" data-student-id="<?php echo esc_attr($student->ID); ?>"><?php _e('Approve', 'yiontech'); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col" class="manage-column column-cb check-column">
                                        <input type="checkbox" id="cb-select-all-2">
                                    </th>
                                    <th scope="col" class="manage-column column-name"><?php _e('Name', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-email"><?php _e('Email', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-status"><?php _e('Status', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-date"><?php _e('Registration Date', 'yiontech'); ?></th>
                                    <th scope="col" class="manage-column column-actions"><?php _e('Actions', 'yiontech'); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add Student Modal -->
    <div id="add-student-modal" class="yiontech-modal" style="display:none;">
        <div class="yiontech-modal-content">
            <div class="yiontech-modal-header">
                <h2><?php _e('Add New Student', 'yiontech'); ?></h2>
                <button type="button" class="yiontech-modal-close">&times;</button>
            </div>
            <div class="yiontech-modal-body">
                <form id="add-student-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student-first-name"><?php _e('First Name', 'yiontech'); ?></label>
                            <input type="text" name="first_name" id="student-first-name" required>
                        </div>
                        <div class="form-group">
                            <label for="student-last-name"><?php _e('Last Name', 'yiontech'); ?></label>
                            <input type="text" name="last_name" id="student-last-name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student-email"><?php _e('Email', 'yiontech'); ?></label>
                            <input type="email" name="email" id="student-email" required>
                        </div>
                        <div class="form-group">
                            <label for="student-phone"><?php _e('Phone', 'yiontech'); ?></label>
                            <input type="tel" name="phone" id="student-phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student-department"><?php _e('Department', 'yiontech'); ?></label>
                            <input type="text" name="department" id="student-department">
                        </div>
                        <div class="form-group">
                            <label for="student-year"><?php _e('Year of Study', 'yiontech'); ?></label>
                            <select name="year" id="student-year">
                                <option value=""><?php _e('Select Year', 'yiontech'); ?></option>
                                <option value="1"><?php _e('1st Year', 'yiontech'); ?></option>
                                <option value="2"><?php _e('2nd Year', 'yiontech'); ?></option>
                                <option value="3"><?php _e('3rd Year', 'yiontech'); ?></option>
                                <option value="4"><?php _e('4th Year', 'yiontech'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student-address"><?php _e('Address', 'yiontech'); ?></label>
                            <textarea name="address" id="student-address" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="student-password"><?php _e('Password', 'yiontech'); ?></label>
                            <input type="password" name="password" id="student-password" required>
                        </div>
                        <div class="form-group">
                            <label for="student-confirm-password"><?php _e('Confirm Password', 'yiontech'); ?></label>
                            <input type="password" name="confirm_password" id="student-confirm-password" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="button button-primary"><?php _e('Add Student', 'yiontech'); ?></button>
                        <button type="button" class="button yiontech-modal-close"><?php _e('Cancel', 'yiontech'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- View Student Modal -->
    <div id="view-student-modal" class="yiontech-modal" style="display:none;">
        <div class="yiontech-modal-content">
            <div class="yiontech-modal-header">
                <h2><?php _e('Student Details', 'yiontech'); ?></h2>
                <button type="button" class="yiontech-modal-close">&times;</button>
            </div>
            <div class="yiontech-modal-body">
                <div id="student-details-content"></div>
            </div>
        </div>
    </div>
    
    <!-- Edit Student Modal -->
    <div id="edit-student-modal" class="yiontech-modal" style="display:none;">
        <div class="yiontech-modal-content">
            <div class="yiontech-modal-header">
                <h2><?php _e('Edit Student', 'yiontech'); ?></h2>
                <button type="button" class="yiontech-modal-close">&times;</button>
            </div>
            <div class="yiontech-modal-body">
                <form id="edit-student-form">
                    <input type="hidden" name="student_id" id="edit-student-id">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit-student-first-name"><?php _e('First Name', 'yiontech'); ?></label>
                            <input type="text" name="first_name" id="edit-student-first-name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-student-last-name"><?php _e('Last Name', 'yiontech'); ?></label>
                            <input type="text" name="last_name" id="edit-student-last-name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit-student-email"><?php _e('Email', 'yiontech'); ?></label>
                            <input type="email" name="email" id="edit-student-email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-student-phone"><?php _e('Phone', 'yiontech'); ?></label>
                            <input type="tel" name="phone" id="edit-student-phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit-student-department"><?php _e('Department', 'yiontech'); ?></label>
                            <input type="text" name="department" id="edit-student-department">
                        </div>
                        <div class="form-group">
                            <label for="edit-student-year"><?php _e('Year of Study', 'yiontech'); ?></label>
                            <select name="year" id="edit-student-year">
                                <option value=""><?php _e('Select Year', 'yiontech'); ?></option>
                                <option value="1"><?php _e('1st Year', 'yiontech'); ?></option>
                                <option value="2"><?php _e('2nd Year', 'yiontech'); ?></option>
                                <option value="3"><?php _e('3rd Year', 'yiontech'); ?></option>
                                <option value="4"><?php _e('4th Year', 'yiontech'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit-student-address"><?php _e('Address', 'yiontech'); ?></label>
                            <textarea name="address" id="edit-student-address" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit-student-status"><?php _e('Status', 'yiontech'); ?></label>
                            <select name="status" id="edit-student-status">
                                <option value="pending"><?php _e('Pending', 'yiontech'); ?></option>
                                <option value="approved"><?php _e('Approved', 'yiontech'); ?></option>
                                <option value="rejected"><?php _e('Rejected', 'yiontech'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="button button-primary"><?php _e('Update Student', 'yiontech'); ?></button>
                        <button type="button" class="button yiontech-modal-close"><?php _e('Cancel', 'yiontech'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
        
        .yiontech-student-management {
            margin-top: 20px;
        }
        
        .status-pending {
            color: #ffb900;
        }
        
        .status-approved {
            color: #46b450;
        }
        
        .status-rejected {
            color: #dc3232;
        }
        
        /* Modal Styles */
        .yiontech-modal {
            position: fixed;
            z-index: 100000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        
        .yiontech-modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
            border-radius: 4px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
        
        .yiontech-modal-header {
            padding: 15px 20px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 4px 4px 0 0;
        }
        
        .yiontech-modal-header h2 {
            margin: 0;
            font-size: 1.25rem;
            color: #23282d;
        }
        
        .yiontech-modal-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }
        
        .yiontech-modal-close:hover,
        .yiontech-modal-close:focus {
            color: #000;
            text-decoration: none;
        }
        
        .yiontech-modal-body {
            padding: 20px;
        }
        
        .form-row {
            display: flex;
            margin-bottom: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
            margin-right: 15px;
        }
        
        .form-row .form-group:last-child {
            margin-right: 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .form-actions {
            margin-top: 20px;
            text-align: right;
        }
        
        .form-actions .button {
            margin-left: 10px;
        }
    </style>
    
    <script>
        jQuery(document).ready(function($) {
            // Modal functionality
            $('.yiontech-modal-close').on('click', function() {
                $(this).closest('.yiontech-modal').hide();
            });
            
            // Add Student Modal
            $('#add-new-student').on('click', function(e) {
                e.preventDefault();
                $('#add-student-modal').show();
            });
            
            // View Student Modal
            $('.view-student').on('click', function(e) {
                e.preventDefault();
                var studentId = $(this).data('student-id');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'yiontech_get_student_details',
                        student_id: studentId,
                        nonce: '<?php echo wp_create_nonce('yiontech_student_nonce'); ?>'
                    },
                    success: function(response) {
                        $('#student-details-content').html(response);
                        $('#view-student-modal').show();
                    }
                });
            });
            
            // Edit Student Modal
            $('.edit-student').on('click', function(e) {
                e.preventDefault();
                var studentId = $(this).data('student-id');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'yiontech_get_student_data',
                        student_id: studentId,
                        nonce: '<?php echo wp_create_nonce('yiontech_student_nonce'); ?>'
                    },
                    success: function(response) {
                        var student = JSON.parse(response);
                        
                        $('#edit-student-id').val(student.ID);
                        $('#edit-student-first-name').val(student.first_name);
                        $('#edit-student-last-name').val(student.last_name);
                        $('#edit-student-email').val(student.user_email);
                        $('#edit-student-phone').val(student.phone);
                        $('#edit-student-department').val(student.department);
                        $('#edit-student-year').val(student.year);
                        $('#edit-student-address').val(student.address);
                        $('#edit-student-status').val(student.status);
                        
                        $('#edit-student-modal').show();
                    }
                });
            });
            
            // Approve Student
            $('.approve-student').on('click', function(e) {
                e.preventDefault();
                var studentId = $(this).data('student-id');
                
                if (confirm('<?php _e('Are you sure you want to approve this student?', 'yiontech'); ?>')) {
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'yiontech_approve_student',
                            student_id: studentId,
                            nonce: '<?php echo wp_create_nonce('yiontech_student_nonce'); ?>'
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            } else {
                                alert('<?php _e('An error occurred. Please try again.', 'yiontech'); ?>');
                            }
                        }
                    });
                }
            });
            
            // Add Student Form
            $('#add-student-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'yiontech_add_student',
                        form_data: formData,
                        nonce: '<?php echo wp_create_nonce('yiontech_student_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });
            
            // Edit Student Form
            $('#edit-student-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'yiontech_update_student',
                        form_data: formData,
                        nonce: '<?php echo wp_create_nonce('yiontech_student_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });
        });
    </script>
    <?php
}

// Integration settings page HTML
function yiontech_integration_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap yiontech-settings-page">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="yiontech-settings-wrapper">
            <div class="yiontech-settings-sidebar">
                <ul>
                    <li><a href="?page=yiontech-settings"><?php _e('General', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-header-settings"><?php _e('Header', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-footer-settings"><?php _e('Footer', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-homepage-settings"><?php _e('Homepage', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-student-management"><?php _e('Students', 'yiontech'); ?></a></li>
                    <li><a href="?page=yiontech-integration-settings" class="active"><?php _e('Integration', 'yiontech'); ?></a></li>
                </ul>
            </div>
            
            <div class="yiontech-settings-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('yiontech_integration_settings_group');
                    do_settings_sections('yiontech_integration_settings_group');
                    ?>
                    
                    <div class="yiontech-settings-section">
                        <h2><?php _e('Plugin Integration', 'yiontech'); ?></h2>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_tutor_lms_integration"><?php _e('Tutor LMS Integration', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_tutor_lms_integration" id="yiontech_tutor_lms_integration" value="1" <?php checked(get_theme_mod('yiontech_tutor_lms_integration', true), true); ?> />
                                    <p class="description"><?php _e('Enable integration with Tutor LMS plugin for course management.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_elementor_integration"><?php _e('Elementor Integration', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_elementor_integration" id="yiontech_elementor_integration" value="1" <?php checked(get_theme_mod('yiontech_elementor_integration', true), true); ?> />
                                    <p class="description"><?php _e('Enable integration with Elementor page builder.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_woocommerce_integration"><?php _e('WooCommerce Integration', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_woocommerce_integration" id="yiontech_woocommerce_integration" value="1" <?php checked(get_theme_mod('yiontech_woocommerce_integration', true), true); ?> />
                                    <p class="description"><?php _e('Enable integration with WooCommerce for selling courses.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="yiontech_other_lms_integration"><?php _e('Other LMS Integration', 'yiontech'); ?></label>
                                </th>
                                <td>
                                    <input type="checkbox" name="yiontech_other_lms_integration" id="yiontech_other_lms_integration" value="1" <?php checked(get_theme_mod('yiontech_other_lms_integration', false), true); ?> />
                                    <p class="description"><?php _e('Enable integration with other LMS plugins.', 'yiontech'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php submit_button(); ?>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .yiontech-settings-page {
            max-width: 1200px;
            margin: 20px 0;
        }
        
        .yiontech-settings-wrapper {
            display: flex;
            background: #fff;
            border: 1px solid #e5e5e5;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
        }
        
        .yiontech-settings-sidebar {
            width: 200px;
            background: #f9f9f9;
            border-right: 1px solid #e5e5e5;
            padding: 20px 0;
        }
        
        .yiontech-settings-sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .yiontech-settings-sidebar li {
            margin: 0;
        }
        
        .yiontech-settings-sidebar a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-left: 3px solid transparent;
        }
        
        .yiontech-settings-sidebar a:hover,
        .yiontech-settings-sidebar a.active {
            background: #f1f1f1;
            color: #0073aa;
            border-left-color: #0073aa;
        }
        
        .yiontech-settings-content {
            flex: 1;
            padding: 20px 30px;
        }
        
        .yiontech-settings-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .yiontech-settings-section:last-child {
            border-bottom: none;
        }
        
        .yiontech-settings-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #23282d;
        }
    </style>
    <?php
}

// AJAX handlers for student management
function yiontech_get_student_details() {
    check_ajax_referer('yiontech_student_nonce', 'nonce');
    
    $student_id = intval($_POST['student_id']);
    $student = get_user_by('id', $student_id);
    
    if (!$student) {
        wp_send_json_error(__('Student not found.', 'yiontech'));
    }
    
    $student_data = array(
        'ID' => $student->ID,
        'first_name' => get_user_meta($student->ID, 'first_name', true),
        'last_name' => get_user_meta($student->ID, 'last_name', true),
        'email' => $student->user_email,
        'phone' => get_user_meta($student->ID, 'phone', true),
        'department' => get_user_meta($student->ID, 'department', true),
        'year' => get_user_meta($student->ID, 'year', true),
        'address' => get_user_meta($student->ID, 'address', true),
        'status' => get_user_meta($student->ID, 'student_status', true),
        'registration_date' => $student->user_registered,
        'documents' => get_user_meta($student->ID, 'student_documents', true),
    );
    
    ob_start();
    ?>
    <div class="student-details">
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Name:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['first_name'] . ' ' . $student_data['last_name']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Email:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['email']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Phone:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['phone']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Department:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['department']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Year of Study:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['year']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Address:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html($student_data['address']); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Status:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html(ucfirst($student_data['status'])); ?></div>
        </div>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Registration Date:', 'yiontech'); ?></div>
            <div class="student-detail-value"><?php echo esc_html(date_i18n(get_option('date_format'), strtotime($student_data['registration_date']))); ?></div>
        </div>
        
        <?php if (!empty($student_data['documents'])) : ?>
        <div class="student-detail-row">
            <div class="student-detail-label"><?php _e('Documents:', 'yiontech'); ?></div>
            <div class="student-detail-value">
                <ul>
                    <?php foreach ($student_data['documents'] as $document) : ?>
                    <li>
                        <a href="<?php echo esc_url($document['url']); ?>" target="_blank"><?php echo esc_html($document['name']); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <style>
        .student-details {
            padding: 10px 0;
        }
        
        .student-detail-row {
            display: flex;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        
        .student-detail-row:last-child {
            border-bottom: none;
        }
        
        .student-detail-label {
            width: 150px;
            font-weight: 600;
        }
        
        .student-detail-value {
            flex: 1;
        }
        
        .student-detail-value ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success($html);
}
add_action('wp_ajax_yiontech_get_student_details', 'yiontech_get_student_details');

function yiontech_get_student_data() {
    check_ajax_referer('yiontech_student_nonce', 'nonce');
    
    $student_id = intval($_POST['student_id']);
    $student = get_user_by('id', $student_id);
    
    if (!$student) {
        wp_send_json_error(__('Student not found.', 'yiontech'));
    }
    
    $student_data = array(
        'ID' => $student->ID,
        'first_name' => get_user_meta($student->ID, 'first_name', true),
        'last_name' => get_user_meta($student->ID, 'last_name', true),
        'user_email' => $student->user_email,
        'phone' => get_user_meta($student->ID, 'phone', true),
        'department' => get_user_meta($student->ID, 'department', true),
        'year' => get_user_meta($student->ID, 'year', true),
        'address' => get_user_meta($student->ID, 'address', true),
        'status' => get_user_meta($student->ID, 'student_status', true),
    );
    
    wp_send_json_success($student_data);
}
add_action('wp_ajax_yiontech_get_student_data', 'yiontech_get_student_data');

function yiontech_approve_student() {
    check_ajax_referer('yiontech_student_nonce', 'nonce');
    
    $student_id = intval($_POST['student_id']);
    $student = get_user_by('id', $student_id);
    
    if (!$student) {
        wp_send_json_error(__('Student not found.', 'yiontech'));
    }
    
    update_user_meta($student_id, 'student_status', 'approved');
    
    // Send approval email
    $to = $student->user_email;
    $subject = __('Your Account Has Been Approved', 'yiontech');
    $message = __('Dear student,', 'yiontech') . "\n\n";
    $message .= __('Your account has been approved. You can now log in to your account.', 'yiontech') . "\n\n";
    $message .= __('Login URL:', 'yiontech') . ' ' . wp_login_url() . "\n\n";
    $message .= __('Thank you,', 'yiontech') . "\n";
    $message .= get_bloginfo('name');
    
    wp_mail($to, $subject, $message);
    
    wp_send_json_success();
}
add_action('wp_ajax_yiontech_approve_student', 'yiontech_approve_student');

function yiontech_add_student() {
    check_ajax_referer('yiontech_student_nonce', 'nonce');
    
    parse_str($_POST['form_data'], $form_data);
    
    $first_name = sanitize_text_field($form_data['first_name']);
    $last_name = sanitize_text_field($form_data['last_name']);
    $email = sanitize_email($form_data['email']);
    $phone = sanitize_text_field($form_data['phone']);
    $department = sanitize_text_field($form_data['department']);
    $year = sanitize_text_field($form_data['year']);
    $address = sanitize_textarea_field($form_data['address']);
    $password = $form_data['password'];
    $confirm_password = $form_data['confirm_password'];
    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        wp_send_json_error(__('Please fill in all required fields.', 'yiontech'));
    }
    
    if ($password !== $confirm_password) {
        wp_send_json_error(__('Passwords do not match.', 'yiontech'));
    }
    
    if (email_exists($email)) {
        wp_send_json_error(__('Email already exists.', 'yiontech'));
    }
    
    $user_id = wp_create_user($email, $password, $email);
    
    if (is_wp_error($user_id)) {
        wp_send_json_error($user_id->get_error_message());
    }
    
    // Update user meta
    update_user_meta($user_id, 'first_name', $first_name);
    update_user_meta($user_id, 'last_name', $last_name);
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'department', $department);
    update_user_meta($user_id, 'year', $year);
    update_user_meta($user_id, 'address', $address);
    update_user_meta($user_id, 'student_status', 'pending');
    
    // Set user role
    $user = new WP_User($user_id);
    $user->set_role('student');
    
    wp_send_json_success();
}
add_action('wp_ajax_yiontech_add_student', 'yiontech_add_student');

function yiontech_update_student() {
    check_ajax_referer('yiontech_student_nonce', 'nonce');
    
    parse_str($_POST['form_data'], $form_data);
    
    $student_id = intval($form_data['student_id']);
    $first_name = sanitize_text_field($form_data['first_name']);
    $last_name = sanitize_text_field($form_data['last_name']);
    $email = sanitize_email($form_data['email']);
    $phone = sanitize_text_field($form_data['phone']);
    $department = sanitize_text_field($form_data['department']);
    $year = sanitize_text_field($form_data['year']);
    $address = sanitize_textarea_field($form_data['address']);
    $status = sanitize_text_field($form_data['status']);
    
    if (empty($first_name) || empty($last_name) || empty($email)) {
        wp_send_json_error(__('Please fill in all required fields.', 'yiontech'));
    }
    
    $student = get_user_by('id', $student_id);
    
    if (!$student) {
        wp_send_json_error(__('Student not found.', 'yiontech'));
    }
    
    // Update user data
    wp_update_user(array(
        'ID' => $student_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'user_email' => $email,
    ));
    
    // Update user meta
    update_user_meta($student_id, 'phone', $phone);
    update_user_meta($student_id, 'department', $department);
    update_user_meta($student_id, 'year', $year);
    update_user_meta($student_id, 'address', $address);
    update_user_meta($student_id, 'student_status', $status);
    
    wp_send_json_success();
}
add_action('wp_ajax_yiontech_update_student', 'yiontech_update_student');

// Add student role on theme activation
function yiontech_add_student_role() {
    add_role(
        'student',
        __('Student', 'yiontech'),
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
        )
    );
}
add_action('after_switch_theme', 'yiontech_add_student_role');

// Create student registration form
function yiontech_student_registration_form() {
    if (!get_theme_mod('yiontech_enable_student_registration', true)) {
        return;
    }
    
    if (is_user_logged_in()) {
        return;
    }
    ?>
    <div class="yiontech-student-registration">
        <h2><?php _e('Student Registration', 'yiontech'); ?></h2>
        <form id="student-registration-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="reg-first-name"><?php _e('First Name', 'yiontech'); ?></label>
                    <input type="text" name="first_name" id="reg-first-name" required>
                </div>
                <div class="form-group">
                    <label for="reg-last-name"><?php _e('Last Name', 'yiontech'); ?></label>
                    <input type="text" name="last_name" id="reg-last-name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="reg-email"><?php _e('Email', 'yiontech'); ?></label>
                    <input type="email" name="email" id="reg-email" required>
                </div>
                <div class="form-group">
                    <label for="reg-phone"><?php _e('Phone', 'yiontech'); ?></label>
                    <input type="tel" name="phone" id="reg-phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="reg-department"><?php _e('Department', 'yiontech'); ?></label>
                    <input type="text" name="department" id="reg-department">
                </div>
                <div class="form-group">
                    <label for="reg-year"><?php _e('Year of Study', 'yiontech'); ?></label>
                    <select name="year" id="reg-year">
                        <option value=""><?php _e('Select Year', 'yiontech'); ?></option>
                        <option value="1"><?php _e('1st Year', 'yiontech'); ?></option>
                        <option value="2"><?php _e('2nd Year', 'yiontech'); ?></option>
                        <option value="3"><?php _e('3rd Year', 'yiontech'); ?></option>
                        <option value="4"><?php _e('4th Year', 'yiontech'); ?></option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="reg-address"><?php _e('Address', 'yiontech'); ?></label>
                    <textarea name="address" id="reg-address" rows="3"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="reg-password"><?php _e('Password', 'yiontech'); ?></label>
                    <input type="password" name="password" id="reg-password" required>
                </div>
                <div class="form-group">
                    <label for="reg-confirm-password"><?php _e('Confirm Password', 'yiontech'); ?></label>
                    <input type="password" name="confirm_password" id="reg-confirm-password" required>
                </div>
            </div>
            
            <?php
            $document_types = get_theme_mod('yiontech_student_document_types', "Clearance Form\nStudent Handbook\nID Proof\nTranscript");
            $document_types = explode("\n", $document_types);
            
            if (!empty($document_types)) :
            ?>
            <div class="form-row">
                <div class="form-group">
                    <label><?php _e('Upload Documents', 'yiontech'); ?></label>
                    <?php foreach ($document_types as $document_type) : ?>
                    <div class="document-upload">
                        <label><?php echo esc_html(trim($document_type)); ?></label>
                        <input type="file" name="documents[]" data-document-type="<?php echo esc_attr(trim($document_type)); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="form-actions">
                <button type="submit" class="button button-primary"><?php _e('Register', 'yiontech'); ?></button>
            </div>
        </form>
        
        <div id="registration-message"></div>
    </div>
    
    <script>
        jQuery(document).ready(function($) {
            $('#student-registration-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append('action', 'yiontech_student_registration');
                formData.append('nonce', '<?php echo wp_create_nonce('yiontech_student_registration_nonce'); ?>');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#registration-message').html('<div class="success">' + response.data + '</div>');
                            $('#student-registration-form')[0].reset();
                        } else {
                            $('#registration-message').html('<div class="error">' + response.data + '</div>');
                        }
                    }
                });
            });
        });
    </script>
    
    <style>
        .yiontech-student-registration {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .yiontech-student-registration h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .yiontech-student-registration .form-row {
            display: flex;
            margin-bottom: 15px;
        }
        
        .yiontech-student-registration .form-group {
            flex: 1;
            margin-right: 15px;
        }
        
        .yiontech-student-registration .form-group:last-child {
            margin-right: 0;
        }
        
        .yiontech-student-registration .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .yiontech-student-registration .form-group input,
        .yiontech-student-registration .form-group select,
        .yiontech-student-registration .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .yiontech-student-registration .document-upload {
            margin-bottom: 10px;
        }
        
        .yiontech-student-registration .document-upload label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .yiontech-student-registration .form-actions {
            margin-top: 20px;
            text-align: center;
        }
        
        .yiontech-student-registration #registration-message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }
        
        .yiontech-student-registration #registration-message.success {
            background-color: #d4edda;
            color: #155724;
        }
        
        .yiontech-student-registration #registration-message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <?php
}
add_shortcode('student_registration_form', 'yiontech_student_registration_form');

// Handle student registration
function yiontech_handle_student_registration() {
    check_ajax_referer('yiontech_student_registration_nonce', 'nonce');
    
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $department = sanitize_text_field($_POST['department']);
    $year = sanitize_text_field($_POST['year']);
    $address = sanitize_textarea_field($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        wp_send_json_error(__('Please fill in all required fields.', 'yiontech'));
    }
    
    if ($password !== $confirm_password) {
        wp_send_json_error(__('Passwords do not match.', 'yiontech'));
    }
    
    if (email_exists($email)) {
        wp_send_json_error(__('Email already exists.', 'yiontech'));
    }
    
    $user_id = wp_create_user($email, $password, $email);
    
    if (is_wp_error($user_id)) {
        wp_send_json_error($user_id->get_error_message());
    }
    
    // Update user meta
    update_user_meta($user_id, 'first_name', $first_name);
    update_user_meta($user_id, 'last_name', $last_name);
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'department', $department);
    update_user_meta($user_id, 'year', $year);
    update_user_meta($user_id, 'address', $address);
    update_user_meta($user_id, 'student_status', 'pending');
    
    // Set user role
    $user = new WP_User($user_id);
    $user->set_role('student');
    
    // Handle document uploads
    if (!empty($_FILES['documents'])) {
        $documents = array();
        
        foreach ($_FILES['documents']['name'] as $key => $name) {
            if (!empty($name)) {
                $file = array(
                    'name' => $_FILES['documents']['name'][$key],
                    'type' => $_FILES['documents']['type'][$key],
                    'tmp_name' => $_FILES['documents']['tmp_name'][$key],
                    'error' => $_FILES['documents']['error'][$key],
                    'size' => $_FILES['documents']['size'][$key],
                );
                
                $upload = wp_handle_upload($file, array('test_form' => false));
                
                if (isset($upload['file'])) {
                    $document_type = sanitize_text_field($_POST['document_types'][$key]);
                    $documents[] = array(
                        'name' => $document_type,
                        'url' => $upload['url'],
                    );
                }
            }
        }
        
        if (!empty($documents)) {
            update_user_meta($user_id, 'student_documents', $documents);
        }
    }
    
    // Send notification email to admin
    $admin_email = get_option('admin_email');
    $subject = __('New Student Registration', 'yiontech');
    $message = __('A new student has registered on your site.', 'yiontech') . "\n\n";
    $message .= __('Name:', 'yiontech') . ' ' . $first_name . ' ' . $last_name . "\n";
    $message .= __('Email:', 'yiontech') . ' ' . $email . "\n";
    $message .= __('Department:', 'yiontech') . ' ' . $department . "\n";
    $message .= __('Year of Study:', 'yiontech') . ' ' . $year . "\n\n";
    $message .= __('Please review and approve the student account:', 'yiontech') . ' ' . admin_url('admin.php?page=yiontech-student-management') . "\n\n";
    $message .= __('Thank you,', 'yiontech') . "\n";
    $message .= get_bloginfo('name');
    
    wp_mail($admin_email, $subject, $message);
    
    // Send confirmation email to student
    $to = $email;
    $subject = __('Registration Successful', 'yiontech');
    $message = __('Dear student,', 'yiontech') . "\n\n";
    $message .= __('Thank you for registering on our site.', 'yiontech') . "\n\n";
    
    if (get_theme_mod('yiontech_student_approval_required', true)) {
        $message .= __('Your account is currently pending approval. You will receive an email once your account has been approved.', 'yiontech') . "\n\n";
    } else {
        $message .= __('Your account has been created successfully. You can now log in to your account.', 'yiontech') . "\n\n";
        $message .= __('Login URL:', 'yiontech') . ' ' . wp_login_url() . "\n\n";
    }
    
    $message .= __('Thank you,', 'yiontech') . "\n";
    $message .= get_bloginfo('name');
    
    wp_mail($to, $subject, $message);
    
    wp_send_json_success(__('Registration successful. Please check your email for further instructions.', 'yiontech'));
}
add_action('wp_ajax_yiontech_student_registration', 'yiontech_handle_student_registration');
add_action('wp_ajax_nopriv_yiontech_student_registration', 'yiontech_handle_student_registration');

// Create student profile page
function yiontech_student_profile_page() {
    if (!is_user_logged_in()) {
        auth_redirect();
    }
    
    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    if (!in_array('student', (array) $user->roles)) {
        wp_redirect(home_url());
        exit;
    }
    
    $first_name = get_user_meta($user_id, 'first_name', true);
    $last_name = get_user_meta($user_id, 'last_name', true);
    $phone = get_user_meta($user_id, 'phone', true);
    $department = get_user_meta($user_id, 'department', true);
    $year = get_user_meta($user_id, 'year', true);
    $address = get_user_meta($user_id, 'address', true);
    $status = get_user_meta($user_id, 'student_status', true);
    $documents = get_user_meta($user_id, 'student_documents', true);
    
    get_header();
    ?>
    <div class="container">
        <div class="site-content">
            <div class="content-area">
                <div class="yiontech-student-profile">
                    <h1><?php _e('Student Profile', 'yiontech'); ?></h1>
                    
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <?php echo get_avatar($user_id, 100); ?>
                        </div>
                        <div class="profile-info">
                            <h2><?php echo esc_html($first_name . ' ' . $last_name); ?></h2>
                            <div class="profile-status">
                                <span class="status-badge status-<?php echo esc_attr($status); ?>"><?php echo esc_html(ucfirst($status)); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="profile-tabs">
                        <ul class="tabs-nav">
                            <li class="active"><a href="#profile-details"><?php _e('Profile Details', 'yiontech'); ?></a></li>
                            <li><a href="#profile-documents"><?php _e('Documents', 'yiontech'); ?></a></li>
                            <li><a href="#profile-courses"><?php _e('My Courses', 'yiontech'); ?></a></li>
                        </ul>
                        
                        <div class="tabs-content">
                            <div id="profile-details" class="tab-panel active">
                                <form id="update-profile-form">
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="profile-first-name"><?php _e('First Name', 'yiontech'); ?></label>
                                            <input type="text" name="first_name" id="profile-first-name" value="<?php echo esc_attr($first_name); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-last-name"><?php _e('Last Name', 'yiontech'); ?></label>
                                            <input type="text" name="last_name" id="profile-last-name" value="<?php echo esc_attr($last_name); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="profile-email"><?php _e('Email', 'yiontech'); ?></label>
                                            <input type="email" name="email" id="profile-email" value="<?php echo esc_attr($user->user_email); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-phone"><?php _e('Phone', 'yiontech'); ?></label>
                                            <input type="tel" name="phone" id="profile-phone" value="<?php echo esc_attr($phone); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="profile-department"><?php _e('Department', 'yiontech'); ?></label>
                                            <input type="text" name="department" id="profile-department" value="<?php echo esc_attr($department); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-year"><?php _e('Year of Study', 'yiontech'); ?></label>
                                            <select name="year" id="profile-year">
                                                <option value=""><?php _e('Select Year', 'yiontech'); ?></option>
                                                <option value="1" <?php selected($year, '1'); ?>><?php _e('1st Year', 'yiontech'); ?></option>
                                                <option value="2" <?php selected($year, '2'); ?>><?php _e('2nd Year', 'yiontech'); ?></option>
                                                <option value="3" <?php selected($year, '3'); ?>><?php _e('3rd Year', 'yiontech'); ?></option>
                                                <option value="4" <?php selected($year, '4'); ?>><?php _e('4th Year', 'yiontech'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="profile-address"><?php _e('Address', 'yiontech'); ?></label>
                                            <textarea name="address" id="profile-address" rows="3"><?php echo esc_textarea($address); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="button button-primary"><?php _e('Update Profile', 'yiontech'); ?></button>
                                    </div>
                                </form>
                            </div>
                            
                            <div id="profile-documents" class="tab-panel">
                                <div class="documents-list">
                                    <?php if (!empty($documents)) : ?>
                                        <ul>
                                            <?php foreach ($documents as $document) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($document['url']); ?>" target="_blank"><?php echo esc_html($document['name']); ?></a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else : ?>
                                        <p><?php _e('No documents uploaded.', 'yiontech'); ?></p>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="upload-documents">
                                    <h3><?php _e('Upload Documents', 'yiontech'); ?></h3>
                                    <form id="upload-documents-form">
                                        <?php
                                        $document_types = get_theme_mod('yiontech_student_document_types', "Clearance Form\nStudent Handbook\nID Proof\nTranscript");
                                        $document_types = explode("\n", $document_types);
                                        
                                        foreach ($document_types as $document_type) :
                                        ?>
                                        <div class="document-upload">
                                            <label><?php echo esc_html(trim($document_type)); ?></label>
                                            <input type="file" name="documents[]" data-document-type="<?php echo esc_attr(trim($document_type)); ?>">
                                        </div>
                                        <?php endforeach; ?>
                                        
                                        <div class="form-actions">
                                            <button type="submit" class="button button-primary"><?php _e('Upload Documents', 'yiontech'); ?></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <div id="profile-courses" class="tab-panel">
                                <?php
                                if (function_exists('tutor')) {
                                    $enrolled_courses = tutor_utils()->get_enrolled_courses_by_user($user_id);
                                    
                                    if (!empty($enrolled_courses)) {
                                        echo '<div class="courses-grid">';
                                        
                                        foreach ($enrolled_courses as $course) {
                                            $course_id = $course->ID;
                                            $course_title = get_the_title($course_id);
                                            $course_permalink = get_permalink($course_id);
                                            $course_image = get_the_post_thumbnail($course_id, 'medium');
                                            $course_progress = tutor_utils()->get_course_completed_percent($course_id, $user_id);
                                            ?>
                                            <div class="course-card">
                                                <div class="course-image">
                                                    <a href="<?php echo esc_url($course_permalink); ?>">
                                                        <?php echo $course_image; ?>
                                                    </a>
                                                </div>
                                                <div class="course-content">
                                                    <h3 class="course-title">
                                                        <a href="<?php echo esc_url($course_permalink); ?>"><?php echo esc_html($course_title); ?></a>
                                                    </h3>
                                                    <div class="course-progress">
                                                        <div class="progress-bar">
                                                            <div class="progress-value" style="width: <?php echo esc_attr($course_progress); ?>%"></div>
                                                        </div>
                                                        <div class="progress-text"><?php echo esc_html($course_progress); ?>% <?php _e('Complete', 'yiontech'); ?></div>
                                                    </div>
                                                    <div class="course-actions">
                                                        <a href="<?php echo esc_url($course_permalink); ?>" class="button"><?php _e('Continue Learning', 'yiontech'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        
                                        echo '</div>';
                                    } else {
                                        echo '<p>' . __('You are not enrolled in any courses yet.', 'yiontech') . '</p>';
                                    }
                                } else {
                                    echo '<p>' . __('Tutor LMS is not active.', 'yiontech') . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
    
    <script>
        jQuery(document).ready(function($) {
            // Tab functionality
            $('.tabs-nav a').on('click', function(e) {
                e.preventDefault();
                
                var tabId = $(this).attr('href');
                
                $('.tabs-nav li').removeClass('active');
                $(this).parent().addClass('active');
                
                $('.tab-panel').removeClass('active');
                $(tabId).addClass('active');
            });
            
            // Update profile form
            $('#update-profile-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'yiontech_update_student_profile',
                        form_data: formData,
                        nonce: '<?php echo wp_create_nonce('yiontech_student_profile_nonce'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('<?php _e('Profile updated successfully.', 'yiontech'); ?>');
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });
            
            // Upload documents form
            $('#upload-documents-form').on('submit', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append('action', 'yiontech_upload_student_documents');
                formData.append('nonce', '<?php echo wp_create_nonce('yiontech_student_documents_nonce'); ?>');
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            alert('<?php _e('Documents uploaded successfully.', 'yiontech'); ?>');
                            location.reload();
                        } else {
                            alert(response.data);
                        }
                    }
                });
            });
        });
    </script>
    
    <style>
        .yiontech-student-profile {
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-avatar {
            margin-right: 20px;
        }
        
        .profile-info h2 {
            margin: 0 0 10px;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-pending {
            background-color: #ffb900;
            color: #fff;
        }
        
        .status-approved {
            background-color: #46b450;
            color: #fff;
        }
        
        .status-rejected {
            background-color: #dc3232;
            color: #fff;
        }
        
        .profile-tabs {
            margin-top: 30px;
        }
        
        .tabs-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            border-bottom: 1px solid #ddd;
        }
        
        .tabs-nav li {
            margin: 0;
        }
        
        .tabs-nav li a {
            display: block;
            padding: 10px 20px;
            color: #555;
            text-decoration: none;
            border-bottom: 2px solid transparent;
        }
        
        .tabs-nav li.active a {
            color: #0073aa;
            border-bottom-color: #0073aa;
        }
        
        .tabs-content {
            padding: 20px 0;
        }
        
        .tab-panel {
            display: none;
        }
        
        .tab-panel.active {
            display: block;
        }
        
        .form-row {
            display: flex;
            margin-bottom: 15px;
        }
        
        .form-group {
            flex: 1;
            margin-right: 15px;
        }
        
        .form-group:last-child {
            margin-right: 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .form-actions {
            margin-top: 20px;
        }
        
        .document-upload {
            margin-bottom: 15px;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .course-card {
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .course-image img {
            width: 100%;
            height: auto;
        }
        
        .course-content {
            padding: 15px;
        }
        
        .course-title {
            margin: 0 0 10px;
            font-size: 18px;
        }
        
        .course-title a {
            color: #333;
            text-decoration: none;
        }
        
        .course-title a:hover {
            color: #0073aa;
        }
        
        .course-progress {
            margin-bottom: 15px;
        }
        
        .progress-bar {
            height: 8px;
            background-color: #eee;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .progress-value {
            height: 100%;
            background-color: #0073aa;
        }
        
        .progress-text {
            font-size: 14px;
            margin-top: 5px;
        }
        
        .course-actions {
            margin-top: 15px;
        }
    </style>
    <?php
    get_footer();
}

// Create student profile page template
function yiontech_student_profile_template($template) {
    if (is_page('student-profile')) {
        $theme_template = YIONTECH_DIR . '/student-profile.php';
        if (file_exists($theme_template)) {
            return $theme_template;
        }
    }
    return $template;
}
add_filter('template_include', 'yiontech_student_profile_template');

// Handle student profile update
function yiontech_update_student_profile() {
    check_ajax_referer('yiontech_student_profile_nonce', 'nonce');
    
    if (!is_user_logged_in()) {
        wp_send_json_error(__('You must be logged in to update your profile.', 'yiontech'));
    }
    
    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    if (!in_array('student', (array) $user->roles)) {
        wp_send_json_error(__('You do not have permission to update this profile.', 'yiontech'));
    }
    
    parse_str($_POST['form_data'], $form_data);
    
    $first_name = sanitize_text_field($form_data['first_name']);
    $last_name = sanitize_text_field($form_data['last_name']);
    $email = sanitize_email($form_data['email']);
    $phone = sanitize_text_field($form_data['phone']);
    $department = sanitize_text_field($form_data['department']);
    $year = sanitize_text_field($form_data['year']);
    $address = sanitize_textarea_field($form_data['address']);
    
    if (empty($first_name) || empty($last_name) || empty($email)) {
        wp_send_json_error(__('Please fill in all required fields.', 'yiontech'));
    }
    
    // Update user data
    wp_update_user(array(
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'user_email' => $email,
    ));
    
    // Update user meta
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'department', $department);
    update_user_meta($user_id, 'year', $year);
    update_user_meta($user_id, 'address', $address);
    
    wp_send_json_success(__('Profile updated successfully.', 'yiontech'));
}
add_action('wp_ajax_yiontech_update_student_profile', 'yiontech_update_student_profile');

// Handle student document upload
function yiontech_upload_student_documents() {
    check_ajax_referer('yiontech_student_documents_nonce', 'nonce');
    
    if (!is_user_logged_in()) {
        wp_send_json_error(__('You must be logged in to upload documents.', 'yiontech'));
    }
    
    $user_id = get_current_user_id();
    $user = get_user_by('id', $user_id);
    
    if (!in_array('student', (array) $user->roles)) {
        wp_send_json_error(__('You do not have permission to upload documents.', 'yiontech'));
    }
    
    // Handle document uploads
    if (!empty($_FILES['documents'])) {
        $documents = get_user_meta($user_id, 'student_documents', true);
        if (empty($documents)) {
            $documents = array();
        }
        
        foreach ($_FILES['documents']['name'] as $key => $name) {
            if (!empty($name)) {
                $file = array(
                    'name' => $_FILES['documents']['name'][$key],
                    'type' => $_FILES['documents']['type'][$key],
                    'tmp_name' => $_FILES['documents']['tmp_name'][$key],
                    'error' => $_FILES['documents']['error'][$key],
                    'size' => $_FILES['documents']['size'][$key],
                );
                
                $upload = wp_handle_upload($file, array('test_form' => false));
                
                if (isset($upload['file'])) {
                    $document_type = sanitize_text_field($_POST['document_types'][$key]);
                    
                    // Remove existing document of the same type
                    foreach ($documents as $index => $document) {
                        if ($document['name'] === $document_type) {
                            unset($documents[$index]);
                            break;
                        }
                    }
                    
                    $documents[] = array(
                        'name' => $document_type,
                        'url' => $upload['url'],
                    );
                }
            }
        }
        
        update_user_meta($user_id, 'student_documents', $documents);
    }
    
    wp_send_json_success(__('Documents uploaded successfully.', 'yiontech'));
}
add_action('wp_ajax_yiontech_upload_student_documents', 'yiontech_upload_student_documents');

// Create student profile page file
function yiontech_create_student_profile_page() {
    $page_title = 'Student Profile';
    $page_content = '[student_profile]';
    $page_template = '';
    $page_check = get_page_by_title($page_title);
    
    if (!isset($page_check)) {
        $new_page = array(
            'post_title' => $page_title,
            'post_content' => $page_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'student-profile'
        );
        
        wp_insert_post($new_page);
    }
}
add_action('after_setup_theme', 'yiontech_create_student_profile_page');