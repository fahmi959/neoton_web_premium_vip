<?php
    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
   
        $neoton_shop_id = get_option( 'woocommerce_shop_page_id' ); 
        $footer_type = get_post_meta($neoton_shop_id, 'footer_select', true);
        $footer_bg_img   = get_post_meta($neoton_shop_id,'footer_bg_img', true);
        $copyright_bg    = get_post_meta($neoton_shop_id,'copyright_bg', true);
        $footer_bg_img   = ($footer_bg_img) ? $footer_bg_img : '';
        $footer_select   = get_post_meta($neoton_shop_id,'footer_select', true);
        $footer_select   = ($footer_select) ? $footer_select : '';
        $footer_style   = get_post_meta($neoton_shop_id,'footer_style', true);

    } elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

        $footer_type = get_post_meta(get_queried_object_id(), 'footer_select', true);
        $footer_bg_img   = get_post_meta(get_queried_object_id(),'footer_bg_img', true);
        $copyright_bg    = get_post_meta(get_queried_object_id(),'copyright_bg', true);
        $footer_bg_img   = ($footer_bg_img) ? $footer_bg_img : '';
        $footer_select   = get_post_meta(get_queried_object_id(),'footer_select', true);
        $footer_select   = ($footer_select) ? $footer_select : '';
        $footer_style   = get_post_meta(get_queried_object_id(),'footer_style', true);

    } else {
        $footer_type = get_post_meta(get_queried_object_id(), 'footer_select', true);
        $footer_bg_img   = get_post_meta(get_queried_object_id(),'footer_bg_img', true);
        $copyright_bg    = get_post_meta(get_queried_object_id(),'copyright_bg', true);
        $footer_bg_img   = ($footer_bg_img) ? $footer_bg_img : '';
        $footer_select   = get_post_meta(get_queried_object_id(),'footer_select', true);
        $footer_select   = ($footer_select) ? $footer_select : '';
        $footer_style   = get_post_meta(get_queried_object_id(),'footer_style', true);
        
}
