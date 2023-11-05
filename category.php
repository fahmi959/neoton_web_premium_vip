<?php
get_header(); 
global $neoton_option;
$cate_post_list_style_page  = get_term_meta(get_queried_object_id(), 'back_category_select', true);
$back_blog_cate_grid  = get_term_meta(get_queried_object_id(), 'back_blog_cate_grid', true);
$back_blog_cate_sidebar  = get_term_meta(get_queried_object_id(), 'back_blog_cate_sidebar', true);

if ($cate_post_list_style_page !='') {
    $cate_post_list_style = !empty($cate_post_list_style_page) ? $cate_post_list_style_page : '';
} else {
    $cate_post_list_style = !empty($neoton_option['category-style']) ? $neoton_option['category-style'] : '';
}
?>

<div id="back-blog" class="back-blog blog-page back__<?php echo esc_attr($cate_post_list_style);?>">
   <?php
    //checking blog layout form option  
    $col         ='';
    $blog_layout =''; 
    $column      =''; 
    $blog_grid   ='';

    if(!empty($neoton_option['cate-page-layout']) || !is_active_sidebar( 'sidebar-1' )){
        if ($back_blog_cate_sidebar != '') {
            $blog_layout = !empty($back_blog_cate_sidebar) ? $back_blog_cate_sidebar : '';
        } else {
            $blog_layout = !empty($neoton_option['cate-page-layout']) ? $neoton_option['cate-page-layout'] : '';
        }
        if ($back_blog_cate_grid != '') {
            $blog_grid = !empty($back_blog_cate_grid) ? $back_blog_cate_grid : '';
        } else {
            $blog_grid   = !empty($neoton_option['blog-cate-grid']) ? $neoton_option['blog-cate-grid'] : '';
            $blog_grid   = !empty($blog_grid) ? $blog_grid : '12';
        }

        if($blog_layout == 'full' || !is_active_sidebar( 'sidebar-1' )){

            $layout ='full-layout';
            $col    = '-full';
            $column = 'sidebar-none'; 

        }          
        elseif($blog_layout == '2left'){

            $layout = 'full-layout-left';  

        }    
        elseif($blog_layout == '2right'){

            $layout = 'full-layout-right'; 

        } 
        else{

            $col = '';
            $blog_layout = ''; 

        }
    }
    else{

        $col         ='';
        $blog_layout =''; 
        $layout      ='';
        $blog_grid   ='12';        
    }
    ?>
    <div class="container">
        <div id="content">
            <div class="row padding-<?php echo esc_attr( $layout) ?>">       
                <div class="contents-sticky col-md-12 col-lg-8<?php echo esc_attr($col); ?> <?php echo esc_attr($layout); ?>"> 
                    <?php if ($cate_post_list_style === 'cate_style1'){ ?>
                        <ul class="back__all_cate">            
                            <?php
                            $i = 0;
                            if ( have_posts() ) :           
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = get_the_id();
                            ?>
                            <?php
                                $back_clear = ($i == 4) ? 'back_clear' : '' ;
                            $no_thumb = "";
                                if ( !has_post_thumbnail() ) {
                                  $no_thumb = "no-thumbs";
                                }
                            ?>
                            <li class="item <?php echo esc_attr($back_clear); ?>">
                                <article <?php post_class();?>>
                                    <div class="blog-item <?php echo esc_attr($no_thumb); ?>">

                                    <?php if ( has_post_thumbnail() ) {?>
                                        <div class="blog-img">
                                           <a href="<?php the_permalink();?>">
                                            <?php
                                              the_post_thumbnail();
                                            ?>
                                          </a>                                    
                                        </div><!-- .blog-img -->
                                    <?php }       
                                    ?> 

                                        <div class="full-blog-content">
                                            <div class="title-wrap">                                                                      
                                                <div class="blog-meta">
                                                  <ul class="btm-cate">
                                                    <?php if(!empty($neoton_option['blog-date'])){
                                                    if ($neoton_option['blog-date'] == 'show'): ?>
                                                    
                                                    <li>
                                                        <div class="blog-date">
                                                          <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                    </li>                                                   
                                                        <?php endif; }
                                                    else { ?>
                                                                <li>
                                                                    <div class="blog-date">
                                                                        <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                    </div>                                              
                                                                </li>
                                                        <?php 
                                                    } ?>
                                                  

                                                     <?php if(!empty($neoton_option['blog-author-post'])){
                                                     if ($neoton_option['blog-author-post'] == 'show'): ?>
                                                      <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                      <?php endif; }
                                                      else{ ?>
                                                        <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                     <?php } ?>                                                    
                                                  </ul>                                                         
                                                </div>   
                                            </div>

                                            <h3 class="blog-title">
                                                <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                                </a>
                                            </h3>
                                            <div class="blog-desc">   
                                                <?php echo neoton_custom_excerpt(12);?>                                  
                                            </div>
                                    </div>
                                  </div>
                                </article>
                            </li>
                            
                            <?php 
                                $i++;
                                endwhile;  
                                wp_reset_query();                      
                            ?>
                        </ul>
                        <div class="pagination-area">
                            <?php
                                the_posts_pagination();
                            ?>
                        </div>
                        <?php
                        else :
                        get_template_part( 'template-parts/content', 'none' );
                        endif; ?> 
                    <?php } elseif ($cate_post_list_style === 'cate_style2'){ ?>
                        <div class="row">            
                            <?php
                            if ( have_posts() ) :           
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = get_the_id();
                            ?>
                            <?php 
                            $no_thumb = "";
                                if ( !has_post_thumbnail() ) {
                                  $no_thumb = "no-thumbs";
                                }
                            ?>
                            <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                                <article <?php post_class();?>>
                                    <div class="blog-item <?php echo esc_attr($no_thumb); ?>">

                                    <?php if ( has_post_thumbnail() ) {?>
                                        <div class="blog-img">
                                           <a href="<?php the_permalink();?>">
                                            <?php
                                              the_post_thumbnail('neoton_equal-grid_big');
                                            ?>
                                          </a>                                    
                                        </div><!-- .blog-img -->
                                    <?php }       
                                    ?> 

                                        <div class="full-blog-content">
                                            <div class="title-wrap">                                                                      
                                                <div class="blog-meta">
                                                  <ul class="btm-cate">
                                                    <?php if(!empty($neoton_option['blog-date'])){
                                                    if ($neoton_option['blog-date'] == 'show'): ?>
                                                    
                                                    <li>
                                                        <div class="blog-date">
                                                          <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                    </li>                                                   
                                                        <?php endif; }
                                                    else { ?>
                                                                <li>
                                                                    <div class="blog-date">
                                                                        <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                    </div>                                              
                                                                </li>
                                                        <?php 
                                                    } ?>
                                                  

                                                     <?php if(!empty($neoton_option['blog-author-post'])){
                                                     if ($neoton_option['blog-author-post'] == 'show'): ?>
                                                      <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                      <?php endif; }
                                                      else{ ?>
                                                        <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                     <?php } ?>
                                                  </ul>                                                         
                                                </div>   
                                            </div>

                                            <h3 class="blog-title">
                                                <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                                </a>
                                            </h3>

                                            <div class="blog-desc">   
                                                <?php echo neoton_custom_excerpt(12);?>    
                                            </div>

                                            <?php 
                                                $no_view = "";
                                                if ( !empty($neoton_option['view-comments']) && $neoton_option['view-comments'] == 'hide'){
                                                    $no_view = "left-btn";
                                                }
                                                if(!empty($neoton_option['blog_readmore'])):?>
                                                    <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                        <a href="<?php the_permalink();?>">
                                                            <?php echo esc_html($neoton_option['blog_readmore']); ?>
                                                        </a>
                                                    </div>
                                            <?php endif; ?>

                                          <?php if(empty($neoton_option['blog_readmore'])):?>
                                              <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                <a href="<?php the_permalink();?>"><?php esc_html_e('Continue Reading', 'neoton');?></a>
                                              </div>
                                          <?php endif; ?>

                                    </div>
                                  </div>
                                </article>
                            </div>
                            
                            <?php  
                              endwhile;  
                              wp_reset_query();                      
                            ?>
                        </div>
                        <div class="pagination-area">
                            <?php
                                the_posts_pagination();
                            ?>
                        </div>
                        <?php
                        else :
                        get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
                    <?php } elseif ($cate_post_list_style === 'cate_style3'){ ?>
                        <div class="row">            
                            <?php
                            $i = 0;
                            if ( have_posts() ) :           
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = get_the_id();
                            ?>
                            <?php 
                            $no_thumb = "";
                                if ( !has_post_thumbnail() ) {
                                  $no_thumb = "no-thumbs";
                                }
                            ?>
                            <?php
                            if ($i == '0') { ?>
                            <div class="col-sm-12 back_full_post">
                            <?php } else { ?>
                                <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                            <?php } ?>
                                <article <?php post_class();?>>
                                    <div class="blog-item <?php echo esc_attr($no_thumb); ?>">

                                    <?php if ( has_post_thumbnail() ) {?>
                                        <div class="blog-img">
                                           <a href="<?php the_permalink();?>">
                                            <?php
                                            if ($i == '0') {
                                                the_post_thumbnail();
                                            } else {
                                              the_post_thumbnail('neoton_equal-grid_big');
                                            }
                                            ?>
                                          </a>                                    
                                        </div><!-- .blog-img -->
                                    <?php }       
                                    ?> 

                                        <div class="full-blog-content">
                                            <div class="title-wrap">                                                                      
                                                <div class="blog-meta">
                                                  <ul class="btm-cate">
                                                    <?php if(!empty($neoton_option['blog-date'])){
                                                    if ($neoton_option['blog-date'] == 'show'): ?>
                                                    
                                                    <li>
                                                        <div class="blog-date">
                                                          <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                    </li>                                                   
                                                        <?php endif; }
                                                    else { ?>
                                                                <li>
                                                                    <div class="blog-date">
                                                                        <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                    </div>                                              
                                                                </li>
                                                        <?php 
                                                    } ?>
                                                  

                                                     <?php if(!empty($neoton_option['blog-author-post'])){
                                                     if ($neoton_option['blog-author-post'] == 'show'): ?>
                                                      <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                      <?php endif; }
                                                      else{ ?>
                                                        <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                     <?php } ?>
                                                  </ul>                                                         
                                                </div>   
                                            </div>

                                            <h3 class="blog-title">
                                                <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                                </a>
                                            </h3>

                                            <div class="blog-desc"> 
                                                <?php
                                                if ($i == '0') { 
                                                    echo neoton_custom_excerpt(30);
                                                } else {
                                                    echo neoton_custom_excerpt(12);
                                                }
                                                ?>    
                                            </div>

                                            <?php 
                                                $no_view = "";
                                                if ( !empty($neoton_option['view-comments']) && $neoton_option['view-comments'] == 'hide'){
                                                    $no_view = "left-btn";
                                                }
                                                if(!empty($neoton_option['blog_readmore'])):?>
                                                    <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                        <a href="<?php the_permalink();?>">
                                                            <?php echo esc_html($neoton_option['blog_readmore']); ?>
                                                        </a>
                                                    </div>
                                            <?php endif; ?>

                                          <?php if(empty($neoton_option['blog_readmore'])):?>
                                              <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                <a href="<?php the_permalink();?>"><?php esc_html_e('Continue Reading', 'neoton');?></a>
                                              </div>
                                          <?php endif; ?>

                                    </div>
                                  </div>
                                </article>
                            </div>
                            
                            <?php 
                                $i++;
                                endwhile;  
                                wp_reset_query();                      
                            ?>
                        </div>
                        <div class="pagination-area">
                            <?php
                                the_posts_pagination();
                            ?>
                        </div>
                        <?php
                        else :
                        get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
                    <?php } elseif ($cate_post_list_style === 'cate_style4'){ ?>
                        <div class="row">            
                            <?php
                            if ( have_posts() ) :           
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = get_the_id();
                            ?>
                            <?php 
                            $no_thumb = "";
                                if ( !has_post_thumbnail() ) {
                                  $no_thumb = "no-thumbs";
                                }
                            ?>
                            <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                                <article <?php post_class();?>>
                                    <div class="blog-item <?php echo esc_attr($no_thumb); ?>">

                                    <?php if ( has_post_thumbnail() ) {?>
                                        <div class="blog-img">
                                           <a href="<?php the_permalink();?>">
                                            <?php
                                              the_post_thumbnail('neoton_equal-grid_big');
                                            ?>
                                          </a>                                    
                                        </div><!-- .blog-img -->
                                    <?php }       
                                    ?> 

                                        <div class="full-blog-content">
                                            <div class="title-wrap">                                                                      
                                                <div class="blog-meta">
                                                  <ul class="btm-cate">
                                                    <?php if(!empty($neoton_option['blog-date'])){
                                                    if ($neoton_option['blog-date'] == 'show'): ?>
                                                    
                                                    <li>
                                                        <div class="blog-date">
                                                          <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                    </li>                                                   
                                                        <?php endif; }
                                                    else { ?>
                                                                <li>
                                                                    <div class="blog-date">
                                                                        <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                    </div>                                              
                                                                </li>
                                                        <?php 
                                                    } ?>
                                                  

                                                     <?php if(!empty($neoton_option['blog-author-post'])){
                                                     if ($neoton_option['blog-author-post'] == 'show'): ?>
                                                      <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                      <?php endif; }
                                                      else{ ?>
                                                        <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                     <?php } ?>

                                                    <?php 
                                                        if(!empty($neoton_option['blog-category'])){
                                                            if($neoton_option['blog-category'] == 'show'){
                                                                if(get_the_category()): 
                                                        ?>
                                                                <li>                                                      
                                                                  <?php                                                                
                                                                    echo '<div class="tag-line">';
                                                                    ?>
                                                                    <i class="ri-file-copy-line"></i>
                                                                    <?php
                                                                    the_category(', '); 
                                                                    echo '</div>';
                                                                  ?> 
                                                                </li>
                                                      <?php endif;
                                                            }
                                                      }else{
                                                         if(get_the_category()): ?>
                                                        <li>                                                      
                                                            <?php
                                                                //tag add
                                                                $seperator = ', '; // blank instead of comma
                                                                $after = '';
                                                                $before = '';
                                                                echo '<div class="tag-line">';
                                                                ?>
                                                                <i class="ri-file-copy-line"></i>
                                                                <?php
                                                                the_category(', '); 
                                                                echo '</div>';
                                                              ?> 
                                                            </li>
                                                        <?php
                                                    endif;
                                                      } ?>
                                                  </ul>                                                         
                                                </div>   
                                            </div>

                                            <h3 class="blog-title">
                                                <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                                </a>
                                            </h3>

                                            <div class="blog-desc">   
                                                <?php echo neoton_custom_excerpt(30);?>                                     
                                            </div>

                                            <?php 
                                                $no_view = "";
                                                if ( !empty($neoton_option['view-comments']) && $neoton_option['view-comments'] == 'hide'){
                                                    $no_view = "left-btn";
                                                }
                                                if(!empty($neoton_option['blog_readmore'])):?>
                                                    <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                        <a href="<?php the_permalink();?>">
                                                            <?php echo esc_html($neoton_option['blog_readmore']); ?>
                                                        </a>
                                                    </div>
                                            <?php endif; ?>

                                          <?php if(empty($neoton_option['blog_readmore'])):?>
                                              <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                <a href="<?php the_permalink();?>"><?php esc_html_e('Continue Reading', 'neoton');?></a>
                                              </div>
                                          <?php endif; ?>

                                    </div>
                                  </div>
                                </article>
                            </div>
                            
                            <?php  
                              endwhile;  
                              wp_reset_query();                      
                            ?>
                        </div>
                        <div class="pagination-area">
                            <?php
                                the_posts_pagination();
                            ?>
                        </div>
                        <?php
                        else :
                        get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
                    <?php } else { ?>
                        <div class="row">            
                            <?php
                            if ( have_posts() ) :           
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                $post_id = get_the_id();
                            ?>
                            <?php 
                            $no_thumb = "";
                                if ( !has_post_thumbnail() ) {
                                  $no_thumb = "no-thumbs";
                                }
                            ?>
                            <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                                <article <?php post_class();?>>
                                    <div class="blog-item <?php echo esc_attr($no_thumb); ?>">

                                    <?php if ( has_post_thumbnail() ) {?>
                                        <div class="blog-img">
                                           <a href="<?php the_permalink();?>">
                                            <?php
                                              the_post_thumbnail();
                                            ?>
                                          </a>                                    
                                        </div><!-- .blog-img -->
                                    <?php }       
                                    ?> 

                                        <div class="full-blog-content">
                                            <div class="title-wrap">                                                                      
                                                <div class="blog-meta">
                                                  <ul class="btm-cate">
                                                    <?php if(!empty($neoton_option['blog-date'])){
                                                    if ($neoton_option['blog-date'] == 'show'): ?>
                                                    
                                                    <li>
                                                        <div class="blog-date">
                                                          <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                        </div>                                              
                                                    </li>                                                   
                                                        <?php endif; }
                                                    else { ?>
                                                                <li>
                                                                    <div class="blog-date">
                                                                        <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                                    </div>                                              
                                                                </li>
                                                        <?php 
                                                    } ?>
                                                  

                                                     <?php if(!empty($neoton_option['blog-author-post'])){
                                                     if ($neoton_option['blog-author-post'] == 'show'): ?>
                                                      <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                      <?php endif; }
                                                      else{ ?>
                                                        <li>
                                                          <div class="author">
                                                            <i class="ri-user-3-line"></i> <?php echo get_the_author(); ?>
                                                          </div>
                                                      </li>
                                                     <?php } ?>

                                                    <?php 
                                                        if(!empty($neoton_option['blog-category'])){
                                                            if($neoton_option['blog-category'] == 'show'){
                                                                if(get_the_category()): 
                                                        ?>
                                                                <li>                                                      
                                                                  <?php                                                                
                                                                    echo '<div class="tag-line">';
                                                                    ?>
                                                                    <i class="ri-file-copy-line"></i>
                                                                    <?php
                                                                    the_category(', '); 
                                                                    echo '</div>';
                                                                  ?> 
                                                                </li>
                                                      <?php endif;
                                                            }
                                                      }else{
                                                         if(get_the_category()): ?>
                                                        <li>                                                      
                                                            <?php
                                                                //tag add
                                                                $seperator = ', '; // blank instead of comma
                                                                $after = '';
                                                                $before = '';
                                                                echo '<div class="tag-line">';
                                                                ?>
                                                                <i class="ri-file-copy-line"></i>
                                                                <?php
                                                                the_category(', '); 
                                                                echo '</div>';
                                                              ?> 
                                                            </li>
                                                        <?php
                                                    endif;
                                                      } ?>
                                                  </ul>                                                         
                                                </div>   
                                            </div>

                                            <h3 class="blog-title">
                                                <a href="<?php the_permalink();?>">
                                                  <?php the_title();?>
                                                </a>
                                            </h3>

                                            <div class="blog-desc">   
                                                <?php echo neoton_custom_excerpt(30);?>                                     
                                            </div>

                                            <?php 
                                                $no_view = "";
                                                if ( !empty($neoton_option['view-comments']) && $neoton_option['view-comments'] == 'hide'){
                                                    $no_view = "left-btn";
                                                }
                                                if(!empty($neoton_option['blog_readmore'])):?>
                                                    <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                        <a href="<?php the_permalink();?>">
                                                            <?php echo esc_html($neoton_option['blog_readmore']); ?>
                                                        </a>
                                                    </div>
                                            <?php endif; ?>

                                          <?php if(empty($neoton_option['blog_readmore'])):?>
                                              <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                <a href="<?php the_permalink();?>"><?php esc_html_e('Continue Reading', 'neoton');?></a>
                                              </div>
                                          <?php endif; ?>

                                    </div>
                                  </div>
                                </article>
                            </div>
                            
                            <?php  
                              endwhile;  
                              wp_reset_query();                      
                            ?>
                        </div>
                        <div class="pagination-area">
                            <?php
                                the_posts_pagination();
                            ?>
                        </div>
                        <?php
                        else :
                        get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
                    <?php } ?>
                </div>
            <?php if( $layout != 'full-layout' ):     
               get_sidebar();    
             endif;
            ?>
          </div>
        </div>
    </div>
</div>
<?php get_footer();