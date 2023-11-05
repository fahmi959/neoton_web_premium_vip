<?php
    global $neoton_option; 
    $header_grid2 = "";
    $footer_logo_size = !empty($neoton_option['footer-logo-height']) ? 'style="height: '.$neoton_option['footer-logo-height'].'"' : '';
    
    $header_width = !empty($neoton_option['header_grid2']) ? $neoton_option['header_grid2'] : '' ;
    $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    
?>


<?php

    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'footer1'  )
        && ! is_active_sidebar( 'footer2' )
        && ! is_active_sidebar( 'footer3'  )
        && ! is_active_sidebar( 'footer4' )
    ){
      
    } 
?>

<?php $footer_widgets =  array(0=>12, 1=>6, 2=>4, 3=>3);


if ( !empty( $footer_widgets ) && (is_active_sidebar( 'footer1'  ) || is_active_sidebar( 'footer2' ) || is_active_sidebar( 'footer3' ) ||  is_active_sidebar( 'footer4' ))):

    ?>
    <div class="back-footer-top">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="row"> 

            <?php 

            $total_widgets = (int)is_active_sidebar( 'footer1'  ) + (int)is_active_sidebar( 'footer2'  ) + (int)is_active_sidebar( 'footer3'  ) + (int)is_active_sidebar( 'footer4'  );
            $count = '';
            if( $total_widgets == 1){
                $count = 12;
            }
            if( $total_widgets == 2){
                $count = 6;
            }
            if( $total_widgets == 3){
                $count = 4;
            }
            if( $total_widgets == 4){
                $count = 3;
            }

            foreach ( $footer_widgets as $i => $column) :           
            ?>
                <?php if ( is_active_sidebar( 'footer'.( $i+1 ) ) ): ?>
                    <div class="<?php echo esc_attr( 'col-lg-' . $count ); ?> footer-<?php echo esc_attr($i); ?>">
                        <?php 
                     
                        if( $i == 0) :                    
                                if(!empty($neoton_option['footer_logo']['url'])) { ?>
                                    <div class="footer-logo-wrap">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-footer-top-logo">
                                            <img <?php echo wp_kses($footer_logo_size, 'neoton');?> src="<?php  echo esc_url($neoton_option['footer_logo']['url'])?>" alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                                        </a>
                                    </div>
                                <?php }
                            endif;?>
                        <?php dynamic_sidebar( 'footer'.( $i+1 ) ); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; 