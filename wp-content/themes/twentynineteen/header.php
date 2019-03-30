<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/interactjs@next/dist/interact.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentynineteen'); ?></a>

        <header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

            <div class="site-branding-container">
                <?php get_template_part('template-parts/header/site', 'branding'); ?>
            </div><!-- .layout-wrap -->

            <?php if (is_singular() && twentynineteen_can_show_post_thumbnail()) : ?>
            <div class="site-featured-image">
                <?php
				twentynineteen_post_thumbnail();
				the_post();
				$discussion = !is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

				$classes = 'entry-header';
				if (!empty($discussion) && absint($discussion->responses) > 0) {
					$classes = 'entry-header has-discussion';
				}
				?>
                <div class="<?php echo $classes; ?>">
                    <?php get_template_part('template-parts/header/entry', 'header'); ?>
                </div><!-- .entry-header -->
                <?php rewind_posts(); ?>
            </div>
            <?php endif; ?>
        </header><!-- #masthead -->

        <div id="content" class="site-content"> 