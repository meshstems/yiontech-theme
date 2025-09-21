<?php
/**
 * Customizer functionality
 */

class YionTech_Customizer {

    public function __construct() {
        add_action('customize_register', array($this, 'customize_register'));
        add_action('customize_preview_init', array($this, 'customize_preview_js'));
    }

    public function customize_register($wp_customize) {
        // Add custom controls
        require_once YIONTECH_DIR . '/inc/customizer/controls/class-yiontech-customizer-control.php';
        
        // Header section
        $wp_customize->add_section('yiontech_header_section', array(
            'title'    => __('Header Settings', 'yiontech'),
            'priority' => 30,
        ));
        
        // Header style
        $wp_customize->add_setting('yiontech_header_style', array(
            'default'           => 'default',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_header_style', array(
            'label'    => __('Header Style', 'yiontech'),
            'section'  => 'yiontech_header_section',
            'type'     => 'select',
            'choices'  => array(
                'default'  => __('Default Header', 'yiontech'),
                'elementor' => __('Elementor Header', 'yiontech'),
            ),
        ));
        
        // Elementor header template
        $wp_customize->add_setting('yiontech_elementor_header_id', array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        ));
        
        $wp_customize->add_control(new YionTech_Customizer_Control($wp_customize, 'yiontech_elementor_header_id', array(
            'label'    => __('Select Elementor Header Template', 'yiontech'),
            'section'  => 'yiontech_header_section',
            'type'     => 'select',
            'choices'  => $this->get_elementor_templates('header'),
        )));
        
        // Footer section
        $wp_customize->add_section('yiontech_footer_section', array(
            'title'    => __('Footer Settings', 'yiontech'),
            'priority' => 40,
        ));
        
        // Footer style
        $wp_customize->add_setting('yiontech_footer_style', array(
            'default'           => 'default',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_footer_style', array(
            'label'    => __('Footer Style', 'yiontech'),
            'section'  => 'yiontech_footer_section',
            'type'     => 'select',
            'choices'  => array(
                'default'  => __('Default Footer', 'yiontech'),
                'elementor' => __('Elementor Footer', 'yiontech'),
            ),
        ));
        
        // Elementor footer template
        $wp_customize->add_setting('yiontech_elementor_footer_id', array(
            'default'           => '',
            'sanitize_callback' => 'absint',
        ));
        
        $wp_customize->add_control(new YionTech_Customizer_Control($wp_customize, 'yiontech_elementor_footer_id', array(
            'label'    => __('Select Elementor Footer Template', 'yiontech'),
            'section'  => 'yiontech_footer_section',
            'type'     => 'select',
            'choices'  => $this->get_elementor_templates('footer'),
        )));
        
        // Homepage section
        $wp_customize->add_section('yiontech_homepage_section', array(
            'title'    => __('Homepage Settings', 'yiontech'),
            'priority' => 35,
        ));
        
        // Use prebuilt homepage
        $wp_customize->add_setting('yiontech_use_prebuilt_homepage', array(
            'default'           => false,
            'sanitize_callback' => 'wp_validate_boolean',
        ));
        
        $wp_customize->add_control('yiontech_use_prebuilt_homepage', array(
            'label'    => __('Use Prebuilt Homepage', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'checkbox',
        ));
        
        // Hero title
        $wp_customize->add_setting('yiontech_hero_title', array(
            'default'           => __('Welcome to Footprint School of Business', 'yiontech'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_title', array(
            'label'    => __('Hero Title', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero description
        $wp_customize->add_setting('yiontech_hero_description', array(
            'default'           => __('Transform your career with our industry-leading business courses designed for professionals.', 'yiontech'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_description', array(
            'label'    => __('Hero Description', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'textarea',
        ));
        
        // Hero primary button text
        $wp_customize->add_setting('yiontech_hero_primary_button_text', array(
            'default'           => __('Start Learning Now', 'yiontech'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_primary_button_text', array(
            'label'    => __('Primary Button Text', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero primary button link
        $wp_customize->add_setting('yiontech_hero_primary_button_link', array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('yiontech_hero_primary_button_link', array(
            'label'    => __('Primary Button Link', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero secondary button text
        $wp_customize->add_setting('yiontech_hero_secondary_button_text', array(
            'default'           => __('Enroll Now', 'yiontech'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_secondary_button_text', array(
            'label'    => __('Secondary Button Text', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero secondary button link
        $wp_customize->add_setting('yiontech_hero_secondary_button_link', array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('yiontech_hero_secondary_button_link', array(
            'label'    => __('Secondary Button Link', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero student count
        $wp_customize->add_setting('yiontech_hero_student_count', array(
            'default'           => '12k+',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_student_count', array(
            'label'    => __('Student Count', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
        
        // Hero student text
        $wp_customize->add_setting('yiontech_hero_student_text', array(
            'default'           => __('Join happy students', 'yiontech'),
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('yiontech_hero_student_text', array(
            'label'    => __('Student Text', 'yiontech'),
            'section'  => 'yiontech_homepage_section',
            'type'     => 'text',
        ));
    }
    
    public function get_elementor_templates($type) {
        $templates = array();
        
        if (did_action('elementor/loaded')) {
            $posts = get_posts(array(
                'post_type' => 'elementor_library',
                'posts_per_page' => -1,
                'meta_query' => array(
                    array(
                        'key' => '_elementor_template_type',
                        'value' => $type,
                    )
                )
            ));
            
            foreach ($posts as $post) {
                $templates[$post->ID] = $post->post_title;
            }
        }
        
        return $templates;
    }
    
    public function customize_preview_js() {
        wp_enqueue_script('yiontech-customizer', YIONTECH_URI . '/assets/js/customizer.js', array('customize-preview'), YIONTECH_VERSION, true);
    }
}

new YionTech_Customizer();