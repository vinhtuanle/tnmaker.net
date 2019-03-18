<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */

if ( ! class_exists( 'eCommerce_Gem_CTA_Widget' ) ) :

	/**
	 * CTA widget class.
	 *
	 * @since 1.0.0
	 */
	class eCommerce_Gem_CTA_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'ecommerce_gem_widget_call_to_action',
				'description' => esc_html__( 'Call To Action Widget', 'ecommerce-gem' ),
			);
			parent::__construct( 'ecommerce-gem-cta', esc_html__( 'eC-Gem: CTA', 'ecommerce-gem' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {
			$title       	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$sub_title   	= ! empty( $instance['sub_title'] ) ? esc_html( $instance['sub_title'] ) : '';
			$offer_percent  = ! empty( $instance['offer_percent'] ) ? esc_html( $instance['offer_percent'] ) : '';
			$offer_text  	= ! empty( $instance['offer_text'] ) ? esc_html( $instance['offer_text'] ) : '';
			$button_text 	= ! empty( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
			$button_url  	= ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : '';
			$bg_pic  	 	= ! empty( $instance['bg_pic'] ) ? esc_url( $instance['bg_pic'] ) : '';

			// Add background image.
			if ( ! empty( $bg_pic ) ) {
				$background_style = '';
				$background_style .= ' style="background-image:url(' . esc_url( $bg_pic ) . ');" ';
				$args['before_widget'] = implode( $background_style . ' ' . 'class="bg_enabled ', explode( 'class="', $args['before_widget'], 2 ) );
			}else{

				$args['before_widget'] = implode( 'class="bg_disabled ', explode( 'class="', $args['before_widget'], 2 ) );

			}

			echo $args['before_widget']; ?>

			<div class="cta-content-holder cta-widget">

				<div class="content-wrap"> 

					<?php if ( ! empty( $offer_percent ) || ! empty( $offer_text ) ){ ?>

						<div class="call-to-action-offer">

							<div class="call-to-action-offer-inner">

								<div class="cta-offer-wrap">
								
									<?php

									if ( ! empty( $offer_percent ) ) {
										echo '<span class="offer-percent">' . esc_html( $offer_percent ) . '</span>';
									}

									if ( ! empty( $offer_text ) ) {
										echo '<span class="offer-text">' . esc_html( $offer_text ) . '</span>';
									} ?>

								</div>

							</div>
							
						</div><!-- .call-to-action-buttons -->

					<?php } ?>

					<div class="call-to-action-wrap">

						<?php

						if ( ! empty( $title ) || !empty( $sub_title ) ) { ?>

							<div class="call-to-action-content">

								<?php

								if ( ! empty( $title ) ) {
									echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
								}

								if ( ! empty( $sub_title ) ) {
									echo '<p>' . esc_html( $sub_title ) . '</p>';
								} ?>
								
							</div>	

						<?php } ?>

						<?php if ( ! empty( $button_text ) && ! empty( $button_url ) ){ ?>

							<div class="call-to-action-buttons">
								
								<a href="<?php echo esc_url( $button_url ); ?>" class="button cta-button cta-button-primary"><?php echo esc_attr( $button_text ); ?></a>

							</div><!-- .call-to-action-buttons -->

						<?php } ?>

					</div>
					
				</div>

			</div><!-- .cta-widget -->

			<?php
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['sub_title'] 	 	= sanitize_text_field( $new_instance['sub_title'] );

			$instance['offer_percent'] 	= sanitize_text_field( $new_instance['offer_percent'] );

			$instance['offer_text'] 	= sanitize_text_field( $new_instance['offer_text'] );

			$instance['button_text'] 	= sanitize_text_field( $new_instance['button_text'] );
			
			$instance['button_url']  	= esc_url_raw( $new_instance['button_url'] );

			$instance['bg_pic']  	 	= esc_url_raw( $new_instance['bg_pic'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       			=> '',
				'sub_title'    			=> '',
				'offer_percent'         => esc_html__( '50%', 'ecommerce-gem' ),
				'offer_text'            => esc_html__( 'OFF', 'ecommerce-gem' ),
				'button_text' 			=> esc_html__( 'Purchase Now', 'ecommerce-gem' ),
				'button_url'  			=> '',
				'bg_pic'      			=> '',
			) );

			$bg_pic = '';

            if ( ! empty( $instance['bg_pic'] ) ) {

                $bg_pic = $instance['bg_pic'];

            }

            $wrap_style = '';

            if ( empty( $bg_pic ) ) {

                $wrap_style = ' style="display:none;" ';
            }

            $image_status = false;

            if ( ! empty( $bg_pic ) ) {
                $image_status = true;
            }

            $delete_button = 'display:none;';

            if ( true === $image_status ) {
                $delete_button = 'display:inline-block;';
            }
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><strong><?php esc_html_e( 'Sub Title:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['sub_title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offer_percent' ) ); ?>"><strong><?php esc_html_e( 'Offer Percent:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offer_percent' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offer_percent' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['offer_percent'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offer_text' ) ); ?>"><strong><?php esc_html_e( 'Offer Text:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offer_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offer_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['offer_text'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><strong><?php esc_html_e( 'Primary Button Text:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><strong><?php esc_html_e( 'Primary Button URL:', 'ecommerce-gem' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_url'] ); ?>" />
			</p>

			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>">
                    <strong><?php esc_html_e( 'Background Image:', 'ecommerce-gem' ); ?></strong>
                </label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'bg_pic' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>" value="<?php echo esc_url( $instance['bg_pic'] ); ?>" />
                <div class="rtam-preview-wrap" <?php echo $wrap_style; ?>>
                    <img src="<?php echo esc_url( $bg_pic ); ?>" alt="<?php esc_attr_e( 'Preview', 'ecommerce-gem' ); ?>" />
                </div><!-- .rtam-preview-wrap -->
                <input type="button" class="select-img button button-primary" value="<?php esc_html_e( 'Upload', 'ecommerce-gem' ); ?>" data-uploader_title="<?php esc_html_e( 'Select Background Image', 'ecommerce-gem' ); ?>" data-uploader_button_text="<?php esc_html_e( 'Choose Image', 'ecommerce-gem' ); ?>" />
                <input type="button" value="<?php echo esc_attr_x( 'X', 'Remove Button', 'ecommerce-gem' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
            </div>
		<?php
		} 
	
	}

endif;