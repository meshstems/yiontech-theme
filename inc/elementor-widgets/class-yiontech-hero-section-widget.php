<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class YionTech_Hero_Section_Widget extends Widget_Base {

    public function get_name() {
        return 'yiontech-hero-section';
    }

    public function get_title() {
        return __( 'YionTech Hero Section', 'yiontech' );
    }

    public function get_icon() {
        return 'eicon-site-title';
    }

    public function get_categories() {
        return [ 'yiontech-widgets' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'yiontech' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Welcome to Footprint School of Business', 'yiontech' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'yiontech' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Transform your career with our industry-leading business courses designed for professionals.', 'yiontech' ),
                'rows' => 5,
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => __( 'Primary Button Text', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Start Learning Now', 'yiontech' ),
            ]
        );

        $this->add_control(
            'primary_button_link',
            [
                'label' => __( 'Primary Button Link', 'yiontech' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'yiontech' ),
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => __( 'Secondary Button Text', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Enroll Now', 'yiontech' ),
            ]
        );

        $this->add_control(
            'secondary_button_link',
            [
                'label' => __( 'Secondary Button Link', 'yiontech' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'yiontech' ),
            ]
        );

        $this->add_control(
            'student_count',
            [
                'label' => __( 'Student Count', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( '12k+', 'yiontech' ),
            ]
        );

        $this->add_control(
            'student_text',
            [
                'label' => __( 'Student Text', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Join happy students', 'yiontech' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'yiontech' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => __( 'Background Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#1a1a2e',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section .hero-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#e0e0e0',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section .hero-description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'primary_button_color',
            [
                'label' => __( 'Primary Button Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff6b6b',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section .hero-primary-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_color',
            [
                'label' => __( 'Secondary Button Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section .hero-secondary-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'student_count_color',
            [
                'label' => __( 'Student Count Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ff6b6b',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-hero-section .student-count' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="yiontech-hero-section">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo esc_html( $settings['title'] ); ?></h1>
                <p class="hero-description"><?php echo esc_html( $settings['description'] ); ?></p>
                
                <div class="hero-buttons">
                    <?php if ( ! empty( $settings['primary_button_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['primary_button_link']['url'] ); ?>" class="hero-primary-button">
                            <?php echo esc_html( $settings['primary_button_text'] ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( ! empty( $settings['secondary_button_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $settings['secondary_button_link']['url'] ); ?>" class="hero-secondary-button">
                            <?php echo esc_html( $settings['secondary_button_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <div class="hero-students">
                    <span class="student-count"><?php echo esc_html( $settings['student_count'] ); ?></span>
                    <span class="student-text"><?php echo esc_html( $settings['student_text'] ); ?></span>
                </div>
            </div>
        </div>
        <?php
    }
}