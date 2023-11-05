<?php
/**
 * @author  Backtheme
 */ 
get_header();
global $neoton_option; ?>

<!-- Main content Start -->
<div class="main-content">  
  <!-- Team Detail Start -->  
    <div class="team-detail">
        <div class="container">
            <div id="content">
                <?php 
				while ( have_posts() ) : the_post();                   
                    the_content();
                endwhile; wp_reset_query(); ?>
            </div>    
        </div>
    </div>
</div>
<!-- Single Team End -->
<?php 
get_footer();