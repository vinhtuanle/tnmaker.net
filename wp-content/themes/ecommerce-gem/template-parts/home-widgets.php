<?php
/**
 * Home widgets
 *
 * @package eCommerce_Gem
 */

// Bail if not home page.
if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}
?>

<div id="home-page-widget-area" class="widget-area">
	
		<?php if ( is_active_sidebar( 'home-page-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'home-page-widget-area' ); ?>
		<?php else: ?>
			<div class="container">
				<?php
				if ( current_user_can( 'edit_theme_options' ) ) { ?>
					<p><?php
						printf(
							wp_kses(
								/* translators: 1: link to WP admin new post page. */
								__( 'No widgets found. Please add widgets to Home Page Widget Area. <a href="%1$s">Get started here</a>.', 'ecommerce-gem' ),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							),
							esc_url( admin_url( 'widgets.php' ) )
						);
					?></p>
					<?php
				}else{ ?>

					<p><?php esc_html_e( 'No widgets found. Please add widgets to Home Page Widget Area.', 'ecommerce-gem' ); ?></p>

					<?php

				} ?>
			</div>
		<?php endif; ?>
	
</div><!-- #home-page-widget-area -->

