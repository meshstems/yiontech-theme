<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class YionTech_Testimonials_Widget extends Widget_Base {

    public function get_name() {
        return 'yiontech-testimonials';
    }

    public function get_title() {
        return __( 'YionTech Testimonials', 'yiontech' );
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
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

        $repeater = new Repeater();

        $repeater->add_control(
            'testimonial_content',
            [
                'label' => __( 'Testimonial Content', 'yiontech' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'This course completely transformed my career. The instructors are knowledgeable and the content is practical.', 'yiontech' ),
                'rows' => 5,
            ]
        );

        $repeater->add_control(
            'client_name',
            [
                'label' => __( 'Client Name', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'John Doe', 'yiontech' ),
            ]
        );

        $repeater->add_control(
            'client_position',
            [
                'label' => __( 'Client Position', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Marketing Manager', 'yiontech' ),
            ]
        );

        $repeater->add_control(
            'client_image',
            [
                'label' => __( 'Client Image', 'yiontech' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => __( 'Testimonials', 'yiontech' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'testimonial_content' => __( 'This course completely transformed my career. The instructors are knowledgeable and the content is practical.', 'yiontech' ),
                        'client_name' => __( 'John Doe', 'yiontech' ),
                        'client_position' => __( 'Marketing Manager', 'yiontech' ),
                    ],
                    [
                        'testimonial_content' => __( 'The best investment I\'ve made in my professional development. Highly recommended!', 'yiontech' ),
                        'client_name' => __( 'Jane Smith', 'yiontech' ),
                        'client_position' => __( 'Business Owner', 'yiontech' ),
                    ],
                ],
                'title_field' => '{{{ client_name }}}',
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
            'testimonial_bg_color',
            [
                'label' => __( 'Testimonial Background Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#f8f9fa',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-testimonial' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'testimonial_text_color',
            [
                'label' => __( 'Testimonial Text Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-testimonial .testimonial-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'client_name_color',
            [
                'label' => __( 'Client Name Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-testimonial .client-name' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'client_position_color',
            [
                'label' => __( 'Client Position Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-testimonial .client-position' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="yiontech-testimonials">
            <?php foreach ( $settings['testimonials'] as $testimonial ) : ?>
                <div class="yiontech-testimonial">
                    <div class="testimonial-content">
                        <?php echo wp_kses_post( $testimonial['testimonial_content'] ); ?>
                    </div>
                    <div class="client-info">
                        <?php if ( ! empty( $testimonial['client_image']['url'] ) ) : ?>
                            <div class="client-image">
                                <img src="<?php echo esc_url( $testimonial['client_image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['client_name'] ); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="client-details">
                            <h4 class="client-name"><?php echo esc_html( $testimonial['client_name'] ); ?></h4>
                            <p class="client-position"><?php echo esc_html( $testimonial['client_position'] ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}