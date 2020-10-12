<?php
/* Page Metabox */
$page_subtitle = "";
$page_subtitle = get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_page_subtitle', true );

$page_banner = "";
$page_banner  = get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_page_header_img', true );

/* Page Banner */
$header_image = "";
if( $page_banner != "" ) {
	$header_image = $page_banner;
}
elseif( maxelectric_options("opt_pageheader_img", "url") != "" ) {
	$header_image = maxelectric_options("opt_pageheader_img", "url");
}
else {
	$header_image = MAXELECTRIC_IMGURI . '/banner-bg.jpg';
}
?>
	<!-- Page Banner -->
	<div class="page-banner container-fluid custombg_overlay" style="
		background-image: url(<?php echo esc_url( $header_image ); ?>);
		<?php if( maxelectric_options("opt_pageheader_height") != "" ) { ?> min-height: <?php echo maxelectric_options("opt_pageheader_height"); ?>px;<?php } ?>
		">
		<!-- Container -->
		<div class="container">
			<div class="banner-content">
				
				<h3><?php
						if( is_home() ) {
							esc_html_e( 'Blog', "maxelectric" );
						}
						elseif( is_404() ) {
							esc_html_e( 'Page Not Found', "maxelectric" );
						}
						elseif( is_search() ) {
							printf( esc_html__( 'Search Results for: %s', "maxelectric" ), get_search_query() );
						}
						elseif( is_archive() ) {
							the_archive_title();
						}
						else {
							the_title();
						}
						if( $page_subtitle != "" ) { 
							?>
							<span class="page-subtitle"><?php echo esc_attr($page_subtitle);?></span>
							<?php 
						}
					?></h3>
				<?php 
					if( function_exists( 'bcn_display' ) ) {
						?>
						<div class="breadcrumb">
							<?php bcn_display(); ?>
						</div>
						<?php
					}
				?>
			</div>
		</div><!-- Container /- -->
	</div><!-- Page Banner /- -->