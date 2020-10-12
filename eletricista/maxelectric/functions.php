<?php
/**
 * Theme functions and definitions
*/

/* Include Core */
require get_template_directory() . '/include/inc.php';

/* Include Admin */
require get_template_directory() . '/admin/inc.php';

/* ************************************************************************ */

if( !function_exists('maxelectric_get_the_ID') ) :

	function maxelectric_get_the_ID() {

		if( class_exists( 'WooCommerce' ) && wc_get_page_id('shop') != "-1" && is_shop() ) {
			$post_id = wc_get_page_id('shop');
		}
		else {
			$post_id = get_the_ID();
		}

		return ! empty( $post_id ) ? $post_id : false;
	}
endif;

/* ************************************************************************ */

/* Redux Options */
if( !function_exists('maxelectric_options') ) :

	function maxelectric_options( $option, $arr = null ) {

		global $maxelectric_option;

		if( $arr ) {

			if( isset( $maxelectric_option[$option][$arr] ) ) {
				return $maxelectric_option[$option][$arr];
			}
		}
		else {
			if( isset( $maxelectric_option[$option] ) ) {
				return $maxelectric_option[$option];
			}
		}
	}

endif;

/* ************************************************************************ */

if( ! function_exists('maxelectric_allowhtmltags') ) :

	// Create function which allows more tags within comments
	function maxelectric_allowhtmltags() {

		global $maxelectric_allowedtags;

		$maxelectric_allowedtags['h1'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['h2'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['h3'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['h4'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['h5'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['h6'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['em'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['i'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['li'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['button'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['ul'] = array( 'class' => array(), 'style' => array() );		
		$maxelectric_allowedtags['ol'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['pre'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['blockquote'] = array( 'style' => array() );
		$maxelectric_allowedtags['<!--more-->'] = array();
		$maxelectric_allowedtags['p'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['del'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['span'] = array( 'class' => array(), 'style' => array() );
		$maxelectric_allowedtags['code'] = array( 'class' => array());
		$maxelectric_allowedtags['strong'] = array( 'class'=> array(), 'style' => array() );
		$maxelectric_allowedtags['ins'] = array( 'datetime' => array() );
		$maxelectric_allowedtags['img'] = array( 'class' => array(), 'src' => array(), 'alt' => array(), 'style' => array() );
		$maxelectric_allowedtags['a'] = array( 'class' => array(), 'href' => array(), 'target' => array(), 'title' => array(), 'style' => array() );

		return $maxelectric_allowedtags;
	}
endif;

/* ************************************************************************ */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see maxelectric_content_width()
 *
 * @since Maxelectric 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }


/**
 * Adjust content_width value for image attachment template.
 *
 * @since Maxelectric 1.0
 */
if( !function_exists('maxelectric_content_width') ) :

	function maxelectric_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
	}
	add_action( 'template_redirect', 'maxelectric_content_width' );
endif;

/* ************************************************************************ */

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Maxelectric 1.0
 */
if( !function_exists('maxelectric_theme_setup') ) :

	function maxelectric_theme_setup() {

		/* load theme languages */
		load_theme_textdomain( "maxelectric", get_template_directory() . '/languages' );

		/* Image Sizes */
		set_post_thumbnail_size( 870, 362, true ); /* Default Featured Image */
		
		add_image_size( 'maxelectric_870_362', 870, 362,true ); /* Blog Post Slider  */
		add_image_size( 'maxelectric_756_499', 756, 499,true ); /* Single Portfolio  */
		add_image_size( 'maxelectric_476_477', 476, 477,true ); /* Portfolio category  */
		add_image_size( 'maxelectric_270_247', 270, 247,true ); /* Portfolio similar  */
		

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'maxelectric_primary_nav'   => esc_html__( 'Primary menu', "maxelectric" ),			
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		
		/* WooCommerce Theme Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'maxelectric_theme_setup' );
endif;

/* ************************************************************************ */

/* Google Font */
if( !function_exists('maxelectric_fonts_url') ) :

	function maxelectric_fonts_url() {

		$fonts_url = '';

		$poppins = _x( 'on', 'Poppins font: on or off', "maxelectric" );
		$montserrat = _x( 'on', 'Montserrat font: on or off', "maxelectric" );
		$lato = _x( 'on', 'Lato font: on or off', "maxelectric" );
		

		if ( 'off' !== $poppins || 'off' !== $montserrat || 'off' !== $lato ) {

			$font_families = array();

			if ( 'off' !== $poppins ) {
				$font_families[] = 'Poppins:300,400,500,600,700&amp;subset=devanagari,latin-ext';
			}
			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:400,700';
			}
			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Maxelectric 1.0
 */
if( !function_exists('maxelectric_enqueue_scripts') ) :

	function maxelectric_enqueue_scripts() {

		$theme = wp_get_theme("maxelectric");
		$version = $theme['Version'];

		// Load the html5 shiv.
		wp_enqueue_script( 'maxelectric-respond.min', get_template_directory_uri() . '/assets/js/html5/respond.min.js', array(), '3.7.3' );
		wp_script_add_data( 'maxelectric-respond.min', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Google Font */
		if( function_exists('maxelectric_fonts_url') ) :
			wp_enqueue_style( 'maxelectric-fonts', maxelectric_fonts_url() );
		endif;

		wp_enqueue_style( 'dashicons' );

		/* Lib */
		wp_enqueue_style( 'maxelectric-lib', get_template_directory_uri() . '/assets/css/lib.css');
		wp_enqueue_script( 'maxelectric-lib', get_template_directory_uri() . '/assets/js/lib.js', array( 'jquery' ), $version, true );

		wp_add_inline_script( 'maxelectric-lib', '
			var templateUrl = "'.esc_url( get_template_directory_uri() ).'";
			var WPAjaxUrl = "'.admin_url( 'admin-ajax.php' ).'";
		');

		/* Main Style */
		wp_enqueue_style( 'maxelectric-plugins', get_template_directory_uri() . '/assets/css/plugins.css');
		wp_enqueue_style( 'maxelectric-elements', get_template_directory_uri() . '/assets/css/elements.css');
		wp_enqueue_style( 'maxelectric-wordpress', get_template_directory_uri() . '/assets/css/wordpress.css');
		wp_enqueue_style( 'maxelectric-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
		
		/* RTL Style */
		if( maxelectric_options('opt_rtl_switch') =='1' ) {	 
			wp_enqueue_style( 'maxelectric-rtl', get_template_directory_uri() . '/assets/css/rtl.css');
		}
		wp_enqueue_script( 'maxelectric-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), $version, true );
		wp_enqueue_style( 'maxelectric-stylesheet', get_template_directory_uri() . '/style.css' );

		/* Custom CSS */
		$custom_css = "
			@media (min-width: 992px) {
				".maxelectric_options("custom_css_desktop")."
			}
			@media (max-width: 991px) {
				".maxelectric_options("custom_css_tablet")."
			}
			@media (max-width: 767px) {
				".maxelectric_options("custom_css_mobile")."
			}			
		";
		wp_add_inline_style( 'maxelectric-stylesheet', $custom_css );
		
	}
	add_action( 'wp_enqueue_scripts', 'maxelectric_enqueue_scripts' );
endif;

/* ************************************************************************ */

/**
 * Do the work to pagination work on custom post types listing pages.
 *
 * @param array $query args array, as it works on wordpress (dont use it as string)
 * @return array set global $posts and return it as well
 */
if( ! function_exists("maxelectric_wp_query") ) {

	function maxelectric_wp_query( array $qry_args = array() ) {

		global $wp_query;

		wp_reset_query();

		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$defaults = array(
			'paged'	=> $paged,
			'posts_per_page' => 10
		);

		$qry_args += $defaults;

		$wp_query = new WP_Query( $qry_args );
	}
}

/**
 * Extend the default WordPress body classes.
 *
 * @since Maxelectric 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('maxelectric_body_classes') ) :

	function maxelectric_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = "singular";
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = "front-page";
		}

		if( is_404() ) {
			$classes[] = "404-template";
		}

		return $classes;
	}
	add_filter( 'body_class', 'maxelectric_body_classes' );

endif;


/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Maxelectric 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('maxelectric_post_classes') ) :

	function maxelectric_post_classes( $classes ) {
		if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
		return $classes;
	}
	add_filter( 'post_class', 'maxelectric_post_classes' );

endif;

/* ************************************************************************ */

if( class_exists("woocommerce") ) {

	/* Change number or products per row to 3 */
	if ( !function_exists('maxelectric_loop_columns') ) :

		add_filter('loop_shop_columns', 'maxelectric_loop_columns');

		function maxelectric_loop_columns() {
			if( maxelectric_options("opt_wc_column") != "" ) { $wccolumn = maxelectric_options("opt_wc_column"); } else { $wccolumn = 3; }
			return $wccolumn; // products per row
		}
	endif;
	
	if ( !function_exists('maxelectric_related_products_args') ) :

		add_filter( 'woocommerce_output_related_products_args', 'maxelectric_related_products_args' );

		function maxelectric_related_products_args( $args ) {

			$args['posts_per_page'] = 3; // 4 related products
			$args['columns'] = 3; // arranged in 3 columns
			return $args;
			
		}
	endif;
}