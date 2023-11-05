<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */

function neoton_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'neoton' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'neoton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Shop', 'neoton' ),
			'id'            => 'sidebar_shop',
			'description'   => esc_html__( 'Sidebar Shop', 'neoton' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	if (class_exists( 'ReduxFramework' )){

		register_sidebar( array(
			'name'          => esc_html__( 'News Ticker Widget', 'neoton' ),
			'id'            => 'ticker-1',
			'description'   => esc_html__( 'News Ticker Widget Area.', 'neoton' ),
			'before_widget' => '<div id="%1$s" class="widget icon-list %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Off Canvas Sidebar', 'neoton' ),
			'id'            => 'sidebarcanvas-1',
			'description'   => esc_html__( 'Off canvas widget area.', 'neoton' ),
			'before_widget' => '<div id="%1$s" class="widget icon-list %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	

	register_sidebar( array(
			'name' => esc_html__( 'Footer One Widget Area', 'neoton' ),
			'id' => 'footer1',
			'description' => esc_html__( 'Footer 1 widget area', 'neoton' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) ); 		 				



		 register_sidebar( array(
				'name' => esc_html__( 'Footer Two Widget Area', 'neoton' ),
				'id' => 'footer2',
				'description' => esc_html__( 'Footer 2 widget area', 'neoton' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="footer-title">',
				'after_title' => '</h3>'
		) ); 
	
	 register_sidebar( array(
			'name' => esc_html__( 'Footer Three Widget Area', 'neoton' ),
			'id' => 'footer3',
			'description' => esc_html__( 'Footer 3 widget area', 'neoton' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer Four Widget Area', 'neoton' ),
			'id' => 'footer4',
			'description' => esc_html__( 'Footer 4 widget area', 'neoton' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="footer-title">',
			'after_title' => '</h3>'
	) );

	if (class_exists( 'ReduxFramework' )){
		register_sidebar( array(
				'name' => esc_html__( 'Copyright Right', 'neoton' ),
				'id' => 'copy_right',
				'description' => esc_html__( 'Copyright Right widget area', 'neoton' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="footer-title">',
				'after_title' => '</h3>'
		) ); 
	}
}

add_action( 'widgets_init', 'neoton_widgets_init' );