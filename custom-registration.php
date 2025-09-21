<?php
/**
 * Custom Registration Template
 *
 * @package YionTech
 * @since 1.0.0
 */

get_header();
?>
<div class="container">
    <div class="site-content">
        <div class="content-area">
            <div class="yiontech-registration-page">
                <div class="registration-container">
                    <div class="registration-form-container">
                        <h2><?php _e('Student Registration', 'yiontech'); ?></h2>
                        
                        <?php echo do_shortcode('[student_registration_form]'); ?>
                    </div>
                    
                    <div class="registration-info">
                        <h3><?php _e('Join Our Learning Community', 'yiontech'); ?></h3>
                        <p><?php _e('Create an account to access our courses and start your learning journey.', 'yiontech'); ?></p>
                        
                        <div class="registration-features">
                            <div class="registration-feature">
                                <i class="fas fa-user-graduate"></i>
                                <h4><?php _e('Student Profile', 'yiontech'); ?></h4>
                                <p><?php _e('Create a personalized profile with your information and documents.', 'yiontech'); ?></p>
                            </div>
                            
                            <div class="registration-feature">
                                <i class="fas fa-book-open"></i>
                                <h4><?php _e('Course Access', 'yiontech'); ?></h4>
                                <p><?php _e('Enroll in courses and track your progress.', 'yiontech'); ?></p>
                            </div>
                            
                            <div class="registration-feature">
                                <i class="fas fa-file-upload"></i>
                                <h4><?php _e('Document Upload', 'yiontech'); ?></h4>
                                <p><?php _e('Upload required documents for verification.', 'yiontech'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.yiontech-registration-page {
    padding: 50px 0;
}

.registration-container {
    display: flex;
    max-width: 1000px;
    margin: 0 auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
}

.registration-form-container {
    flex: 1;
    padding: 40px;
}

.registration-form-container h2 {
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 28px;
    color: var(--dark);
}

.registration-info {
    flex: 1;
    padding: 40px;
    background-color: var(--primary);
    color: #fff;
}

.registration-info h3 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
}

.registration-features {
    margin-top: 30px;
}

.registration-feature {
    margin-bottom: 25px;
}

.registration-feature i {
    font-size: 24px;
    margin-bottom: 10px;
    display: block;
}

.registration-feature h4 {
    margin: 0 0 10px;
    font-size: 18px;
}

.registration-feature p {
    margin: 0;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .registration-container {
        flex-direction: column;
    }
    
    .registration-info {
        padding: 30px;
    }
}
</style>

<?php get_footer(); ?>