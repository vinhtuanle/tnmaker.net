<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_Gem
 */

?>
<?php
	/**
	 * Hook - ecommerce_gem_doctype.
	 *
	 * @hooked ecommerce_gem_doctype_action - 10
	 */
	do_action( 'ecommerce_gem_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - ecommerce_gem_head.
	 *
	 * @hooked ecommerce_gem_head_action - 10
	 */
	do_action( 'ecommerce_gem_head' );
	
	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<?php
		/**
		 * Hook - ecommerce_gem_top_header.
		 *
		 * @hooked ecommerce_gem_top_header_action - 10
		 */
		do_action( 'ecommerce_gem_top_header' );

		/**
		* Hook - winsone_before_header.
		*
		* @hooked ecommerce_gem_before_header_action - 10
		*/
		do_action( 'ecommerce_gem_before_header' );

		/**
		* Hook - ecommerce_gem_header.
		*
		* @hooked ecommerce_gem_header_action - 10
		*/
		do_action( 'ecommerce_gem_header' );

		/**
		* Hook - ecommerce_gem_after_header.
		*
		* @hooked ecommerce_gem_after_header_action - 10
		*/
		do_action( 'ecommerce_gem_after_header' );

		/**
		* Hook - ecommerce_gem_main_content.
		*
		* @hooked ecommerce_gem_main_content_for_slider - 5
		* @hooked ecommerce_gem_main_content_for_breadcrumb - 7
		* @hooked ecommerce_gem_main_content_for_home_widgets - 9
		*/
		do_action( 'ecommerce_gem_main_content' );

		/**
		* Hook - ecommerce_gem_before_content.
		*
		* @hooked ecommerce_gem_before_content_action - 10
		*/
		do_action( 'ecommerce_gem_before_content' );