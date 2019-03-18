<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Halcyon
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="http://schema.org/WebSite">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<div id="page" class="site">
	
    <header id="masthead" class="site-header" role="banner">
		
        <div class="header-top">
			<div class="container">
				<div class="social-network-section">
					
                    <?php 
                    if( get_theme_mod( 'halcyon_ed_social' ) ) { 
                        printf( _x( '<span>%s</span>', 'Social link label', 'halcyon' ), esc_html__('Find Me On', 'halcyon') );                        
                        do_action( 'halcyon_social' );
                    }
                    ?>
                                        
					<div class="form-section">
						<a href="javascript:void(0);" id="search-btn"><i class="fa fa-search"></i></a>
						<div class="example">
    						<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
        
        <div class="header-bottom">
            <div class="container">
                
                <div class="site-branding" itemscope itemtype="http://schema.org/Organization">
        			<?php 
                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                        } 
                        if ( is_front_page() ) : ?>
                            <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif;           		
            			$description = get_bloginfo( 'description', 'display' );
            			if ( $description || is_customize_preview() ) : ?>
            				<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
        			<?php
            			endif;
                    ?>
        		</div><!-- .site-branding -->
                
                <div id="nav-holder">
			    	<a id="responsive-menu-button" href="#sidr-main"><i class="fa fa-bars"></i></a>
				</div>
                    
        		<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        		</nav><!-- #site-navigation -->
                
            </div>
		</div>
	</header><!-- #masthead -->
    
    <?php 
    if( is_front_page() ){
        if( get_theme_mod( 'halcyon_ed_slider' ) ) do_action( 'halcyon_slider' );
    }
    ?>
    
	<div id="content" class="site-content">
    
    <?php 
    if( is_front_page() ){
        if( get_theme_mod( 'halcyon_ed_featured_post' ) ) do_action( 'halcyon_featured_post' );
    }    
    ?>
    
        <div class="container">
            <div class="row">