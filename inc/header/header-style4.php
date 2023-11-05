<?php

/*
Header Style 1
*/

global $neoton_option;
$sticky = !empty($neoton_option['off_sticky']) ? $neoton_option['off_sticky'] : ''; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky stuck' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');
//off convas here
get_template_part('inc/header/off-canvas');
?> 


<header id="back-header" class="single-header back-header-four <?php echo esc_attr($main_menu_center);?> <?php echo esc_attr($main_menu_icon);?>">
    <?php 
      //include sticky search here
      get_template_part('inc/header/search');
    ?>
    <div class="back-header-inner">
        <div class="back-table-wrap-logo">
            <div class="<?php echo esc_attr($header_width);?>">
                <div class="back-table-wrap">                    
                    <div class="back-cols header-logo">
                        <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="back-cols back-header-add">
                        <?php $header_adds_links = !empty($neoton_option['header_adds_links']) ? 'target="_blank"' : '';
                        $add_height        = !empty($neoton_option['header_add_height']) ? 'style = "height: '.$neoton_option['header_add_height'].'"' : '';
                        ?>

                        <?php if(!empty($neoton_option['header_add_link'])) { ?>                        
                        <a href="<?php echo esc_url($neoton_option['header_add_link']); ?>" <?php echo wp_kses_post($header_adds_links);?>>
                            <?php if (!empty( $neoton_option['header_add']['url'] ) ) { ?>
                            <img <?php echo wp_kses($add_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['header_add']['url']); ?>" alt="<?php echo esc_html__( 'add', 'neoton' ); ?>">
                            <?php } ?>
                        </a>
                        <?php } else { ?>
                            <?php if (!empty( $neoton_option['header_add']['url'] ) ) { ?>
                            <img <?php echo wp_kses($add_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['header_add']['url']); ?>" alt="<?php echo esc_html__( 'add', 'neoton' ); ?>">
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Menu Start -->
        <div class="menu-area <?php echo esc_attr($sticky_menu);?>">
            <div class="<?php echo esc_attr($header_width);?>">
                <div class="back-table-wrap">                    
                    <div class="back-cols back-menu-responsive">  
                        <?php             
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        ?>
                    </div>   
                    <div class="back-cols back-header-quote">  

                        <?php if(!empty($neoton_option['dark_light_mode'])){ ?>
                            <a id="back-data-toggle" class="back-dark-light">
                                <i class="ri-moon-line ri-moons"></i>
                                <i class="ri-sun-line ri-suns"></i> 
                            </a>
                        <?php } ?>   
                        <?php
                     
                        if(!empty($neoton_option['off_search'])): ?>
                            <div class="back-sidebarmenu-search-here">
                                <div class="back-sidebarmenu-search-here">
                                    <div class="sticky_search"> 
                                        <i class="ri-search-line"></i> 
                                    </div>
                                </div>
                            </div>                        
                        <?php endif; 
                        

                        //include Cart here
                        
                        if(!empty($neoton_option['wc_cart_icon'])) { ?>
                            <?php  get_template_part('inc/header/cart'); ?>
                        <?php }             

                        
                        
                        if(!empty($neoton_option['off_canvas']) ): ?>
                            <div class="sidebarmenu-area">
                                <?php if(!empty($neoton_option['off_canvas']) ){
                                   ?>
                                    <ul class="offcanvas-icon">
                                        <li class="back-nav-link">
                                            <a href='#' class="nav-menu-link menu-button">
                                                <span class="hum1"></span>
                                                <span class="hum2"></span>
                                                <span class="hum3"></span>                                                
                                            </a>
                                        </li>
                                    </ul>
                                    <?php 
                                } ?> 
                            </div>
                        <?php endif; 

                        
                        if(!empty($neoton_option['quote_btns']) ){ ?>
                            <?php $quote_btns_link = !empty($neoton_option['quote_btns_link']) ? 'target="_blank"' : '';
                                 ?>
                                <div class="back-quote"><a href="<?php echo esc_url($neoton_option['quote_link']); ?>" <?php echo wp_kses_post($quote_btns_link);?> class="quote-button"><?php  echo esc_html($neoton_option['quote']); ?></a></div>
                        <?php }?>
                        <div class="sidebarmenu-area back-mobile-hamburger">                                    
                            <ul class="offcanvas-icon">
                                <li class="back-nav-link">
                                    <a href='#' class="nav-menu-link menu-button">
                                        <span class="hum1"></span>
                                        <span class="hum2"></span>
                                        <span class="hum3"></span>                                            
                                    </a>
                                </li>
                            </ul>                                       
                        </div>        
                    </div>                 
                </div>
            </div> 
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>