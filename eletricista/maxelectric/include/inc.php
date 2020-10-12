<?php
/* Define Constants */
define( 'MAXELECTRIC_IMGURI', get_template_directory_uri() . '/assets/images' );

/**
 * Register three widget areas.
 *
 * @since Maxelectric 1.0
 */
if ( ! function_exists( 'maxelectric_widgets_init' ) ) {
	function maxelectric_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar (Default for Blog)', "maxelectric" ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', "maxelectric" ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Right Sidebar (Default for Shop)', "maxelectric" ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Left Sidebar', "maxelectric" ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', "maxelectric" ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', "maxelectric" ),
			'id'            => 'sidebar-6',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', "maxelectric" ),
			'id'            => 'sidebar-7',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 4', "maxelectric" ),
			'id'            => 'sidebar-8',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "maxelectric" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}
	add_action( 'widgets_init', 'maxelectric_widgets_init' );
}

require_once( trailingslashit( get_template_directory() ) . 'include/nav_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/page_walker.php' );