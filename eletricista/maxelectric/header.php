<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Maxelectric
 * @since Maxelectric 1.0
 */

$rtl_onoff = "";
if( maxelectric_options('opt_rtl_switch') != "" ) { 
	$rtl_onoff = maxelectric_options('opt_rtl_switch');
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js"<?php if( $rtl_onoff != "" && $rtl_onoff == 1 ) { ?> dir="rtl"<?php } ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	$page_title = "";
	$page_title = get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_page_title', true );

	if( maxelectric_options("opt_siteloader") != "0" ) {
		get_template_part("template-parts/siteloader");
	}
	?>
	<div class="main-container">
		<header class="header_s1">
			<?php 
				if( maxelectric_options("opt_top_header") != "0" && maxelectric_options("opt_social_icons") != "" || maxelectric_options("opt_contactno") != "" || maxelectric_options("opt_email") != "" || maxelectric_options("opt_opentime") != "" ) {
					?>
					<!-- SidePanel -->
					<div id="slidepanel">
						<!-- Top Header -->
						<div class="container-fluid top-header">
							<!-- Container -->
							<div class="container">
								<?php 
									if( maxelectric_options("opt_social_icons") != "" ) {
										?>
										<ul class="header-social">
											<?php get_template_part("template-parts/social_icons"); ?>
										</ul>
										<?php
									}
								?>
								<div class="contact-block">
									<?php 
										if( maxelectric_options("opt_contactno") != "" ) {
											?>
											<p>
												<i class="icon icon-Phone2"></i> 
												<a href="tel:<?php echo esc_attr(str_replace(" ", "", maxelectric_options("opt_contactno") ) ); ?>" title="<?php echo esc_attr(str_replace(" ", "", maxelectric_options("opt_contactno") ) ); ?>"><?php echo esc_attr( maxelectric_options("opt_contactno") ); ?></a>
											</p>
											<?php
										}
										if( maxelectric_options("opt_email") != "" ) {
											?>
											<p>
												<i class="icon icon-Mail"></i>
												<a href="mailto:<?php echo esc_attr( maxelectric_options("opt_email") );  ?>" title="<?php echo esc_attr( maxelectric_options("opt_email") );  ?>"><?php echo esc_attr( maxelectric_options("opt_email") );  ?></a>
											</p>
											<?php
										}
										if( maxelectric_options("opt_opentime") != "" ) {
											?>
											<p>
												<i class="icon icon-Time"></i>
												<?php esc_html_e('Monday - Saturday',"maxelectric"); ?> <?php echo esc_attr( maxelectric_options("opt_opentime") );  ?>
											</p>
											<?php
										}
									?>
								</div>
							</div><!-- Container /- -->
						</div><!-- Top Header /- -->
					</div><!-- SidePanel /- -->
					<?php
				}
			?>
			<!-- Ownavigation -->
			<nav class="navbar ownavigation">
				<!-- Container -->
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only"><?php echo esc_html_e('Toggle navigation',"maxelectric"); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php get_template_part("template-parts/sitelogo"); ?>
					</div>
					<?php
						if( maxelectric_options("opt_header_search") != "0" ) {
							?>
							<div class="search">	
								<a href="#" id="search" title="Search"><i class="icon icon-Search"></i></a>
							</div>
							<?php
						}
					?>
					<div id="navbar" class="navbar-collapse collapse">
						<?php get_template_part("template-parts/sitemenu"); ?>
					</div>
					<?php 
						if( maxelectric_options("opt_top_header") != "0" && maxelectric_options("opt_social_icons") != "" || maxelectric_options("opt_contactno") != "" || maxelectric_options("opt_email") != "" || maxelectric_options("opt_opentime") != "" ) {
							?>
							<div id="loginpanel" class="desktop-hide">
								<div class="right" id="toggle">
									<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
									<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
								</div>
							</div>
							<?php
						}
					?>
				</div><!-- Container /- -->
			</nav><!-- Ownavigation /- -->
			<?php
				if( maxelectric_options("opt_header_search") != "0" ) {
					?>
					<!-- Search Box -->
					<div class="search-box">
						<span><i class="icon_close"></i></span>
						<?php get_search_form(); ?>
					</div><!-- Search Box /- -->
					<?php
				}
			?>
		</header>
		<?php
		if( $page_title != "disable" || is_search() ) {
			get_template_part("template-parts/pageheader" );
		}
	?>