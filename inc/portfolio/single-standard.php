<?php 
    /**
    * Sample template tag function for outputting a cmb2 file_list
    *
    * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
    * @param  string  $img_size           Size of image to show
    */  
?>
<!-- Portfolio Detail Start -->
<div class="container">
    <div id="content">
        <?php 
            while ( have_posts() ) : the_post(); 
            the_content();   
            endwhile; 
        ?>   
    </div>
</div>
<!-- Portfolio Detail End -->