<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container-lg footer-container-sn">
			<!-- Widget area -->
			<div class="row widget-area-footer-sn">
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-1' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-1'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-2' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-2'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-3' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-3'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
				<!-- Widget -->
				<div class="col-lg-3 col-md-4 col-sm-6 col-12">
					<div class="widget-item-footer mb-3">
						<?php if ( is_active_sidebar( 'f-widget-4' ) ) { ?>
						    <aside>
						        <?php dynamic_sidebar('f-widget-4'); ?>
						    </aside>
						<?php } ?>
					</div>
				</div>
				<!-- Widget end -->
			</div>
			<!-- Copyrights -->
			<div class="row copyr-row-sn">
				<div class="col-12">
					<p class="copyr-sn-text">
						© Magazyn Rekruter 2022 | All rights reserved.
					</p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
