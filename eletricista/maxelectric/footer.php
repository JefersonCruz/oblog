<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Maxelectric
 * @since Maxelectric 1.0
 */
	?>
		<?php
		if( is_active_sidebar('sidebar-5') || 
		   is_active_sidebar('sidebar-6') || 
		   is_active_sidebar('sidebar-7') || 
		   is_active_sidebar('sidebar-8')
		 ) {
			?>
			<!-- Footer Main -->
			<footer id="footer-main" class="footer-main container-fluid no-left-padding no-right-padding">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						<?php
							if(is_active_sidebar('sidebar-5') ) {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<?php dynamic_sidebar('sidebar-5'); ?>
								</div>
								<?php
							}
							if(is_active_sidebar('sidebar-6') ) {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<?php dynamic_sidebar('sidebar-6'); ?>
								</div>
								<?php
							}	
							if(is_active_sidebar('sidebar-7') ) {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<?php dynamic_sidebar('sidebar-7'); ?>
								</div>
								<?php
							}
							if(is_active_sidebar('sidebar-8') ) {
								?>
								<div class="col-md-3 col-sm-6 col-xs-6">
									<?php dynamic_sidebar('sidebar-8'); ?>
								</div>
								<?php
							}
						?>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</footer><!-- Footer Main /- -->
			<?php
		 }
		if( maxelectric_options("opt_footer_copyright") != "" ) {
			?>
			<div class="copyright-section container-fluid no-left-padding no-right-padding">
				<!-- Container -->
				<div class="container">
					<?php echo do_shortcode( wpautop( wp_kses( maxelectric_options("opt_footer_copyright"), maxelectric_allowhtmltags() ) ) ); ?>
				</div><!-- Container /- -->
			</div>
			<?php
		}
		?>
	<?php wp_footer(); ?>
	</div>
</body>
</html>