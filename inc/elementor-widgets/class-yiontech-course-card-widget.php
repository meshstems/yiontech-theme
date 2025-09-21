<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class YionTech_Course_Card_Widget extends Widget_Base {

    public function get_name() {
        return 'yiontech-course-card';
    }

    public function get_title() {
        return __( 'YionTech Course Card', 'yiontech' );
    }

    public function get_icon() {
        return 'eicon-post-list';
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
            'course_id',
            [
                'label' => __( 'Select Course', 'yiontech' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_course_options(),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'show_image',
            [
                'label' => __( 'Show Course Image', 'yiontech' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'yiontech' ),
                'label_off' => __( 'Hide', 'yiontech' ),
            ]
        );

        $this->add_control(
            'show_title',
            [
                'label' => __( 'Show Course Title', 'yiontech' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'yiontech' ),
                'label_off' => __( 'Hide', 'yiontech' ),
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label' => __( 'Show Course Excerpt', 'yiontech' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'yiontech' ),
                'label_off' => __( 'Hide', 'yiontech' ),
            ]
        );

        $this->add_control(
            'show_price',
            [
                'label' => __( 'Show Course Price', 'yiontech' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'yiontech' ),
                'label_off' => __( 'Hide', 'yiontech' ),
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => __( 'Show Enroll Button', 'yiontech' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'yiontech' ),
                'label_off' => __( 'Hide', 'yiontech' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'yiontech' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Enroll Now', 'yiontech' ),
                'condition' => [
                    'show_button' => 'yes',
                ],
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
            'card_bg_color',
            [
                'label' => __( 'Card Background Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'card_border_color',
            [
                'label' => __( 'Card Border Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#e0e0e0',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __( 'Card Border Radius', 'yiontech' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card' => 'border-radius: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_title' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_typography',
            [
                'label' => __( 'Title Typography', 'yiontech' ),
                'type' => Controls_Manager::TYPOGRAPHY,
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-title' => '{{VALUE}}',
                ],
                'condition' => [
                    'show_title' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => __( 'Excerpt Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#666666',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-excerpt' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_excerpt' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __( 'Price Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-price' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_price' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Button Background Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-button' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Button Text Color', 'yiontech' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .yiontech-course-card .course-button' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'show_button' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function get_course_options() {
        $options = [];

        if ( function_exists( 'tutor' ) ) {
            $courses = get_posts( [
                'post_type' => 'courses',
                'posts_per_page' => -1,
                'post_status' => 'publish',
            ] );

            foreach ( $courses as $course ) {
                $options[ $course->ID ] = $course->post_title;
            }
        }

        return $options;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['course_id'] ) ) {
            return;
        }

        $course_id = $settings['course_id'];
        $course = get_post( $course_id );

        if ( ! $course ) {
            return;
        }

        $this->add_render_attribute( 'card', 'class', 'yiontech-course-card' );
        $this->add_render_attribute( 'card', 'class', 'course-card-' . $course_id );
        ?>
        <div <?php echo $this->get_render_attribute_string( 'card' ); ?>>
            <?php if ( $settings['show_image'] === 'yes' ) : ?>
                <div class="course-image">
                    <?php echo get_the_post_thumbnail( $course_id, 'medium' ); ?>
                </div>
            <?php endif; ?>

            <div class="course-content">
                <?php if ( $settings['show_title'] === 'yes' ) : ?>
                    <h3 class="course-title"><?php echo esc_html( $course->post_title ); ?></h3>
                <?php endif; ?>

                <?php if ( $settings['show_excerpt'] === 'yes' ) : ?>
                    <div class="course-excerpt">
                        <?php echo wp_kses_post( wpautop( wp_trim_words( $course->post_excerpt, 20, '...' ) ) ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $settings['show_price'] === 'yes' && function_exists( 'tutor_utils' ) ) : ?>
                    <div class="course-price">
                        <?php echo tutor_utils()->get_course_price( $course_id ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $settings['show_button'] === 'yes' ) : ?>
                    <div class="course-button-wrapper">
                        <a href="<?php echo esc_url( get_permalink( $course_id ) ); ?>" class="course-button">
                            <?php echo esc_html( $settings['button_text'] ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}