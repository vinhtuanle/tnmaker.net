<?php
/**
 * Breadcrumb Options.
 *
 * @package eCommerce_Gem
 */

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
		'title'      => esc_html__( 'Breadcrumb Options', 'ecommerce-gem' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
		'default'           => $default['breadcrumb_type'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
		'label'       => esc_html__( 'Breadcrumb Type', 'ecommerce-gem' ),
		'section'     => 'section_breadcrumb',
		'type'        => 'radio',
		'priority'    => 100,
		'choices'     => array(
			'disable' => esc_html__( 'Disable', 'ecommerce-gem' ),
			'simple'  => esc_html__( 'Simple', 'ecommerce-gem' ),
		),
	)
);

// Setting breadcrumb_text.
$wp_customize->add_setting( 'theme_options[breadcrumb_text]',
	array(
		'default'           => $default['breadcrumb_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_text]',
	array(
		'label'    			=> esc_html__( 'Breadcrumb Home Text', 'ecommerce-gem' ),
		'section'  			=> 'section_breadcrumb',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_breadcrumb_active'
	)
);