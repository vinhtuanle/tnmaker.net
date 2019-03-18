<?php
/**
 * Custom widgets.
 *
 * @package eCommerce_Gem
 */

if ( ! class_exists( 'eCommerce_Gem_Featured_Categories_Widget' ) ) :

	/**
	 * Featured Categories widget class.
	 *
	 * @since 1.0.0
	 */
	class eCommerce_Gem_Featured_Categories_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'ecommerce_gem_widget_featured_categories',
				'description' => esc_html__( 'Widget to display featured categories of Woo-Commerce with carousel', 'ecommerce-gem' ),
    		);

			parent::__construct( 'ecommerce-gem-featured-categories', esc_html__( 'eC-Gem: Featured Categories', 'ecommerce-gem' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$title             	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$featured_cats 		= array_map( 'esc_attr', $instance['featured_cats'] );

			$view_details  		= ! empty( $instance['view_details'] ) ? esc_html( $instance['view_details'] ) : '';

			$show_counts  	   	= ! empty( $instance['show_counts'] ) ? $instance['show_counts'] : 0;

			$disable_carousel  	= ! empty( $instance['disable_carousel'] ) ? $instance['disable_carousel'] : 0;

	        echo $args['before_widget']; ?>

	        <div class="latest-products-wrapper featured-categories-wrapper">

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

		        ?>

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

				        foreach ( $featured_cats as $term_id => $value ) {

				        	$taxonomy 		= 'product_cat';

				        	$term_details 	= get_term_by( 'id', $term_id, $taxonomy );

				        	if( !empty( $term_details ) ){

					        	$term_title 	= $term_details->name;

				        		$term_link 		= get_term_link( $term_id, $taxonomy );

				        		$thumbnail_id 	= get_term_meta( $term_id, 'thumbnail_id', true );
				        		
				        		$image_url 		= wp_get_attachment_image_src( $thumbnail_id, 'shop_catalog');

				        		if( !empty( $image_url ) ){

				        			$cat_image = $image_url[0];

				        		}else{

				        			$cat_image = wc_placeholder_img_src();
				        			
				        		} ?>

				        		<li class="product-cat product">
				        			<div class="product-thumb-wrap">
				        				<img src="<?php echo esc_url( $cat_image ); ?>" alt="<?php echo esc_html( $term_title ); ?>">

				        				<?php if( !empty( $view_details ) ){ ?>
					        				<div class="add-to-cart-wrap view-details-wrap">
					        					<a href="<?php echo esc_url( $term_link ); ?>" class="button btn-view-details"><?php echo esc_html( $view_details ) ?></a>
					        				</div>
				        				<?php } ?>

				        			</div>

				        			<div class="product-info-wrap">
				        				<a href="<?php echo esc_url( $term_link ); ?>"><h4 class="featured-cat-title"><?php echo esc_html( $term_title ); ?><?php if( 1 === $show_counts ){ ?><span class="count"><?php echo ' ('.absint( $term_details->count ).')'; ?></span><?php } ?></h4></a>
				        			</div>
				        		</li>

				        		<?php
				        	}
				        	
		                } ?>

                        </ul>

                    </div>

                </div>

	         </div><!-- .latest-news-widget -->

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {

	        $instance = $old_instance;

			$instance['title']         		= sanitize_text_field( $new_instance['title'] );

			$instance['featured_cats'] 		= ( isset( $new_instance['featured_cats'] ) && is_array( $new_instance['featured_cats'] ) ) ? array_map( 'absint', $new_instance['featured_cats'] ) : array();

			$instance['view_details'] 		= sanitize_text_field( $new_instance['view_details'] );

			$instance['show_counts']      	= (bool) $new_instance['show_counts'] ? 1 : 0;

			$instance['disable_carousel']   = (bool) $new_instance['disable_carousel'] ? 1 : 0;


	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'title'          		=> '',
				'product_category'		=> '',
				'view_details'          => esc_html__( 'View Details', 'ecommerce-gem' ),
				'featured_cats' 		=> array(),
				'show_counts'		   	=> 0,
				'disable_carousel'   	=> 0,

	        ) );

	        $featured_cats = array_map( 'esc_attr', $instance['featured_cats'] );
	        ?>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'ecommerce-gem' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	        </p>
	        
            <p>
				<label for="<?php echo  esc_attr( $this->get_field_id( 'product_category' ) ); ?>"><strong><?php esc_html_e( 'Select Category:', 'ecommerce-gem' ); ?></strong></label>
				
				<div class="multiple-checkbox-holder">
					<?php
					$cat_args = array(
									'taxonomy'     	=> 'product_cat',
									'hide_empty'   	=> true,
									'orderby' 		=> 'name',
								);

					$product_categories = get_categories( $cat_args );

					if( !empty( $product_categories ) ){

						foreach( $product_categories as $category ) {

							$cat_id 	= $category->term_id;
							$cat_title 	= $category->name;

							if( isset( $featured_cats[$cat_id] ) ) {

								$featured_cats[$cat_id] = 1;

							}else{

								$featured_cats[$cat_id] = 0;

							} ?>
							<p>
								<input id="<?php echo esc_attr( $this->get_field_id($cat_id) ); ?>" name="<?php echo esc_attr( $this->get_field_name('featured_cats').'['.$cat_id.']' ); ?>" type="checkbox" value="1" <?php checked('1', $featured_cats[$cat_id]); ?>/>
								<label for="<?php echo esc_attr( $this->get_field_id($cat_id) ); ?>"><?php echo esc_html( $cat_title ); ?></label>
							</p>
							<?php
						}

					} else{

						esc_html_e('No product categories found', 'ecommerce-gem');

					} ?>
				</div>

				<small>
		        	<?php esc_html_e('Categories selected here will be used as featured category at frontend.', 'ecommerce-gem'); ?>	
		        </small>
        	</p>

        	<p>
        		<label for="<?php echo esc_attr( $this->get_field_id( 'view_details' ) ); ?>"><strong><?php esc_html_e( 'View Detail Text:', 'ecommerce-gem' ); ?></strong></label>
        		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_details' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_details' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['view_details'] ); ?>" />
        	</p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['show_counts'] ); ?> id="<?php echo $this->get_field_id( 'show_counts' ); ?>" name="<?php echo $this->get_field_name( 'show_counts' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'show_counts' ); ?>"><?php esc_html_e( 'Show Product Counts', 'ecommerce-gem' ); ?></label>
	        </p>

	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['disable_carousel'] ); ?> id="<?php echo $this->get_field_id( 'disable_carousel' ); ?>" name="<?php echo $this->get_field_name( 'disable_carousel' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'disable_carousel' ); ?>"><?php esc_html_e( 'Disable Carousel Mode', 'ecommerce-gem' ); ?></label>
	        </p>

	        <?php
	    }

	}

endif;