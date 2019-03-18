<?php
/**
 * Helper functions.
 *
 * @package eCommerce_Gem
 */
// Slider status.
$slider_status = ecommerce_gem_get_option('slider_status');
if (1 !== absint($slider_status)) {
    return;
}

if (!( is_front_page()) && !is_page_template('templates/home.php')) {
    return;
}

// Slider settings.
$slider_transition_effect = ecommerce_gem_get_option('slider_transition_effect');
$slider_transition_delay = ecommerce_gem_get_option('slider_transition_delay');
$slider_pager_status = ecommerce_gem_get_option('slider_pager_status');
$slider_autoplay_status = ecommerce_gem_get_option('slider_autoplay_status');

$slider_readmore_text = ecommerce_gem_get_option('slider_readmore_text');

$slick_args = array(
    'dots' => true,
    'arrows' => false,
    'slidesToShow' => 1,
    'slidesToScroll' => 1,
);

if (1 === absint($slider_autoplay_status)) {
    $slick_args['autoplay'] = true;
    $slick_args['autoplaySpeed'] = 1000 * absint($slider_transition_delay);
}

if ('fade' === $slider_transition_effect) {
    $slick_args['fade'] = true;
} else {
    $slick_args['fade'] = false;
}

$slick_args_encoded = wp_json_encode($slick_args);

$slider_number = 5;

$page_ids = array();

for ($i = 1; $i <= $slider_number; $i++) {
    $page_id = ecommerce_gem_get_option("slider_page_$i");
    if (absint($page_id) > 0) {
        $page_ids[] = absint($page_id);
    }
}

if (empty($page_ids)) {
    return;
}

$slider_args = array(
    'posts_per_page' => count($page_ids),
    'orderby' => 'post__in',
    'post_type' => 'page',
    'post__in' => $page_ids,
    'meta_query' => array(
        array('key' => '_thumbnail_id'
        ),
    ),
);

$slider_posts = new WP_Query($slider_args);

if ($slider_posts->have_posts()) :
    ?>

    <div class="main-slider" data-slick='<?php echo $slick_args_encoded; ?>'>

        <?php
        $count = 1;

        while ($slider_posts->have_posts()) :

            $slider_posts->the_post();

            $caption_position = ecommerce_gem_get_option('caption_position_' . $count);

            $readmore_text = ecommerce_gem_get_option('button_text_' . $count);

            $readmore_link = ecommerce_gem_get_option('button_link_' . $count);

            $image_array = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

            ?>
            <div class="item caption-position-<?php echo esc_attr($caption_position); ?>" style="background: url(<?php echo esc_url($image_array[0]); ?>); background-size: cover; background-position: center center;">

                <div class="slider-caption">
                    <div class="container">
                        <div class="caption-wrap">
                            <div class="caption-inner">
                                <span><?php the_title(); ?></span>
                                <div class="slider-meta"><?php the_content(); ?></div>
                                <?php if (!empty($readmore_text) && !empty($readmore_link)) { ?>
                                    <a href="<?php echo esc_url($readmore_link); ?>" class="button slider-button"><?php echo esc_html($readmore_text); ?></a>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div><!-- .caption-wrap -->
                </div><!-- .slider-caption -->

            </div>

            <?php
            $count++;

        endwhile;

        wp_reset_postdata();
        ?>

    </div> <!-- #main-slider -->
    <?php

    
		endif;