<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Halcyon
 */

if ( ! function_exists( 'halcyon_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function halcyon_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
    
    if( is_single() ){
        $posted_on = sprintf(
    		esc_html_x( '%s', 'post date', 'halcyon' ), $time_string );
    }else{
        $posted_on = sprintf(
    		esc_html_x( '%s', 'post date', 'halcyon' ),
    		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    	);    
    }
    
	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'halcyon_entry_categories' ) ) :
function halcyon_entry_categories(){
    
    $categories_lists = get_the_category();
    
    if( $categories_lists && halcyon_categorized_blog() ){
        echo '<span class="category">';
        foreach( $categories_lists as $category ){
            echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html__( '[ ', 'halcyon' ) . $category->name . esc_html__( ' ]', 'halcyon') . '</a>';
        }
        echo '</span>';
    }    
}
endif;

if ( ! function_exists( 'halcyon_entry_tags' ) ) :
function halcyon_entry_tags(){
    
    /* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'halcyon' ) );
	if ( $tags_list ) {
		printf( '<span class="tags">' . esc_html_x( 'Tags: %1$s', 'tag list', 'halcyon' ) . '</span>', $tags_list ); // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'halcyon_comment_byline' ) ) :
function halcyon_comment_byline(){
    
    $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html_x( 'By ', 'post author', 'halcyon' ) . esc_html( get_the_author() ) . '</a></span>';
    echo '<span class="byline"> ' . $byline . '</span>';
    
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' &sol; ';
        echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'halcyon' ), esc_html__( '1 Comment', 'halcyon' ), esc_html_x( '% Comments', 'no of comments', 'halcyon' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'halcyon_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function halcyon_entry_footer() {
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html_x( 'Edit %s', 'Name of current post', 'halcyon' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function halcyon_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'halcyon_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'halcyon_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so halcyon_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so halcyon_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in halcyon_categorized_blog.
 */
function halcyon_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'halcyon_categories' );
}
add_action( 'edit_category', 'halcyon_category_transient_flusher' );
add_action( 'save_post',     'halcyon_category_transient_flusher' );
