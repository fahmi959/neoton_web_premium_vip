<?php
global $neoton_option;

//search page here
if(!empty($neoton_option['off_search'])):
    $sticky_search = $neoton_option['off_search'];
else:
    $sticky_search ='';
endif;
if(($sticky_search == '1') ):
 ?>
	<div class="sticky_form">
		<div class="sticky_form_full">
		  <?php get_search_form(); ?> 
		</div><i class="ri-close-line close-search sticky_search sticky_form_search"></i>
		
	</div>
<?php endif; ?>

