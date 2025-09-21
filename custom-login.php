<?php
/**
 * Custom Login Template
 *
 * @package YionTech
 * @since 1.0.0
 */

get_header();
?>
<div class="container">
    <div class="site-content">
        <div class="content-area">
            <div class="yiontech-login-page">
                <div class="login-container">
                    <div class="login-form-container">
                        <h2><?php _e('Student Login', 'yiontech'); ?></h2>
                        
                        <?php
                        $login_errors = isset($_GET['login']) ? $_GET['login'] : '';
                        $registration_success = isset($_GET['registration']) ? $_GET['registration'] : '';
                        
                        if ($login_errors === 'failed') {
                            echo '<div class="login-error">' . __('Invalid username or password.', 'yiontech') . '</div>';
                        }
                        
                        if ($registration_success === 'success') {
                            echo '<div class="login-success">' . __('Registration successful. Please check your email for further instructions.', 'yiontech') . '</div>';
                        }
                        ?>
                        
                        <form name="loginform" id="loginform" action="<?php echo esc_url(wp_login_url()); ?>" method="post">
                            <p>
                                <label for="user_login"><?php _e('Username or Email', 'yiontech'); ?></label>
                                <input type="text" name="log" id="user_login" class="input" value="" size="20" />
                            </p>
                            <p>
                                <label for="user_pass"><?php _e('Password', 'yiontech'); ?></label>
                                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
                            </p>
                            <p class="forgetmenot">
                                <label for="rememberme">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                    <?php _e('Remember Me', 'yiontech'); ?>
                                </label>
                            </p>
                            <p class="submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="<?php esc_attr_e('Log In', 'yiontech'); ?>" />
                                <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink(get_page_by_path('student-profile'))); ?>" />
                            </p>
                        </form>
                        
                        <div class="login-links">
                            <p>
                                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php _e('Lost your password?', 'yiontech'); ?></a>
                            </p>
                            <p>
                                <?php _e("Don't have an account?", 'yiontech'); ?> <a href="<?php echo esc_url(get_permalink(get_page_by_path('student-registration'))); ?>"><?php _e('Register Now', 'yiontech'); ?></a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="login-info">
                        <h3><?php _e('Welcome to YionTech Student Portal', 'yiontech'); ?></h3>
                        <p><?php _e('Log in to access your courses, view your progress, and manage your profile.', 'yiontech'); ?></p>
                        
                        <div class="login-features">
                            <div class="login-feature">
                                <i class="fas fa-graduation-cap"></i>
                                <h4><?php _e('Access Courses', 'yiontech'); ?></h4>
                                <p><?php _e('View and access all your enrolled courses in one place.', 'yiontech'); ?></p>
                            </div>
                            
                            <div class="login-feature">
                                <i class="fas fa-chart-line"></i>
                                <h4><?php _e('Track Progress', 'yiontech'); ?></h4>
                                <p><?php _e('Monitor your learning progress and completion status.', 'yiontech'); ?></p>
                            </div>
                            
                            <div class="login-feature">
                                <i class="fas fa-certificate"></i>
                                <h4><?php _e('Earn Certificates', 'yiontech'); ?></h4>
                                <p><?php _e('Download certificates upon course completion.', 'yiontech'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.yiontech-login-page {
    padding: 50px 0;
}

.login-container {
    display: flex;
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    overflow: hidden;
}

.login-form-container {
    flex: 1;
    padding: 40px;
}

.login-form-container h2 {
    margin-top: 0;
    margin-bottom: 30px;
    font-size: 28px;
    color: var(--dark);
}

.login-error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px 15px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.login-success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px 15px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.login-form-container .input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 15px;
}

.login-form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
}

.login-form-container .forgetmenot {
    margin-bottom: 20px;
}

.login-form-container .submit {
    margin-top: 20px;
}

.login-form-container .button-primary {
    width: 100%;
    padding: 12px;
    font-size: 16px;
}

.login-links {
    margin-top: 20px;
    text-align: center;
}

.login-links p {
    margin: 10px 0;
}

.login-info {
    flex: 1;
    padding: 40px;
    background-color: var(--primary);
    color: #fff;
}

.login-info h3 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
}

.login-features {
    margin-top: 30px;
}

.login-feature {
    margin-bottom: 25px;
}

.login-feature i {
    font-size: 24px;
    margin-bottom: 10px;
    display: block;
}

.login-feature h4 {
    margin: 0 0 10px;
    font-size: 18px;
}

.login-feature p {
    margin: 0;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
    }
    
    .login-info {
        padding: 30px;
    }
}
</style>

<?php get_footer(); ?>