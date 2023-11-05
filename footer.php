<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */
?>
     
</div><!-- .main-container -->
<?php
global $neoton_option;
// Footer Options here
require get_parent_theme_file_path('inc/footer/footer-options.php');
  
$header_width = !empty($neoton_option['header_grid2']) ? $neoton_option['header_grid2'] : '' ;
$header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';

if( !empty( $neoton_option['footer_bg_image']['url'])):?>
    <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer" style="background-image: url('<?php echo esc_url($neoton_option['footer_bg_image']['url']);?>');">
    <?php else:?>
        <footer id="back-footer" class="<?php echo esc_attr($footer_select);?> back-footer">
<?php 
endif; 
 get_template_part( 'inc/footer/footer','top' ); 
?>
<div class="footer-bottom" <?php if(!empty( $copyright_bg)): ?> style="background: <?php echo esc_attr($copyright_bg); ?> !important;" <?php elseif(!empty( $copy_trans)): ?> style="background: <?php echo esc_attr($copy_trans); ?> !important;" <?php endif; ?>>
    <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">  
            <?php if(is_active_sidebar( 'copy_right'  )): ?>                      
                <div class="col-md-6 col-sm-12 back-copy-menu">
                    <div class="copyright text-left" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php if(!empty($neoton_option['copyright'])){?>
                        <p><?php echo wp_kses($neoton_option['copyright'], 'neoton'); ?></p>
                        <?php }
                         else{
                            ?>
                        <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
                        </p>
                        <?php
                         }   
                        ?>
                    </div>
                </div>            
                <div class="col-md-6 col-sm-12">
                    <div class="copyright-widget text-right" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php dynamic_sidebar( 'copy_right'); ?>
                    </div>
                </div>
            <?php else:?>
                <div class="col-md-12 col-sm-12">
                    <div class="copyright text-center" <?php if(!empty( $copy_space)): ?> style="padding: <?php echo esc_attr($copy_space); ?>" <?php endif; ?> >
                        <?php if(!empty($neoton_option['copyright'])){?>
                        <p><?php echo wp_kses($neoton_option['copyright'], 'neoton'); ?></p>
                        <?php }
                         else{
                            ?>
                        <p><?php echo esc_html('&copy;')?> <?php echo date("Y");?>. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> 
                        </p>
                        <?php
                         }   
                        ?>
                    </div>
                </div> 
            <?php endif ?>
        </div>
    </div>
</div>
</footer>
</div><!-- #page -->
<?php 
if(!empty($neoton_option['show_top_bottom'])){

    $show_top_bottom_postition = !empty($neoton_option['show_top_bottom_postition']) ? $neoton_option['show_top_bottom_postition'] : 'right'
?>
 <!-- start scrollUp  -->
<div id="scrollUp" class="<?php echo esc_attr($show_top_bottom_postition);?>">
    <i class="ri-arrow-up-line"></i>
</div>   
<?php } 
 wp_footer(); ?>
  </body>
</html>
