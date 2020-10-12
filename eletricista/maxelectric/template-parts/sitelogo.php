<?php
$limg = $lsitetitle = $lcustomtxt = "";

$limg = maxelectric_options('opt_logoimg','url');
$lsitetitle = get_bloginfo('name');
$lcustomtxt = maxelectric_options('opt_customtxt');

$logo_w = maxelectric_options('opt_logo_size',"width");
$logo_h = maxelectric_options('opt_logo_size','height');


if( maxelectric_options('opt_logotype') == "2" && $limg != "" ) { // Logo - Image
	?>
	<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if( $logo_w != "px" && $logo_h != "px" ) { ?>style="<?php if( $logo_w != "px" ) { ?>max-width: <?php echo esc_attr( $logo_w ); ?>; <?php } ?> <?php if( $logo_h != "px" ) { ?>max-height: <?php echo esc_attr( $logo_h ); ?>;<?php } ?>"<?php } ?>>
		<img src="<?php echo esc_url( $limg ); ?>" alt=""/>
	</a>
	<?php
}
elseif( maxelectric_options('opt_logotype') == "1" && $lsitetitle != "" ) { // Logo - Site Title
	?>
	<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( $lsitetitle ); ?></a>
	<?php
}
elseif( maxelectric_options('opt_logotype') == "3" && $lcustomtxt != "" ) { // Logo - Custom Text
	?>
	<a class="navbar-brand custom-txt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php echo esc_attr( $lcustomtxt ); ?>
	</a>
	<?php
} 
else {
	?>
	<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( MAXELECTRIC_IMGURI ); ?>/logo.png" alt=""/>
	</a>
	<?php
}
?>