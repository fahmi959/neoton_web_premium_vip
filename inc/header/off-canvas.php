<?php 
global $neoton_option;
$logo_height = !empty($neoton_option['logo-height']) ? 'style = "max-height: '.$neoton_option['logo-height'].'"' : '';
    //off convas here
?>
    
<nav class="back-menu-wrap-offcanvas back-nav-container nav back-menu-ofcanvas">       
<div class="inner-offcan">
    <div class="back-nav-link"> 
        <?php if(!empty($neoton_option['Offcanvas_layout']) && $neoton_option['Offcanvas_layout'] == 'style2'){ ?> 
            <a href='#' class="nav-menu-link close-button styles2" id="close-button2">                                         
                <i class="ri-close-fill"></i>
            </a> 
        <?php } else { ?>  
        <a href='#' class="nav-menu-link close-button" id="close-button2">          
            <i class="ri-close-fill"></i>
        </a> 
        <?php } ?>
    </div> 
    <div class="sidenav offcanvas-icon">
            <div id="mobile_menu">
                <?php

                    if ( has_nav_menu( 'menu-1' ) ) {
                        // User has assigned menu to this location;
                        // output it
                        ?>                                
                            <div class="widget widget_nav_menu mobile-menus">      
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu-single1',
                                    ) );
                                ?>
                            </div>                                
                        <?php
                    }                
                ?>                    
            </div>            
        <?php 
        if(!empty( $neoton_option['off_canvas'] ) ){
            ?>          
            <div class="back-offcanvas-contents"> 
                <?php dynamic_sidebar('sidebarcanvas-1');?>
            </div>            
            <?php 
        }?>
    </div>
    </div>
</nav>