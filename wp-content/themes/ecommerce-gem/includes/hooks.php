<?php
/**
 * Load hooks.
 *
 * @package eCommerce_Gem
 */

//=============================================================
// Doctype hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_doctype_action() {
    ?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
    }
endif;

add_action( 'ecommerce_gem_doctype', 'ecommerce_gem_doctype_action', 10 );

//=============================================================
// Head hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;

add_action( 'ecommerce_gem_head', 'ecommerce_gem_head_action', 10 );

//=============================================================
// Top header hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_top_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_top_header_action() {

        // Top header status.
        $header_status = ecommerce_gem_get_option( 'show_top_header' );
        if ( 1 != $header_status ) {
            return;
        } ?>

        <div id="top-bar" class="top-header">
            <div class="container">
                <div class="top-left">

                    <?php

                    // Top Left type.
                    $top_left_type  = ecommerce_gem_get_option( 'top_left_type' );

                    if( 'current-date' === $top_left_type ) {
                        
                        do_action( 'ecommerce_gem_top_header_current_date' );

                    }elseif( 'menu' === $top_left_type ) {
                        
                        do_action( 'ecommerce_gem_top_header_menu' );

                    }elseif( 'social-icons' === $top_left_type && has_nav_menu( 'social' ) ){ ?>

                        <div class="top-social-menu menu-social-menu-container social-widget-left">

                            <?php the_widget( 'eCommerce_Gem_Social_Widget' ); ?>
                            
                        </div><!-- .social-widgets -->

                        <?php

                    }else{

                        do_action( 'ecommerce_gem_top_header_store_information' );

                    } ?>

                </div>
                
                <div class="top-right">
                    <?php 

                    $show_social_icons  = ecommerce_gem_get_option( 'show_social_icons' );

                    if( true === $show_social_icons && has_nav_menu( 'social' ) ){ ?>

                        <div class="top-social-menu menu-social-menu-container"> 

                            <?php the_widget( 'eCommerce_Gem_Social_Widget' ); ?>

                        </div>
                        <?php
                    }

                    // Login/Register
                    $show_login_logout  = ecommerce_gem_get_option( 'show_login_logout' );
                    $login_icon         = ecommerce_gem_get_option( 'login_icon' );

                    if( true == $show_login_logout ){

                        if (is_user_logged_in()) { ?> 

                            <div class="top-account-wrapper logged-in">
                                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                    <i class="fa <?php echo esc_attr( $login_icon ); ?>" aria-hidden="true"></i>
                                    <span class="top-log-out"><?php esc_html_e('Log Out', 'ecommerce-gem'); ?></span>
                                </a>
                            </div>

                            <?php 
                        }else{ 

                            $login_text  = ecommerce_gem_get_option( 'login_text' );

                            ?>

                            <div class="top-account-wrapper logged-out">
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
                                    <i class="fa <?php echo esc_attr( $login_icon ); ?>" aria-hidden="true"></i>
                                    <span class="top-log-in"><?php echo esc_html( $login_text ); ?></span>
                                </a>
                            </div>

                            <?php

                        }
                    } // Login/Register ends

                    // Wishlist details
                    $show_wishlist  = ecommerce_gem_get_option( 'show_wishlist' );
                    $wishlist_icon  = ecommerce_gem_get_option( 'wishlist_icon' );

                    if( true == $show_wishlist && !empty( $wishlist_icon ) && class_exists( 'YITH_WCWL' ) ){ ?>
                        <div class="top-wishlist-wrapper">
                            <div class="top-icon-wrap">
                                <?php 

                                $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) ); 

                                if ( absint( $wishlist_page_id ) > 0 ) : ?>
                            
                                    <a class="wishlist-btn" href="<?php echo esc_url( get_permalink( $wishlist_page_id ) ); ?>"><i class="fa <?php echo esc_attr( $wishlist_icon ); ?>" aria-hidden="true"></i><span class="wish-value"><?php echo absint( yith_wcwl_count_products() ); ?></span></a>
                                  
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php 
                    } 

                    // Cart details
                    $show_cart  = ecommerce_gem_get_option( 'show_cart' );
                    $cart_icon  = ecommerce_gem_get_option( 'cart_icon' );

                    if( true == $show_cart && !empty( $cart_icon ) && class_exists( 'WooCommerce' ) ){ ?>
                        <div class="top-cart-wrapper">
                            <div class="top-icon-wrap">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                                    <i class="fa <?php echo esc_attr( $cart_icon ); ?>" aria-hidden="true"></i>
                                    <span class="cart-value ec-cart-fragment"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                                </a>
                            </div>
                            <div class="top-cart-content">
                                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
                            </div>
                        </div>
                        <?php 
                    } 

                    $show_top_search  = ecommerce_gem_get_option( 'show_top_search' );

                    if( true === $show_top_search && class_exists( 'WooCommerce' ) ){ ?>

                        <div class="search-holder">

                            <a href="#" class="search-btn"><i class="fa fa-search"></i></a>

                            <div class="search-box" style="display: none;">

                                <?php

                                if ( class_exists( 'WooCommerce' ) ) {

                                    // For search products placeholder text
                                    $search_products_text  = ecommerce_gem_get_option( 'search_products_text' );

                                    if( !empty( $search_products_text ) ){

                                        $product_search_text = esc_attr( $search_products_text );

                                    }else{

                                        $product_search_text =  esc_attr_x( 'Search Products &hellip;', 'placeholder', 'ecommerce-gem' );
                                    }

                                    // For select category text
                                    $select_category_text  = ecommerce_gem_get_option( 'select_category_text' );

                                    if( !empty( $select_category_text ) ){

                                        $product_category_text = esc_html( $select_category_text );

                                    }else{

                                        $product_category_text =  esc_html__( 'Select Category', 'ecommerce-gem' );
                                    }

                                 ?>

                                    <div class="product-search-wrapper">
                                        
                                        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <input type="hidden" name="post_type" value="product" />

                                            <input type="text" class="search-field products-search" placeholder="<?php echo $product_search_text; ?>" value="<?php echo get_search_query(); ?>" name="s" />

                                            <select class="product-cat" name="product_cat">

                                                <option value=""><?php echo $product_category_text; ?></option> 

                                                <?php

                                                $categories = get_categories( 'taxonomy=product_cat' );

                                                foreach ( $categories as $category ) {

                                                    $option = '<option value="' . esc_attr( $category->category_nicename ) . '"'.ecommerce_gem_selected_category( $category->category_nicename ).'>';

                                                    $option .= esc_html( $category->cat_name );

                                                    $option .= ' (' . absint( $category->category_count ) . ')';
                                                    
                                                    $option .= '</option>';

                                                    echo $option;

                                                } ?>

                                            </select>
                                            
                                            <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'ecommerce-gem' ); ?></span><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>

                                            
                                    </div> <!-- .product-search-wrapper -->
                                <?php } ?>

                            </div>
                        </div><!-- .search-holder -->
                        <?php
                    } ?>
                </div>
                
            </div>
        </div>
        <?php
    }
endif;

add_action( 'ecommerce_gem_top_header', 'ecommerce_gem_top_header_action' );

//=============================================================
// Store Information hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_top_header_store_information_action' ) ) :
    /**
     * Store Information Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_top_header_store_information_action() { 

        $top_address    = ecommerce_gem_get_option( 'top_address' );
        $top_phone      = ecommerce_gem_get_option( 'top_phone' );
        $top_email      = ecommerce_gem_get_option( 'top_email' ); 
        if( !empty( $top_address ) || !empty( $top_phone ) || !empty( $top_email ) ){ ?>
            <div class="top-left-inner">
                <?php if( !empty( $top_address ) ){ ?>
                    <span class="address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html( $top_address ); ?></span>
                <?php } ?>

                <?php if( !empty( $top_phone ) ){ ?>
                    <span class="phone"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html( $top_phone ); ?></span>
                <?php } ?>

                <?php if( !empty( $top_email ) ){ ?>
                    <span class="fax"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo esc_html( $top_email ); ?></span>
                <?php } ?>
                
            </div><?php 
        } 
    }
endif;

add_action( 'ecommerce_gem_top_header_store_information', 'ecommerce_gem_top_header_store_information_action' );

//=============================================================
// Top header menu hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_top_header_menu_action' ) ) :
    /**
     * Top Header Menu Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_top_header_menu_action() { ?>

        <div class="top-menu-holder">
            <?php
           if( has_nav_menu( 'top' ) ){
                wp_nav_menu(
                    array(
                    'theme_location' => 'top',
                    'menu_id'        => 'top-menu',
                    'depth'          => 1,                                   
                    )
                );
            } ?>
        </div>
        <?php
    }
endif;

add_action( 'ecommerce_gem_top_header_menu', 'ecommerce_gem_top_header_menu_action' );

//=============================================================
// Top header current date hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_top_header_current_date_action' ) ) :
    /**
     * Top Header Current Date Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_top_header_current_date_action() { ?>

        <div class="top-date-holder"><span><?php echo date( get_option( 'date_format' ) ); ?></span></div>
        
        <?php
    }
endif;

add_action( 'ecommerce_gem_top_header_current_date', 'ecommerce_gem_top_header_current_date_action' );

//=============================================================
// Before header hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_before_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_before_header_action() {

        ?><header id="masthead" class="site-header" role="banner"><div class="container"><?php
    }
endif;

add_action( 'ecommerce_gem_before_header', 'ecommerce_gem_before_header_action' );

//=============================================================
// Header main hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_header_action' ) ) :

    /**
     * Site Header.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_header_action() {
        ?>
        <div class="head-wrap">
        	<div class="site-branding">
        		<?php 

                $site_identity = ecommerce_gem_get_option( 'site_identity' ); 

                if( 'logo-only' == $site_identity ){  

                    ecommerce_gem_the_custom_logo(); 

                }elseif( 'logo-desc' == $site_identity ){

                    ecommerce_gem_the_custom_logo(); 

                    $description = get_bloginfo( 'description', 'display' );

                    if ( $description || is_customize_preview() ) : ?>

                        <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                        <?php
                    endif; 

                }else{ ?>

                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

            		<?php
            		$description = get_bloginfo( 'description', 'display' );

                    if ( $description || is_customize_preview() ) : ?>

                        <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                        <?php
                    endif; 
        		} ?>
        	</div><!-- .site-branding -->

            <div id="main-nav" class="clear-fix">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="wrap-menu-content">
        				<?php
        				wp_nav_menu(
        					array(
        					'theme_location' => 'primary',
        					'menu_id'        => 'primary-menu',
        					'fallback_cb'    => 'ecommerce_gem_primary_navigation_fallback',
        					)
        				);
        				?>
                    </div><!-- .menu-content -->
                </nav><!-- #site-navigation -->
            </div> <!-- #main-nav -->
        </div>
        <?php
    }

endif;

add_action( 'ecommerce_gem_header', 'ecommerce_gem_header_action' );

//=============================================================
// After header hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_after_header_action' ) ) :
    /**
     * Header End.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_after_header_action() {
       
    ?></div><!-- .container --></header><!-- #masthead --><?php
    }
endif;
add_action( 'ecommerce_gem_after_header', 'ecommerce_gem_after_header_action' );

//=============================================================
// Slider hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_main_content_for_slider' ) ) :

    /**
     * Add slider.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_main_content_for_slider() {

        get_template_part( 'template-parts/slider' );

    }

endif;

add_action( 'ecommerce_gem_main_content', 'ecommerce_gem_main_content_for_slider' , 5 );

//=============================================================
// Advertisement hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_main_content_for_advertisement' ) ) :

    /**
     * Add advertisement.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_main_content_for_advertisement() {

        get_template_part( 'template-parts/advertisement' );

    }

endif;

add_action( 'ecommerce_gem_main_content', 'ecommerce_gem_main_content_for_advertisement' , 7 );

//=============================================================
// Breadcrumb hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_main_content_for_breadcrumb' ) ) :

    /**
     * Add breadcrumb.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_main_content_for_breadcrumb() {

        get_template_part( 'template-parts/breadcrumbs' );

    }

endif;

add_action( 'ecommerce_gem_main_content', 'ecommerce_gem_main_content_for_breadcrumb' , 9 );

//=============================================================
// Home widget hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_main_content_for_home_widgets' ) ) :

    /**
     * Add home widgets.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_main_content_for_home_widgets() {

        get_template_part( 'template-parts/home-widgets' );

    }

endif;

add_action( 'ecommerce_gem_main_content', 'ecommerce_gem_main_content_for_home_widgets' , 11 );

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_before_content_action' ) ) :
    /**
     * Content Start.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_before_content_action() {
    ?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
    }
endif;
add_action( 'ecommerce_gem_before_content', 'ecommerce_gem_before_content_action' );

//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_after_content_action' ) ) :
    /**
     * Content End.
     *
     * @since 1.0.0
     */
    function ecommerce_gem_after_content_action() {
    ?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php    
    }
endif;
add_action( 'ecommerce_gem_after_content', 'ecommerce_gem_after_content_action' );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'ecommerce_gem_credit_info' ) ) :

    function ecommerce_gem_credit_info(){ ?>

        <div class="site-info">
            <?php printf( esc_html__( '%1$s by %2$s', 'ecommerce-gem' ), 'eCommerce Gem', '<a href="https://www.prodesigns.com/" rel="designer">ProDesigns</a>' ); ?>
        </div><!-- .site-info -->

        <?php 
         
    }

endif;

add_action( 'ecommerce_gem_credit', 'ecommerce_gem_credit_info', 10 );