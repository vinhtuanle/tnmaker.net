<?php
/**
 * Core functions.
 *
 * @package eCommerce_Gem
 */

if ( ! function_exists( 'ecommerce_gem_get_option' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function ecommerce_gem_get_option( $key ) {

        if ( empty( $key ) ) {

            return;

        }

        $ecommerce_gem_default = ecommerce_gem_get_default_theme_options();

        $default = ( isset( $ecommerce_gem_default[ $key ] ) ) ? $ecommerce_gem_default[ $key ] : '';
        $theme_options = get_theme_mod( 'theme_options', $ecommerce_gem_default );
        $theme_options = array_merge( $ecommerce_gem_default, $theme_options );
        $value = '';

        if ( isset( $theme_options[ $key ] ) ) {
            $value = $theme_options[ $key ];
        }

        return $value;

    }

endif;

if ( ! function_exists( 'ecommerce_gem_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function ecommerce_gem_get_default_theme_options() {

        $defaults = array();

        //primary color
        $defaults['primary_color']      = '#fa6161';

        // Header.
        $defaults['site_identity']      = 'title-text';
        $defaults['show_top_header']    = false;
        $defaults['top_left_type']      = 'store-info';
        $defaults['show_social_icons']  = false;
        $defaults['show_login_logout']  = true;
        $defaults['login_text']         = esc_html__( 'Login / Register', 'ecommerce-gem' );
        $defaults['login_icon']         = 'fa-user-o';
        $defaults['show_cart']          = true;
        $defaults['cart_icon']          = 'fa-shopping-cart';
        $defaults['show_wishlist']      = false;
        $defaults['wishlist_icon']      = 'fa-heart';
        $defaults['show_top_search']    = true;
        $defaults['search_products_text']  = esc_html__( 'Search Products ...', 'ecommerce-gem' );
        $defaults['select_category_text']  = esc_html__( 'Select Category', 'ecommerce-gem' );

        // Layout.
        $defaults['enable_sticky_sidebar']  = true;
        $defaults['global_layout']          = 'right-sidebar';
        $defaults['excerpt_length']         = 40;
        $defaults['readmore_text']          = esc_html__( 'Read More', 'ecommerce-gem' );

        // Shop page
        $defaults['shop_layout']            = 'right-sidebar';
        $defaults['product_per_page']       = 9;
        $defaults['product_number']         = 3;
        $defaults['hide_product_sorting']   = false;
        $defaults['enable_gallery_zoom']    = false;
        $defaults['show_detail_icon']       = false;
        $defaults['disable_related_products']= false;
        
        // Footer.
        $defaults['copyright_text']     = esc_html__( 'Copyright &copy; All rights reserved.', 'ecommerce-gem' );

        // Breadcrumb.
        $defaults['breadcrumb_type']    = 'simple';
        $defaults['breadcrumb_text']    = esc_html__( 'Home', 'ecommerce-gem' );

        // Slider.
        $defaults['slider_status']                  = false;
        $defaults['button_text_1']                  = esc_html__( 'Shop Now', 'ecommerce-gem' );
        $defaults['button_text_2']                  = esc_html__( 'Shop Now', 'ecommerce-gem' );
        $defaults['button_text_3']                  = esc_html__( 'Shop Now', 'ecommerce-gem' );
        $defaults['button_text_4']                  = esc_html__( 'Shop Now', 'ecommerce-gem' );
        $defaults['button_text_5']                  = esc_html__( 'Shop Now', 'ecommerce-gem' );
        $defaults['caption_position_1']             = 'left';
        $defaults['caption_position_2']             = 'left';
        $defaults['caption_position_3']             = 'left';
        $defaults['caption_position_4']             = 'left';
        $defaults['caption_position_5']             = 'left';
        $defaults['slider_autoplay_status']         = true;
        $defaults['slider_pager_status']            = true;
        $defaults['slider_transition_effect']       = 'fade';
        $defaults['slider_transition_delay']        = 3;

        return $defaults;
    }

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'ecommerce_gem_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function ecommerce_gem_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;