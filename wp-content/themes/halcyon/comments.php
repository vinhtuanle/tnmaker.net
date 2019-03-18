<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Halcyon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="author-section">
	<p><?php echo get_avatar( get_the_author_meta( 'ID' ), 125 ); ?></p>
	<div class="text-holder">
		<?php echo wpautop( '<span>' . esc_html( get_the_author_meta( 'display_name' ) ) . '</span>' ) ; 
            echo wpautop( esc_html( get_the_author_meta( 'description' ) ) );
        ?>
	</div>
</div>

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
    <div id="comments" class="comments-area">
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'halcyon' ) ),
					number_format_i18n( get_comments_number() )
				);
			?>
		</h3>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
                    'callback'   => 'halcyon_theme_comment',
                    'avatar_size'=> 85,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'halcyon' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'halcyon' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'halcyon' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.
        ?>
    </div><!-- #comments -->
	<?php
    endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'halcyon' ); ?></p>
	<?php
	endif;

	?>

<div class="comment-form">
    <div class="comments-area form">
        <?php comment_form();?>
    </div>
</div>