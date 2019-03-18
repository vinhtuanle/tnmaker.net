<?php
/**
 * Halcyon Theme Customizer.
 *
 * @package Halcyon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function halcyon_customize_register( $wp_customize ) {
	
    /* Option list of all post */	
    $options_posts = array();
    $options_posts_obj = get_posts( 'posts_per_page=-1' );
    $options_posts[''] = __( 'Choose Post', 'halcyon' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }
    
    /** Default Settings */    
    $wp_customize->add_panel( 
        'wp_default_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Default Settings', 'halcyon' ),
            'description' => __( 'Default section provided by wordpress customizer.', 'halcyon' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel     = 'wp_default_panel';
    $wp_customize->get_section( 'colors' )->panel            = 'wp_default_panel';
    $wp_customize->get_section( 'background_image' )->panel  = 'wp_default_panel';
    $wp_customize->get_section( 'static_front_page' )->panel = 'wp_default_panel'; 
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
    $wp_customize->get_setting( 'background_image' )->transport = 'refresh';
    /** Default Settings Ends */ 
    
    /** Slider Settings */
    $wp_customize->add_section(
        'halcyon_slider_settings',
        array(
            'title' => __( 'Slider Settings', 'halcyon' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Slider in Header */
    $wp_customize->add_setting(
        'halcyon_ed_slider',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_ed_slider',
        array(
            'label' => __( 'Enable Banner Slider', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'halcyon_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'halcyon_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Control */
    $wp_customize->add_setting(
        'halcyon_slider_control',
        array(
            'default' => '1',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_control',
        array(
            'label' => __( 'Enable Slider Control', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Pager */
    $wp_customize->add_setting(
        'halcyon_slider_pager',
        array(
            'default' => '1',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_pager',
        array(
            'label' => __( 'Enable Slider Pager', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'halcyon_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Slider Animation */
    $wp_customize->add_setting(
        'halcyon_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'halcyon_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_animation',
        array(
            'label' => __( 'Choose Slider Animation', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'halcyon' ),
                'slide' => __( 'Slide', 'halcyon' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'halcyon_slider_speed',
        array(
            'default' => '400',
            'sanitize_callback' => 'halcyon_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_speed',
        array(
            'label' => __( 'Slider Speed', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Pause */
    $wp_customize->add_setting(
        'halcyon_slider_pause',
        array(
            'default' => '6000',
            'sanitize_callback' => 'halcyon_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_pause',
        array(
            'label' => __( 'Slider Pause', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Read More */
    $wp_customize->add_setting(
        'halcyon_slider_read_more',
        array(
            'default' => __( 'Read Post', 'halcyon' ),
            'sanitize_callback' => 'halcyon_sanitize_nohtml',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_slider_read_more',
        array(
            'label' => __( 'Slider Read More', 'halcyon' ),
            'section' => 'halcyon_slider_settings',
            'type' => 'text'
        )
    );
    /** Slider Settings Ends */
    
    /** Featured Posts Section */    
    $wp_customize->add_section(
        'halcyon_featured_post_settings',
        array(
            'title' => __( 'Featured Posts Settings', 'halcyon' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Featured Post Section */
    $wp_customize->add_setting(
        'halcyon_ed_featured_post',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_ed_featured_post',
        array(
            'label' => __( 'Enable Featured Post Section', 'halcyon' ),
            'section' => 'halcyon_featured_post_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Featured Section Title */
    $wp_customize->add_setting(
        'halcyon_featured_section_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_featured_section_title',
        array(
            'label'   => __( 'Featured Section Title', 'halcyon' ),
            'section' => 'halcyon_featured_post_settings',
            'type'    => 'text',
        )
    );
    
    /** Featured Post One */
    $wp_customize->add_setting(
        'halcyon_featured_post_one',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_featured_post_one',
        array(
            'label' => __( 'Select Featured Post One', 'halcyon' ),
            'section' => 'halcyon_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Two */
    $wp_customize->add_setting(
        'halcyon_featured_post_two',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_featured_post_two',
        array(
            'label' => __( 'Select Featured Post Two', 'halcyon' ),
            'section' => 'halcyon_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    
    /** Featured Post Three */
    $wp_customize->add_setting(
        'halcyon_featured_post_three',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_featured_post_three',
        array(
            'label' => __( 'Select Featured Post Three', 'halcyon' ),
            'section' => 'halcyon_featured_post_settings',
            'type' => 'select',
            'choices' => $options_posts,
        )
    );
    /** Featured Posts Section Ends */
    
    /** Social Settings */
    $wp_customize->add_section(
        'halcyon_social_settings',
        array(
            'title' => __( 'Social Settings', 'halcyon' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'halcyon' ),
            'priority' => 40,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'halcyon_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'halcyon_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_ed_social',
        array(
            'label' => __( 'Enable Social Links', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'halcyon_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_facebook',
        array(
            'label' => __( 'Facebook', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** Twitter */
    $wp_customize->add_setting(
        'halcyon_twitter',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_twitter',
        array(
            'label' => __( 'Twitter', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** Pinterest */
    $wp_customize->add_setting(
        'halcyon_pinterest',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_pinterest',
        array(
            'label' => __( 'Pinterest', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'halcyon_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_instagram',
        array(
            'label' => __( 'Instagram', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** RSS */
    $wp_customize->add_setting(
        'halcyon_rss',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_rss',
        array(
            'label' => __( 'RSS', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** Dribble */
    $wp_customize->add_setting(
        'halcyon_dribble',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_dribble',
        array(
            'label' => __( 'Dribble', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** LinkedIn */
    $wp_customize->add_setting(
        'halcyon_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_linkedin',
        array(
            'label' => __( 'LinkedIn', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    
    /** Google Plus */
    $wp_customize->add_setting(
        'halcyon_google_plus',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'halcyon_google_plus',
        array(
            'label' => __( 'Google Plus', 'halcyon' ),
            'section' => 'halcyon_social_settings',
            'type' => 'text',
        )
    );
    /** Social Settings Ends */
    
    /** Custom CSS*/
    $wp_customize->add_section(
        'halcyon_custom_settings',
        array(
            'title' => __( 'Custom CSS Settings', 'halcyon' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    $wp_customize->add_setting(
        'halcyon_custom_css',
        array(
            'default' => '',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'halcyon_sanitize_css'
            )
    );
    
    $wp_customize->add_control(
        'halcyon_custom_css',
        array(
            'label' => __( 'Custom Css', 'halcyon' ),
            'section' => 'halcyon_custom_settings',
            'description' => __( 'Put your custom CSS', 'halcyon' ),
            'type' => 'textarea',
        )
    );
    /** Custom CSS Ends */
    
    /**
     * Sanitization Functions
     * 
     * @link https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php 
    */ 
    function halcyon_sanitize_checkbox( $checked ){
        // Boolean check.
	   return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
    
    function halcyon_sanitize_select( $input, $setting ) {
    	// Ensure input is a slug.
    	$input = sanitize_key( $input );
    	// Get list of choices from the control associated with the setting.
    	$choices = $setting->manager->get_control( $setting->id )->choices;
    	// If the input is a valid key, return it; otherwise, return the default.
    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
    function halcyon_sanitize_number_absint( $number, $setting ) {
        // Ensure $number is an absolute integer (whole number, zero or greater).
        $number = absint( $number );
        // If the input is an absolute integer, return it; otherwise, return the default
        return ( $number ? $number : $setting->default );
    }
    
    function halcyon_sanitize_nohtml( $nohtml ) {
    	return wp_filter_nohtml_kses( $nohtml );
    }
    
    function halcyon_sanitize_css( $css ) {
    	return wp_strip_all_tags( $css );
    }
    
}
add_action( 'customize_register', 'halcyon_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function halcyon_customize_preview_js() {
    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'halcyon_customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'halcyon_customize_preview_js' );
