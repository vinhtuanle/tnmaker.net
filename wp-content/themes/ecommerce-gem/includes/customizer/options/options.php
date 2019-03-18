<?php
/**
 * Options.
 *
 * @package eCommerce_Gem
 */

$default = ecommerce_gem_get_default_theme_options();

// Load custom controls
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/controls/custom-controls.php';

// Setting site primary color.
$wp_customize->add_setting( 'theme_options[primary_color]',
	array(
		'default'           => $default['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'theme_options[primary_color]',
		array(
			'label'       => esc_html__( 'Primary Color', 'ecommerce-gem' ),
			'description' => esc_html__( 'Applied to main color of site.', 'ecommerce-gem' ),
			'section'     => 'colors',	
		)
	)
);

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'ecommerce-gem' ),
		'priority'   => 100,
	)
);

// Load header options.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/header.php';

// Load blog options.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/blog.php';

// Load breadcrumb options.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/breadcrumb.php';

// Load shop page options if woocommerce is active.
if( class_exists( 'WooCommerce' ) ){
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/shop.php';
}

// Load footer options.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/footer.php';

// Load slider options.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/slider.php';