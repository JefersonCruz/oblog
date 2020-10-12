<?php
get_header();

$bodylayout = "";
$bodylayout_css = "";

$sidebarlayout = "";
$sidebarlayout_css = "";

$layout_css = "";
$page_css = "";
$template_css = "";

$pid = "";
$pid = maxelectric_get_the_ID();

if( maxelectric_options("layout_body") != "" ) {

	$dbodylayout = maxelectric_options("layout_body");

	if( $dbodylayout == "fixed" ) {
		$dbodylayout_css = "container no-padding";
	}
	elseif( $dbodylayout == "fluid" ) {
		$dbodylayout_css = "container-fluid no-padding";
	}
	else { /* Do Nothing.. */ }
}
else {
	$dbodylayout_css = "container no-padding";	
}

if( maxelectric_options("layout_sidebar") != "" ) {

	$dsidebarlayout = maxelectric_options("layout_sidebar");

	if( $dsidebarlayout == "right_sidebar" ) {
		$dsidebarlayout_css = " content-left col-md-9 col-sm-8";
	}
	elseif( $dsidebarlayout == "left_sidebar" ) {
		$dsidebarlayout_css = " content-right col-md-9 col-sm-8";
	}
	elseif( $dsidebarlayout == "no_sidebar" ) {
		$dsidebarlayout_css = " no-sidebar col-md-12 no-padding";
	}
	else { /* Do Nothing.. */ }
}
else {
	$dsidebarlayout_css = " content-right col-md-9 col-sm-8";
}

if( $pid != "" ) {

	/* Page Layout */
	if( get_post_meta( $pid, 'maxelectric_cf_page_owlayout', true ) != "" || get_post_meta( $pid, 'maxelectric_cf_page_owlayout', true ) != "none" ) {

		$bodylayout = get_post_meta( $pid, 'maxelectric_cf_page_owlayout', true );
		
		if( $bodylayout == "fixed" ) {
			$bodylayout_css = "container no-padding";
		}
		elseif( $bodylayout == "fluid" ) {
			$bodylayout_css = "container-fluid no-padding";
		}
		else {
			$bodylayout_css = $dbodylayout_css;
		}
	}	

	/* Sidebar Layout */
	if( get_post_meta( $pid, 'maxelectric_cf_sidebar_owlayout', true ) != "" || get_post_meta( $pid, 'maxelectric_cf_sidebar_owlayout', true ) != 'none' ) {

		$sidebarlayout = get_post_meta( $pid, 'maxelectric_cf_sidebar_owlayout', true );
		
		if( $sidebarlayout == "right_sidebar" ) {
			$sidebarlayout_css = " content-left col-md-9 col-sm-8";
		}
		elseif( $sidebarlayout == "left_sidebar" ) {
			$sidebarlayout_css = " content-right col-md-9 col-sm-8";
		}
		elseif( $sidebarlayout == "no_sidebar" ) {
			$sidebarlayout_css = " no-sidebar col-md-12";
		}
		else {
			$sidebarlayout_css = $dsidebarlayout_css;
		}
	}

	if( get_post_meta( $pid, 'maxelectric_cf_content_padding', true ) == "off" ) {
		$page_css = " no_spacing";
	}
	else {
		$page_css = " page_spacing";
	}
}
else {

	$bodylayout_css = $dbodylayout_css;
	$sidebarlayout_css = $dsidebarlayout_css;
	$page_css = " page_spacing";
}

if( maxelectric_options("opt_wc_column") != "" ) { $wccolumn_css = " columns-".maxelectric_options("opt_wc_column") . " "; } else { $wccolumn_css = " columns-3 "; }

?>
<main id="main" class="site-main<?php echo esc_attr( $page_css . $layout_css ); ?>">

	<div class="<?php echo esc_attr( $bodylayout_css ); ?>">

		<div class="content-area woocommerce-page<?php echo esc_attr( $wccolumn_css . $sidebarlayout_css . $template_css ); ?>">