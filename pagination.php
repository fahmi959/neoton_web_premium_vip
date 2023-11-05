<?php 
global $neoton_option;
$next_post = get_next_post();
$previous_post = get_previous_post();

$hide_pagination =" ";

if ( empty($neoton_option ['blog-pagination']) ){
    $hide_pagination= 'blog_pagination_hide';
} 

if( !empty($next_post) || !empty($previous_post)):?>
	<div class="ps-navigation <?php echo esc_attr($hide_pagination); ?>">
		<ul>
			<?php			 
				$url_next = is_object( $next_post ) ? get_permalink( $next_post->ID ) : ''; 
				$title    = is_object( $next_post ) ? get_the_title( $next_post->ID ) : ''; 
				if($next_post):?>	
				  <li class="prev">
				    <a href="<?php echo esc_url( $url_next ) ?>">
				    	<span class="next_link"><i class="flaticon-back-1"></i><?php echo esc_html__('Previous', 'neoton'); ?></span>
				    	<span class="link_text"> <?php echo esc_attr( $title ); ?></span>
					</a>
				  </li>
				<?php endif;     
	  			$url_previous = is_object( $previous_post ) ? get_permalink( $previous_post->ID ) : '';
	  			$title = is_object( $previous_post ) ? get_the_title( $previous_post->ID ) : '';
			  	if($previous_post):?>
				  <li class="next">
				    <a href="<?php echo esc_url( $url_previous ) ?>">
				    	<span class="next_link"><?php echo esc_html__('Next', 'neoton'); ?><i class="flaticon-next"></i></span>
				    	<span class="link_text"><?php echo esc_attr( $title ); ?> </span>
					</a>
				  </li>
			  <?php endif; ?>
		</ul>
		<div class="clearfix"></div>
	</div>
<?php endif;