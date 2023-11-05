<?php
  global $neoton_option;
  $header_trans = '';
    if(!empty($neoton_option['header_layout'])){  
               
        $header_style = $neoton_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }

?>

<div class="back-breadcrumbs  porfolio-details <?php echo esc_attr($header_trans);?>">
  <?php
  if(!empty($neoton_option['blog_banner_main']['url'])) { ?>
  <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($neoton_option['blog_banner_main']['url']);?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">

            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
            ?>
              
             <?php 
                if(!empty($neoton_option['off_breadcrumb'])){
                    if(function_exists('bcn_display')){?>
                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                    <?php } 
                }
            ?>   
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }
  else{   
  ?>
  <div class="back-breadcrumbs-inner">  
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
                <?php
                    $author        = get_user_by('slug', get_query_var("author_name"));
                    $author_id     = $author->ID;
                    $author_name   = $author->display_name;
                    $profile_image = get_avatar( $author_id, 360);
                    $description   = wpautop( get_the_author_meta( 'description', $author_id ) );

                    $designation   = get_the_author_meta( 'designation',  $author_id );
                    $facebook      = get_the_author_meta('facebook', $author_id);      
                    $twitter       = get_the_author_meta(  'twitter', $author_id );
                    $google_plus   = get_the_author_meta( 'google', $author_id );
                    $linkedin      = get_the_author_meta( 'linkedin', $author_id);
                ?>
                <div class="back-author-area">
                    <div class="author-img"><?php echo get_avatar( $author_id, 80); ?></div>
                    <h1 class="page-title">
                        <?php
                            the_author();
                        ?>
                    </h1>
                    <div class="author-desc">                            
                        <?php echo wp_kses_post($description); ?>
                        <div class="social-icons">
                            <?php
                                if($facebook != ''): echo '<a href="'.esc_url($facebook).'" class="social-icon"><i class="ri-facebook-fill"></i></a>'; endif;                
                                if($twitter != ''): echo '<a href="'.esc_url($twitter).'" class="social-icon"><i class="ri-twitter-fill"></i></a>'; endif;                
                                if($google_plus != ''): echo '<a href="'.esc_url($google_plus).'" class="social-icon"><i class="ri-instagram-line"></i></a>'; endif;        
                                if($linkedin != ''): echo '<a href="'.esc_url($linkedin).'" class="social-icon"><i class="ri-linkedin-fill"></i></a>'; endif;                
                            ?>
                        </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  


</div>