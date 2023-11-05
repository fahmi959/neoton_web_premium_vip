<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */

get_header();
global $neoton_option;
    $post_id      = get_the_id();
    $author_id    = get_post_field ('post_author', $post_id);
    $display_name = get_the_author_meta( 'display_name' , $author_id );
?>

    <div class="container"> 
        <div id="content">
            <?php
                //checking page layout 
                $page_layout = get_post_meta( $post->ID, 'layout', true );
                $col_side = '';
                $col_letf = '';
                if($page_layout == '2left'){
                    $col_side = '8';
                    $col_letf = 'left-sidebar';}
                else if($page_layout == '2right'){
                    $col_side = '8';}
                else{
                	$col_side = '12 bk-no-side';
            	}
            ?>
          <!-- Blog Detail Start -->
            <div class="back-blog-details pt-70 pb-70">
                <div class="row padding-<?php echo esc_attr( $col_letf) ?>">
                    <div class="col-lg-<?php echo esc_attr( $col_side). ' ' .esc_attr( $col_letf) ?>">
                        <?php
                        	while ( have_posts() ) : the_post();
                        ?>             
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php if(!empty($neoton_option['single-thum']) ){ ?>
                              
                            <?php } else { ?>
                                <?php if(has_post_thumbnail()){ ?>
                                <div class="bs-img">
                                  <?php the_post_thumbnail()?>
                                </div>
                                <?php } ?>
                            <?php } ?>
                            <?php if(!empty($neoton_option['blog-meta-single']) ){ ?>
                              
                            <?php } else { ?>
                                    <ul class="single-posts-meta">
                                        <li>                                
                                            <span class="p-date">
                                                <i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="p-user">                                        
                                                <i class="ri-user-3-line"></i> <?php echo esc_html($display_name); ?>
                                            </span>
                                        </li>      
                                
                                        <li class="post-cate">                                                      
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

                                        <li class="post-comment">
                                            <i class="ri-chat-4-line"></i> <?php echo get_comments_number( '0', '1', '%' ); ?> 
                                        </li>
                                </ul>
                            <?php } ?>
                            <?php
                              get_template_part( 'template-parts/post/content', get_post_format() );         
                            ?>
                            <div class="clear-fix"></div> 
                                       
                        </article> 
                        
                        <?php       
                        $author_meta = get_the_author_meta('description'); 
                        if( !empty($author_meta) ){
                        ?>
                            <div class="author-block">
                              <div class="author-img"> <?php echo get_avatar(get_the_author_meta( 'ID' ), 200);?> </div>
                              <div class="author-desc">
                                <h3 class="author-title">
                                  <?php the_author();?>
                                </h3>
                                <p>
                                  <?php   
                                    echo wpautop( get_the_author_meta( 'description' ) );
                                  ?>
                                </p>
                                <a href="<?php echo esc_url(get_the_author_meta('user_url'))?>" target="_blank">
                                  <?php echo esc_url(get_the_author_meta( 'user_url'))?></a> 
                                </div>
                            </div>
                            <!-- .author-block -->
                        <?php }
                                  
                        ?>
                        <?php if(!empty($neoton_option['blog-pagination']) ){ ?>
                            
                        <?php } else { ?>
                            <?php get_template_part( 'pagination' ); ?>
                        <?php } ?>
                        
                        <?php if(!empty($neoton_option['blog-related']) ){ ?>
                        <?php
                        $back__related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => -1, 'post__not_in' => array($post->ID) ) );
                        if(!empty($back__related)){
                        ?>
                        <div class="back-related-post">
                            <ul class="back__related_post">
                            <?php
                                if( $back__related ) foreach( $back__related as $post ) {
                                setup_postdata($post); ?>                                 
                                <li class="item">
                                    <div class="back-inner-item">
                                        <div class="back_thum"><?php the_post_thumbnail(); ?></div>
                                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo wp_trim_words( get_the_title(), 8 ); ?></a></h3>
                                         <span><i class="ri-calendar-line"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?></span>
                                    </div>
                                </li>                                   
                                <?php } ?>
                            </ul>
                        </div>
                        <?php wp_reset_postdata(); } } ?>

                        <?php 
                        $blog_author = '';
                        if($blog_author == ""){
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        }
                        else
                            {
                            $blog_author = $neoton_option['blog-comments'];
                            if($blog_author == 'show'){     
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                              comments_template();
                            endif;
                            }
                        }
                        endwhile; // End of the loop.
                        ?>
                    </div>
                  <?php
                    if( $page_layout == '2left' || $page_layout == '2right'):
                        get_sidebar('single');
                    endif; ?>
                </div>
            </div>
          <!-- Blog Detail End --> 
        </div>
    </div>
<!-- .container -->
<?php
get_footer();