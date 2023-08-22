<?php 
/*
** Template to display post navigation
*/
 ?>
 <div class="post-navigation-sn">
	<?php 
	the_post_navigation(
		array(
			'prev_text' => '<span class=="arr-nav-sn arr-nav-prev">
			<img src="'.get_bloginfo('template_url').'/uploads/arrow-left-l.svg" width="16">
			</span>
			 <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span>
			<span class=="arr-nav-sn arr-nav-next">
			<img src="'.get_bloginfo('template_url').'/uploads/arrow-right-l.svg" width="16">
			</span>
			',
		)
	);
	 ?>	
</div>