<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */

if ( ! class_exists( 'eCommerce_Gem_Latest_Products_Widget' ) ) :

	/**
	 * Latest Products widget class.
	 *
	 * @since 1.0.0
	 */
	class eCommerce_Gem_Latest_Products_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'ecommerce_gem_widget_latest_products',
				'description' => esc_html__( 'Widget to display latest product or featured products of Woo-Commerce with carousel', 'ecommerce-gem' ),
    		);

			parent::__construct( 'ecommerce-gem-latest-products', esc_html__( 'eC-Gem: Products Carousel', 'ecommerce-gem' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$title             	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$product_category   = ! empty( $instance['product_category'] ) ? $instance['product_category'] : 0;

			$product_type      	= !empty( $instance['product_type'] ) ? $instance['product_type'] : '';

			$product_number     = ! empty( $instance['product_number'] ) ? $instance['product_number'] : 6;

			$disable_carousel  	= ! empty( $instance['disable_carousel'] ) ? $instance['disable_carousel'] : 0;

	        echo $args['before_widget']; ?>

	        <div class="latest-products-wrapper">

        		<?php 

        		if ( $title ) { 

        			echo $args['before_title'] . esc_html( $title ) . $args['after_title']; 

        		} 

		        $carousel_args = array(
		        	'slidesToShow' 	=> 4,
		        	'slidesToScroll'=> 4,
		        	'dots'         	=> true,
		        	'arrows'       	=> false,
		        	'responsive'   	=> array(
		        		array(
		        			'breakpoint' => 1024,
		        			'settings'   => array(
		        				'slidesToShow' => 4,
		        				),
		        			),
		        		array(
		        			'breakpoint' => 992,
		        			'settings'   => array(
		        				'slidesToShow' 	=> 3,
		        				'slidesToScroll'=> 3,
		        				),
		        			),
		        		array(
		        			'breakpoint' => 768,
		        			'settings'   => array(
		        				'slidesToShow' 	=> 2,
		        				'slidesToScroll'=> 2,
		        				),
		        			),
		        		array(
		        			'breakpoint' => 479,
		        			'settings'   => array(
		        				'slidesToShow' 	=> 1,
		        				'slidesToScroll'=> 1,
		        				),
		        			),
		        		),
		        	);

		        $carousel_args_encoded = wp_json_encode( $carousel_args );

		        $meta_query = WC()->query->get_meta_query();

		        $tax_query  = WC()->query->get_tax_query();

                if( 'featured' == $product_type ){

                	$tax_query[] = array(
                		'taxonomy' => 'product_visibility',
                		'field'    => 'name',
                		'terms'    => 'featured',
                		'operator' => 'IN',
                	);

                }else{

        	        $tax_query[] = array(
        	        	'taxonomy' => 'product_cat',
        	        	'field'    => 'id',
        	        	'terms'    => absint( $product_category ),
        	        	'operator' => 'IN',
        	        );

            	}

		        $query_args = array(
		        	'post_type'           => 'product',
		        	'post_status'         => 'publish',
		        	'ignore_sticky_posts' => 1,
		        	'posts_per_page'      => absint( $product_number ),
		        	'meta_query'          => $meta_query,
		        	'no_found_rows'       => true,
		        );

		        if ( absint( $product_category ) > 0 || 'featured' == $product_type ) {

		        	$query_args['tax_query'] = $tax_query;
		        	
		        }
		        
		        global $woocommerce_loop;

		        $latest_products = new WP_Query( $query_args );

		        if ( $latest_products->have_posts() ) :?>

		        	<div class="inner-wrapper">

				        <div class="products-carousel-wrap">

				        	<?php

				        	if( 1 !== $disable_carousel ){ ?>

				        		<ul class="latest-product-items latest-products-main carousel-mode" data-slick='<?php echo $carousel_args_encoded; ?>'> 

				        		<?php
				        	}else{ ?>

				        		<ul class="latest-product-grid latest-products-main grid-mode"> 
				        		<?php
				        	}

								while ( $latest_products->have_posts() ) :

	                                $latest_products->the_post(); 

	                            	wc_get_template_part( 'content', 'product' );

								endwhile; 

								woocommerce_reset_loop();

	                            wp_reset_postdata(); ?>

	                        </ul>

	                    </div>

	                </div>

		        <?php endif; ?>

	         </div><!-- .latest-news-widget -->

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
			$instance['title']          	= sanitize_text_field( $new_instance['title'] );
			$instance['product_category']  	= absint( $new_instance['product_category'] );
			$instance['product_type'] 	    = sanitize_text_field( $new_instance['product_type'] );
			$instance['product_number']  	= absint( $new_instance['product_number'] );
			$instance['disable_carousel']   = (bool) $new_instance['disable_carousel'] ? 1 : 0;

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'title'          		=> '',
				'product_category' 		=> '',
				'product_type'          => 'latest',
				'product_number' 		=> 6,
				'disable_carousel'   	=> 0,

	        ) );
	        ?>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'ecommerce-gem' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	        </p>
	        
            <p>
				<label for="<?php echo  esc_attr( $this->get_field_id( 'product_category' ) ); ?>"><strong><?php esc_html_e( 'Select Category:', 'ecommerce-gem' ); ?></strong></label>
				<?php
				$cat_args = array(
				    'orderby'         => 'name',
				    'hide_empty'      => 0,
				    'class' 		  => 'widefat',
				    'taxonomy'        => 'product_cat',
				    'name'            => $this->get_field_name( 'product_category' ),
				    'id'              => $this->get_field_id( 'product_category' ),
				    'selected'        => absint( $instance['product_category'] ),
				    'show_option_all' => esc_html__( 'All Categories','ecommerce-gem' ),
				  );
				wp_dropdown_categories( $cat_args );
				?>
            </p>

            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'product_type' ) ); ?>"><strong><?php _e( 'Product Type:', 'ecommerce-gem' ); ?></strong></label>
    			<?php
                $this->dropdown_product_type( array(
    				'id'       => $this->get_field_id( 'product_type' ),
    				'name'     => $this->get_field_name( 'product_type' ),
    				'selected' => esc_attr( $instance['product_type'] ),
    				)
                );
    			?>
            </p>

	        <p>
	        	<label for="<?php echo esc_attr( $this->get_field_name('product_number') ); ?>">
	        		<?php esc_html_e('Number of Products:', 'ecommerce-gem'); ?>
	        	</label>
	        	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('product_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('product_number') ); ?>" type="number" value="<?php echo absint( $instance['product_number'] ); ?>" />
	        </p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['disable_carousel'] ); ?> id="<?php echo $this->get_field_id( 'disable_carousel' ); ?>" name="<?php echo $this->get_field_name( 'disable_carousel' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'disable_carousel' ); ?>"><?php esc_html_e( 'Disable Carousel Mode', 'ecommerce-gem' ); ?></label>
	        </p>

	        <?php
	    }

        function dropdown_product_type( $args ) {
    		$defaults = array(
    	        'id'       => '',
    	        'class'    => 'widefat',
    	        'name'     => '',
    	        'selected' => 'latest',
    		);

    		$r = wp_parse_args( $args, $defaults );
    		$output = '';

    		$choices = array(
    			'latest' 	=> esc_html__( 'Latest', 'ecommerce-gem' ),
    			'featured' 	=> esc_html__( 'Featured', 'ecommerce-gem' ),
    		);

    		if ( ! empty( $choices ) ) {

    			$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
    			foreach ( $choices as $key => $choice ) {
    				$output .= '<option value="' . esc_attr( $key ) . '" ';
    				$output .= selected( $r['selected'], $key, false );
    				$output .= '>' . esc_html( $choice ) . '</option>\n';
    			}
    			$output .= "</select>\n";
    		}

    		echo $output;
        }

	}

endif;