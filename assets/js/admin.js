(function($) {
    'use strict';
    
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
            $('.yiontech-upload-logo-button').before(image_html);
        });
    });
    
    // Logo remove
    $('.yiontech-remove-logo-button').click(function(e) {
        e.preventDefault();
        $('#yiontech_logo').val('');
        $('.yiontech-upload-logo-button').prev('img').remove();
    });
    
})(jQuery);