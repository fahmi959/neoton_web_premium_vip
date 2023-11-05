<?php 
global $neoton_option;
$preloader_img = "";

if(!empty($neoton_option['show_preloader']))
  {
    $loading = $neoton_option['show_preloader'];
    if(!empty($neoton_option['preloader_img'])){
      $preloader_img = $neoton_option['preloader_img'];
    }
    if($loading == 1){
      if(empty($preloader_img['url'])):
    ?> 
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
        </div>   
        
        <?php else: ?>
        <div id="back__preloader">
            <div id="back__circle_loader"></div>
            <div class="back__loader_logo"><img src="<?php echo esc_url($preloader_img['url']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></div>
        </div>
      <?php endif; ?>

  <?php }
}?>