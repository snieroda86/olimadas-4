<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="d-flex flex-wrap search-res-item-wrap">
		<div class="thumb-search-wrap">
			<?php 
			if ( has_post_thumbnail( get_the_ID() ) ) {
			    $photo = get_the_post_thumbnail( get_the_ID() , 'medium' );
			    echo  '<div class="section1-2singlephoto"><a href="'.get_the_permalink().'">' . $photo . '</a></div>';
			}

			else { ?>
			    <img src="<?php echo PATH_SN ?>/uploads/no-image.jpg" alt="No image">
			<?php } ?>
		</div>
		<div class="entry-content-search">
			<header class="entry-header">
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
