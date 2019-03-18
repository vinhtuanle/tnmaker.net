<?php
/**
 * Widget Recent Post
 *
 * @package Halcyon
 */
 
// register Halcyon_Recent_Post widget
function halcyon_register_recent_post_widget() {
    register_widget( 'Halcyon_Recent_Post' );
}
add_action( 'widgets_init', 'halcyon_register_recent_post_widget' );
 
 /**
 * Adds Halcyon_Recent_Post widget.
 */
class Halcyon_Recent_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'halcyon_recent_post', // Base ID
			__( 'RARA: Recent Post', 'halcyon' ), // Name
			array( 'description' => __( 'A Recent Post Widget', 'halcyon' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Recent Posts', 'halcyon' );
        $desc       = ! empty( $instance['desc'] ) ? $instance['desc'] : '';
        $num_post   = ! empty( $instance['num_post'] ) ? $instance['num_post'] : 3 ;
        $show_thumb = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_date  = ! empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        	       
        $qry = new WP_Query( array(
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'posts_per_page'        => $num_post,
            'ignore_sticky_posts'   => true
        ) );
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            
            echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
            
            if( $desc ) echo wpautop( esc_html( $desc ) ); 
            
            while( $qry->have_posts() ){
                $qry->the_post();
            ?>
                <article class="post post-style">
    				<?php if( has_post_thumbnail() && $show_thumb ){ ?>
                        <a href="<?php the_permalink();?>" class="post-thumbnail">
                            <?php the_post_thumbnail( 'halcyon-recent-post', array( 'itemprop' => 'image' ) );?>
                        </a>
                    <?php }?>
                    
                    <header class="entry-header">
    					<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
    					<?php if( $show_date ){?>
                            <div class="entry-meta">
                                <span><a href="<?php the_permalink(); ?>">
                                    <?php printf( _x( '%1$s', 'post date', 'halcyon' ), get_the_date() ); ?>
                                </a></span>
                            </div>
                        <?php }?>
    				</header>
    				
                    <div class="entry-content">
    					<?php the_excerpt(); ?>
    				</div>
    				<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'halcyon' ); ?></a>
    			
                </article>
            <?php    
            }
            
        echo $args['after_widget'];
           
        }
        wp_reset_postdata();  
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Recent Posts', 'halcyon' );
        $desc       = ! empty( $instance['desc'] ) ? $instance['desc'] : '';
        $num_post   = ! empty( $instance['num_post'] ) ? $instance['num_post'] : 3 ;
        $show_thumb = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $show_date  = ! empty( $instance['show_postdate'] ) ? $instance['show_postdate'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'halcyon' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description', 'halcyon' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" type="text" value="<?php echo esc_attr( $desc ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'num_post' ) ); ?>"><?php esc_html_e( 'Number of Posts', 'halcyon' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_post' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_post' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $num_post ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumb ); ?>/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'halcyon' ); ?></label>
		</p>
        
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'show_postdate' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_postdate' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $show_date ); ?>/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_postdate' ) ); ?>"><?php esc_html_e( 'Show Post Date', 'halcyon' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']          = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : __( 'Recent Posts', 'halcyon' );
        $instance['desc']           = ! empty( $new_instance['desc'] ) ? sanitize_text_field( $new_instance['desc'] ) : '';
        $instance['num_post']       = ! empty( $new_instance['num_post'] ) ? absint( $new_instance['num_post'] ) : 3 ;        
        $instance['show_thumbnail'] = ! empty( $new_instance['show_thumbnail'] ) ? absint( $new_instance['show_thumbnail'] ) : '';
        $instance['show_postdate']  = ! empty( $new_instance['show_postdate'] ) ? absint( $new_instance['show_postdate'] ) : '';
		
        return $instance;
        
	}

} // class Halcyon_Recent_Post 