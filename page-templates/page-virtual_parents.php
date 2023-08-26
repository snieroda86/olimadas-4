<?php 
// Template Name: Wirtualni rodzice

if( !array_key_exists('sire' , $_GET) && !array_key_exists('dam' , $_GET)){
	wp_redirect(home_url());
	exit();
}

$sire_vp_name = $_GET['sire'];
$dam_vp_name = $_GET['dam'];
$sire_vp_id = get_page_by_title($sire_vp_name , OBJECT , 'rodowody_psow')->ID;
$dam_vp_id = get_page_by_title($dam_vp_name , OBJECT , 'rodowody_psow')->ID;


get_header(); ?>

<main id="primary" class="site-main">
	<?php  get_template_part( 'template-parts/page', 'header' ); ?>
	<div class="container-lg page-container-sn pt-5">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>


		<!-- Sire pedigree -->
		<div class="row">

			<div class="col-12 pt-4 pb-5">
				<h5><span><svg fill="#b37f2b" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path fiil="#b37f2b" d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/></svg></span><span class="pl-2"><a style="text-decoration: underline;" class="color-gold" href="#inbread-value-dynamic"><?php _e('Click to see dog inbreeding coefficient' , 'web14devsn'); ?></a></span></h5>
			</div>
			<div class="col-12">
        		<!-- Sire -->
        		<div class="pedigree-table">
        			<?php 

        			// Variables
        			$c_parent_url = get_permalink(89);

        			$sire_pedigree_arr =[];

        			$dam_pedigree_arr =[];


        			


        			?>

                	<table class="table-bordered">
                		<tr>
                			<!-- col 1 -->
                			<td>
                				<div class="dog-cell dog-cell-1">
                					<!-- Sire 1 -->

                					<?php 
                						$sire_1 = &$sire_vp_id;
                						if($sire_1){
                							$get_sire_1 = getDogByID($sire_1);
                							if ( $get_sire_1->have_posts() ) {
												
												$dog = $get_sire_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_1_id = $dog->ID;

												// To array - pokolenie 1
												$sire_pedigree_arr[1][1] = $sire_1_id;

												$dog_color = get_post_meta( $sire_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo get_the_ID() ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo get_the_ID(); ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                						<?php }
                					?>
                				</div>
                			</td>
                			<!-- col 2 -->
                			<td>
                				<div class="dog-cell dog-cell-2">
                					<!-- 2.1 -->
                					<?php 
                					if( isset($sire_1_id) ){
                						$sire_2_1 = get_field('ojciec_sire' , $sire_1_id);
                						if($sire_2_1){
                							$get_sire_2_1 = getDogByID($sire_2_1);
                							if ( $get_sire_2_1->have_posts() ) {
												
												$dog = $get_sire_2_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_2_1_id = $dog->ID;

												// To array - pokolenie 2
												$sire_pedigree_arr[2][1] = $sire_2_1_id ;

												$dog_color = get_post_meta( $sire_2_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-2">
                					<!-- 2.2 -->
                					<?php 
                					if( isset($sire_1_id) ){
                						$dam_2_2 = get_field('matka_dam' , $sire_1_id);
                						if($dam_2_2){
                							$get_dam_2_2 = getDogByID($dam_2_2);
                							if ( $get_dam_2_2->have_posts() ) {
												
												$dog = $get_dam_2_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_2_2_id = $dog->ID;

												// To array - pokolenie 2
												$sire_pedigree_arr[2][2] = $dam_2_2_id ;

												$dog_color = get_post_meta( $dam_2_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 3 -->
                			<td>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.1 -->
                				    <?php 
                					if( isset($sire_2_1_id) ){
                						$sire_3_1 = get_field('ojciec_sire' , $sire_2_1_id);
                						if($sire_3_1){
                							$get_sire_3_1 = getDogByID($sire_3_1);
                							if ( $get_sire_3_1->have_posts() ) {
												
												$dog = $get_sire_3_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_3_1_id = $dog->ID;

												// To array - pokolenie 3
												$sire_pedigree_arr[3][1] = $sire_3_1_id ;

												$dog_color = get_post_meta( $sire_3_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.2 -->

                					<?php 
                					if( isset($sire_2_1_id) ){
                						$dam_3_2 = get_field('matka_dam' , $sire_2_1_id);
                						if($dam_3_2){
                							$get_dam_3_2 = getDogByID($dam_3_2);
                							if ( $get_dam_3_2->have_posts() ) {
												
												$dog = $get_dam_3_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_3_2_id = $dog->ID;

												// To array - pokolenie 3
												$sire_pedigree_arr[3][2] = $dam_3_2_id ;

												$dog_color = get_post_meta( $dam_3_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.3 -->
                					<?php 
                					if( isset($dam_2_2_id) ){
                						$sire_3_3 = get_field('ojciec_sire' , $dam_2_2_id);
                						if($sire_3_3){
                							$get_sire_3_3 = getDogByID($sire_3_3);
                							if ( $get_sire_3_3->have_posts() ) {
												
												$dog = $get_sire_3_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_3_3_id = $dog->ID;

												// To array - pokolenie 3
												$sire_pedigree_arr[3][3] = $sire_3_3_id ;

												$dog_color = get_post_meta( $sire_3_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                					
                				</div>
                				<div class="dog-cell dog-cell-3">
                					<!-- 3.4 -->
                					<?php 
                					if( isset($dam_2_2_id) ){
                						$dam_3_4 = get_field('matka_dam' , $dam_2_2_id);
                						if($dam_3_4){
                							$get_dam_3_4 = getDogByID($dam_3_4);
                							if ( $get_dam_3_4->have_posts() ) {
												
												$dog = $get_dam_3_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_3_4_id = $dog->ID;

												// To array - pokolenie 3
												$sire_pedigree_arr[3][4] = $dam_3_4_id ;


												$dog_color = get_post_meta( $dam_3_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 4 -->
                			<td>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.1 -->
                					<?php 
                					if( isset($sire_3_1_id) ){
                						$sire_4_1 = get_field('ojciec_sire' , $sire_3_1_id);
                						if($sire_4_1){
                							$get_sire_4_1 = getDogByID($sire_4_1);
                							if ( $get_sire_4_1->have_posts() ) {
												
												$dog = $get_sire_4_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_1_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][1] = $sire_4_1_id ;

												$dog_color = get_post_meta( $sire_4_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.2 -->
                					<?php 
                					if( isset($sire_3_1_id) ){
                						$dam_4_2 = get_field('matka_dam' , $sire_3_1_id);
                						if($dam_4_2){
                							$get_dam_4_2 = getDogByID($dam_4_2);
                							if ( $get_dam_4_2->have_posts() ) {
												
												$dog = $get_dam_4_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_2_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][2] = $dam_4_2_id ;

												$dog_color = get_post_meta( $dam_4_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.3 -->
                					<?php 
                					if( isset($dam_3_2_id) ){
                						$sire_4_3 = get_field('ojciec_sire' , $dam_3_2_id);
                						if($sire_4_3){
                							$get_sire_4_3 = getDogByID($sire_4_3);
                							if ( $get_sire_4_3->have_posts() ) {
												
												$dog = $get_sire_4_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_3_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][3] = $sire_4_3_id ;

												$dog_color = get_post_meta( $sire_4_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.4 -->
                					<?php 
                					if( isset($dam_3_2_id) ){
                						$dam_4_4 = get_field('matka_dam' , $dam_3_2_id);
                						if($dam_4_4){
                							$get_dam_4_4 = getDogByID($dam_4_4);
                							if ( $get_dam_4_4->have_posts() ) {
												
												$dog = $get_dam_4_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_4_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][4] = $dam_4_4_id ;

												$dog_color = get_post_meta( $dam_4_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.5 -->
                					<?php 
                					if( isset($sire_3_3_id) ){
                						$sire_4_5 = get_field('ojciec_sire' , $sire_3_3_id);
                						if($sire_4_5){
                							$get_sire_4_5 = getDogByID($sire_4_5);
                							if ( $get_sire_4_5->have_posts() ) {
												
												$dog = $get_sire_4_5->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_5_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][5] = $sire_4_5_id ;

												$dog_color = get_post_meta( $sire_4_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.6 -->
                					<?php 
                					if( isset($sire_3_3_id) ){
                						$dam_4_6 = get_field('matka_dam' , $sire_3_3_id);
                						if($dam_4_6){
                							$get_dam_4_6 = getDogByID($dam_4_6);
                							if ( $get_dam_4_6->have_posts() ) {
												
												$dog = $get_dam_4_6->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_6_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][6] = $dam_4_6_id ;

												$dog_color = get_post_meta( $dam_4_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.7 -->
                					<?php 
                					if( isset($dam_3_4_id) ){
                						$sire_4_7 = get_field('ojciec_sire' , $dam_3_4_id);
                						if($sire_4_7){
                							$get_sire_4_7 = getDogByID($sire_4_7);
                							if ( $get_sire_4_7->have_posts() ) {
												
												$dog = $get_sire_4_7->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_4_7_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][7] = $sire_4_7_id ;

												$dog_color = get_post_meta( $sire_4_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-4">
                					<!-- 4.8 -->
                					<?php 
                					if( isset($dam_3_4_id) ){
                						$dam_4_8 = get_field('matka_dam' , $dam_3_4_id);
                						if($dam_4_8){
                							$get_dam_4_8 = getDogByID($dam_4_8);
                							if ( $get_dam_4_8->have_posts() ) {
												
												$dog = $get_dam_4_8->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_4_8_id = $dog->ID;

												// To array - pokolenie 4
												$sire_pedigree_arr[4][8] = $dam_4_8_id ;

												$dog_color = get_post_meta( $dam_4_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<p class="undefined-label">NN</p>
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                			<!-- col 5 -->
                			<td>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.1 -->
                					<?php 
                					if( isset($sire_4_1_id) ){
                						$sire_5_1 = get_field('ojciec_sire' , $sire_4_1_id);
                						if($sire_5_1){
                							$get_sire_5_1 = getDogByID($sire_5_1);
                							if ( $get_sire_5_1->have_posts() ) {
												
												$dog = $get_sire_5_1->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_1_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][1] = $sire_5_1_id ;

												$dog_color = get_post_meta( $sire_5_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<p class="undefined-label">NN</p>
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.2 -->
                					<?php 
                					if( isset($sire_4_1_id) ){
                						$dam_5_2 = get_field('matka_dam' , $sire_4_1_id);
                						if($dam_5_2){
                							$get_dam_5_2 = getDogByID($dam_5_2);
                							if ( $get_dam_5_2->have_posts() ) {
												
												$dog = $get_dam_5_2->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_2_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][2] = $dam_5_2_id ;

												$dog_color = get_post_meta( $dam_5_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.3 -->
                					<?php 
                					if( isset($dam_4_2_id) ){
                						$sire_5_3 = get_field('ojciec_sire' , $dam_4_2_id);
                						if($sire_5_3){
                							$get_sire_5_3 = getDogByID($sire_5_3);
                							if ( $get_sire_5_3->have_posts() ) {
												
												$dog = $get_sire_5_3->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_3_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][3] = $sire_5_3_id ;


												$dog_color = get_post_meta( $sire_5_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.4 -->
                					<?php 
                					if( isset($dam_4_2_id) ){
                						$dam_5_4 = get_field('matka_dam' , $dam_4_2_id);
                						if($dam_5_4){
                							$get_dam_5_4 = getDogByID($dam_5_4);
                							if ( $get_dam_5_4->have_posts() ) {
												
												$dog = $get_dam_5_4->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_4_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][4] = $dam_5_4_id ;

												$dog_color = get_post_meta( $dam_5_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.5 -->
                					<?php 
                					if( isset($sire_4_3_id) ){
                						$sire_5_5 = get_field('ojciec_sire' , $sire_4_3_id);
                						if($sire_5_5){
                							$get_sire_5_5 = getDogByID($sire_5_5);
                							if ( $get_sire_5_5->have_posts() ) {
												
												$dog = $get_sire_5_5->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_5_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][5] = $sire_5_5_id ;

												$dog_color = get_post_meta( $sire_5_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.6 -->
                					<?php 
                					if( isset($sire_4_3_id) ){
                						$dam_5_6 = get_field('matka_dam' , $sire_4_3_id);
                						if($dam_5_6){
                							$get_dam_5_6 = getDogByID($dam_5_6);
                							if ( $get_dam_5_6->have_posts() ) {
												
												$dog = $get_dam_5_6->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_6_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][6] = $dam_5_6_id ;

												$dog_color = get_post_meta( $dam_5_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.7 -->
                					<?php 
                					if( isset($dam_4_4_id) ){
                						$sire_5_7 = get_field('ojciec_sire' , $dam_4_4_id);
                						if($sire_5_7){
                							$get_sire_5_7 = getDogByID($sire_5_7);
                							if ( $get_sire_5_7->have_posts() ) {
												
												$dog = $get_sire_5_7->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_7_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][7] = $sire_5_7_id ;

												$dog_color = get_post_meta( $sire_5_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.8 -->
                					<?php 
                					if( isset($dam_4_4_id) ){
                						$dam_5_8 = get_field('matka_dam' , $dam_4_4_id);
                						if($dam_5_8){
                							$get_dam_5_8 = getDogByID($dam_5_8);
                							if ( $get_dam_5_8->have_posts() ) {
												
												$dog = $get_dam_5_8->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_8_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][8] = $dam_5_8_id ;

												$dog_color = get_post_meta( $dam_5_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.9 -->
                					<?php 
                					if( isset($sire_4_5_id) ){
                						$sire_5_9 = get_field('ojciec_sire' , $sire_4_5_id);
                						if($sire_5_9){
                							$get_sire_5_9 = getDogByID($sire_5_9);
                							if ( $get_sire_5_9->have_posts() ) {
												
												$dog = $get_sire_5_9->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_9_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][9] = $sire_5_9_id ;

												$dog_color = get_post_meta( $sire_5_9_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.10 -->
                					<?php 
                					if( isset($sire_4_5_id) ){
                						$dam_5_10 = get_field('matka_dam' , $sire_4_5_id);
                						if($dam_5_10){
                							$get_dam_5_10 = getDogByID($dam_5_10);
                							if ( $get_dam_5_10->have_posts() ) {
												
												$dog = $get_dam_5_10->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_10_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][10] = $dam_5_10_id ;

												$dog_color = get_post_meta( $dam_5_10_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.11 -->
                					<?php 
                					if( isset($dam_4_6_id) ){
                						$sire_5_11 = get_field('ojciec_sire' , $dam_4_6_id);
                						if($sire_5_11){
                							$get_sire_5_11 = getDogByID($sire_5_11);
                							if ( $get_sire_5_11->have_posts() ) {
												
												$dog = $get_sire_5_11->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_11_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][11] = $sire_5_11_id ;

												$dog_color = get_post_meta( $sire_5_11_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.12 -->
                					<?php 
                					if( isset($dam_4_6_id) ){
                						$dam_5_12 = get_field('matka_dam' , $dam_4_6_id);
                						if($dam_5_12){
                							$get_dam_5_12 = getDogByID($dam_5_12);
                							if ( $get_dam_5_12->have_posts() ) {
												
												$dog = $get_dam_5_12->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_12_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][12] = $dam_5_12_id ;

												$dog_color = get_post_meta( $dam_5_12_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.13 -->
                					<?php 
                					if( isset($sire_4_7_id) ){
                						$sire_5_13 = get_field('ojciec_sire' , $sire_4_7_id);
                						if($sire_5_13){
                							$get_sire_5_13 = getDogByID($sire_5_13);
                							if ( $get_sire_5_13->have_posts() ) {
												
												$dog = $get_sire_5_13->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_13_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][13] = $sire_5_13_id ;

												$dog_color = get_post_meta( $sire_5_13_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>

                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.14 -->
                					<?php 
                					if( isset($sire_4_7_id) ){
                						$dam_5_14 = get_field('matka_dam' , $sire_4_7_id);
                						if($dam_5_14){
                							$get_dam_5_14 = getDogByID($dam_5_14);
                							if ( $get_dam_5_14->have_posts() ) {
												
												$dog = $get_dam_5_14->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_14_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][14] = $dam_5_14_id ;

												$dog_color = get_post_meta( $dam_5_14_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.15 -->
                					<?php 
                					if( isset($dam_4_8_id) ){
                						$sire_5_15 = get_field('ojciec_sire' , $dam_4_8_id);
                						if($sire_5_15){
                							$get_sire_5_15 = getDogByID($sire_5_15);
                							if ( $get_sire_5_15->have_posts() ) {
												
												$dog = $get_sire_5_15->posts[0];
												$permalink = get_permalink($dog->ID);
												$sire_5_15_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][15] = $sire_5_15_id ;

												$dog_color = get_post_meta( $sire_5_15_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                				<div class="dog-cell dog-cell-5">
                					<!-- 5.16 -->
                					<?php 
                					if( isset($dam_4_8_id) ){
                						$dam_5_16 = get_field('matka_dam' , $dam_4_8_id);
                						if($dam_5_16){
                							$get_dam_5_16 = getDogByID($dam_5_16);
                							if ( $get_dam_5_16->have_posts() ) {
												
												$dog = $get_dam_5_16->posts[0];
												$permalink = get_permalink($dog->ID);
												$dam_5_16_id = $dog->ID;

												// To array - pokolenie 5
												$sire_pedigree_arr[5][16] = $dam_5_16_id ;

												$dog_color = get_post_meta( $dam_5_16_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dog->ID.' " style="background:'.$dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$permalink.'">'.$dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
                    								<!-- <p class="undefined-label">NN</p> -->
                    								<a href="<?php echo $c_parent_url ?>?child_id=<?php echo $dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                    							</div>
											<?php }
                						}else{ ?>
                							<div class="undefined-cell-inner">
                								<!-- <p class="undefined-label">NN</p> -->
                								<a href="<?php echo $c_parent_url ?>/?child_id=<?php echo $dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
                							</div>
                							
                						<?php }
                					}else{
                						echo '<div class="undefined-q-mark">';
                						echo '<p>NN</p>';
                						echo '</div>';
                					}
        
                					?>
                				</div>
                			</td>
                		</tr>
                	</table>
            	
            	</div>
        	</div>
		</div>
		<!-- Sire pedigree end -->

		<?php include get_template_directory().'/template-parts/vp-dam-pedigree.php' ?>

		<div class="inbreed-val">
			<?php 
			// echo '<pre>';
			// print_r($dam_pedigree_arr);
			// echo '</pre>';

			// echo '<br><br>';
			// echo '<pre>';
			// print_r($sire_pedigree_arr);
			// echo '</pre>';
			?>

			
			<div id="inbread-value-dynamic" class="pt-5 pb-4">
				<?php 
				$common_ancestors = array_intersect_key($dam_pedigree_arr, $sire_pedigree_arr);
				$inbreeding_coefficient = 0;

				foreach ($common_ancestors as $generation => $ancestors) {
				    foreach ($ancestors as $ancestor) {
				        $n_i = $generation;
				        $m_i = $generation;
				        $inbreeding_coefficient += 0.5 ** ($n_i + $m_i);
				    }
				}

				$final_inbreeding_coefficient = 0.5 * $inbreeding_coefficient;
				$rounded_inbreeding_coefficient = round($final_inbreeding_coefficient, 3);

				echo "<h5>Inbreeding coefficient: <span>". $rounded_inbreeding_coefficient."</span></h5>" ;
				?>
			</div>
		</div>


		
	</div>
</main><!-- #main -->

<script type="text/javascript">
    jQuery(document).ready(function($) {
     	// Pobranie wszystkich elementów div o klasie 'dog-cell-inner'
		const elements = document.querySelectorAll('div.dog-cell-inner');

		// Tworzenie obiektu do przechowywania liczby wystąpień danej klasy
		const classCount = {};

		// Liczenie wystąpień klas
		elements.forEach(element => {
		  const classes = element.classList;

		  // Pobranie klasy zaczynającej się od 'dog-color'
		  const colorClass = Array.from(classes).find(cls => cls.startsWith('dog-color'));

		  if (colorClass) {
		    // Inkrementacja liczby wystąpień danej klasy
		    classCount[colorClass] = (classCount[colorClass] || 0) + 1;
		  }
		});

		// Usunięcie atrybutu 'style' z elementów, których klasy się nie powtarzają
		elements.forEach(element => {
		  const classes = element.classList;

		  // Pobranie klasy zaczynającej się od 'dog-color'
		  const colorClass = Array.from(classes).find(cls => cls.startsWith('dog-color'));

		  if (colorClass && classCount[colorClass] === 1) {
		    // Usunięcie atrybutu 'style'
		    element.removeAttribute('style');
		  }
		});

    })
    
</script>

<?php get_footer(); ?>