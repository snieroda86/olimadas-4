<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package web14devsn
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>


<!-- <aside id="secondary-static"> -->
    <!-- Newsletter -->
    <div class="newsletter-wrap-sn">
        <div class="newsletter-inner-sn">
            <div class="row">
                <div class="col-12">
                    <h3 class="pb-4 text-right pr-4">Dołącz do kręgu odbiorców<br> naszego newslettera</h3>
                    <img src="<?php echo PATH_SN ?>/uploads/newsletter-big.png" alt="Newsletter" class="img-fluid">
                    <div class="text-right pr-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-main-sn" data-toggle="modal" data-target="#exampleModal">
                          <span>Zapisz się!</span>
                        </button>   
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
    <!-- Newsletter end -->

    <!-- Press note -->
    <h2 class="section-title-sn">
        <?php _e('Czytaj także...' , 'web14devsn'); ?>
    </h2>
    <div class="press-note-sidebar">
        <?php $getPressNote = getPressNoteCat(); ?>
        <?php if ($getPressNote->have_posts()): ?>
            <?php 
                
                $thumb_limit = 1;
                while ( $getPressNote->have_posts() ) : $getPressNote->the_post(); 
                    $permalink = get_the_permalink();
                    $pn_date = get_the_date();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="press-note-wrap-sn">
                            <header>
                                <div class="press-note-header d-flex justify-content-between">
                                    <div class="pn-time-ago">
                                        <span class="pn-header-meta"><?php echo $pn_date; ?></span>
                                    </div>
                                    <div class="pn-origin">
                                        <span class="pn-header-meta"><?php the_field('zrodlo_np'); ?></span>
                                    </div>

                                </div>
                            </header>   
                            <div class="pn-entry-content-wrap d-flex">
                                <!-- Thumbnail -->
                                <div class="pn-thumbnail-wrap" style="
                                <?php 
                                if ($thumb_limit<5) {
                                    echo 'width: 110px;height: 110px;';
                                }else{
                                    echo 'display: none;';
                                }
                                ?>
                                ">
                                    <a href="<?php echo $permalink; ?>">
                                        <div class="pn-thumbnail">
                                            <?php the_post_thumbnail('medium' , ['class'=> 'img-fluid']); ?>
                                        </div>
                                    </a>
                                </div>
                                <!-- Press note entry content -->
                                <div class="pn-entry-contnet" style="
                                <?php 
                                if ($thumb_limit<5) {
                                    echo 'width: calc(100% - 110px);padding-left: 20px;';
                                }else{
                                    echo 'width: 100%;';
                                }
                                ?>
                                ">
                                     <a href="<?php echo $permalink; ?>">
                                         <h2 class="pn-entry-title">
                                             <?php the_title(); ?>
                                         </h2>
                                     </a>

                                     <!-- Excerpt -->
                                     <?php if($thumb_limit>=5): ?>
                                        <div class="pm-excerpt pt-2">
                                            <p>
                                                <?php echo wp_trim_words( get_the_content(), 14, '...' ); ?>
                                            </p>
                                        </div>
                                     <?php else: ?>
                                         <div class="pm-excerpt pt-2">
                                            <p>
                                                <?php echo wp_trim_words( get_the_content(), 10, '...' ); ?>
                                            </p>
                                        </div>
                                     <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    $thumb_limit++;
                endwhile;
                wp_reset_postdata(); 
             ?>
        <?php endif ?>
    </div>
    <!-- Press note end -->
<!-- </aside> -->

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<!-- Newsletter modal -->
<div class="modal fade newsletter-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Newsletter' , 'web14devsn'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-5 pt-4">
        <div class="row">
            <div class="col-md-5 mb-3 mb-md-0">
                <img src="<?php echo PATH_SN ?>/uploads/newsletter-big.png" class="img-fluid" alt="Newsletter">
            </div>
            <div class="col-md-5 text-center">
                 <h4>Zapisz sie na Newsletter</h4>
                        <form>
                            <div class="form-group pb-2">
                                    <input type="email" name="newsletter_email" placeholder="Wpisz swój email...">
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-main-sn" name="zapis">
                                        <span>Zapisz się</span>
                                    </button>
                            </div>
                        </form>
            </div>

        </div>
      </div>
     
    </div>
  </div>
</div>
<!-- Newsletter modal end -->
