<?php 
global $neoton_option;
$post_meta_header = '';
$header_style     = '';

$logo_height        = !empty($neoton_option['logo-height']) ? 'style = "height: '.$neoton_option['logo-height'].'"' : '';
$sticky_logo_height = !empty($neoton_option['sticky_logo_height']) ? 'style = "height: '.$neoton_option['sticky_logo_height'].'"' : '';

if(!empty($neoton_option['header_layout'])){ 
  $header_style = $neoton_option['header_layout'];
} 

if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
    $neoton_shop_id      = get_option( 'woocommerce_shop_page_id' ); 
    $post_meta_header    = get_post_meta($neoton_shop_id, 'select-logo', true); 
    $header_logos        =  get_post_meta($neoton_shop_id, 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta($neoton_shop_id, 'header_sticky_logo_img', true);

} elseif (is_home() && !is_front_page() || is_home() && is_front_page()){

    $post_meta_header    = get_post_meta(get_queried_object_id(), 'select-logo', true); 
    $header_logos        =  get_post_meta(get_queried_object_id(), 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta(get_queried_object_id(), 'header_sticky_logo_img', true);
        
} else {
    $post_meta_header = get_post_meta(get_queried_object_id(), 'select-logo', true); 
    $header_logos =  get_post_meta(get_queried_object_id(), 'header_logo_img', true);
    $header_sticky_logos =  get_post_meta(get_queried_object_id(), 'header_sticky_logo_img', true);
}

$custom_logo = get_custom_logo();

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

if(!empty($custom_logo)){ ?>
    <div class="header-custom-logo"> 
         <div class="logo-area">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url( $image[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>              
           
        </div>
   <div class="logo-area sticky-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($sticky_logo_height, 'neoton');?> src="<?php echo esc_url( $image[0]); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>  
      </div>
</div>      
<?php }

elseif($header_logos !=''){?>
    <div class="logo-areas custom-logo-area">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url($header_logos); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
        </a>
    </div>    

    <div class="logo-areas custom-sticky-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img <?php echo wp_kses($sticky_logo_height, 'neoton');?> src="<?php echo esc_url($header_sticky_logos); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
        </a>
    </div>  

    <?php } else {

        if( $post_meta_header == 'dark' || $post_meta_header == '' ) {?>
        <div class="logo-area">
            <?php
               if (!empty( $neoton_option['logo']['url'] ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="light__logo"><img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
              
            <?php if (!empty($neoton_option['dark_light_mode'])) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="dark__logo"><img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['logo_dark_mode']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
          <?php } ?>
            <?php } else{?>
              <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>         
               <?php  } 
            ?>
        </div>
        <?php 
        }
         
         elseif($post_meta_header == 'icon' || $post_meta_header == ''){ ?>
          <div class="logo-area">
            <?php
               if (!empty( $neoton_option['logo_icons']['url'] ) ) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['logo_icons']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
            <?php } else{?>
                
                  <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
               
               <?php  } 
            ?>     
          </div>

        <?php }

        if (!empty( $neoton_option['rswplogo_sticky']['url'] ) ) { ?>
            <div class="logo-area sticky-logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="light__logo"><img <?php echo wp_kses($sticky_logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['rswplogo_sticky']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
              <?php if (!empty($neoton_option['dark_light_mode'])) { ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="dark__logo"><img <?php echo wp_kses($logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['logo_dark_mode']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
          <?php } ?>
               </div>
        <?php }

        else {?>
          <div class="logo-area sticky-logo">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>
<?php }} ?>