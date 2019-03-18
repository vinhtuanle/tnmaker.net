<?php
/**
 * Helper functions.
 *
 * @package eCommerce_Gem
 */

if ( ! function_exists( 'ecommerce_gem_get_the_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
	function ecommerce_gem_get_the_excerpt( $length = 0, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );
		if ( 0 === $length ) {
			return;
		}



		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'ecommerce_gem_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function ecommerce_gem_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Barlow, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Barlow font: on or off', 'ecommerce-gem' ) ) {
			$fonts[] = 'Barlow:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i';
		}

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'ecommerce-gem' ) ) {
			$fonts[] = 'Playfair Display:400,400i,700,700i,900,900i';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'ecommerce_gem_get_woocommerce_pages' ) ) :

	/**
	 * Returns WooCommerce pages.
	 *
	 * @since 1.0.0
	 *
	 * @return array Pages details.
	 */
	function ecommerce_gem_get_woocommerce_pages() {
		// WC pages to check against.
		$check_pages = array(
			esc_html_x( 'Shop base', 'page setting', 'ecommerce-gem' ) => array(
				'option'    => 'woocommerce_shop_page_id',
				'shortcode' => '',
			),
			esc_html_x( 'Cart', 'page setting', 'ecommerce-gem' ) => array(
				'option'    => 'woocommerce_cart_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_cart_shortcode_tag', 'woocommerce_cart' ) . ']',
			),
			esc_html_x( 'Checkout', 'page setting', 'ecommerce-gem' ) => array(
				'option'    => 'woocommerce_checkout_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_checkout_shortcode_tag', 'woocommerce_checkout' ) . ']',
			),
			esc_html_x( 'My account', 'page setting', 'ecommerce-gem' ) => array(
				'option'    => 'woocommerce_myaccount_page_id',
				'shortcode' => '[' . apply_filters( 'woocommerce_my_account_shortcode_tag', 'woocommerce_my_account' ) . ']',
			),
		);

		$pages_output = array();
		foreach ( $check_pages as $page_name => $values ) {
			$page_id = get_option( $values['option'] );
			$page_set = $page_exists = $page_visible = false;
			$shortcode_present = $shortcode_required = false;

			// Page checks.
			if ( $page_id ) {
				$page_set = true;
			}
			if ( get_post( $page_id ) ) {
				$page_exists = true;
			}
			if ( 'publish' === get_post_status( $page_id ) ) {
				$page_visible = true;
			}

			// Shortcode checks.
			if ( $values['shortcode']  && get_post( $page_id ) ) {
				$shortcode_required = true;
				$page = get_post( $page_id );
				if ( strstr( $page->post_content, $values['shortcode'] ) ) {
					$shortcode_present = true;
				}
			}

			// Wrap up our findings into an output array.
			$pages_output[] = array(
				'page_name'          => $page_name,
				'page_id'            => $page_id,
				'page_set'           => $page_set,
				'page_exists'        => $page_exists,
				'page_visible'       => $page_visible,
				'shortcode'          => $values['shortcode'],
				'shortcode_required' => $shortcode_required,
				'shortcode_present'  => $shortcode_present,
			);
		} // End foreach().

		return $pages_output;
	}

endif;

if ( ! function_exists( 'ecommerce_gem_woocommerce_pages_status' ) ) :

	/**
	 * Returns WooCommerce pages status.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Page status.
	 */
	function ecommerce_gem_woocommerce_pages_status() {
		$output = true;

		$pages = ecommerce_gem_get_woocommerce_pages();
		foreach ( $pages as $page ) {
			if ( true === $page['page_set'] ) {
				if ( true === $page['shortcode_required'] && true !== $page['shortcode_present'] ) {
					$output = false;
					break;
				}
			} else {
				$output = false;
				break;
			}
		}

		return $output;
	}

endif;

if ( ! function_exists( 'ecommerce_gem_woocommerce_pages_status_message' ) ) :

	/**
	 * Returns WooCommerce pages status message.
	 *
	 * @since 1.0.0
	 *
	 * @return string Message.
	 */
	function ecommerce_gem_woocommerce_pages_status_message() {
		$output = '';

		$pages = ecommerce_gem_get_woocommerce_pages();
		foreach ( $pages as $page ) {
			if ( true === $page['page_set'] ) {
				if ( true === $page['shortcode_required'] && true !== $page['shortcode_present'] ) {
					$output .= '<li>' . sprintf( esc_html__( '%1$s page does not contain %2$s shortcode.', 'ecommerce-gem' ), $page['page_name'], $page['shortcode'] ) . '</li>';
				}
			} else {
				$output .= '<li>' . sprintf( esc_html__( '%s page is not set.', 'ecommerce-gem' ), $page['page_name'] ) . '</li>';
			}
		}

		if ( ! empty( $output ) ) {
			$output = '<ul>' . $output . '</ul>';
		}

		return $output;
	}

endif;