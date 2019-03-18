<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */
if (!class_exists('eCommerce_Gem_Newsletter_Widget')) :

    /**
     * Newsletter widget class.
     *
     * @since 1.0.0
     */
    class eCommerce_Gem_Newsletter_Widget extends WP_Widget {

        /**
         * Constructor.
         *
         * @since 1.0.0
         */
        function __construct() {
            $opts = array(
                'classname' => 'ecommerce_gem_widget_newsletter',
                'description' => esc_html__('Newsletter Widget', 'ecommerce-gem'),
            );
            parent::__construct('ecommerce-gem-newsletter', esc_html__('eC-Gem: Newsletter', 'ecommerce-gem'), $opts);
        }

        /**
         * Echo the widget content.
         *
         * @since 1.0.0
         *
         * @param array $args     Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance) {
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            $sub_title = !empty($instance['sub_title']) ? esc_html($instance['sub_title']) : '';
            $shortcode = !empty($instance['shortcode']) ? esc_html($instance['shortcode']) : '';

            echo $args['before_widget'];
            ?>

            <div class="newsletter-content-holder newsletter-widget">

                <div class="content-wrap"> 

                    <div class="newsletter-wrapper">

                        <?php if (!empty($title) || !empty($sub_title)) { ?>

                            <div class="newsletter-text">

                                <span class="newsletter-icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/envelope.png" alt="<?php esc_attr_e('newsletter', 'ecommerce-gem'); ?>">
                                </span>

                                <?php
                                if ($title) {
                                    echo '<h3>' . esc_html($title) . '</h3>';
                                }

                                if ($sub_title) {
                                    ?>

                                    <p><?php echo esc_html($sub_title); ?></p>

                                <?php }
                                ?>

                            </div>

                        <?php } ?>

                        <?php if ($shortcode) { ?>

                            <div class="newsletter-form">

                                <?php echo do_shortcode(wp_kses_post($shortcode)); ?>

                            </div>

                        <?php } ?>

                    </div><!-- .newsletter-wrapper -->

                </div>

            </div><!-- .newsletter-widget -->

            <?php
            echo $args['after_widget'];
        }

        /**
         * Update widget instance.
         *
         * @since 1.0.0
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            {@see WP_Widget::form()}.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update($new_instance, $old_instance) {

            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            $instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);

            $instance['shortcode'] = sanitize_text_field($new_instance['shortcode']);

            return $instance;
        }

        /**
         * Output the settings update form.
         *
         * @since 1.0.0
         *
         * @param array $instance Current settings.
         */
        function form($instance) {

            $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'sub_title' => '',
                'shortcode' => '',
            ));
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('sub_title')); ?>"><strong><?php esc_html_e('Sub Title:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" type="text" value="<?php echo esc_attr($instance['sub_title']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('shortcode')); ?>"><strong><?php esc_html_e('Newsletter Shortcode:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('shortcode')); ?>" name="<?php echo esc_attr($this->get_field_name('shortcode')); ?>" type="text" value="<?php echo esc_attr($instance['shortcode']); ?>" />
                <small>
                    <?php esc_html_e('Shortcode of MailChimp or other mailing applications can be used.', 'ecommerce-gem'); ?>	
                </small>
            </p>
            <?php
        }

    }

    

    

    

            

endif;