<?php
/**
 * eCommerce Gem Theme Customizer.
 *
 * @package eCommerce_Gem
 */

/**
 * Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_gem_customize_register( $wp_customize ) {

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'ecommerce_gem_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'ecommerce_gem_customize_partial_blogdescription',
		) );
	}

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/sanitize.php';

	// Active callback.
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/active.php';

	// Load options.
	require_once trailingslashit( get_template_directory() ) . '/includes/customizer/options/options.php';

	// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/includes/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'eCommerce_Gem_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new eCommerce_Gem_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'eCommerce Gem Plus', 'ecommerce-gem' ),
				'pro_text' => esc_html__( 'Buy PRO', 'ecommerce-gem' ),
				'pro_url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/ecommerce-gem-plus',
				'priority' => 1,
			)
		)
	);

}
add_action( 'customize_register', 'ecommerce_gem_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ecommerce_gem_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function ecommerce_gem_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue style for custom customize control.
 */
function ecommerce_gem_custom_customize_enqueue() {
	wp_enqueue_style( 'ecommerce-gem-customize', get_template_directory_uri() . '/includes/customizer/css/customize-controls.css' );

	wp_enqueue_script( 'ecommerce-gem-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'ecommerce-gem-customize-controls', get_template_directory_uri() . '/includes/upgrade-to-pro/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'ecommerce_gem_custom_customize_enqueue' );