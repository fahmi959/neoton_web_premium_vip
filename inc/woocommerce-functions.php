<?php
/**
 * @author  backtheme
 * @version 1.0
 */
/* All Functions for woocommerce
-----------------------------------------*/
/*-------------------------------------
#. Theme supports for WooCommerce
---------------------------------------*/

function neoton_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-slider' );
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'after_setup_theme', 'neoton_add_woocommerce_support' );


function neoton_wc_shop_thumb_area(){
	get_template_part( 'template-parts/wo-templates/content', 'shop-thumb' );
}

/* Shop hide default page title */
function neoton_wc_hide_page_title(){
	return false;
}

function neoton_wc_loop_product_title(){
	echo '<h2 class="woocommerce-loop-product__title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
}


function neoton_wc_loop_shop_per_page(){
	global $neoton_option;
	$layout = !empty($neoton_option['wc_num_product']) ? $neoton_option['wc_num_product'] : 9;
	return $layout;
}
add_action( 'loop_shop_per_page', 'neoton_wc_loop_shop_per_page' );


// Change number or products per row 

if (!function_exists('neoton_loop_columns')) {
	function neoton_loop_columns() {
		global $neoton_option;		
		$layout_col = !empty($neoton_option['wc_num_product_per_row']) ? $neoton_option['wc_num_product_per_row'] : 3;
		return $layout_col;
	}
}
add_filter('loop_shop_columns', 'neoton_loop_columns');

//Count number work with ajax
function neoton_header_cart_count( $fragments ) {
	global $woocommerce;
	ob_start();?>
		<em class="back-count"><?php echo WC()->cart->get_cart_contents_count();?></em>
	<?php
	$fragments['em.back-count'] = ob_get_clean();
	return $fragments;
}


function neoton_wc_add_to_cart_icon(){
	global $product;
	$quantity = 1;
	$class = implode( ' ', array_filter( array(
		'glyph-icon flaticon-shopping-bag',
		'product_type_' . $product->get_type(),
		$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
		$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
	) ) );

	echo sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">add to cart</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'glyph-icon flaticon-shopping-bag' )
	);
}

//Change related item products quantity

add_filter( 'woocommerce_output_related_products_args', 'neoton_related_products_args' );
  function neoton_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

/*All hoocks for woocommerce*
-------------------------------------------*/

/* Header cart count number */
add_filter( 'woocommerce_add_to_cart_fragments', 'neoton_header_cart_count' );
 
/* Breadcrumb */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

/* Shop loop */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
;
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

add_action( 'woocommerce_before_shop_loop_item_title', 'neoton_wc_shop_thumb_area', 11 );
add_filter( 'woocommerce_show_page_title', 'neoton_wc_hide_page_title' );
add_action( 'woocommerce_shop_loop_item_title', 'neoton_wc_loop_product_title', 10 );
?>