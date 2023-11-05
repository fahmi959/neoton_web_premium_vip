 <!DOCTYPE html>
<html lang="en-US">
<?php
    /*Template Name: Coming Soon
    */
    wp_head();  
    global $neoton_option;
    if(!empty($neoton_option['coming_bg']['url'])){
        $page_bg    = !empty($neoton_option['coming_bg']) ? 'style="background:url('.$neoton_option['coming_bg']['url'].')"': '';
    }
    $day_text   = !empty($neoton_option['coming_day']) ? $neoton_option['coming_day'] : 'Days';
    $hour_text  = !empty($neoton_option['coming_min']) ? $neoton_option['coming_hour'] : 'Minutes';
    $sec_text   = !empty($neoton_option['coming_sec']) ? $neoton_option['coming_sec'] : 'Seconds';
    $min_text   = !empty($neoton_option['coming_hour']) ? $neoton_option['coming_min'] : 'Hours';

    $text_color  = !empty($neoton_option['text_color']) ? $neoton_option['text_color'] : '#ffffff';
    
    $com_logo_height        = !empty($neoton_option['coming-logo-height']) ? 'style = "max-height: '.$neoton_option['coming-logo-height'].'"' : '';

    $countdown_localize_data = array(
        'day_text'   => $day_text,
        'hour_text'  => $hour_text,
        'sec_text'   => $sec_text,
        'min_text'   => $min_text,
        'text_color'  => $text_color,        
    );
        
    wp_localize_script( 'neoton-main', 'countdown_data', $countdown_localize_data );
?>
<div class="page-error back-coming-soon"<?php if(!empty($page_bg)): ?> <?php echo wp_kses_post( $page_bg ); endif;?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <?php   if (!empty( $neoton_option['coming_logo']['url'] ) ) { ?>
                                <div class="logo">
                                    <img <?php echo wp_kses($com_logo_height, 'neoton');?> src="<?php echo esc_url( $neoton_option['coming_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </div>
                            <?php } ?>
                            <h3>
                                <span>                                    
                                    <?php
                                        if(!empty($neoton_option['coming_title'])){
                                            echo wp_kses_post($neoton_option['coming_title']);
                                        }
                                        else{
                                            echo esc_html__( 'Coming Soon', 'neoton' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php
                                    if(!empty($neoton_option['coming_text'])){
                                        echo wp_kses_post($neoton_option['coming_text']);
                                    }
                                    else{
                                        echo esc_html__( 'Our Exciting Website Is Coming Soon! Check Back Later', 'neoton' ); }
                                ?>
                            </h3>
                            <?php 
                                if(!empty($neoton_option['opt-date-time'])) : 
                                $timeformat =  $neoton_option['opt-date-time'];
                            ?>
                            <div class="countdown-inner">
                                <div data-animation-in="slideInLeft" data-animation-out="animate-out fadeOut" class="CountDownTimer" data-date="<?php echo wp_kses_post($timeformat);?>"></div>
                            </div>
                            <?php endif; ?>
                            <div class="follow-us-sbuscribe"> 
                                <div class="follow-us-main">
                                    <?php if(!empty($neoton_option['fllows_title_here'])){ ?>
                                        <h4 class="back-follow-us">
                                            <?php echo wp_kses_post($neoton_option['fllows_title_here']); ?>  
                                        </h4>
                                    <?php } ?>                                    
                                    <?php
                                    if(!empty($neoton_option['show-social'])){ ?>
                                        <ul class="clearfix">
                                            <?php $top_social = $neoton_option['show-social'];                                    
                                                if($top_social == '1'){
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

                                            <?php } ?>
                                        </ul>
                                    <?php }
                                    ?>
                                </div>                                    
                             
                            </div>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
wp_footer(); ?>
</html>
