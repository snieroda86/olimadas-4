<?php 

// Template Name: test 
?>

<?php get_header(); ?>

<div class="container pt-5 pb-5">
	<?php 
	$check_sire_ex = getPageByTitleSN('Sonia' , 'rodowody_psow');
	if($check_sire_ex->have_posts()){
		$check_sire_ex->the_post();
		// $ex_sire_id = get_the_ID();
        echo $ex_sire_id = get_the_ID();
    	
		

	}

	 ?>
</div>

<?php get_footer(); ?>