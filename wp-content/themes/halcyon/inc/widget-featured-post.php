<?php
/**
 * Widget Featured Post
 *
 * @package Halcyon
 */
 
// register Halcyon_Featured_Post widget
function halcyon_register_featured_post_widget() {
    register_widget( 'Halcyon_Featured_Post' );
}
add_action( 'widgets_init', 'halcyon_register_featured_post_widget' );
 
 /**
 * Adds Halcyon_Featured_Post widget.
 */
class Halcyon_Featured_Post extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'halcyon_featured_post', // Base ID
			__( 'RARA: Featured Post', 'halcyon' ), // Name
			array( 'description' => __( 'A Featured Post Widget', 'halcyon' ), ) // Args
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
        
        $show_thumbnail = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $post_id        = ! empty( $instance['post_list'] ) ? $instance['post_list'] : 1 ;
        $title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $profession     = ! empty( $instance['profession'] ) ? $instance['profession'] : '';
        
        if( get_post_type( $post_id ) == 'post' ){
            $qry = new WP_Query( "p=$post_id" );
        }else{
            $qry = new WP_Query( "page_id=$post_id" );
        }
        if( $qry->have_posts() ){
            echo $args['before_widget'];
            while( $qry->have_posts() ){
                $qry->the_post();
                echo $args['before_title'] . apply_filters( 'widget_title', get_the_title(), $instance, $this->id_base ) . $args['after_title']; 
            ?>
            <?php if( has_post_thumbnail() && $show_thumbnail ){ ?>
				<a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'halcyon-widget-post', array( 'itemprop' => 'image' ) ); ?>
                </a>
            <?php } 
                if( $title ) echo '<span class="name">' . esc_html( $title ) . '</span>';
                if( $profession ) echo '<span class="profession">' . esc_html( $profession ) . '</span>';
                the_excerpt();                        
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
		$postlist[0] = array(
    		'value' => 0,
    		'label' => __( '--choose--', 'halcyon' ),
    	);
    	$arg = array( 'posts_per_page' => -1, 'post_type' => array( 'post', 'page' ) );
    	$posts = get_posts( $arg );
    	
        foreach( $posts as $p ){ 
    		$postlist[$p->ID] = array(
    			'value' => $p->ID,
    			'label' => $p->post_title
    		);
    	}
        
        $show_thumbnail = ! empty( $instance['show_thumbnail'] ) ? $instance['show_thumbnail'] : '';
        $post_list      = ! empty( $instance['post_list'] ) ? $instance['post_list'] : 1 ;
        $title          = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $profession     = ! empty( $instance['profession'] ) ? $instance['profession'] : '';
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>"><?php esc_html_e( 'Posts', 'halcyon' ); ?></label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'post_list' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'post_list' ) ); ?>" class="widefat">
				<?php
				foreach ( $postlist as $single_post ) { ?>
					<option value="<?php echo esc_attr( $single_post['value'] ); ?>" id="<?php echo esc_attr( $this->get_field_id( $single_post['label'] ) ); ?>" <?php selected( $single_post['value'], $post_list ); ?>><?php echo esc_html( $single_post['label'] ); ?></option>
				<?php } ?>
			</select>
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'halcyon' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'profession' ) ); ?>"><?php esc_html_e( 'Profession', 'halcyon' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'profession' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'profession' ) ); ?>" type="text" value="<?php echo esc_attr( $profession ); ?>" />
		</p>
        
        <p>
            <input id="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_thumbnail' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $show_thumbnail ); ?>/>
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_thumbnail' ) ); ?>"><?php esc_html_e( 'Show Post Thumbnail', 'halcyon' ); ?></label>
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
		
        $instance['title']          = ! empty( $new_instance['title'] ) ? sanitize_term_field( $new_instance['title'] ) : '';
        $instance['profession']     = ! empty( $new_instance['profession'] ) ? wp_kses_post( $new_instance['profession'] ) : '';   
        $instance['post_list']      = ! empty( $new_instance['post_list'] ) ? absint( $new_instance['post_list'] ) : 1;
        $instance['show_thumbnail'] = ! empty( $new_instance['show_thumbnail'] ) ? absint( $new_instance['show_thumbnail'] ) : '';
        
		return $instance;
        
	}

} // class Halcyon_Featured_Post