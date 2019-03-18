<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eCommerce_Gem
 */

if ( ! function_exists( 'ecommerce_gem_dynamic_options' ) ) :

    function ecommerce_gem_dynamic_options(){

        $primary_color   =  ecommerce_gem_get_option( 'primary_color' ); ?>               
            
        <style type="text/css">
            button, 
            .comment-reply-link, 
            a.button, input[type="button"], 
            input[type="reset"], 
            input[type="submit"],
            .main-slider .slider-caption .caption-wrap .button,
            .slick-dots li.slick-active button,
            .ecommerce_gem_widget_call_to_action .cta-widget:before,
            .blog-item .blog-text-wrap .date-header,
            #breadcrumb,
            #sidebar-primary .widget .widget-title:after, 
            #primary .page-header .page-title:after,
            .woocommerce nav.woocommerce-pagination ul li .page-numbers, 
            .pagination .nav-links .page-numbers,
            .nav-links .page-numbers.current, 
            .nav-links a.page-numbers:hover,
            .error-404.not-found form.search-form input[type="submit"], 
            .search-no-results form.search-form input[type="submit"],
            .error-404.not-found form.search-form input[type="submit"]:hover,
            .woocommerce span.onsale,
            .woocommerce .products-carousel-wrap .product span.onsale,
            li.product .product-thumb-wrap:before,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce .cart .button, 
            .woocommerce .cart input.button, 
            .call-to-action-wrap a.button.cta-button.cta-button-primary,
            .woocommerce #payment #place_order, 
            .woocommerce-page #payment #place_order, 
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt, 
            .woocommerce #review_form #respond .form-submit input,
            .mean-container a.meanmenu-reveal span,
            .mean-container .mean-nav ul li a,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{
                background: <?php echo esc_attr( $primary_color ); ?>;
            }

            .main-navigation ul li.current-menu-item a, 
            .main-navigation ul li a:hover, 
            .main-navigation ul li.menu-item-has-children ul.sub-menu li.current-menu-item a,
            .main-navigation ul li.menu-item-has-children ul.sub-menu li a:hover,
            .ecommerce_gem_widget_call_to_action .call-to-action-offer .call-to-action-offer-inner .offer-percent,
            .ecommerce_gem_widget_call_to_action .call-to-action-offer .call-to-action-offer-inner .offer-text,
            #primary .post .entry-title:hover a, 
            #primary .page .entry-title:hover a,
            .entry-meta > span::before, 
            .entry-footer > span::before, 
            .single-post-meta > span::before,
            .nav-links .nav-previous a:hover, 
            .nav-links .nav-next a:hover,
            .comment-navigation .nav-next a:hover:after, 
            .comment-navigation .nav-previous a:hover:before, 
            .nav-links .nav-previous a:hover:before, 
            .nav-links .nav-next a:hover:after,
            #commentform input[type="submit"]:hover,
            .comment-meta .comment-author a.url,
            .comment-meta .comment-metadata a,
            .comment .comment-body .comment-content a,
            .comments-area form#commentform p.logged-in-as a,
            .woocommerce nav.woocommerce-pagination ul li a:focus, 
            .woocommerce nav.woocommerce-pagination ul li a:hover, 
            .woocommerce nav.woocommerce-pagination ul li span.current, 
            .pagination .nav-links .page-numbers.current,
            .product .price, .woocommerce ul.products li.product .price,
            .product_meta .posted_in a,
            .product_meta .tagged_as a,
            .woocommerce-product-rating a.woocommerce-review-link,
            .woocommerce p.stars a::before,
            .woocommerce-message::before, 
            .woocommerce-info::before,
            .shop_table .product-name a,
            .woocommerce-info a.showcoupon,
            .mean-container a.meanmenu-reveal,
            .single-product .yith-wcwl-add-to-wishlist a{
                color: <?php echo esc_attr( $primary_color ); ?>;
            }

            #home-page-advertisement-area .advertisement-widget .advertisement-wrap .advertisement-buttons .button.advertisement-button:hover, 
            #home-page-widget-area .advertisement-widget .advertisement-wrap .advertisement-buttons .button.advertisement-button:hover,
            .scrollup:hover,
            .woocommerce div.product .woocommerce-tabs ul.tabs li,
            #home-page-widget-area .ecommerce_gem_widget_call_to_action .cta-widget-default .call-to-action-button a.button{
                background: <?php echo esc_attr( $primary_color ); ?>;
                border-color: <?php echo esc_attr( $primary_color ); ?>;
            }

            #commentform input[type="submit"],
            .woocommerce nav.woocommerce-pagination ul li .page-numbers, 
            .pagination .nav-links .page-numbers,
            .nav-links .page-numbers.current, 
            .nav-links a.page-numbers:hover,
            #add_payment_method .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button, 
            .woocommerce .cart .button, 
            .woocommerce .cart input.button, 
            .woocommerce #payment #place_order, 
            .woocommerce-page #payment #place_order, 
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt, 
            .woocommerce #review_form #respond .form-submit input,
            .main-slider .slider-caption .caption-wrap .button {
                border: 1px solid <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs::before{
                border-bottom: 1px solid <?php echo esc_attr( $primary_color ); ?>;
            }

            .woocommerce-message, .woocommerce-info {
                border-top-color: <?php echo esc_attr( $primary_color ); ?>;
            }

        </style>

        <?php
    }

endif;

$primary_color = ecommerce_gem_get_option( 'primary_color' );

if( '#fa6161' != $primary_color ){
    add_action( 'wp_head', 'ecommerce_gem_dynamic_options' );
}
