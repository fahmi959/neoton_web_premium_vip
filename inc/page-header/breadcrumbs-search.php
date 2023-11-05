<div class="back-breadcrumbs  porfolio-details">  
  <?php 
    global $neoton_option;
    if(!empty($neoton_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($neoton_option['blog_banner_main']['url']);?>')">
    <?php } else { ?>
        <div class="breadcrumbs-single">
    <?php } ?>
      <div class="back-breadcrumbs-inner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="breadcrumbs-inner">
              <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'neoton' ), '<span>' . get_search_query() . '</span>' ); ?></h1>            
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
</div>