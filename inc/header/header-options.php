<?php
    if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
   
        $neoton_shop_id   = get_option( 'woocommerce_shop_page_id' ); 
        $header_width_meta = get_post_meta($neoton_shop_id, 'header_width_custom', true);
        
        $main_menu_type    = !empty(get_post_meta($neoton_shop_id, 'menu-type', true)) ? get_post_meta($neoton_shop_id, 'menu-type', true) : '';
        $back_top_search     = get_post_meta($neoton_shop_id, 'select-search', true);
       
        

        //Topbar 
        $back_top_bar = get_post_meta($neoton_shop_id, 'select-top', true);

    } elseif (is_home() && !is_front_page() || is_home() && is_front_page()){
        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
        $main_menu_type    = !empty(get_post_meta(get_queried_object_id(), 'menu-type', true)) ? get_post_meta(get_queried_object_id(), 'menu-type', true) : '';
        $back_top_search     = get_post_meta(get_queried_object_id(), 'select-search', true);

        //Topbar 
        $back_top_bar = get_post_meta(get_queried_object_id(), 'select-top', true);

    } else {
        $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
        $main_menu_type    = !empty(get_post_meta(get_queried_object_id(), 'menu-type', true)) ? get_post_meta(get_queried_object_id(), 'menu-type', true) : '';
        $back_top_search     = get_post_meta(get_queried_object_id(), 'select-search', true);

        //Topbar 
        $back_top_bar = get_post_meta(get_queried_object_id(), 'select-top', true);
}  

$main_menu_center = (!empty($neoton_option['main_menu_center'])) ? 'main-menu-center' : '';
$main_menu_icon = (!empty($neoton_option['main_menu_icon'])) ? 'main-menu-icon-hide' : '';

if ($header_width_meta != ''){
    $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
}else{
    $header_width = !empty($neoton_option['header-grid']) ? $neoton_option['header-grid'] : '';
    $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
}
