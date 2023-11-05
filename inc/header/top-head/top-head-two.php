<?php
/* Top Header part for neoton Theme
*/
global $neoton_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($back_top_bar != 'hide'){
    if(!empty($neoton_option['show-top']) || ($back_top_bar == 'show')){

       $show_topbar_mobile =" ";
       if ( empty($neoton_option ['mobile-show-top']) ){
          $show_topbar_mobile= 'mobile_topbar_hide';
       }
       if(!empty($neoton_option['show-social'])){?> 
        <div class="back-toolbar-area <?php echo esc_attr($show_topbar_mobile); ?>">
            <div class="<?php echo esc_attr($header_width);?>">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php if ( is_active_sidebar( 'ticker-1' ) ) : ?>                            
                        <?php dynamic_sidebar( 'ticker-1' ); ?>                            
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                    <?php

                      if(!empty($neoton_option['show-social'])){
                        $top_social = $neoton_option['show-social']; 
                    
                        if($top_social == '1'){ 

                            if(!empty($neoton_option['sharetexts'])) { ?>   
                            <li class="back-follow"><?php echo esc_attr($neoton_option['sharetexts']);?></li>  
                            <?php }        
                            if(!empty($neoton_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($neoton_option['facebook']);?>" target="_blank"> <i class="ri-facebook-fill"></i> </a></li>
                            <?php } ?>
                            <?php if(!empty($neoton_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($neoton_option['twitter']);?> " target="_blank"> <i class="ri-twitter-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($neoton_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['rss']);?> " target="_blank"> <i class="ri-rss-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($neoton_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['pinterest']);?> " target="_blank"> <i class="ri-pinterest-line"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($neoton_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['linkedin']);?> " target="_blank"><i class="ri-linkedin-fill"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($neoton_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['instagram']);?> " target="_blank"> <i class="ri-instagram-line"></i></a> </li>
                            <?php } ?>
                            <?php if(!empty($neoton_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['vimeo']);?> " target="_blank"> <i class="ri-vimeo-fill"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($neoton_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['tumblr']);?> " target="_blank"><i class="ri-tumblr-fill"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($neoton_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['youtube']);?> " target="_blank"> <i class="ri-youtube-fill"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($neoton_option['whatsapp'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['whatsapp']);?>" target="_blank"> <i class="ri-whatsapp-line"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($neoton_option['telegram'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['telegram']);?>" target="_blank"> <i class="ri-telegram-fill"></i> </a> </li>
                            <?php } ?> 

                            <?php if (!empty($neoton_option['soundcloud'])) { ?>
                            <li> <a href="<?php  echo esc_url($neoton_option['soundcloud']);?>" target="_blank"> <i class="ri-sun-cloudy-line"></i> </a> </li>
                            <?php } ?> 
                            
                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
            </div>
            </div>
        </div>
      <?php 
    }
  }
}