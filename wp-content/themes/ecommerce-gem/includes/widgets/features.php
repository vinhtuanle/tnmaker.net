<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */
if (!class_exists('eCommerce_Gem_Features_Widget')) :

    /**
     * Features widget class.
     *
     * @since 1.0.0
     */
    class eCommerce_Gem_Features_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname' => 'ecommerce_gem_widget_features',
                'description' => esc_html__('Widget to display features with icon and description including one main image.', 'ecommerce-gem'),
            );
            parent::__construct('ecommerce-gem-features', esc_html__('eC-Gem: Features', 'ecommerce-gem'), $opts);
        }

        function widget($args, $instance) {

            $icon_one = !empty($instance['icon_one']) ? $instance['icon_one'] : '';
            $feature_one = !empty($instance['feature_one']) ? $instance['feature_one'] : '';
            $text_one = !empty($instance['text_one']) ? $instance['text_one'] : '';

            $icon_two = !empty($instance['icon_two']) ? $instance['icon_two'] : '';
            $feature_two = !empty($instance['feature_two']) ? $instance['feature_two'] : '';
            $text_two = !empty($instance['text_two']) ? $instance['text_two'] : '';

            $icon_three = !empty($instance['icon_three']) ? $instance['icon_three'] : '';
            $feature_three = !empty($instance['feature_three']) ? $instance['feature_three'] : '';
            $text_three = !empty($instance['text_three']) ? $instance['text_three'] : '';


            echo $args['before_widget'];
            ?>

            <div class="features-list">

                <div class="features-wrapper">
                    <?php if (!empty($icon_one) || !empty($feature_one) || !empty($text_one)) { ?>
                        <div class="feature-item feature-item-one">
                            <div class="feature-inner">
                                <?php if (!empty($icon_one)) { ?>
                                    <span class="feature-icon">
                                        <span class="<?php echo esc_html($icon_one); ?>"></span>
                                    </span>
                                <?php }
                                ?>

                                <?php if (!empty($feature_one) || !empty($text_one)) { ?>
                                    <div class="feature-text-wrap">
                                        <?php if (!empty($feature_one)) { ?>
                                            <h4 class="feature-title"><?php echo esc_html($feature_one); ?></h4>
                                        <?php }
                                        ?>

                                        <?php if (!empty($text_one)) { ?>
                                            <p><?php echo esc_html($text_one); ?></p>
                                        <?php }
                                        ?>

                                    </div> <!-- .feature-text-wrap -->
                                <?php }
                                ?>
                            </div>
                        </div><!-- .feature-item -->
                    <?php } ?>

                    <?php if (!empty($icon_two) || !empty($feature_two) || !empty($text_two)) { ?>
                        <div class="feature-item feature-item-two">
                            <div class="feature-inner">
                                <?php if (!empty($icon_two)) { ?>
                                    <span class="feature-icon">
                                        <span class="<?php echo esc_html($icon_two); ?>"></span>
                                    </span>
                                <?php }
                                ?>

                                <?php if (!empty($feature_two) || !empty($text_two)) { ?>
                                    <div class="feature-text-wrap">
                                        <?php if (!empty($feature_two)) { ?>
                                            <h4 class="feature-title"><?php echo esc_html($feature_two); ?></h4>
                                        <?php }
                                        ?>

                                        <?php if (!empty($text_two)) { ?>
                                            <p><?php echo esc_html($text_two); ?></p>
                                        <?php }
                                        ?>

                                    </div> <!-- .feature-text-wrap -->
                                <?php }
                                ?>
                            </div>
                        </div><!-- .feature-item -->
                    <?php } ?>

                    <?php if (!empty($icon_three) || !empty($feature_three) || !empty($text_three)) { ?>
                        <div class="feature-item feature-item-three">
                            <div class="feature-inner">
                                <?php if (!empty($icon_three)) { ?>
                                    <span class="feature-icon">
                                        <span class="<?php echo esc_html($icon_three); ?>"></span>
                                    </span>
                                <?php }
                                ?>

                                <?php if (!empty($feature_three) || !empty($text_three)) { ?>
                                    <div class="feature-text-wrap">
                                        <?php if (!empty($feature_three)) { ?>
                                            <h4 class="feature-title"><?php echo esc_html($feature_three); ?></h4>
                                        <?php }
                                        ?>

                                        <?php if (!empty($text_three)) { ?>
                                            <p><?php echo esc_html($text_three); ?></p>
                                        <?php }
                                        ?>

                                    </div> <!-- .feature-text-wrap -->
                                <?php }
                                ?>
                            </div>
                        </div><!-- .feature-item -->
                    <?php } ?>

                </div>

            </div><!-- .features-list -->

            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;

            $instance['icon_one'] = sanitize_text_field($new_instance['icon_one']);
            $instance['feature_one'] = sanitize_text_field($new_instance['feature_one']);
            $instance['text_one'] = sanitize_text_field($new_instance['text_one']);

            $instance['icon_two'] = sanitize_text_field($new_instance['icon_two']);
            $instance['feature_two'] = sanitize_text_field($new_instance['feature_two']);
            $instance['text_two'] = sanitize_text_field($new_instance['text_two']);

            $instance['icon_three'] = sanitize_text_field($new_instance['icon_three']);
            $instance['feature_three'] = sanitize_text_field($new_instance['feature_three']);
            $instance['text_three'] = sanitize_text_field($new_instance['text_three']);

            return $instance;
        }

        function form($instance) {

            // Defaults.
            $defaults = array(
                'icon_one' => 'icon-refresh',
                'feature_one' => '',
                'text_one' => '',
                'icon_two' => 'icon-wallet',
                'feature_two' => '',
                'text_two' => '',
                'icon_three' => 'icon-chat',
                'feature_three' => '',
                'text_three' => '',
            );

            $instance = wp_parse_args((array) $instance, $defaults);

            $icon_one = !empty($instance['icon_one']) ? $instance['icon_one'] : '';
            $feature_one = !empty($instance['feature_one']) ? $instance['feature_one'] : '';
            $text_one = !empty($instance['text_one']) ? $instance['text_one'] : '';

            $icon_two = !empty($instance['icon_two']) ? $instance['icon_two'] : '';
            $feature_two = !empty($instance['feature_two']) ? $instance['feature_two'] : '';
            $text_two = !empty($instance['text_two']) ? $instance['text_two'] : '';

            $icon_three = !empty($instance['icon_three']) ? $instance['icon_three'] : '';
            $feature_three = !empty($instance['feature_three']) ? $instance['feature_three'] : '';
            $text_three = !empty($instance['text_three']) ? $instance['text_three'] : '';
            ?>
            <p>
                <small>

                    <?php printf(esc_html__('ET-LINE icons are used for icon of each blocks. You can find icon code %1$shere%2$s.', 'ecommerce-gem'), '<a href="http://rhythm.nikadevs.com/content/icons-et-line" target="_blank">', '</a>'); ?>
                </small>
            </p>

            <h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e('Feature #1', 'ecommerce-gem'); ?></strong></span>
            </h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id("icon_one")); ?>"><strong><?php esc_html_e('Icon:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id("icon_one")); ?>" name="<?php echo esc_attr($this->get_field_name("icon_one")); ?>" type="text" value="<?php echo esc_attr($icon_one); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('feature_one')); ?>">
                    <?php esc_html_e('Title:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('feature_one')); ?>" name="<?php echo esc_attr($this->get_field_name('feature_one')); ?>" type="text" value="<?php echo esc_attr($feature_one); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('text_one')); ?>">
                    <?php esc_html_e('Short Description:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text_one')); ?>" name="<?php echo esc_attr($this->get_field_name('text_one')); ?>" type="text" value="<?php echo esc_attr($text_one); ?>" />		
            </p>

            <h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e('Feature #2', 'ecommerce-gem'); ?></strong></span>
            </h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id("icon_two")); ?>"><strong><?php esc_html_e('Icon:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id("icon_two")); ?>" name="<?php echo esc_attr($this->get_field_name("icon_two")); ?>" type="text" value="<?php echo esc_attr($icon_two); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('feature_two')); ?>">
                    <?php esc_html_e('Title:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('feature_two')); ?>" name="<?php echo esc_attr($this->get_field_name('feature_two')); ?>" type="text" value="<?php echo esc_attr($feature_two); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('text_two')); ?>">
                    <?php esc_html_e('Short Description:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text_two')); ?>" name="<?php echo esc_attr($this->get_field_name('text_two')); ?>" type="text" value="<?php echo esc_attr($text_two); ?>" />		
            </p>

            <h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e('Feature #3', 'ecommerce-gem'); ?></strong></span>
            </h4>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id("icon_three")); ?>"><strong><?php esc_html_e('Icon:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id("icon_three")); ?>" name="<?php echo esc_attr($this->get_field_name("icon_three")); ?>" type="text" value="<?php echo esc_attr($icon_three); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('feature_three')); ?>">
                    <?php esc_html_e('Title:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('feature_three')); ?>" name="<?php echo esc_attr($this->get_field_name('feature_three')); ?>" type="text" value="<?php echo esc_attr($feature_three); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('text_three')); ?>">
                    <?php esc_html_e('Short Description:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text_three')); ?>" name="<?php echo esc_attr($this->get_field_name('text_three')); ?>" type="text" value="<?php echo esc_attr($text_three); ?>" />		
            </p>

            <?php
        }

    }

    

    

endif;