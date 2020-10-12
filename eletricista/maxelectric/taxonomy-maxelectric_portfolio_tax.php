<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Maxelectric
* @since Maxelectric 1.0
*/
?>

<?php get_template_part("template-parts/portfolio","before"); ?>

<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Include the page content template.
	get_template_part( 'template-parts/content','portfolio' );

// End the loop.
endwhile;

?>

<?php get_template_part("template-parts/portfolio","after"); ?>