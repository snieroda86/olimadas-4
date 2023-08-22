<?php
/**
 * The template for displaying archive pages
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
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				// the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="row">
				<!-- Post grid -->
				<div class="col-xl-8 col-lg-8 col-md-8">
					<?php if ( have_posts() ) : ?>
						<div class="row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post(); ?>
								<div class="col-lg-4 col-md-6 col-sm-6 col-12">
									<?php get_template_part( 'post-templates/content'); ?>	
								</div>
								
							<?php endwhile; ?>
	
						</div>
						
					<?php get_template_part('template-parts/post-pagination'); ?>
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div>
				<!-- Sidebar -->
				<div class="col-xl-4 col-lg-4 col-md-4 mt-5 mt-md-0">
					<div id="sidebar-sn">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php

get_footer();
