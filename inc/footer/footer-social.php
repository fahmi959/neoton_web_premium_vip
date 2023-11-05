<?php
/*
     Footer Social
*/
     global $neoton_option;
?>
<?php 
      if(!empty($neoton_option['show-social2'])){
            $footer_social = $neoton_option['show-social2'];
            if($footer_social == 1){?>
                  <ul class="footer_social">  
                        <?php
                         if(!empty($neoton_option['facebook'])) { ?>
                         <li> 
                              <a href="<?php echo esc_url($neoton_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                         </li>
                        <?php } ?>
                        <?php if(!empty($neoton_option['twitter'])) { ?>
                        <li> 
                              <a href="<?php echo esc_url($neoton_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($neoton_option['rss'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($neoton_option['pinterest'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($neoton_option['linkedin'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($neoton_option['instagram'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($neoton_option['vimeo'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($neoton_option['tumblr'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($neoton_option['youtube'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($neoton_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
                        </li>
                        <?php } ?>     
                  </ul>
       <?php } 
}?>
