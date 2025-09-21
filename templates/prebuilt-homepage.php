<?php
/**
 * Prebuilt Homepage Template
 */

// Get hero section settings from theme options
$hero_title = get_theme_mod('yiontech_hero_title', 'Welcome to Footprint School of Business');
$hero_description = get_theme_mod('yiontech_hero_description', 'Transform your career with our industry-leading business courses designed for professionals.');
$hero_primary_button_text = get_theme_mod('yiontech_hero_primary_button_text', 'Start Learning Now');
$hero_primary_button_link = get_theme_mod('yiontech_hero_primary_button_link', '#');
$hero_secondary_button_text = get_theme_mod('yiontech_hero_secondary_button_text', 'Enroll Now');
$hero_secondary_button_link = get_theme_mod('yiontech_hero_secondary_button_link', '#');
$hero_student_count = get_theme_mod('yiontech_hero_student_count', '12k+');
$hero_student_text = get_theme_mod('yiontech_hero_student_text', 'Join happy students');

// Get section titles
$features_title = get_theme_mod('yiontech_features_title', 'Why Choose Our Courses');
$courses_title = get_theme_mod('yiontech_courses_title', 'Popular Courses');
$testimonials_title = get_theme_mod('yiontech_testimonials_title', 'What Our Students Say');
?>

<!-- Hero Section -->
<section class="yiontech-hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="hero-description"><?php echo esc_html($hero_description); ?></p>
            
            <div class="hero-buttons">
                <a href="<?php echo esc_url($hero_primary_button_link); ?>" class="hero-primary-button">
                    <?php echo esc_html($hero_primary_button_text); ?>
                </a>
                <a href="<?php echo esc_url($hero_secondary_button_link); ?>" class="hero-secondary-button">
                    <?php echo esc_html($hero_secondary_button_text); ?>
                </a>
            </div>
            
            <div class="hero-students">
                <span class="student-count"><?php echo esc_html($hero_student_count); ?></span>
                <span class="student-text"><?php echo esc_html($hero_student_text); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="yiontech-features-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($features_title); ?></h2>
        
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3><?php _e('Expert Instructors', 'yiontech'); ?></h3>
                <p><?php _e('Learn from industry experts with years of real-world experience.', 'yiontech'); ?></p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3><?php _e('Flexible Learning', 'yiontech'); ?></h3>
                <p><?php _e('Study at your own pace with our flexible online courses.', 'yiontech'); ?></p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3><?php _e('Certification', 'yiontech'); ?></h3>
                <p><?php _e('Earn industry-recognized certificates upon completion.', 'yiontech'); ?></p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3><?php _e('Student Community', 'yiontech'); ?></h3>
                <p><?php _e('Join a vibrant community of learners and professionals.', 'yiontech'); ?></p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3><?php _e('24/7 Support', 'yiontech'); ?></h3>
                <p><?php _e('Get help whenever you need it from our support team.', 'yiontech'); ?></p>
            </div>
            
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3><?php _e('Mobile Learning', 'yiontech'); ?></h3>
                <p><?php _e('Access your courses on any device, anywhere, anytime.', 'yiontech'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="yiontech-courses-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($courses_title); ?></h2>
        
        <?php if (function_exists('tutor')) : ?>
            <div class="tutor-courses-loop-container">
                <?php
                $courses = get_posts(array(
                    'post_type' => 'courses',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($courses) :
                    foreach ($courses as $course) :
                        $course_id = $course->ID;
                        $price = tutor_utils()->get_course_price($course_id);
                        ?>
                        <div class="tutor-courses-loop-item">
                            <div class="tutor-course-thumbnail">
                                <a href="<?php echo get_permalink($course_id); ?>">
                                    <?php echo get_the_post_thumbnail($course_id, 'yiontech-course-thumb'); ?>
                                </a>
                            </div>
                            
                            <div class="tutor-course-loop-header">
                                <h3 class="tutor-course-loop-title">
                                    <a href="<?php echo get_permalink($course_id); ?>"><?php echo get_the_title($course_id); ?></a>
                                </h3>
                                
                                <div class="tutor-course-loop-meta">
                                    <span class="tutor-course-duration">
                                        <?php echo get_tutor_course_duration_context($course_id); ?>
                                    </span>
                                    <span class="tutor-course-level">
                                        <?php echo get_tutor_course_level($course_id); ?>
                                    </span>
                                </div>
                                
                                <div class="tutor-course-loop-price">
                                    <?php echo $price; ?>
                                </div>
                            </div>
                            
                            <div class="tutor-course-loop-footer">
                                <a href="<?php echo get_permalink($course_id); ?>" class="tutor-course-loop-enroll-btn">
                                    <?php _e('Enroll Now', 'yiontech'); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="view-all-courses">
                <a href="<?php echo get_post_type_archive_link('courses'); ?>" class="button button-primary"><?php _e('View All Courses', 'yiontech'); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Testimonials Section -->
<section class="yiontech-testimonials-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html($testimonials_title); ?></h2>
        
        <div class="yiontech-testimonials">
            <div class="yiontech-testimonial">
                <div class="testimonial-content">
                    <?php _e('This course completely transformed my career. The instructors are knowledgeable and the content is practical.', 'yiontech'); ?>
                </div>
                <div class="client-info">
                    <div class="client-image">
                        <img src="<?php echo YIONTECH_URI; ?>/assets/images/client1.jpg" alt="<?php _e('John Doe', 'yiontech'); ?>">
                    </div>
                    <div class="client-details">
                        <h4 class="client-name"><?php _e('John Doe', 'yiontech'); ?></h4>
                        <p class="client-position"><?php _e('Marketing Manager', 'yiontech'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="yiontech-testimonial">
                <div class="testimonial-content">
                    <?php _e('The best investment I\'ve made in my professional development. Highly recommended!', 'yiontech'); ?>
                </div>
                <div class="client-info">
                    <div class="client-image">
                        <img src="<?php echo YIONTECH_URI; ?>/assets/images/client2.jpg" alt="<?php _e('Jane Smith', 'yiontech'); ?>">
                    </div>
                    <div class="client-details">
                        <h4 class="client-name"><?php _e('Jane Smith', 'yiontech'); ?></h4>
                        <p class="client-position"><?php _e('Business Owner', 'yiontech'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="yiontech-testimonial">
                <div class="testimonial-content">
                    <?php _e('I was able to apply what I learned immediately in my job. The course content is relevant and up-to-date.', 'yiontech'); ?>
                </div>
                <div class="client-info">
                    <div class="client-image">
                        <img src="<?php echo YIONTECH_URI; ?>/assets/images/client3.jpg" alt="<?php _e('Robert Johnson', 'yiontech'); ?>">
                    </div>
                    <div class="client-details">
                        <h4 class="client-name"><?php _e('Robert Johnson', 'yiontech'); ?></h4>
                        <p class="client-position"><?php _e('Financial Analyst', 'yiontech'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="yiontech-cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title"><?php _e('Ready to Start Your Learning Journey?', 'yiontech'); ?></h2>
            <p class="cta-description"><?php _e('Join thousands of satisfied students and transform your career today.', 'yiontech'); ?></p>
            <div class="cta-buttons">
                <a href="<?php echo esc_url($hero_primary_button_link); ?>" class="cta-button">
                    <?php echo esc_html($hero_primary_button_text); ?>
                </a>
                <?php if (!is_user_logged_in()) : ?>
                <a href="<?php echo esc_url(wp_registration_url()); ?>" class="cta-button cta-button-secondary">
                    <?php _e('Register Now', 'yiontech'); ?>
                </a>
                <?php else : ?>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('student-profile'))); ?>" class="cta-button cta-button-secondary">
                    <?php _e('My Profile', 'yiontech'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* Prebuilt Homepage Styles */
.section-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 36px;
    color: var(--dark);
}

/* Hero Section */
.yiontech-hero-section {
    padding: 100px 0;
    position: relative;
    overflow: hidden;
    background-color: #1a1a2e;
    background-image: radial-gradient(circle at 10% 20%, rgba(255, 107, 107, 0.05) 0%, transparent 20%),
                      radial-gradient(circle at 90% 80%, rgba(0, 115, 170, 0.05) 0%, transparent 20%);
}

.yiontech-hero-section .hero-content {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    padding: 0 20px;
}

.yiontech-hero-section .hero-title {
    font-size: 42px;
    line-height: 1.2;
    margin-bottom: 20px;
    color: #ffffff;
}

.yiontech-hero-section .hero-description {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
    color: #e0e0e0;
}

.yiontech-hero-section .hero-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 40px;
}

.yiontech-hero-section .hero-primary-button,
.yiontech-hero-section .hero-secondary-button {
    display: inline-block;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.yiontech-hero-section .hero-primary-button {
    background-color: #ff6b6b;
    color: #ffffff;
}

.yiontech-hero-section .hero-secondary-button {
    background-color: #ffffff;
    color: #1a1a2e;
}

.yiontech-hero-section .hero-primary-button:hover,
.yiontech-hero-section .hero-secondary-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.yiontech-hero-section .hero-students {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.yiontech-hero-section .student-count {
    font-size: 24px;
    font-weight: 700;
    color: #ff6b6b;
}

.yiontech-hero-section .student-text {
    font-size: 16px;
    color: #e0e0e0;
}

/* Features Section */
.yiontech-features-section {
    padding: 80px 0;
    background-color: var(--light);
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.feature-item {
    text-align: center;
    padding: 30px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.feature-icon {
    font-size: 48px;
    color: var(--primary);
    margin-bottom: 20px;
}

.feature-item h3 {
    font-size: 24px;
    margin-bottom: 15px;
    color: var(--dark);
}

.feature-item p {
    color: var(--gray);
}

/* Courses Section */
.yiontech-courses-section {
    padding: 80px 0;
}

.tutor-courses-loop-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.view-all-courses {
    text-align: center;
    margin-top: 30px;
}

/* Testimonials Section */
.yiontech-testimonials-section {
    padding: 80px 0;
    background-color: var(--light);
}

.yiontech-testimonials {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.yiontech-testimonial {
    padding: 30px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.yiontech-testimonial .testimonial-content {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
    color: #333333;
    font-style: italic;
}

.yiontech-testimonial .client-info {
    display: flex;
    align-items: center;
}

.yiontech-testimonial .client-image {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 15px;
}

.yiontech-testimonial .client-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.yiontech-testimonial .client-details {
    flex: 1;
}

.yiontech-testimonial .client-name {
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 5px;
    color: var(--primary);
}

.yiontech-testimonial .client-position {
    font-size: 14px;
    margin: 0;
    color: var(--gray);
}

/* CTA Section */
.yiontech-cta-section {
    padding: 80px 0;
    background-color: var(--primary);
    color: #fff;
    text-align: center;
}

.cta-title {
    color: #fff;
    font-size: 36px;
    margin-bottom: 20px;
}

.cta-description {
    font-size: 18px;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.cta-button {
    display: inline-block;
    padding: 15px 30px;
    background-color: #fff;
    color: var(--primary);
    border-radius: 30px;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.cta-button-secondary {
    background-color: transparent;
    border: 2px solid #fff;
    color: #fff;
}

.cta-button-secondary:hover {
    background-color: #fff;
    color: var(--primary);
}

/* Responsive Styles */
@media (max-width: 768px) {
    .yiontech-hero-section {
        padding: 60px 0;
    }
    
    .yiontech-hero-section .hero-title {
        font-size: 32px;
    }
    
    .yiontech-hero-section .hero-description {
        font-size: 16px;
    }
    
    .yiontech-hero-section .hero-buttons {
        flex-direction: column;
        gap: 15px;
    }
    
    .yiontech-hero-section .hero-primary-button,
    .yiontech-hero-section .hero-secondary-button {
        width: 100%;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .yiontech-testimonials {
        grid-template-columns: 1fr;
    }
    
    .yiontech-testimonial {
        width: 100%;
    }
    
    .cta-buttons {
        flex-direction: column;
        gap: 15px;
    }
    
    .cta-button,
    .cta-button-secondary {
        width: 100%;
    }
}
</style>