<?php
  global $neoton_option;
  $header_trans = '';
    if(!empty($neoton_option['header_layout'])){  
               
        $header_style = $neoton_option['header_layout'];               
        if($header_style == 'style2'){       
            $header_trans = 'heads_trans';    
        }
    }
    if(!empty($neoton_option['blog-banner-area-hide']) ){ 
    } else {

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
  <?php
  }
?>  
</div>
<?php }