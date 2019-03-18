<?php
/**
 * Functions for active_callback.
 *
 * @package eCommerce_Gem
 */

if ( ! function_exists( 'ecommerce_gem_is_featured_slider_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_featured_slider_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[slider_status]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;


if ( ! function_exists( 'ecommerce_gem_is_top_header_active' ) ) :

	/**
	 * Check if featured slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_header_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_top_header_information_active' ) ) :

	/**
	 * Check if top header is active and store information is selected slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_header_information_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() && $control->manager->get_setting( 'theme_options[top_left_type]' )->value() == 'store-info' ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_top_login_logout_active' ) ) :

	/**
	 * Check if login/register option is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_login_logout_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() && true == $control->manager->get_setting( 'theme_options[show_login_logout]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_top_cart_active' ) ) :

	/**
	 * Check if cart option is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_cart_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() && true == $control->manager->get_setting( 'theme_options[show_cart]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_top_wishlist_active' ) ) :

	/**
	 * Check if wishlist option is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_wishlist_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_header]' )->value() && true == $control->manager->get_setting( 'theme_options[show_wishlist]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_top_product_search_active' ) ) :

	/**
	 * Check if show product search at top header option is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_top_product_search_active( $control ) {

		if ( true == $control->manager->get_setting( 'theme_options[show_top_search]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

if ( ! function_exists( 'ecommerce_gem_is_breadcrumb_active' ) ) :

	/**
	 * Check if breadcrumb is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function ecommerce_gem_is_breadcrumb_active( $control ) {

		if ( 'simple' == $control->manager->get_setting( 'theme_options[breadcrumb_type]' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;