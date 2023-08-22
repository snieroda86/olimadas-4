<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title page-section-h2"><?php esc_html_e( 'Niczego nie znaleziono', 'web14devsn' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content pt-4">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'web14devsn' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Nie znaleziono artykułów zawierających podaną frazę. Spróbuj wpisać inną frazę.', 'web14devsn' ); ?></p>
			<div class="pt-4">
				<?php get_search_form(); ?>
			</div>
			<?php
			

		else :
			?>

			<p><?php esc_html_e( 'Niczego nie znaleziono.', 'web14devsn' ); ?></p>

			<div class="pt-4">
				<?php get_search_form(); ?>
			</div>
			

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
