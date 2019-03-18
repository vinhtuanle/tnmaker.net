<?php
/**
 * Halcyon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Halcyon
 */

//define theme version
if ( !defined( 'HALCYON_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'HALCYON_THEME_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'halcyon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function halcyon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Halcyon, use a find and replace
	 * to change 'halcyon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'halcyon', get_template_directory() . '/languages' );
    
    
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'halcyon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'halcyon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(
    	'width'       => 230,
		'height'      => 50,
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    //Custom Image Sizes
    add_image_size( 'halcyon-slider', 1400, 500, true );
    add_image_size( 'halcyon-slider-thumb', 160, 90, true );
    add_image_size( 'halcyon-featured-post', 360, 290, true );
    add_image_size( 'halcyon-recent-post', 360, 160, true );
    add_image_size( 'halcyon-widget-post', 320, 320, true );
    add_image_size( 'halcyon-with-sidebar', 750, 450, true );
    add_image_size( 'halcyon-without-sidebar', 1170, 450, true );
    add_image_size( 'halcyon-schema', 600, 60, true );
    
}
endif;
add_action( 'after_setup_theme', 'halcyon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function halcyon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'halcyon_content_width', 750 );
}
add_action( 'after_setup_theme', 'halcyon_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function halcyon_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = halcyon_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}
add_action( 'template_redirect', 'halcyon_template_redirect_content_width' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function halcyon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'halcyon' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'halcyon' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'halcyon' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'halcyon' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'halcyon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function halcyon_scripts() {
    
    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    $halcyon_query_args = array(
		'family' => 'Raleway:400,500,600,700|Lato:400,700',
	);
    wp_enqueue_style( 'halcyon-google-fonts', add_query_arg( $halcyon_query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css' . $build . '/font-awesome' . $suffix . '.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'jquery.sidr.light', get_template_directory_uri() . '/css' . $build . '/jquery.sidr.light' . $suffix . '.css' );    
	wp_enqueue_style( 'halcyon-style', get_stylesheet_uri(), array(), HALCYON_THEME_VERSION );
	
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
    wp_enqueue_script( 'jquery.sidr', get_template_directory_uri() . '/js' . $build . '/jquery.sidr' . $suffix . '.js', array('jquery'), HALCYON_THEME_VERSION, true );    
    wp_register_script( 'halcyon-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), HALCYON_THEME_VERSION, true );
    
    $slider_auto      = get_theme_mod( 'halcyon_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'halcyon_slider_loop', '1' );
    $slider_control   = get_theme_mod( 'halcyon_slider_control', '1' );
    $slider_pager     = get_theme_mod( 'halcyon_slider_pager', '1' );
    $slider_animation = get_theme_mod( 'halcyon_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'halcyon_slider_speed', '400' );
    $slider_pause     = get_theme_mod( 'halcyon_slider_pause', '6000' );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'control'   => esc_attr( $slider_control ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'pause'     => absint( $slider_pause )
    );
    
    wp_localize_script( 'halcyon-custom', 'halcyon_data', $array );
    wp_enqueue_script( 'halcyon-custom' );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'halcyon_scripts' );

if ( is_admin() ) : // Load only if we are viewing an admin page
function halcyon_admin_scripts() {
	wp_enqueue_style( 'halcyon-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'halcyon-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'halcyon_admin_scripts' );
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Widget Featured Post
 */
require get_template_directory() . '/inc/widget-featured-post.php';

/**
 * Widget Popular Post
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Widget Social Links
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Meta Box
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Info
 */
require get_template_directory() . '/inc/info.php';