<?php
/**
 * Home widgets
 *
 * @package eCommerce_Gem
 */

// Bail if not home page.
if ( ! is_page_template( 'templates/home.php' )  ) {
	return;
}

if ( ! is_active_sidebar( 'advertisement-area' ) ){
	return;
} 

global $sidebars_widgets;

$count = count ($sidebars_widgets['advertisement-area']);

if( 1 == $count ){

	$row_class = 'full-width';

}elseif( 2 == $count  ){

	$row_class = 'half-width';

}elseif( 3 == $count  ){

	$row_class = 'one-third-width';

}else{

	$row_class = 'mixed-width';

} ?>

<div id="home-page-advertisement-area" class="widget-area <?php echo $row_class; ?>">
	<div class="container">
		<div class="inner-wrapper">
			<?php dynamic_sidebar( 'advertisement-area' ); ?>
		</div>
	</div>
</div><!-- #home-page-advertisement-area -->