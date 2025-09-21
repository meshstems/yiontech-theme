<?php
/**
 * Customizer Control
 */

class YionTech_Customizer_Control extends WP_Customize_Control {
    public $type = 'select';
    
    public function render_content() {
        if (empty($this->choices))
            return;
            
        ?>
        <label>
            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>
            
            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
            
            <select <?php $this->link(); ?>>
                <?php
                foreach ($this->choices as $value => $label) {
                    echo '<option value="' . esc_attr($value) . '" ' . selected($this->value(), $value, false) . '>' . $label . '</option>';
                }
                ?>
            </select>
        </label>
        <?php
    }
}