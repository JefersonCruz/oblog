<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Maxelectric
* @since Maxelectric 1.0
*/
get_header(); ?>
<main id="main" class="site-main">
	<!-- Error Page -->
	<div class="error-page container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<div class="error-content">
				<?php
					if( maxelectric_options("opt_error_title") != "" ) {
						?>
						<h3><?php echo esc_attr( maxelectric_options("opt_error_title") ); ?></h3>
						<?php
					}
					else {
						?>
						<h3><?php esc_html_e('404',"maxelectric"); ?></h3>
						<?php
					}
					if( maxelectric_options("opt_error_subtitle") != "" ) {
						?>
						<span><?php echo esc_attr( maxelectric_options("opt_error_subtitle") ); ?></span>
						<?php
					}
					else {
						?>
						<span><?php esc_html_e('Oops, This Page Could Not Be Found!',"maxelectric"); ?></span>
						<?php
					}
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e('Back to Home',"maxelectric"); ?>">
					<?php esc_html_e('Back to Home',"maxelectric"); ?> <i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div><!-- Container /- -->
	</div><!-- Error Page /- -->
</main><!-- .site-main -->
<?php get_footer(); ?>