<?php
/**
 * Student Profile Template
 *
 * @package YionTech
 * @since 1.0.0
 */

get_header();
?>
<div class="container">
    <div class="site-content">
        <div class="content-area">
            <div class="yiontech-student-profile">
                <h1><?php _e('Student Profile', 'yiontech'); ?></h1>
                
                <div class="profile-header">
                    <div class="profile-avatar">
                        <?php echo get_avatar(get_current_user_id(), 100); ?>
                    </div>
                    <div class="profile-info">
                        <h2><?php echo esc_html(get_user_meta(get_current_user_id(), 'first_name', true) . ' ' . get_user_meta(get_current_user_id(), 'last_name', true)); ?></h2>
                        <div class="profile-status">
                            <span class="status-badge status-<?php echo esc_attr(get_user_meta(get_current_user_id(), 'student_status', true)); ?>"><?php echo esc_html(ucfirst(get_user_meta(get_current_user_id(), 'student_status', true))); ?></span>
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
                                        <input type="text" name="first_name" id="profile-first-name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'first_name', true)); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-last-name"><?php _e('Last Name', 'yiontech'); ?></label>
                                        <input type="text" name="last_name" id="profile-last-name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'last_name', true)); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="profile-email"><?php _e('Email', 'yiontech'); ?></label>
                                        <input type="email" name="email" id="profile-email" value="<?php echo esc_attr(wp_get_current_user()->user_email); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-phone"><?php _e('Phone', 'yiontech'); ?></label>
                                        <input type="tel" name="phone" id="profile-phone" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'phone', true)); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="profile-department"><?php _e('Department', 'yiontech'); ?></label>
                                        <input type="text" name="department" id="profile-department" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'department', true)); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-year"><?php _e('Year of Study', 'yiontech'); ?></label>
                                        <select name="year" id="profile-year">
                                            <option value=""><?php _e('Select Year', 'yiontech'); ?></option>
                                            <option value="1" <?php selected(get_user_meta(get_current_user_id(), 'year', true), '1'); ?>><?php _e('1st Year', 'yiontech'); ?></option>
                                            <option value="2" <?php selected(get_user_meta(get_current_user_id(), 'year', true), '2'); ?>><?php _e('2nd Year', 'yiontech'); ?></option>
                                            <option value="3" <?php selected(get_user_meta(get_current_user_id(), 'year', true), '3'); ?>><?php _e('3rd Year', 'yiontech'); ?></option>
                                            <option value="4" <?php selected(get_user_meta(get_current_user_id(), 'year', true), '4'); ?>><?php _e('4th Year', 'yiontech'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="profile-address"><?php _e('Address', 'yiontech'); ?></label>
                                        <textarea name="address" id="profile-address" rows="3"><?php echo esc_textarea(get_user_meta(get_current_user_id(), 'address', true)); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="button button-primary"><?php _e('Update Profile', 'yiontech'); ?></button>
                                </div>
                            </form>
                        </div>
                        
                        <div id="profile-documents" class="tab-panel">
                            <div class="documents-list">
                                <?php
                                $documents = get_user_meta(get_current_user_id(), 'student_documents', true);
                                if (!empty($documents)) :
                                ?>
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
                                $enrolled_courses = tutor_utils()->get_enrolled_courses_by_user(get_current_user_id());
                                
                                if (!empty($enrolled_courses)) {
                                    echo '<div class="courses-grid">';
                                    
                                    foreach ($enrolled_courses as $course) {
                                        $course_id = $course->ID;
                                        $course_title = get_the_title($course_id);
                                        $course_permalink = get_permalink($course_id);
                                        $course_image = get_the_post_thumbnail($course_id, 'medium');
                                        $course_progress = tutor_utils()->get_course_completed_percent($course_id, get_current_user_id());
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

<?php get_footer(); ?>