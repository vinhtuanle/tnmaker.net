<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package eCommerce_Gem
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ecommerce_gem_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( class_exists( 'WooCommerce' ) && is_woocommerce() ){

		// Add class for global layout on woocommerce pages.
		$shop_layout 	= ecommerce_gem_get_option( 'shop_layout' );
		$shop_layout 	= apply_filters( 'ecommerce_gem_filter_theme_global_layout', $shop_layout );
		$classes[] = 'global-layout-' . esc_attr( $shop_layout );

	}else{

		// Add class for global layout.
		$global_layout = ecommerce_gem_get_option( 'global_layout' );
		$global_layout = apply_filters( 'ecommerce_gem_filter_theme_global_layout', $global_layout );
		$classes[] = 'global-layout-' . esc_attr( $global_layout );

	}

	//Add woocommerce class if woocommerce is active
	if ( class_exists( 'WooCommerce' ) && is_page_template( 'templates/home.php' ) ) {
		$classes[] = 'woocommerce';
	}

	//Add column class in body for woocommerce
	$product_number = ecommerce_gem_get_option( 'product_number' );

	if(  2 === $product_number || 3 === $product_number || 4 === $product_number ){

		$classes[] = 'columns-'.absint( $product_number );

	}else{

		$classes[] = 'columns-3';

	}

	// Add class for sticky sidebar.
	$sticky_sidebar = ecommerce_gem_get_option( 'enable_sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		$classes[] = 'global-sticky-sidebar';

	}

	return $classes;
}
add_filter( 'body_class', 'ecommerce_gem_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ecommerce_gem_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ecommerce_gem_pingback_header' );

/**
 * Display custom logo
 */
if ( ! function_exists( 'ecommerce_gem_the_custom_logo' ) ) :

	/**
	 * Displays custom logo.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_gem_the_custom_logo() {
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
	}
endif;

/**
 * Add go to top
 */
if ( ! function_exists( 'ecommerce_gem_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_gem_footer_goto_top() {
		echo '<a href="#page" class="scrollup" id="btn-scrollup"></a>';
	}
endif;
add_action( 'wp_footer', 'ecommerce_gem_footer_goto_top' );

if ( ! function_exists( 'ecommerce_gem_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function ecommerce_gem_implement_excerpt_length( $length ) {

		$excerpt_length = ecommerce_gem_get_option( 'excerpt_length' );
		
		if ( absint( $excerpt_length ) > 0 ) {

			$length = absint( $excerpt_length );

		}

		return $length;

	}
endif;

if ( ! function_exists( 'ecommerce_gem_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function ecommerce_gem_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = ecommerce_gem_get_option( 'readmore_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'ecommerce_gem_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function ecommerce_gem_implement_read_more( $more ) {

		$output = $more;

		$read_more_text = ecommerce_gem_get_option( 'readmore_text' );

		if ( ! empty( $read_more_text ) ) {

			$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="button btn-continue">' . esc_html( $read_more_text ) . '</a></p>';

		}

		return $output;

	}
endif;

if ( ! function_exists( 'ecommerce_gem_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_gem_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() || is_search() ) {

			add_filter( 'excerpt_length', 'ecommerce_gem_implement_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'ecommerce_gem_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'ecommerce_gem_implement_read_more' );

		}
	}
endif;
add_action( 'wp', 'ecommerce_gem_hook_read_more_filters' );

if ( ! function_exists( 'ecommerce_gem_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_gem_add_sidebar() {

		$global_layout = ecommerce_gem_get_option( 'global_layout' );
		$global_layout = apply_filters( 'ecommerce_gem_filter_theme_global_layout', $global_layout );

		// Include sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

	}
endif;
add_action( 'ecommerce_gem_action_sidebar', 'ecommerce_gem_add_sidebar' );

//=============================================================
// Check selected category on product search
//=============================================================
if ( ! function_exists( 'ecommerce_gem_selected_category' ) ) {

    function ecommerce_gem_selected_category( $catname ) {

        $q_var = ( isset( $_GET['product_cat'] ) ) ? esc_html( $_GET['product_cat'] ) : '';

        if ( $q_var === $catname ) {

            return 'selected="selected"';
        }

        return false;
    }

}

function ecommerce_gem_register_required_plugins() {
	
	$plugins = array(
				
		array(
			'name'      => esc_html__( 'WooCommerce', 'ecommerce-gem' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'     => esc_html__( 'One Click Demo Import', 'ecommerce-gem' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'MailChimp for WordPress', 'ecommerce-gem' ),
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Contact Form 7', 'ecommerce-gem' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'ecommerce-gem' ),
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Video Tab For WooCommerce', 'ecommerce-gem' ),
			'slug'     => 'video-tab-for-woocommerce',
			'required' => false,
		),

	);

	tgmpa( $plugins );
}

add_action( 'tgmpa_register', 'ecommerce_gem_register_required_plugins' );