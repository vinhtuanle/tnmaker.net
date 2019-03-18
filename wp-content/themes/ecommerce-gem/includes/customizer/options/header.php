<?php
/**
 * Header Options.
 *
 * @package eCommerce_Gem
 */

//Logo Options Setting Starts
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
		'default' 			=> $default['site_identity'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[site_identity]', 
	array(
		'type' 		=> 'radio',
		'label' 	=> esc_html__('Logo Options', 'ecommerce-gem'),
		'section' 	=> 'title_tagline',
		'choices' 	=> array(
			'logo-only' 	=> esc_html__('Logo Only', 'ecommerce-gem'),
			'title-text' 	=> esc_html__('Title + Tagline', 'ecommerce-gem'),
			'logo-desc' 	=> esc_html__('Logo + Tagline', 'ecommerce-gem')
			)
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => esc_html__( 'Top Header Options', 'ecommerce-gem' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_top_header.
$wp_customize->add_setting( 'theme_options[show_top_header]',
	array(
		'default'           => $default['show_top_header'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_top_header]',
	array(
		'label'    			=> esc_html__( 'Show Top Header', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

//Top Left Section
$wp_customize->add_setting( 'theme_options[top_left_info]',
	array(
		'sanitize_callback' => 'sanitize_text_field',            
	)
);

$wp_customize->add_control( 
	new eCommerce_Gem_Info( 
		$wp_customize, 
		'theme_options[top_left_info]', 
		array(
			'label' 			=> esc_html__( 'Left Section', 'ecommerce-gem' ),
			'section' 			=> 'section_header',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
		) 
	)
);

// Setting top_left_type
$wp_customize->add_setting( 'theme_options[top_left_type]',
	array(
		'default'           => $default['top_left_type'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[top_left_type]',
	array(
		'label'           => esc_html__( 'Left Section Options', 'ecommerce-gem' ),
		'section'         => 'section_header',
		'type'            => 'select',
		'priority'        => 100,
		'choices'         => array(
			'store-info' 	=> esc_html__( 'Store Information', 'ecommerce-gem' ),
			'current-date' 	=> esc_html__( 'Current Date', 'ecommerce-gem' ),
			'menu' 			=> esc_html__( 'Menu', 'ecommerce-gem' ),
			'social-icons'  => esc_html__( 'Social Icons', 'ecommerce-gem' ),
		),
		'active_callback' => 'ecommerce_gem_is_top_header_active',
	)
);

// Setting Address.
$wp_customize->add_setting( 'theme_options[top_address]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[top_address]',
	array(
		'label'    			=> esc_html__( 'Address/Location', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_header_information_active',
	)
);

// Setting Phone.
$wp_customize->add_setting( 'theme_options[top_phone]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[top_phone]',
	array(
		'label'    			=> esc_html__( 'Phone Number', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_header_information_active',
	)
);

// Setting Email.
$wp_customize->add_setting( 'theme_options[top_email]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[top_email]',
	array(
		'label'    			=> esc_html__( 'Email', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_header_information_active',
	)
);

//Top Right Section
$wp_customize->add_setting( 'theme_options[top_right_info]',
	array(
		'sanitize_callback' => 'sanitize_text_field',            
	)
);

$wp_customize->add_control( 
	new eCommerce_Gem_Info( 
		$wp_customize, 
		'theme_options[top_right_info]', 
		array(
			'label' 			=> esc_html__( 'Right Section', 'ecommerce-gem' ),
			'section' 			=> 'section_header',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
		) 
	)
);

// Setting show_social_icons.
$wp_customize->add_setting( 'theme_options[show_social_icons]',
	array(
		'default'           => $default['show_social_icons'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_icons]',
	array(
		'label'    			=> esc_html__( 'Show Social Icons', 'ecommerce-gem' ),
		'description'       => esc_html__( '(Go to Appearance >> Menus, create menu and assign it to Social Links)', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
	)
);

// Setting show_login_logout.
$wp_customize->add_setting( 'theme_options[show_login_logout]',
	array(
		'default'           => $default['show_login_logout'],
		'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_login_logout]',
	array(
		'label'    			=> esc_html__( 'Show Login/Register', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
	)
);

// Setting login text.
$wp_customize->add_setting( 'theme_options[login_icon]',
	array(
		'default'           => $default['login_icon'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[login_icon]',
	array(
		'label'    			=> esc_html__( 'Login/Register Icon', 'ecommerce-gem' ),
		'description'       => esc_html__( 'Fontawesome icons are only supported.', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_login_logout_active',
	)
);

// Setting login text.
$wp_customize->add_setting( 'theme_options[login_text]',
	array(
		'default'           => $default['login_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[login_text]',
	array(
		'label'    			=> esc_html__( 'Login/Register Text', 'ecommerce-gem' ),
		'section'  			=> 'section_header',
		'type'     			=> 'text',
		'priority' 			=> 100,
		'active_callback' 	=> 'ecommerce_gem_is_top_login_logout_active',
	)
);

if ( class_exists( 'WooCommerce' ) ) {

	// Setting show_cart.
	$wp_customize->add_setting( 'theme_options[show_cart]',
		array(
			'default'           => $default['show_cart'],
			'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[show_cart]',
		array(
			'label'    			=> esc_html__( 'Show Cart Icon', 'ecommerce-gem' ),
			'section'  			=> 'section_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
		)
	);

	// Setting cart text.
	$wp_customize->add_setting( 'theme_options[cart_icon]',
		array(
			'default'           => $default['cart_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[cart_icon]',
		array(
			'label'    			=> esc_html__( 'Cart Icon', 'ecommerce-gem' ),
			'description'       => esc_html__( 'Fontawesome icons are only supported.', 'ecommerce-gem' ),
			'section'  			=> 'section_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_cart_active',
		)
	);

	// Setting show_wishlist.
	$wp_customize->add_setting( 'theme_options[show_wishlist]',
		array(
			'default'           => $default['show_wishlist'],
			'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[show_wishlist]',
		array(
			'label'    			=> esc_html__( 'Show Wishlist Icon (Works if YITH Wishlist plugin is activated)', 'ecommerce-gem' ),
			'section'  			=> 'section_header',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_header_active',
		)
	);

	// Setting wishlist icon.
	$wp_customize->add_setting( 'theme_options[wishlist_icon]',
		array(
			'default'           => $default['wishlist_icon'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[wishlist_icon]',
		array(
			'label'    			=> esc_html__( 'Wishlist Icon', 'ecommerce-gem' ),
			'description'       => esc_html__( 'Fontawesome icons are only supported.', 'ecommerce-gem' ),
			'section'  			=> 'section_header',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_wishlist_active',
		)
	);

	// Show product search section.
	$wp_customize->add_section( 'section_product_search',
		array(
			'title'      => esc_html__( 'Product Search Options', 'ecommerce-gem' ),
			'priority'   => 100,
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting show_top_search.
	$wp_customize->add_setting( 'theme_options[show_top_search]',
		array(
			'default'           => $default['show_top_search'],
			'sanitize_callback' => 'ecommerce_gem_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[show_top_search]',
		array(
			'label'    			=> esc_html__( 'Show Product Search (at Top Header)', 'ecommerce-gem' ),
			'section'  			=> 'section_product_search',
			'type'     			=> 'checkbox',
			'priority' 			=> 100,
		)
	);

	// Setting search product text.
	$wp_customize->add_setting( 'theme_options[search_products_text]',
		array(
			'default'           => $default['search_products_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[search_products_text]',
		array(
			'label'    			=> esc_html__( 'Search Products Text', 'ecommerce-gem' ),
			'section'  			=> 'section_product_search',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_product_search_active',
		)
	);

	// Setting select category text.
	$wp_customize->add_setting( 'theme_options[select_category_text]',
		array(
			'default'           => $default['select_category_text'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[select_category_text]',
		array(
			'label'    			=> esc_html__( 'Select Category Text', 'ecommerce-gem' ),
			'section'  			=> 'section_product_search',
			'type'     			=> 'text',
			'priority' 			=> 100,
			'active_callback' 	=> 'ecommerce_gem_is_top_product_search_active',
		)
	);

}