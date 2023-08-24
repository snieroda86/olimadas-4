<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content pt-60 pb-60">  
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
