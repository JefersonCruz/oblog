<?php
if( has_nav_menu('maxelectric_primary_nav') ) :
	wp_nav_menu( array(
		'theme_location' => 'maxelectric_primary_nav',
		'container' => false,
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth' => 10,
		'menu_class' => 'nav navbar-nav navbar-right',
		'walker' => new maxelectric_nav_walker
	));
	else :
	?>
	<h3 class="menu-setting">
		<a href="<?php echo esc_url( home_url("/wp-admin/nav-menus.php") ); ?>"><?php esc_html_e( 'Set The Menu', "maxelectric" );?></a>
	</h3>
	<?php
endif;
?>