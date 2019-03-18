<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */

if ( ! function_exists( 'ecommerce_gem_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function ecommerce_gem_load_widgets() {

		// Social.
		register_widget( 'eCommerce_Gem_Social_Widget' );

		// Latest news.
		register_widget( 'eCommerce_Gem_Latest_News_Widget' );

		// CTA widget.
		register_widget( 'eCommerce_Gem_CTA_Widget' );

		// Advertisement widget.
		register_widget( 'eCommerce_Gem_Advertisement_Widget' );

		// Features widget.
		register_widget( 'eCommerce_Gem_Features_Widget' );

		// Newsletter widget.
		register_widget( 'eCommerce_Gem_Newsletter_Widget' );

		// Contact widget.
		register_widget( 'eCommerce_Gem_Contact_Widget' );

	}

endif;

add_action( 'widgets_init', 'ecommerce_gem_load_widgets' );

//Social Links Widget
require get_template_directory() . '/includes/widgets/social-links.php';

//Features Widget
require get_template_directory() . '/includes/widgets/features.php';

//Latest News Widget
require get_template_directory() . '/includes/widgets/latest-news.php';

//Call to action Widget
require get_template_directory() . '/includes/widgets/cta.php';

//Advertisement Widget
require get_template_directory() . '/includes/widgets/advertisement.php';

//Newsletter Widget
require get_template_directory() . '/includes/widgets/newsletter.php';

//Contact Widget
require get_template_directory() . '/includes/widgets/contact.php';

//Add widget if woocommerce is active
if( class_exists( 'WooCommerce' ) ){

	if ( ! function_exists( 'ecommerce_gem_load_woocommerce_widgets' ) ) :

		/**
		 * Load widgets for woocommerce.
		 *
		 * @since 1.0.0
		 */
		function ecommerce_gem_load_woocommerce_widgets() {

			// Latest Products widget
			register_widget( 'eCommerce_Gem_Latest_Products_Widget' );

			// Featured Categories widget
			register_widget( 'eCommerce_Gem_Featured_Categories_Widget' );

		}

	endif;

	add_action( 'widgets_init', 'ecommerce_gem_load_woocommerce_widgets' );

	/**
	 * Latest Products Widget
	 */
	require get_template_directory() . '/includes/widgets/latest-products.php';

	/**
	 * Featured Categories Widget
	 */
	require get_template_directory() . '/includes/widgets/featured-categories.php';

}