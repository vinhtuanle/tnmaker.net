<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Halcyon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( has_post_thumbnail() ) ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'halcyon-with-sidebar', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'halcyon-without-sidebar', array( 'itemprop' => 'image' ) ) ;?>
    <header class="entry-header">		
        <?php
            halcyon_entry_categories();
            
			if ( is_single() ) {
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php halcyon_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="text">
		<?php
			if( is_single() ){
    			the_content( sprintf(
    				/* translators: %s: Name of current post. */
    				wp_kses( _x( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'Name of current post', 'halcyon' ), array( 'span' => array( 'class' => array() ) ) ),
    				the_title( '<span class="screen-reader-text">"', '"</span>', false )
    			) ); 
			}else{
                $format = get_post_format();
                if( false === $format ){
                    the_excerpt();               
                }else{
                    the_content();                    
                }
			}
            
            halcyon_entry_tags();
            
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'halcyon' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    
    <div class="bottom-content">
		<div class="entry-meta">
			<?php halcyon_comment_byline(); ?>
		</div>
        <?php if( !is_single() ){?>
            <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Read More', 'halcyon' ); ?></a>
        <?php } ?>
	</div>
    
	<footer class="entry-footer">
		<?php halcyon_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
