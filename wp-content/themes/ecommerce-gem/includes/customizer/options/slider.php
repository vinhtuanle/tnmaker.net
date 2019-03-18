<?php
/**
 * Slider Options.
 *
 * @package eCommerce_Gem
 */

// Add Slider Options Panel.
$wp_customize->add_panel( 'slider_option_panel',
	array(
		'title'      => esc_html__( 'Featured Slider Options', 'ecommerce-gem' ),
		'priority'   => 100,
	)
);

// Slider Section.
$wp_customize->add_section( 'section_slider',
	array(
		'title'      => esc_html__( 'Slider On/Off', 'ecommerce-gem' ),
		'panel'      => 'slider_option_panel',
	)
);

// Setting slider_status.
$wp_customize->add_setting( 'theme_options[slider_status]',
	array(
		'default'           => $default['slider_status'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_status]',
	array(
		'label'    			=> esc_html__( 'Enable Slider', 'ecommerce-gem' ),
		'section'  			=> 'section_slider',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

$slider_number = 5;

for ( $i = 1; $i <= $slider_number; $i++ ) {

	//Slide Details
	$wp_customize->add_setting('theme_options[slide_'.$i.'_info]', 
		array(
			'sanitize_callback' => 'sanitize_text_field',            
		)
	);

	$wp_customize->add_control( 
		new eCommerce_Gem_Info( 
			$wp_customize, 
			'theme_options[slide_'.$i.'_info]', 
			array(
				'label' 			=> esc_html__( 'Slide ', 'ecommerce-gem' ) . ' - ' . $i,
				'section' 			=> 'section_slider',
				'priority' 			=> 100,
				'active_callback' 	=> 'ecommerce_gem_is_featured_slider_active',
			) 
		)
	);

	$wp_customize->add_setting( "theme_options[slider_page_$i]",
		array(
			'sanitize_callback' => 'ecommerce_gem_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control( "theme_options[slider_page_$i]",
		array(
			'label'           => esc_html__( 'Select Page', 'ecommerce-gem' ),
			'section'         => 'section_slider',
			'type'            => 'dropdown-pages',
			'active_callback' => 'ecommerce_gem_is_featured_slider_active',
			'priority' 		  => 100,
		)
	);

	$wp_customize->add_setting( "theme_options[caption_position_$i]",
		array(
			'default'           => 'left',
			'sanitize_callback' => 'ecommerce_gem_sanitize_select',
		)
	);

	$wp_customize->add_control( "theme_options[caption_position_$i]",
		array(
			'label'           => esc_html__( 'Caption Position', 'ecommerce-gem' ),
			'section'         => 'section_slider',
			'type'            => 'select',
			'choices'         => array(
				'left'     => esc_html__( 'Left', 'ecommerce-gem' ),
				'right'    => esc_html__( 'Right', 'ecommerce-gem' ),
				'center'   => esc_html__( 'Center', 'ecommerce-gem' ),
			),
			'active_callback' => 'ecommerce_gem_is_featured_slider_active',
			'priority' 		  => 100,
		)
	); 

	// Setting slider readmore text.
	$wp_customize->add_setting( "theme_options[button_text_$i]",
		array(
			'default'           => esc_html__( 'Shop Now', 'ecommerce-gem' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( "theme_options[button_text_$i]",
		array(
			'label'    => esc_html__( 'Button Text', 'ecommerce-gem' ),
			'section'  => 'section_slider',
			'type'     => 'text',
			'active_callback' => 'ecommerce_gem_is_featured_slider_active',
			'priority' => 100,
		)
	);

	// Setting slider readmore link.
	$wp_customize->add_setting( "theme_options[button_link_$i]",
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( "theme_options[button_link_$i]",
		array(
			'label'    => esc_html__( 'Button Link', 'ecommerce-gem' ),
			'section'  => 'section_slider',
			'type'     => 'text',
			'active_callback' => 'ecommerce_gem_is_featured_slider_active',
			'priority' => 100,
		)
	);

}

// Slider Options Section.
$wp_customize->add_section( 'section_slider_options',
	array(
		'title'      => esc_html__( 'Slider Setting', 'ecommerce-gem' ),
		'panel'      => 'slider_option_panel',
	)
);

// Setting slider_transition_effect.
$wp_customize->add_setting( 'theme_options[slider_transition_effect]',
	array(
		'default'           => $default['slider_transition_effect'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_effect]',
	array(
		'label'           => esc_html__( 'Transition Effect', 'ecommerce-gem' ),
		'section'         => 'section_slider_options',
		'type'            => 'select',
		'choices'         => array(
			'fade'       => esc_html__( 'Fade', 'ecommerce-gem' ),
			'scrollHorz' => esc_html__( 'Scroll', 'ecommerce-gem' ),
		),
	)
);

// Setting slider_transition_delay.
$wp_customize->add_setting( 'theme_options[slider_transition_delay]',
	array(
		'default'           => $default['slider_transition_delay'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[slider_transition_delay]',
	array(
		'label'           => esc_html__( 'Transition Delay', 'ecommerce-gem' ),
		'description'     => esc_html__( 'in seconds', 'ecommerce-gem' ),
		'section'         => 'section_slider_options',
		'type'            => 'number',
		'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 60px;' ),
	)
);


// Setting slider_pager_status.
$wp_customize->add_setting( 'theme_options[slider_pager_status]',
	array(
		'default'           => $default['slider_pager_status'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_pager_status]',
	array(
		'label'           => esc_html__( 'Show Pager', 'ecommerce-gem' ),
		'section'         => 'section_slider_options',
		'type'            => 'checkbox',
	)
);

// Setting slider_autoplay_status.
$wp_customize->add_setting( 'theme_options[slider_autoplay_status]',
	array(
		'default'           => $default['slider_autoplay_status'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_autoplay_status]',
	array(
		'label'           => esc_html__( 'Enable Autoplay', 'ecommerce-gem' ),
		'section'         => 'section_slider_options',
		'type'            => 'checkbox',
	)
);