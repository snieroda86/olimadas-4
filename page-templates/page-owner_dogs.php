<?php 
// Template Name: Wszystkie psy właściciela

if(!array_key_exists('owner' , $_GET) || empty($_GET['owner'])){
	wp_redirect(home_url());
	exit();
}

get_header(); ?>



<main id="primary" class="site-main">
	<?php  get_template_part( 'template-parts/page', 'header' ); ?>
	<div class="container-lg page-container-sn">

		<div class="page-content-sn-ew">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
		</div>

		<div style="max-width: 580px;margin:auto;min-height: 70vh;">
			<div>
				<h5 class="text-center pb-4">
					<?php $owner_id = sanitize_text_field($_GET['owner']); ?>
					<?php $owner_name = get_post($owner_id)->post_title; ?>
					<?php echo $owner_name; ?>	
				</h5>
			</div>
			<?php 
			
            $ownerDogs = getAllOwnerDogs($owner_id);

            if(!empty($ownerDogs)){
            	echo '<table class="table table-bordered">';
            	echo '<thead class="thead-dark">';
				echo  '<tr>';
				echo '<th scope="col">#</th>';
				echo '<th scope="col">Dog name</th>';
				echo '</tr>';
				echo '</thead>';
				echo '</tbody>';

				$list_i = 1;
            	foreach ($ownerDogs as $dog) {
				    $postTitle = get_the_title($dog->ID); 
				    $postURL = get_permalink($dog->ID);

					?>

					<tr>
				      <th scope="row"><?php echo $list_i; ?></th>
				      <td>
				      	<a class="color-gold" href="<?php echo $postURL; ?>"><?php echo $postTitle; ?></a>
				      </td>
				      
				    </tr>

					<?php
					$list_i++;
				}
				echo '</tbody>';
            	echo '</table>';
            } ?>
		</div>

	</div>
</main><!-- #main -->

<?php get_footer(); ?>