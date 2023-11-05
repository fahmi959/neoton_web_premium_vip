<?php
global $neoton_option;
$top_social = $neoton_option['show-social']; ?>
<div class="header-share">
	<ul class="clearfix">

	<?php 
		if($top_social == '1'){              
		if(!empty($neoton_option['facebook'])) { ?>
			<li> <a href="<?php echo esc_url($neoton_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
			<?php 
		}

		if(!empty($neoton_option['twitter'])) { ?>
			<li> <a href="<?php echo esc_url($neoton_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
			<?php
		}

		if(!empty($neoton_option['rss'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
		<?php
		}

		if (!empty($neoton_option['pinterest'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
		<?php }

		if (!empty($neoton_option['linkedin'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
		<?php }

		if (!empty($neoton_option['instagram'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
		<?php }

		if(!empty($neoton_option['vimeo'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
		<?php }

		if (!empty($neoton_option['tumblr'])) { ?>
			<li> <a href="<?php  echo esc_url($neoton_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
		<?php }

		if (!empty($neoton_option['youtube'])) { ?>
		<li> <a href="<?php  echo esc_url($neoton_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
		<?php } 
	} ?>
	</ul>
</div>