<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package web14devsn
 */

get_header();
?>

	<main id="primary" class="site-main ">
		<div class="container-lg page-container-sn pt-5 pb-5 search-page-wrapper" style="min-height: 70vh;">
			<?php if ( have_posts() ) : ?>

				<header class="page-header pb-3">

					<h1 class="page-title page-section-h2">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Wyniki wyszukiwania dla: %s', 'web14devsn' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile; ?>
				<div class="pt-5">
					<?php get_template_part('template-parts/post-pagination'); ?>	
				</div>
				
			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
