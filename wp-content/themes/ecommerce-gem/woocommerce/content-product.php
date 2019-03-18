<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<?php 
	if ( class_exists( 'YITH_WCWL' ) ){

		$product_wrap = 'product-thumb-wrap yith-enabled';

	}else{

		$product_wrap = 'product-thumb-wrap';

	}
	?>
	<div class="<?php echo $product_wrap; ?>">
		<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

		<div class="add-to-cart-wrap">
			<?php 
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' ); ?>
		</div>
		<?php 

		$show_detail_icon = ecommerce_gem_get_option( 'show_detail_icon' );

		if( ( true === $show_detail_icon ) || ( class_exists( 'YITH_WCWL' ) ) ){ ?>
			<div class="view-detail-wishlist-wrap">
				<div class="view-detail-wishlist-inner">
					<?php 

					$wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) ); 

					if ( class_exists( 'YITH_WCWL' ) && ( absint( $wishlist_page_id ) > 0 ) ){ ?>
						<div class="add-to-wishlist-wrap">
							<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]'); ?>
						</div>
						<?php 
					} 


					if( true === $show_detail_icon ){ ?>

						<div class="view-detail-wrap">
							<?php 

							$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

							?>
							<a href="<?php echo esc_url( $link ); ?>" class="view-product"><i class="fa fa-eye" aria-hidden="true"></i></a>
						</div>
						<?php 
					} ?>
				</div>
			</div>
			<?php 
		} ?>
	</div>

	<div class="product-info-wrap">
		<?php

		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );

		?>
	</div>
</li>
