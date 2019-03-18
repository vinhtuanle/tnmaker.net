<?php
/**
 * Custom Controls of theme
 *
 * @package eCommerce_Gem
 */

class eCommerce_Gem_Info extends WP_Customize_Control {
    public $type = 'info';
    public $label = '';
    public function render_content() {
    ?>
        <h2><?php echo esc_html( $this->label ); ?></h2>
    <?php
    }
}