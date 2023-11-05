<?php
/**
 * @author  Backtheme
 * @since   1.0
 * @version 1.0 
 */
?>
<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
		<div class="bs-img">
		  <?php the_post_thumbnail()?>
          
        </div>
    <?php endif; ?>    
<div class="single-content-full">
    <div class="bs-desc">
    <?php
        the_content();

        wp_link_pages( array(
          'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'neoton' ),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        ) );
      ?>
    </div>
     <?php 
        if(has_tag()){ ?>
        <div class="bs-info single-page-info tags">
        <?php
          //tag add
          $seperator = ''; // blank instead of comma
          $after = '';
          echo esc_html__( 'Tags: ', 'neoton' );
          the_tags( '', $seperator, $after );
        ?>             
         </div> 
       <?php } ?> 
</div>