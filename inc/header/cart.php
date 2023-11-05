<?php if ( class_exists( 'WooCommerce' ) ) {
	global $neoton_option;
	?>
	<div class="back-menu-cart-area">
		<a href="<?php echo esc_url( wc_get_cart_url() );?>"><i class="ri ri-shopping-bag-2-fill"></i>
			<?php if(!empty($neoton_option['cart_count'])) { ?>
				<em class="back-count"><?php echo WC()->cart->get_cart_contents_count();?></em>
			<?php } ?>
		</a>
		<div class="cart-icon-total-products">
			<?php the_widget( 'WC_Widget_Cart' ); ?>
		</div>
	</div>
<?php } ?>