<?php
/**
 * The template for displaying all dogs
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container-lg">
			<header class="page-header cat-header-sn">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header><!-- .page-header -->
			<div class="container">
				<!-- Post table -->
				<div class="col-lg-10 col-md-12 m-auto pt-5">
					<h1 class="pb-4">Dogs list</h1>
					<?php  if(array_key_exists('search_result', $_GET) && $_GET['search_result']== 'false'): ?>
						<div class="alert alert-danger">
							<?php _e('Dog not found. Check list of available dogs below' , 'web14devsn'); ?>
						</div>
					<?php endif; ?>
					<div class="dog-list-warpper">
					<?php 
					$dogs_list = get_all_rodowody_psow();
					if ($dogs_list->have_posts()) { ?>
						<table class="dogs-list-table">
							<thead>
							    <tr>
							      <th scope="col"><?php _e('Dog name' , 'web14devsn'); ?></th>
							      <th scope="col"><?php _e('Gender' , 'web14devsn'); ?></th>
							      <th scope="col"><?php _e('Birth date' , 'web14devsn'); ?></th>
							      <th scope="col"><?php _e('Action' , 'web14devsn'); ?></th>
							    </tr>
						  </thead>
						  <tbody>
						  	<?php
						    while ($dogs_list->have_posts()) {
						        $dogs_list->the_post(); ?>
						        <tr>
							      <th><a class="color-gold" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></th>
							      <td><?php the_field('plec_psa'); ?></td>
							      <td><?php the_field('data_urodzenia'); ?></td>
							      <td><a href="<?php the_permalink(); ?>"class="btn btn-gold text-white"><?php _e('Read more' , 'web14devsn'); ?></a></td>
							    </tr>
						        
						    <?php } ?>
						  </tbody>
					    </table>
					<?php    
					} else {
					    // Brak znalezionych postów
					}
					?>
					</div>
				</div>
				
			</div>
		</div>
	</main><!-- #main -->

	<script type="text/javascript">
		jQuery(document).ready(function($) {
		  let table = new DataTable('.dogs-list-table');
		})
	</script>

<?php

get_footer();
