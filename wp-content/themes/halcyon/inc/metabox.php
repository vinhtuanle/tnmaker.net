<?php
/**
 * Halcyon Meta Box
 * 
 * @package Halcyon
 */

 add_action('add_meta_boxes', 'halcyon_add_sidebar_layout_box');

function halcyon_add_sidebar_layout_box(){    
    add_meta_box(
                 'halcyon_sidebar_layout', // $id
                 __( 'Sidebar Layout', 'halcyon' ), // $title
                 'halcyon_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority    
}

$halcyon_sidebar_layout = array(         
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar (default)', 'halcyon' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'halcyon' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   

    );

function halcyon_sidebar_layout_callback(){
    global $post , $halcyon_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'halcyon_sidebar_layout_nonce' ); 
?>
<table class="form-table">
    <tr>
        <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'halcyon' ); ?></em></td>
    </tr>

    <tr>
        <td>
        <?php  
            foreach( $halcyon_sidebar_layout as $field ){  
                $layout = get_post_meta( $post->ID, 'halcyon_sidebar_layout', true ); ?>

            <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                    <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span><br/>
                    <input type="radio" name="halcyon_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'right-sidebar' ); } ?>/>&nbsp;<?php echo $field['label']; ?>
                </label>
            </div>
            <?php } // end foreach 
            ?>
            <div class="clear"></div>
        </td>
    </tr>
</table>
<?php        
}

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function halcyon_save_sidebar_layout( $post_id ) { 
    global $halcyon_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'halcyon_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'halcyon_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
    

    foreach( $halcyon_sidebar_layout as $field ){  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'halcyon_sidebar_layout', true ); 
        $new = sanitize_text_field( $_POST['halcyon_sidebar_layout'] );
        if ( $new && $new != $old ){  
            update_post_meta( $post_id, 'halcyon_sidebar_layout', $new );  
        } elseif ( '' == $new && $old ) {  
            delete_post_meta( $post_id,'halcyon_sidebar_layout', $old );  
        }  
     } // end foreach   
     
}
add_action('save_post', 'halcyon_save_sidebar_layout'); 