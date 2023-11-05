<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed
*/
add_action('wp_head', 'neoton_custom_colors', 160);
function neoton_custom_colors() { 
global $neoton_option;	
/***styling options
------------------*/
	if(!empty($neoton_option['body_bg_color']))
	{
	$body_bg         = $neoton_option['body_bg_color'];
	$body_color       = $neoton_option['body_text_color'];	
	$site_color       = $neoton_option['primary_color'];
	$secondary_color  = $neoton_option['secondary_color'];	
	$footer_bgcolor   = $neoton_option['footer_bg_color'];

	if(!empty($neoton_option['menu_text_color'])){		
		$menu_text_color         = $neoton_option['menu_text_color'];
	}
	if(!empty($neoton_option['menu_text_hover_color'])){		
		$menu_text_hover_color   = $neoton_option['menu_text_hover_color'];
	}
	if(!empty($neoton_option['menu_text_active_color'])){		
		$menu_active_color       = $neoton_option['menu_text_active_color'];
	}
	
	if(!empty($neoton_option['menu_text_hover_bg'])){		
		$menu_text_hover_bg      = $neoton_option['menu_text_hover_bg'];
	}
	if(!empty($neoton_option['menu_text_active_bg'])){		
		$menu_text_active_bg     = $neoton_option['menu_text_active_bg'];
	}
	
	if(!empty($neoton_option['drop_text_color'])){		
		$dropdown_text_color     = $neoton_option['drop_text_color'];
	}
	
	if(!empty($neoton_option['drop_text_hover_color'])){		
		$drop_text_hover_color   = $neoton_option['drop_text_hover_color'];
	}			
	
	if(!empty($neoton_option['drop_text_hoverbg_color'])){		
		$drop_text_hoverbg_color = $neoton_option['drop_text_hoverbg_color'];
	}
	
	if(!empty($neoton_option['drop_down_bg_color'])){		
		$drop_down_bg_color = $neoton_option['drop_down_bg_color'];
	}	
	
	$back_top_style = get_post_meta(get_the_ID(), 'topbar-color', true);
    if($back_top_style =='toplight' || $back_top_style==''){
		$toolbar_bg    = $neoton_option['toolbar_bg_color'];
		$toolbar_text  = $neoton_option['toolbar_text_color'];
		$toolbar_link  = $neoton_option['toolbar_link_color'];
		$toolbar_hover = $neoton_option['toolbar_link_hover_color'];
	} else{
		$toolbar_bg    = $neoton_option['toolbar_bg_color2'];
		$toolbar_text  = $neoton_option['toolbar_text_color2'];
		$toolbar_link  = $neoton_option['toolbar_link_color2'];
		$toolbar_hover = $neoton_option['toolbar_link_hover_color2'];
    }

	//typography extract for body
	
	if(!empty($neoton_option['opt-typography-body']['color']))
	{
		$body_typography_color = $neoton_option['opt-typography-body']['color'];
	}
	if(!empty($neoton_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight = $neoton_option['opt-typography-body']['line-height'];
	}
		
	$body_typography_font      = $neoton_option['opt-typography-body']['font-family'];
	$body_typography_font_size = $neoton_option['opt-typography-body']['font-size'];

	//typography extract for menu
	$menu_typography_color       = $neoton_option['opt-typography-menu']['color'];	
	$menu_typography_weight      = $neoton_option['opt-typography-menu']['font-weight'];	
	$menu_typography_font_family = $neoton_option['opt-typography-menu']['font-family'];
	$menu_typography_font_fsize  = $neoton_option['opt-typography-menu']['font-size'];
		
	if(!empty($neoton_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$neoton_option['opt-typography-menu']['line-height'];
	}
	
	//typography extract for heading
	
	$h1_typography_color=$neoton_option['opt-typography-h1']['color'];		
	if(!empty($neoton_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$neoton_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family=$neoton_option['opt-typography-h1']['font-family'];
	$h1_typography_font_fsize=$neoton_option['opt-typography-h1']['font-size'];	
	if(!empty($neoton_option['opt-typography-h1']['line-height']))
	{
		$h1_typography_line_height=$neoton_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color=$neoton_option['opt-typography-h2']['color'];	

	$h2_typography_font_fsize=$neoton_option['opt-typography-h2']['font-size'];	
	if(!empty($neoton_option['opt-typography-h2']['font-weight']))
	{
		$h2_typography_font_weight=$neoton_option['opt-typography-h2']['font-weight'];
	}	
	$h2_typography_font_family=$neoton_option['opt-typography-h2']['font-family'];
	$h2_typography_font_fsize=$neoton_option['opt-typography-h2']['font-size'];	
	if(!empty($neoton_option['opt-typography-h2']['line-height']))
	{
		$h2_typography_line_height=$neoton_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color=$neoton_option['opt-typography-h3']['color'];	
	if(!empty($neoton_option['opt-typography-h3']['font-weight']))
	{
		$h3_typography_font_weightt=$neoton_option['opt-typography-h3']['font-weight'];
	}	
	$h3_typography_font_family = $neoton_option['opt-typography-h3']['font-family'];
	$h3_typography_font_fsize  = $neoton_option['opt-typography-h3']['font-size'];	
	if(!empty($neoton_option['opt-typography-h3']['line-height']))
	{
		$h3_typography_line_height = $neoton_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color = $neoton_option['opt-typography-h4']['color'];	
	if(!empty($neoton_option['opt-typography-h4']['font-weight']))
	{
		$h4_typography_font_weight = $neoton_option['opt-typography-h4']['font-weight'];
	}	
	$h4_typography_font_family = $neoton_option['opt-typography-h4']['font-family'];
	$h4_typography_font_fsize  = $neoton_option['opt-typography-h4']['font-size'];	
	if(!empty($neoton_option['opt-typography-h4']['line-height']))
	{
		$h4_typography_line_height = $neoton_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color = $neoton_option['opt-typography-h5']['color'];	
	if(!empty($neoton_option['opt-typography-h5']['font-weight']))
	{
		$h5_typography_font_weight = $neoton_option['opt-typography-h5']['font-weight'];
	}	
	$h5_typography_font_family = $neoton_option['opt-typography-h5']['font-family'];
	$h5_typography_font_fsize  = $neoton_option['opt-typography-h5']['font-size'];	
	if(!empty($neoton_option['opt-typography-h5']['line-height']))
	{
		$h5_typography_line_height = $neoton_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color = $neoton_option['opt-typography-6']['color'];	
	if(!empty($neoton_option['opt-typography-6']['font-weight']))
	{
		$h6_typography_font_weight = $neoton_option['opt-typography-6']['font-weight'];
	}
	$h6_typography_font_family = $neoton_option['opt-typography-6']['font-family'];
	$h6_typography_font_fsize  = $neoton_option['opt-typography-6']['font-size'];	
	if(!empty($neoton_option['opt-typography-6']['line-height']))
	{
		$h6_typography_line_height = $neoton_option['opt-typography-6']['line-height'];
	}
	
?>

<!-- Typography -->
<?php if(!empty($body_color)){
	global $neoton_option;
	$hex = $site_color;
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$site_color_rgb = "$r, $g, $b";


	$hex2 = $secondary_color;
	list($r, $g, $b) = sscanf($hex2, "#%02x%02x%02x");
	$second_color_rgb = "$r, $g, $b";

	?>

	<style>
		<?php if(!empty($neoton_option['copyright_bg']))
			{
				$copyright_bg = $neoton_option['copyright_bg'];
			?>
			.footer-bottom{
				background:<?php echo esc_attr($copyright_bg); ?> !important;
			}
		<?php } ?>
		
		body{
			background:<?php echo esc_attr($body_bg); ?>;
			color:<?php echo esc_attr($body_color); ?> !important;
			font-family: <?php echo esc_attr($body_typography_font);?> !important;    
		    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
		}

		h1{
			color:<?php echo esc_attr($h1_typography_color);?>;
			font-family:<?php echo esc_attr($h1_typography_font_family);?>;
			font-size:<?php echo esc_attr($h1_typography_font_fsize);?>;
			<?php if(!empty($h1_typography_weight)){
			?>
			font-weight:<?php echo esc_attr($h1_typography_weight);?>;
			<?php }?>
			
			<?php if(!empty($h1_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h1_typography_line_height);?>;
			<?php } ?>		
		}

		h2{
			color:<?php echo esc_attr($h2_typography_color);?>; 
			font-family:<?php echo esc_attr($h2_typography_font_family);?>;
			font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
			<?php if(!empty($h2_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h2_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h2_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h2_typography_line_height);?>
			<?php }?>
		}

		h3{
			color:<?php echo esc_attr($h3_typography_color);?> ;
			font-family:<?php echo esc_attr($h3_typography_font_family);?>;
			font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
			<?php if(!empty($h3_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h3_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h3_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h3_typography_line_height);?>;
			<?php }?>
		}

		h4{
			color:<?php echo esc_attr($h4_typography_color);?>;
			font-family:<?php echo esc_attr($h4_typography_font_family);?>;
			font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
			<?php if(!empty($h4_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h4_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h4_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h4_typography_line_height);?>;
			<?php }?>
			
		}

		h5{
			color:<?php echo esc_attr($h5_typography_color);?>;
			font-family:<?php echo esc_attr($h5_typography_font_family);?>;
			font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
			<?php if(!empty($h5_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h5_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h5_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h5_typography_line_height);?>;
			<?php }?>
		}

		h6{
			color:<?php echo esc_attr($h6_typography_color);?> ;
			font-family:<?php echo esc_attr($h6_typography_font_family);?>;
			font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
			<?php if(!empty($h6_typography_font_weight)){
			?>
			font-weight:<?php echo esc_attr($h6_typography_font_weight);?>;
			<?php }?>
			
			<?php if(!empty($h6_typography_line_height)){
			?>
				line-height:<?php echo esc_attr($h6_typography_line_height);?>;
			<?php }?>
		}

		.menu-area .navbar ul li > a,
		.sidenav .widget_nav_menu ul li a{
			font-weight:<?php echo esc_attr($menu_typography_weight); ?>;
			font-family:<?php echo esc_attr($menu_typography_font_family); ?>;
			font-size:<?php echo esc_attr($menu_typography_font_fsize); ?>;
		}

		<?php if(!empty($neoton_option['toolbar_bg_color'])) : ?>
			#back-header .back-toolbar-area,
			#back-header.back-header-two .back-toolbar-area{
			background:<?php echo esc_attr($neoton_option['toolbar_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['toolbar_text_color'])) : ?>
			#back-header .back-toolbar-area{
			color:<?php echo esc_attr($neoton_option['toolbar_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['toolbar_text_color'])) : ?>
			#back-header .back-toolbar-area .toolbar-sl-share ul li.back-follow::after,
			#back-header .back-toolbar-area .toolbar-sl-share ul li.back-follow::before{
			background:<?php echo esc_attr($neoton_option['toolbar_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['toolbar_link_color'])) : ?>
			#back-header .back-toolbar-area .toolbar-contact ul li a,
			#back-header .back-toolbar-area .back-ticker .item a,
			#back-header .back-toolbar-area .toolbar-sl-share ul li.opening a{
			color:<?php echo esc_attr($neoton_option['toolbar_link_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['toolbar_link_hover_color'])) : ?>
			#back-header .back-toolbar-area .toolbar-sl-share ul li a i:hover,
			#back-header .back-toolbar-area .back-ticker .item a:hover{
			color:<?php echo esc_attr($neoton_option['toolbar_link_hover_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['toolbar_soci_icn_color'])) : ?>
			#back-header .back-toolbar-area .toolbar-sl-share ul li a i{
			color:<?php echo esc_attr($neoton_option['toolbar_soci_icn_color']); ?> 
		}
		<?php endif; ?>	


		<?php if(!empty($neoton_option['primary_color'])) : ?>
			.comment-respond .form-submit #submit,
			#scrollUp i,
			.page-error.back-coming-soon .countdown-inner .time_circles div,
			.page-error.back-coming-soon .follow-us-sbuscribe ul li a:hover,
			#back-header .back-quote a,
			.bs-sidebar .widget_categories ul li:hover:after,
			.back-blog-details .bs-info.tags a:hover,
			.bs-sidebar .tagcloud a:hover{
			background:<?php echo esc_attr($neoton_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['primary_color'])) : ?>
			.bs-sidebar .tagcloud a:hover,
			.back-blog-details .bs-info.tags a:hover{
			border-color:<?php echo esc_attr($neoton_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['primary_color'])) : ?>
			.back-blog .blog-item .blog-button a:hover,
			a,
			.single .ps-navigation .prev:hover span,
			.bs-sidebar ul a:hover,
			.single-post .single-posts-meta li span i,
			.back-blog-details .type-post .tag-line a:hover,
			.back-blog-details .type-post .tag-line i:before,
			.single-post .single-posts-meta li.post-comment i:before,
			.full-blog-content .btm-cate li i:before,
			.btm-cate li a:hover,
			.full-blog-content .author i,
			.full-blog-content .blog-title a:hover,
			.bs-sidebar .widget_search button:hover:before,
			.bs-sidebar .widget_search button, .bs-sidebar .bs-search button,
			.bs-sidebar .recent-post-widget .post-desc a:hover,
			.bs-sidebar .recent-post-widget .post-desc span i,
			.bs-sidebar .recent-post-widget .post-desc span i:before,
			.single .ps-navigation .next:hover span{
			color:<?php echo esc_attr($neoton_option['primary_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['secondary_color'])) : ?>
			.comment-respond .form-submit #submit:hover,
			#back-header .back-quote a:hover{
			background:<?php echo esc_attr($neoton_option['secondary_color']); ?> 
		}
		<?php endif; ?>

		

		<?php if(!empty($neoton_option['breadcrumb_text_color'])) : ?>
			.back-breadcrumbs .breadcrumbs-title span a span,
			.back-breadcrumbs .page-title,
			.back-breadcrumbs .breadcrumbs-title .current-item{
			color:<?php echo esc_attr($neoton_option['breadcrumb_text_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['breadcrumb_seperator_color'])) : ?>
			.back-breadcrumbs .breadcrumbs-title span a:before{
			background:<?php echo esc_attr($neoton_option['breadcrumb_seperator_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['breadcrumb_title'])) : ?>
			.back-breadcrumbs .page-title{
			font-size:<?php echo esc_attr($neoton_option['breadcrumb_title']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['breadcrumb-align'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
			text-align:<?php echo esc_attr($neoton_option['breadcrumb-align']); ?> 
		}
		<?php endif; ?>	


		<?php if(!empty($neoton_option['breadcrumb_top_gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-top:<?php echo esc_attr($neoton_option['breadcrumb_top_gap']); ?> 
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['breadcrumb_bottom_gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-bottom:<?php echo esc_attr($neoton_option['breadcrumb_bottom_gap']); ?> 
			}
		<?php endif; ?>


		<?php if(!empty($neoton_option['offcan_bgs_color'])) : ?>
			.back-menu-wrap-offcanvas,
			.back-offcanvas{
			background:<?php echo esc_attr($neoton_option['offcan_bgs_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['offcan_txt_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan{
			color:<?php echo esc_attr($neoton_option['offcan_txt_color']); ?> 
		}
		<?php endif; ?>		

		<?php if(!empty($neoton_option['offcan_link_color'])) : ?>
			.sidenav .widget_nav_menu ul li a,
			.sidenav .fa-ul.back-info li a{
			color:<?php echo esc_attr($neoton_option['offcan_link_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['offcan_link_hover_color'])) : ?>
			.sidenav .widget_nav_menu ul li a:hover,
			.sidenav .fa-ul.back-info li a:hover{
			color:<?php echo esc_attr($neoton_option['offcan_link_hover_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['offcan_icon_color'])) : ?>
			.sidenav .fa-ul.back-info li i{
			color:<?php echo esc_attr($neoton_option['offcan_icon_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['offcanvas_closede_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan .back-nav-link .close-button{
			background:<?php echo esc_attr($neoton_option['offcanvas_closede_color']); ?> 
		}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['offcan_social_icon_bg_color'])) : ?>
			.sidenav .footer_social li a i{
			background:<?php echo esc_attr($neoton_option['offcan_social_icon_bg_color']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($neoton_option['offcan_social_icon__color'])) : ?>
			.sidenav .footer_social li a i{
			color:<?php echo esc_attr($neoton_option['offcan_social_icon__color']); ?> 
		}
		<?php endif; ?>	
		
		<?php if(!empty($neoton_option['offcan_title_color'])) : ?>
			.sidenav .widget-title::before{
			background:<?php echo esc_attr($neoton_option['offcan_title_color']); ?> !important; 
		}
		<?php endif; ?>		

		<?php if(!empty($neoton_option['offcan_title_color'])) : ?>
			.sidenav .fa-ul li em,
			.sidenav .widget .widget-title{
			color:<?php echo esc_attr($neoton_option['offcan_title_color']); ?> !important; 
		}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['offcanvas_icon_color'])) : ?>
			.back-menu-wrap-offcanvas .inner-offcan .back-nav-link .close-button{
			color:<?php echo esc_attr($neoton_option['offcanvas_icon_color']); ?> 
		}
		<?php endif; ?>


		<?php if(!empty($neoton_option['menu_area_bg_color'])) : ?>
			#back-header .menu-area{
			background:<?php echo esc_attr($neoton_option['menu_area_bg_color']); ?> 
		}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_color'])) : ?>		
			.menu-area .navbar ul > li > a,
			.back-dark-light i::before,
			.back-menu-cart-area i,
			#back-header .sticky_search i:before{
				color:<?php echo esc_attr($neoton_option['menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_color'])) : ?>		
			.offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($neoton_option['menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_hover_color'])) : ?>		
			.menu-area .navbar ul > li:hover > a,
			.back-dark-light:hover i::before,
			.back-menu-cart-area i:hover,
			#back-header .sticky_search:hover i:before{
				color:<?php echo esc_attr($neoton_option['menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_hover_color'])) : ?>		
			.offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($neoton_option['menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>
		

		<?php if(!empty($neoton_option['menu_text_active_color'])) : ?>		
			.menu-area .navbar ul > li.current-menu-item > a,
			.menu-area .navbar ul li ul.sub-menu li.current-menu-ancestor > a, 
			.menu-area .navbar ul li ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($neoton_option['menu_text_active_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['transparent_menu_text_color'])) : ?>		
			.back-header-two .menu-area .navbar ul > li > a,
			#back-header.back-header-two .sticky_search i:before{
				color:<?php echo esc_attr($neoton_option['transparent_menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['transparent_menu_text_color'])) : ?>		
			.back-header-two .offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($neoton_option['transparent_menu_text_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($neoton_option['transparent_menu_hover_color'])) : ?>		
			.back-header-two .offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($neoton_option['transparent_menu_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['transparent_menu_hover_color'])) : ?>		
			.back-header-two .menu-area .navbar ul > li:hover > a,			
			#back-header.back-header-two .sticky_search:hover i:before{
				color:<?php echo esc_attr($neoton_option['transparent_menu_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['transparent_menu_active_color'])) : ?>
			.back-header-two .menu-area .navbar ul > li.current-menu-ancestor > a,		
			.back-header-two .menu-area .navbar ul > li.current_page_item > a,		
			.back-header-two .menu-area .navbar ul li ul.sub-menu li.current-menu-ancestor > a, 
			.back-header-two .menu-area .navbar ul li ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($neoton_option['transparent_menu_active_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_item_gap'])) : ?>
			.menu-area .navbar ul > li{
				padding-left:<?php echo esc_attr($neoton_option['menu_item_gap']); ?>;
				padding-right:<?php echo esc_attr($neoton_option['menu_item_gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_item_gap2'])) : ?>
			.menu-area .navbar ul > li{
				padding-top:<?php echo esc_attr($neoton_option['menu_item_gap2']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_item_gap3'])) : ?>
			.menu-area .navbar ul > li{
				padding-bottom:<?php echo esc_attr($neoton_option['menu_item_gap3']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_trasform'])) : ?>
			.menu-area .navbar ul > li > a{
				text-transform:uppercase;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['drop_down_bg_color'])) : ?>		
			.menu-area .navbar ul li .sub-menu{
				background:<?php echo esc_attr($neoton_option['drop_down_bg_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['drop_text_color'])) : ?>		
			.menu-area .navbar ul li ul.sub-menu li a{
				color:<?php echo esc_attr($neoton_option['drop_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['drop_text_hover_color'])) : ?>		
			.menu-area .navbar ul li ul.sub-menu li:hover > a{
				color:<?php echo esc_attr($neoton_option['drop_text_hover_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_text_trasform2'])) : ?>
			.menu-area .navbar ul.sub-menu  li  a{
				text-transform:uppercase !important;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['container_size'])) : ?>
			@media only screen and (min-width: 1300px) {
				.container{
					max-width:<?php echo esc_attr($neoton_option['container_size']); ?>;
				}
			}
		<?php endif; ?>


		<?php if(!empty($neoton_option['stiky_menu_areas_bg_color'])) : ?>
			#back-header .menu-area.sticky{
				background:<?php echo esc_attr($neoton_option['stiky_menu_areas_bg_color']); ?> !important; 
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['stikcy_menu_text_color'])) : ?>		
			.menu-sticky.sticky .navbar ul > li > a,
			.menu-sticky.sticky .navbar ul > li > a,
			.menu-sticky.sticky .back-dark-light i::before, 
			.menu-sticky.sticky .back-menu-cart-area i,
			#back-header .menu-sticky.sticky .sticky_search i:before{
				color:<?php echo esc_attr($neoton_option['stikcy_menu_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['stikcy_menu_text_color'])) : ?>		
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($neoton_option['stikcy_menu_text_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($neoton_option['sticky_menu_text_hover_color'])) : ?>		
			.menu-sticky.sticky .offcanvas-icon .back-nav-link .nav-menu-link:hover span{
				background:<?php echo esc_attr($neoton_option['sticky_menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($neoton_option['sticky_menu_text_hover_color'])) : ?>		
			.menu-sticky.sticky .navbar ul > li:hover > a,
			#back-header .menu-sticky.sticky .sticky_search:hover i:before{
				color:<?php echo esc_attr($neoton_option['sticky_menu_text_hover_color']); ?>;
			}		
		<?php endif; ?>



		<?php if(!empty($neoton_option['stikcy_menu_text_active_color'])) : ?>		
			.menu-sticky.sticky .navbar ul > li.current-menu-item > a,
			.menu-sticky.sticky .navbar ul > li > ul.sub-menu li.current-menu-ancestor > a, 
			.menu-sticky.sticky .navbar ul > li > ul.sub-menu li.current_page_item > a{
				color:<?php echo esc_attr($neoton_option['stikcy_menu_text_active_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($neoton_option['sticky_drop_down_bg_color'])) : ?>		
			.menu-sticky.sticky .navbar ul li .sub-menu{
				background:<?php echo esc_attr($neoton_option['sticky_drop_down_bg_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['stikcy_drop_text_color'])) : ?>		
			.menu-sticky.sticky .navbar ul li ul.sub-menu li a{
				color:<?php echo esc_attr($neoton_option['stikcy_drop_text_color']); ?>;
			}		
		<?php endif; ?>

		<?php if(!empty($neoton_option['sticky_drop_text_hover_color'])) : ?>		
			.menu-sticky.sticky .navbar ul li ul.sub-menu li:hover > a{
				color:<?php echo esc_attr($neoton_option['sticky_drop_text_hover_color']); ?>;
			}		
		<?php endif; ?>


		<?php if(!empty($neoton_option['footer_bg_color'])) : ?>
			.back-footer{
				background:<?php echo esc_attr($neoton_option['footer_bg_color']); ?> !important;
			}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['foot_social_color'])) : ?>
			.back-footer ul.footer_social li a{
				color:<?php echo esc_attr($neoton_option['foot_social_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['foot_social_border_color'])) : ?>
			.back-footer ul.footer_social li a{
				border-color:<?php echo esc_attr($neoton_option['foot_social_border_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['foot_social_hover'])) : ?>
			.back-footer ul.footer_social li a:hover{
				background:<?php echo esc_attr($neoton_option['foot_social_hover']); ?> !important;
				border-color:<?php echo esc_attr($neoton_option['foot_social_hover']); ?> !important;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_text_size'])) : ?>
			.back-footer, .back-footer h3, .back-footer a, 
			.back-footer .fa-ul li a, 
			.back-footer .recent-post-widget .show-featured .post-desc span,
			.back-footer .widget.widget_nav_menu ul li a{
				font-size:<?php echo esc_attr($neoton_option['footer_text_size']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_h3_size'])) : ?>
			.back-footer h3, .back-footer .back-footer-top h3.footer-title{
				font-size:<?php echo esc_attr($neoton_option['footer_h3_size']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_link_size'])) : ?>
			.back-footer a{
				font-size:<?php echo esc_attr($neoton_option['footer_link_size']); ?>;
			}
		<?php endif; ?>	

		<?php if(!empty($neoton_option['footer_text_color'])) : ?>
			.back-footer, .back-footer .back-footer-top h3.footer-title, .back-footer a, .back-footer .fa-ul li a,
			.back-footer .widget.widget_nav_menu ul li a,
			.back-footer .recent-post-widget .show-featured .post-desc span,
			.back-footer .back-footer-top input[type="email"]::placeholder
			{
				color:<?php echo esc_attr($neoton_option['footer_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_title_color'])) : ?>
			.back-footer .back-footer-top h3.footer-title
			{
				color:<?php echo esc_attr($neoton_option['footer_title_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_link_color'])) : ?>
			.back-footer a:hover, .back-footer .widget.widget_nav_menu ul li a:hover,
			.back-footer .fa-ul li a:hover,
			.back-footer .widget.widget_pages ul li a:hover, .back-footer .widget.widget_recent_comments ul li:hover, .back-footer .widget.widget_archive ul li a:hover, .back-footer .widget.widget_categories ul li a:hover,
			.back-footer .widget a:hover{
				color:<?php echo esc_attr($neoton_option['footer_link_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_input_bg_color'])) : ?>
			.back-footer .back-footer-top .mc4wp-form-fields input[type="email"]{
				background:<?php echo esc_attr($neoton_option['footer_input_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['breadcrumb_bg_color'])) : ?>
			.back-breadcrumbs{
				background:<?php echo esc_attr($neoton_option['breadcrumb_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['blog_bg_color'])) : ?>
			body.single-post, 
			body.blog, 
			.back-blog-details .type-post,
			body.archive{
				background:<?php echo esc_attr($neoton_option['blog_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_button_bg_color'])) : ?>
			.back-footer .back-footer-top .mc4wp-form-fields input[type="submit"]{
				background:<?php echo esc_attr($neoton_option['footer_button_bg_color']); ?>
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_button_bg_hover_color'])) : ?>
			.back-footer .back-footer-top .mc4wp-form-fields input[type="submit"]:hover{
				background:<?php echo esc_attr($neoton_option['footer_button_bg_hover_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['dark_mode_gb_color_one'])) : ?>
			[data-theme="dark"] .back_contact_dark input[type="text"], 
			[data-theme="dark"] .back_contact_dark input[type="number"], 
			[data-theme="dark"] .back_contact_dark input[type="password"], 
			[data-theme="dark"] .back_contact_dark textarea, 
			[data-theme="dark"] .back_contact_dark input[type="email"], 
			[data-theme="dark"] .back_bg_in .back-blog-item, 
			[data-theme="dark"] .back-breadcrumbs,
			[data-theme="dark"] .back-blog-details blockquote, 
			[data-theme="dark"] .blog .back-blog .blog-item, 
			[data-theme="dark"] .archive .back-blog .blog-item, 
			[data-theme="dark"] .pagination-area .nav-links, 
			[data-theme="dark"] .comments-area p.comment-form-email input, 
			[data-theme="dark"] .comments-area p.comment-form-author input, 
			[data-theme="dark"] .bs-sidebar .tagcloud a, 
			[data-theme="dark"] .widget_back_followers_socia_widget ul.followus_share li a, 
			[data-theme="dark"] .bs-sidebar .widget_search input, 
			[data-theme="dark"] .bs-sidebar .bs-search input, 
			[data-theme="dark"] .comments-area p.comment-form-comment textarea,
			[data-theme="dark"] .back-icon-share .back-icon-figure,
			[data-theme="dark"] .back_bg_in .back-blog-grid .back-blog-item .back-blog-content, 
			[data-theme="dark"] .back_bg_11{
				background:<?php echo esc_attr($neoton_option['dark_mode_gb_color_one']); ?> !important;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['dark_mode_gb_color_one'])) : ?>
			[data-theme="dark"] .back-blog-details .author-block, [data-theme="dark"] .blog .back-blog .blog-item, [data-theme="dark"] .archive .back-blog .blog-item, [data-theme="dark"] .pagination-area .nav-links, [data-theme="dark"] .bs-sidebar .tagcloud a, [data-theme="dark"] .comments-area p.comment-form-email input, [data-theme="dark"] .comments-area p.comment-form-author input, [data-theme="dark"] .bs-sidebar .widget_search input, [data-theme="dark"] .bs-sidebar .bs-search input, [data-theme="dark"] .comments-area p.comment-form-comment textarea, [data-theme="dark"] .comments-area .comment-list li.comment .comment-body, [data-theme="dark"] .bs-sidebar .widget{
				border-color:<?php echo esc_attr($neoton_option['dark_mode_gb_color_one']); ?> !important;
			}
		<?php endif; ?>


		<?php if(!empty($neoton_option['dark_mode_gb_color'])) : ?>
			[data-theme="dark"] body, 
			[data-theme="dark"] .menu-sticky, 
			[data-theme="dark"] .bs-sidebar .widget, 
			[data-theme="dark"] .back-menu-wrap-offcanvas,
			[data-theme="dark"] .back-offcanvas,
			[data-theme="dark"] .menu-area .navbar ul li .sub-menu,
			[data-theme="dark"] .back-blog-grid .back-blog-item .back-blog-content, 
			[data-theme="dark"] .back-blog-details .type-post{
				background:<?php echo esc_attr($neoton_option['dark_mode_gb_color']); ?>;
			}
		<?php endif; ?>
		

		<?php if(!empty($neoton_option['dark_mode_color'])) : ?>
			[data-theme="dark"] .menu-area .navbar ul li.current-menu-ancestor a, 
			[data-theme="dark"] .menu-area .navbar ul li:hover a,
			[data-theme="dark"] .menu-area .navbar ul li ul.sub-menu li a,
			[data-theme="dark"] .ri-suns::before,
			[data-theme="dark"] body, [data-theme="dark"] .back_team__area h4, 
			[data-theme="dark"] .back_team__area p, 
			[data-theme="dark"] .back_contact_dark input[type="text"], 
			[data-theme="dark"] .back_contact_dark input[type="number"], 
			[data-theme="dark"] .back_contact_dark input[type="password"], 
			[data-theme="dark"] .back_contact_dark textarea, 
			[data-theme="dark"] #back-header .sticky_search i::before, 
			[data-theme="dark"] .back_contact_dark input[type="email"], 
			[data-theme="dark"] .back-blog-grid .back-blog-item .back-blog-content .back-blog-meta .back-admin, 
			[data-theme="dark"] .back-blog-grid .back-blog-item .back-blog-content .back-blog-meta,
			[data-theme="dark"] .menu-area .navbar ul li.current_page_item a,
			[data-theme="dark"] .bs-sidebar .widget_block h2, 
			[data-theme="dark"] .bs-sidebar label.wp-block-search__label, 
			[data-theme="dark"] .bs-sidebar .widget-title, 
			[data-theme="dark"] .back-breadcrumbs .breadcrumbs-title span a span, 
			[data-theme="dark"] .back-breadcrumbs .breadcrumbs-title, 
			[data-theme="dark"] .back-breadcrumbs .breadcrumbs-title .current-item, 
			[data-theme="dark"] h1, 
			[data-theme="dark"] h2, 
			[data-theme="dark"] h3, 
			[data-theme="dark"] h4, 
			[data-theme="dark"] h5, 
			[data-theme="dark"] h6, 
			[data-theme="dark"] .back-blog-details .bs-info.tags, 
			[data-theme="dark"] .back-blog-details .bs-info.tags a, 
			[data-theme="dark"] .comments-area .comment-list li.comment .comment-content p, 
			[data-theme="dark"] .comments-area .comment-list li.comment .comment-author a, 
			[data-theme="dark"] .bs-sidebar #recentcomments li a, 
			[data-theme="dark"] .comments-area p.comment-form-comment textarea, 
			[data-theme="dark"] .bs-sidebar .tagcloud a, 
			[data-theme="dark"] .full-blog-content .blog-title a, 
			[data-theme="dark"] .back-blog .blog-item .blog-button a, 
			[data-theme="dark"] .back-blog .blog-item .blog-meta .blog-date, 
			[data-theme="dark"] .full-blog-content .author, 
			[data-theme="dark"] .btm-cate li a, 
			[data-theme="dark"] .back-blog-grid .back-blog-item .back-blog-content h3.back-post-title a, 
			[data-theme="dark"] .back-heading .title-inner .title, 
			[data-theme="dark"] .comments-area p.comment-form-email input, 
			[data-theme="dark"] .comments-area p.comment-form-author input, 
			[data-theme="dark"] .pagination-area .nav-links a, 
			[data-theme="dark"] .bs-sidebar .recent-post-widget .post-desc a, 
			[data-theme="dark"] .bs-sidebar .wp-block-latest-comments li a, 
			[data-theme="dark"] .bs-sidebar .widget_search button, 
			[data-theme="dark"] .bs-sidebar .bs-search button, 
			[data-theme="dark"] .bs-sidebar .widget_search input, 
			[data-theme="dark"] .bs-sidebar .bs-search input, 
			[data-theme="dark"] .single-post .single-posts-meta li, 
			[data-theme="dark"] .widget_back_followers_socia_widget ul.followus_share li a, 
			[data-theme="dark"] .back-blog-details .type-post .tag-line a, 
			[data-theme="dark"] .single .ps-navigation .next_link, 
			[data-theme="dark"] a:hover, 
			[data-theme="dark"] a:focus, 
			[data-theme="dark"] a:active, 
			[data-theme="dark"] .sidenav .fa-ul li em, 
			[data-theme="dark"] .sidenav .widget .widget-title,
			[data-theme="dark"] .sidenav .widget_nav_menu ul li a, 
			[data-theme="dark"] .back-related-post ul li .back-inner-item span i,
			[data-theme="dark"] .back-related-post ul li .back-inner-item h3 a,
			[data-theme="dark"] .back-menu-cart-area i, 
			[data-theme="dark"] .back-breadcrumbs .page-title, 
			[data-theme="dark"] .back-blog-details blockquote,
			[data-theme="dark"] .menu-area .navbar ul li a{
				color:<?php echo esc_attr($neoton_option['dark_mode_color']); ?> !important;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['dark_mode_color'])) : ?>
			[data-theme="dark"] .sidenav .widget-title::before,
			[data-theme="dark"] .offcanvas-icon .back-nav-link .nav-menu-link span{
				background:<?php echo esc_attr($neoton_option['dark_mode_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['footer_button_text_color'])) : ?>
			.back-footer .back-footer-top .mc4wp-form-fields input[type="submit"]{
				color:<?php echo esc_attr($neoton_option['footer_button_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['copyright_text_color'])) : ?>
			.footer-bottom .copyright p, 
			.footer-bottom .copyright p a, 
			.footer-bottom .copyright a{
				color:<?php echo sanitize_hex_color($neoton_option['copyright_text_color']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['logo-height-mobile'])) : ?>
			@media only screen and (max-width: 991px) {
				#back-header .logo-area a img{
					max-height:<?php echo esc_attr($neoton_option['logo-height-mobile']); ?> !important;
				}
			}
		<?php endif; ?>


		<?php if(!empty($neoton_option['breadcrumb_top_gap_mobile'])) : ?>
			@media only screen and (max-width: 991px) {
				<?php if(!empty($neoton_option['breadcrumb_top_gap_mobile'])) : ?>
					.back-breadcrumbs .breadcrumbs-inner{
					padding-top:<?php echo esc_attr($neoton_option['breadcrumb_top_gap_mobile']); ?> 
				}
				<?php endif; ?>

				<?php if(!empty($neoton_option['breadcrumb_bottom_gap_mobile'])) : ?>
					.back-breadcrumbs .breadcrumbs-inner{
					padding-bottom:<?php echo esc_attr($neoton_option['breadcrumb_bottom_gap_mobile']); ?> 
				}
				<?php endif; ?>
			}
		<?php endif; ?>


		<?php if(!empty($neoton_option['preloader_color'])) : ?>
			#back__circle_loader{
				border-top-color:<?php echo esc_attr($neoton_option['preloader_color']);?>;
				border-right-color:<?php echo esc_attr($neoton_option['preloader_color']);?>;
			}			
		<?php endif; ?>

		<?php if(!empty($neoton_option['preloader_color_left'])) : ?>
			#back__circle_loader{
				border-bottom-color:<?php echo esc_attr($neoton_option['preloader_color_left']);?>;
				border-left-color:<?php echo esc_attr($neoton_option['preloader_color_left']);?>;
			}			
		<?php endif; ?>

		

		<?php if(!empty($neoton_option['menu_item_gap'])) : ?>
			.menu-area .navbar ul li{
				padding-left:<?php echo esc_attr($neoton_option['menu_item_gap']); ?>;
				padding-right:<?php echo esc_attr($neoton_option['menu_item_gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['banner__top__gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-top:<?php echo esc_attr($neoton_option['banner__top__gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['banner__btm__gap'])) : ?>
			.back-breadcrumbs .breadcrumbs-inner{
				padding-bottom:<?php echo esc_attr($neoton_option['banner__btm__gap']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_item_gap2'])) : ?>
			.menu-area .navbar ul > li,
			.menu-cart-area,
			#back-header .back-menu-responsive .back-sidebarmenu-search-here .sticky_search{
				padding-top:<?php echo esc_attr($neoton_option['menu_item_gap2']); ?>;
			}
		<?php endif; ?>

		<?php if(!empty($neoton_option['menu_item_gap3'])) : ?>
			.menu-area .navbar ul > li,
			.menu-cart-area,
			#back-header .back-menu-responsive .back-sidebarmenu-search-here .sticky_search{
				padding-bottom:<?php echo esc_attr($neoton_option['menu_item_gap3']); ?>;
			}
		<?php endif; ?>
	</style>
<?php } ?>

  	<style>
		<?php 
			$output = '';
			if(isset($neoton_option['custom-css'])){
		   		$output = $neoton_option['custom-css'];
				echo esc_attr($output);
			}
		?> 	
	</style>

	<?php
	}
}