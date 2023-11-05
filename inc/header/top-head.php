<?php
/* Top Header part for grassy template
*/
global $neoton_option;
?>
<?php if(!empty($neoton_option['show-top'])){ 
  if(is_page()){
     $back_top_bar = get_post_meta($post->ID, 'top_bar', true);
     if($back_top_bar == 'Show' || $back_top_bar == ''){
     ?> 
    <div class="back-toolbar-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($neoton_option['welcome-text'])) { ?>
                <li> <i class="fa fa-handshake-o"></i> <?php echo esc_html($neoton_option['welcome-text']); ?> </li>
                <?php } ?>
                <?php if(!empty($neoton_option['top-email'])) { ?>
                <li> <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($neoton_option['top-email'])?>"><?php echo esc_html($neoton_option['top-email'])?></a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
                <?php
                if(!empty($neoton_option['show-social'])){
                  $top_social = $neoton_option['show-social']; 
              
                    if($top_social == '1'){              
                      if(!empty($neoton_option['facebook'])) { ?>
                      <li> <a href="<?php echo esc_url($neoton_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['twitter'])) { ?>
                      <li> <a href="<?php echo esc_url($neoton_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['rss'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['pinterest'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['linkedin'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['instagram'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['vimeo'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['tumblr'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['youtube'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                      <?php } 
                      }
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
 else{
  ?>
  <div class="back-toolbar-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($neoton_option['welcome-text'])) { ?>
                <li> <i class="fa fa-handshake-o"></i> <?php echo esc_html($neoton_option['welcome-text']); ?> </li>
                <?php } ?>                
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
                <?php
                if(!empty($neoton_option['show-social'])){
                  $top_social = $neoton_option['show-social']; 
              
                    if($top_social == '1'){              
                      if(!empty($neoton_option['facebook'])) { ?>
                      <li> <a href="<?php echo esc_url($neoton_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['twitter'])) { ?>
                      <li> <a href="<?php echo esc_url($neoton_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['rss'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['pinterest'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['linkedin'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['instagram'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                      <?php } ?>
                      <?php if(!empty($neoton_option['vimeo'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['tumblr'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                      <?php } ?>
                      <?php if (!empty($neoton_option['youtube'])) { ?>
                      <li> <a href="<?php  echo esc_url($neoton_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                      <?php } 
                      }
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
} ?>
