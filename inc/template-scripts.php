<?php
function neoton_scripts() {
	//register styles
	global $neoton_option;
	wp_enqueue_style( 'neoton-plugins', get_template_directory_uri() .'/assets/css/plugins.css');
	wp_enqueue_style( 'rounded', get_template_directory_uri() .'/assets/css/remixicon.css');		
	wp_enqueue_style( 'neoton-style-default', get_template_directory_uri() .'/assets/css/default.css' );
	wp_enqueue_style( 'neoton-style-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );
	wp_enqueue_style( 'neoton-style', get_stylesheet_uri() );	
	wp_enqueue_script( 'neoton-plugin', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery','imagesloaded'), '20151215', true );		
	wp_enqueue_script('neoton-classie', get_template_directory_uri() . '/assets/js/classie.js', array('jquery'), '201513434', true);	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );	
	wp_enqueue_script( 'time-circle', get_template_directory_uri() . '/assets/js/time-circle.js', array('jquery'), '20151215', true );		
	wp_enqueue_script('neoton-mobilemenu', get_template_directory_uri() . '/assets/js/mobilemenu.js', array('jquery'), '201513434', true);
	wp_enqueue_script('neoton-mobilemenu_single', get_template_directory_uri() . '/assets/js/mobilemenu_single.js', array('jquery'), '201513434', true);
	wp_enqueue_script('neoton-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '201513434', true);	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'neoton_scripts' );

add_action( 'wp_enqueue_scripts', 'neoton_rtl_scripts', 1500 );
if ( !function_exists( 'neoton_rtl_scripts' ) ) {
	function neoton_rtl_scripts() {	
		// RTL
		if ( is_rtl() ) {
			wp_enqueue_style( 'neoton-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), 1.0 );
		}		
		
	}
}
	
add_action( 'admin_enqueue_scripts', 'neoton_load_admin_styles' );
function neoton_load_admin_styles($screen) {
	wp_enqueue_style( 'neoton-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', true, '1.0.0' );
	wp_enqueue_script( 'neoton-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '20151215', true );
} 