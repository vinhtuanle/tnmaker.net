<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_Gem
 */

?>

<aside id="sidebar-primary" class="widget-area sidebar" role="complementary">
	<?php 

	if( class_exists( 'WooCommerce' ) && is_woocommerce() ){

		dynamic_sidebar( 'shop-sidebar' ); 

	}else{

		dynamic_sidebar( 'sidebar-1' ); 

	}

	?>
</aside><!-- #secondary -->
