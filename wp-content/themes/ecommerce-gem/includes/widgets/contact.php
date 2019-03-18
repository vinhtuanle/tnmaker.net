<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */

if ( ! class_exists( 'eCommerce_Gem_Contact_Widget' ) ) :

	/**
	 * Contact widget class.
	 *
	 * @since 1.0.0
	 */
	class eCommerce_Gem_Contact_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'ecommerce_gem_widget_contact',
					'description' => esc_html__( 'Widget to display contact informations like address, email and phone with icon. Recommended to use in footer or sidebar only', 'ecommerce-gem' ),
			);
			parent::__construct( 'ecommerce-gem-contact', esc_html__( 'eC-Gem: Contact', 'ecommerce-gem' ), $opts );
		}

		function widget( $args, $instance ) {

			$title          = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$icon_one		= !empty( $instance['icon_one'] ) ? $instance['icon_one'] : '';
			$text_one		= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';

			$icon_two		= !empty( $instance['icon_two'] ) ? $instance['icon_two'] : '';
			$text_two		= !empty( $instance['text_two'] ) ? $instance['text_two'] : ''; 

			$icon_three 	= !empty( $instance['icon_three'] ) ? $instance['icon_three'] : '';
			$text_three 	= !empty( $instance['text_three'] ) ? $instance['text_three'] : '';

			$icon_four 		= !empty( $instance['icon_four'] ) ? $instance['icon_four'] : '';
			$text_four 		= !empty( $instance['text_four'] ) ? $instance['text_four'] : '';


			echo $args['before_widget']; ?>

			<div class="contact-list">

				<?php 

				if ( $title ) { 

					echo $args['before_title'] . esc_html( $title ) . $args['after_title']; 

				} ?>

				<div class="contact-wrapper">
					<?php if( !empty( $icon_one ) || !empty( $text_one ) ){ ?>
						<div class="contact-item">
							<div class="contact-inner">
								<?php 
								if( !empty( $icon_one ) ){ ?>
									<span class="contact-icon">
										<span class="<?php echo esc_html( $icon_one ); ?>"></span>
									</span>
									<?php 
								} ?>

								<?php 
								if( !empty( $text_one ) ){ ?>
									<div class="contact-text-wrap">
									   <p><?php echo esc_html( $text_one ); ?></p>
									</div> <!-- .contact-text-wrap -->
									<?php 
								} ?>
							</div>
						</div><!-- .contact-item -->
					<?php } ?>

					<?php if( !empty( $icon_two ) || !empty( $text_two ) ){ ?>
						<div class="contact-item">
							<div class="contact-inner">
								<?php 
								if( !empty( $icon_two ) ){ ?>
									<span class="contact-icon">
										<span class="<?php echo esc_html( $icon_two ); ?>"></span>
									</span>
									<?php 
								} ?>

								<?php 
								if( !empty( $text_two ) ){ ?>
									<div class="contact-text-wrap">
									   <p><?php echo esc_html( $text_two ); ?></p>
									</div> <!-- .contact-text-wrap -->
									<?php 
								} ?>
							</div>
						</div><!-- .contact-item -->
					<?php } ?>

					<?php if( !empty( $icon_three ) || !empty( $text_three ) ){ ?>
						<div class="contact-item">
							<div class="contact-inner">
								<?php 
								if( !empty( $icon_three ) ){ ?>
									<span class="contact-icon">
										<span class="<?php echo esc_html( $icon_three ); ?>"></span>
									</span>
									<?php 
								} ?>

								<?php 
								if( !empty( $text_three ) ){ ?>
									<div class="contact-text-wrap">
									   <p><?php echo esc_html( $text_three ); ?></p>
									</div> <!-- .contact-text-wrap -->
									<?php 
								} ?>
							</div>
						</div><!-- .contact-item -->
					<?php } ?>

					<?php if( !empty( $icon_four ) || !empty( $text_four ) ){ ?>
						<div class="contact-item">
							<div class="contact-inner">
								<?php 
								if( !empty( $icon_four ) ){ ?>
									<span class="contact-icon">
										<span class="<?php echo esc_html( $icon_four ); ?>"></span>
									</span>
									<?php 
								} ?>

								<?php 
								if( !empty( $text_four ) ){ ?>
									<div class="contact-text-wrap">
									   <p><?php echo esc_html( $text_four ); ?></p>
									</div> <!-- .contact-text-wrap -->
									<?php 
								} ?>
							</div>
						</div><!-- .contact-item -->
					<?php } ?>

				</div>

			</div><!-- .features-list -->

			<?php

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title']          = sanitize_text_field( $new_instance['title'] );

			$instance['icon_one'] 		= sanitize_text_field( $new_instance['icon_one'] );
			$instance['text_one'] 		= sanitize_text_field( $new_instance['text_one'] );

			$instance['icon_two'] 		= sanitize_text_field( $new_instance['icon_two'] );
			$instance['text_two'] 		= sanitize_text_field( $new_instance['text_two'] );

			$instance['icon_three'] 	= sanitize_text_field( $new_instance['icon_three'] );
			$instance['text_three'] 	= sanitize_text_field( $new_instance['text_three'] );

			$instance['icon_four'] 		= sanitize_text_field( $new_instance['icon_four'] );
			$instance['text_four'] 		= sanitize_text_field( $new_instance['text_four'] );

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
							'title'      	    => '',
							'icon_one'      	=> 'icon-map',
							'text_one' 			=> '',
							'icon_two'      	=> 'icon-envelope',
							'text_two' 			=> '',
							'icon_three'    	=> 'icon-mobile',
							'text_three' 		=> '',
							'icon_four'    	    => 'icon-global',
							'text_four' 		=> '',
						);

			$instance = wp_parse_args( (array) $instance, $defaults );

			$icon_one		= !empty( $instance['icon_one'] ) ? $instance['icon_one'] : '';
			$text_one		= !empty( $instance['text_one'] ) ? $instance['text_one'] : '';

			$icon_two		= !empty( $instance['icon_two'] ) ? $instance['icon_two'] : '';
			$text_two		= !empty( $instance['text_two'] ) ? $instance['text_two'] : ''; 

			$icon_three 	= !empty( $instance['icon_three'] ) ? $instance['icon_three'] : '';
			$text_three 	= !empty( $instance['text_three'] ) ? $instance['text_three'] : '';

			$icon_four 	   	= !empty( $instance['icon_four'] ) ? $instance['icon_four'] : '';
			$text_four 		= !empty( $instance['text_four'] ) ? $instance['text_four'] : ''; 

			?>
			<p>
			  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'ecommerce-gem' ); ?></strong></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<hr>
            <p>
    	        <small>
    	        	
    	        	<?php printf( esc_html__( 'ET-LINE icons are used for icon of each blocks. You can find icon code %1$shere%2$s.', 'ecommerce-gem' ), '<a href="http://rhythm.nikadevs.com/content/icons-et-line" target="_blank">', '</a>' ); ?>
    	        </small>
            </p>

			<h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e( 'Block #1', 'ecommerce-gem' ); ?></strong></span>
            </h4>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "icon_one" ) ); ?>"><strong><?php esc_html_e( 'Icon:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "icon_one" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "icon_one" ) ); ?>" type="text" value="<?php echo esc_attr( $icon_one ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>">
					<?php esc_html_e('Text:', 'ecommerce-gem'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_one') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_one') ); ?>" type="text" value="<?php echo esc_attr( $text_one ); ?>" />		
			</p>

			<h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e( 'Block #2', 'ecommerce-gem' ); ?></strong></span>
            </h4>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "icon_two" ) ); ?>"><strong><?php esc_html_e( 'Icon:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "icon_two" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "icon_two" ) ); ?>" type="text" value="<?php echo esc_attr( $icon_two ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>">
					<?php esc_html_e('Text:', 'ecommerce-gem'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_two') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_two') ); ?>" type="text" value="<?php echo esc_attr( $text_two ); ?>" />		
			</p>

			<h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e( 'Block #3', 'ecommerce-gem' ); ?></strong></span>
            </h4>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "icon_three" ) ); ?>"><strong><?php esc_html_e( 'Icon:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "icon_three" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "icon_three" ) ); ?>" type="text" value="<?php echo esc_attr( $icon_three ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>">
					<?php esc_html_e('Text:', 'ecommerce-gem'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_three') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_three') ); ?>" type="text" value="<?php echo esc_attr( $text_three ); ?>" />		
			</p>

			<h4 class="widefat widget-custom-info">
                <span class="field-label"><strong><?php esc_html_e( 'Block #4', 'ecommerce-gem' ); ?></strong></span>
            </h4>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( "icon_four" ) ); ?>"><strong><?php esc_html_e( 'Icon:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( "icon_four" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "icon_four" ) ); ?>" type="text" value="<?php echo esc_attr( $icon_four ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>">
					<?php esc_html_e('Text:', 'ecommerce-gem'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('text_four') ); ?>" name="<?php echo esc_attr( $this->get_field_name('text_four') ); ?>" type="text" value="<?php echo esc_attr( $text_four ); ?>" />		
			</p>

			<?php
		}
	}

endif;