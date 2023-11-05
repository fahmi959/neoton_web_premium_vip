<div class="product-list">
 	<div class="single-details">
 		<div class="images-product">
			<?php
				global $product;
				global $neoton_option;
				woocommerce_show_product_loop_sale_flash();
				woocommerce_template_loop_product_thumbnail();
			?>

				<div class="back-product-details">
					<div class="product-info">
						<ul>
							<li><?php neoton_wc_add_to_cart_icon();?></li>
						</ul>
					</div>
				</div>

		</div>
	</div>
</div>