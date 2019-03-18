<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */
if (!class_exists('eCommerce_Gem_Latest_News_Widget')) :

    /**
     * Latest News widget class.
     *
     * @since 1.0.0
     */
    class eCommerce_Gem_Latest_News_Widget extends WP_Widget {

        function __construct() {
            $opts = array(
                'classname' => 'ecommerce_gem_widget_latest_news',
                'description' => esc_html__('Widget to dispaly latest posts with thumbnail, title, short content and read more link', 'ecommerce-gem'),
            );

            parent::__construct('ecommerce-gem-latest-news', esc_html__('eC-Gem: Latest News', 'ecommerce-gem'), $opts);
        }

        function widget($args, $instance) {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            $post_category = !empty($instance['post_category']) ? $instance['post_category'] : 0;

            $exclude_categories = !empty($instance['exclude_categories']) ? esc_attr($instance['exclude_categories']) : '';

            $excerpt_length = !empty($instance['excerpt_length']) ? $instance['excerpt_length'] : 15;

            $disable_date = !empty($instance['disable_date']) ? $instance['disable_date'] : 0;

            echo $args['before_widget'];
            ?>

            <div class="latest-news-widget latest-news-section">
                <?php
                if ($title) {

                    echo $args['before_title'] . esc_html($title) . $args['after_title'];
                }
                ?>

                <div class="blogs-wrapper">

                    <?php
                    $query_args = array(
                        'posts_per_page' => 3,
                        'no_found_rows' => true,
                        'post__not_in' => get_option('sticky_posts'),
                        'ignore_sticky_posts' => true,
                    );

                    if (absint($post_category) > 0) {

                        $query_args['cat'] = absint($post_category);
                    }

                    if (!empty($exclude_categories)) {

                        $exclude_ids = explode(',', $exclude_categories);

                        $query_args['category__not_in'] = $exclude_ids;
                    }

                    $all_posts = new WP_Query($query_args);

                    if ($all_posts->have_posts()) :
                        ?>

                        <div class="inner-wrapper">

                            <?php
                            $post_count = $all_posts->post_count;

                            while ($all_posts->have_posts()) :

                                $all_posts->the_post();
                                ?>

                                <div class="blog-item">
                                    <div class="blog-inner">

                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="blog-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('ecommerce-gem-common'); ?>
                                                </a>
                                            </div><!-- .blog-thumbnail -->
                                        <?php endif; ?>

                                        <div class="blog-text-wrap">

                                            <?php if (1 != $disable_date) { ?>

                                                <div class="date-header">
                                                    <span><?php echo esc_html(get_the_date()); ?></span>
                                                </div>

                                            <?php } ?>

                                            <div class="entry-content">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <?php
                                                $content = ecommerce_gem_get_the_excerpt(absint($excerpt_length));

                                                echo $content ? wpautop(wp_kses_post($content)) : '';
                                                ?>
                                            </div>

                                        </div>

                                    </div><!-- .blog-inner -->
                                </div><!-- .blog-item --> 

                                <?php
                            endwhile;

                            wp_reset_postdata();
                            ?>

                        </div>

                    <?php endif; ?>

                </div>

            </div><!-- .latest-news-widget -->

            <?php
            echo $args['after_widget'];
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['post_category'] = absint($new_instance['post_category']);
            $instance['exclude_categories'] = sanitize_text_field($new_instance['exclude_categories']);
            $instance['excerpt_length'] = absint($new_instance['excerpt_length']);
            $instance['disable_date'] = (bool) $new_instance['disable_date'] ? 1 : 0;

            return $instance;
        }

        function form($instance) {

            $instance = wp_parse_args((array) $instance, array(
                'title' => '',
                'post_category' => '',
                'exclude_categories' => '',
                'excerpt_length' => 15,
                'disable_date' => 0,
            ));
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_category')); ?>"><strong><?php esc_html_e('Select Category:', 'ecommerce-gem'); ?></strong></label>
                <?php
                $cat_args = array(
                    'orderby' => 'name',
                    'hide_empty' => 0,
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'name' => $this->get_field_name('post_category'),
                    'id' => $this->get_field_id('post_category'),
                    'selected' => absint($instance['post_category']),
                    'show_option_all' => esc_html__('All Categories', 'ecommerce-gem'),
                );
                wp_dropdown_categories($cat_args);
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('exclude_categories')); ?>"><strong><?php esc_html_e('Exclude Categories:', 'ecommerce-gem'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('exclude_categories')); ?>" name="<?php echo esc_attr($this->get_field_name('exclude_categories')); ?>" type="text" value="<?php echo esc_attr($instance['exclude_categories']); ?>" />
                <small>
                    <?php esc_html_e('Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'ecommerce-gem'); ?>	
                </small>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>">
                    <?php esc_html_e('Excerpt Length:', 'ecommerce-gem'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excerpt_length')); ?>" name="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>" type="number" value="<?php echo absint($instance['excerpt_length']); ?>" />
            </p>

            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['disable_date']); ?> id="<?php echo $this->get_field_id('disable_date'); ?>" name="<?php echo $this->get_field_name('disable_date'); ?>" />
                <label for="<?php echo $this->get_field_id('disable_date'); ?>"><?php esc_html_e('Hide Posted Date', 'ecommerce-gem'); ?></label>
            </p>
            <?php
        }

    }

    

    

endif;