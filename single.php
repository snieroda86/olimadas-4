<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-lg">
			<!-- breadcrumbs -->
			<div class="row">
				<div class="col-12">
					<?php
					while ( have_posts() ) :
						the_post(); ?>

						<h1><?php the_title(); ?></h1>

						<?php
						// get_template_part( 'template-parts/content');

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

	<script type="text/javascript">
    jQuery(document).ready(function($) {
     
    })
    
</script>

<?php
get_footer();
