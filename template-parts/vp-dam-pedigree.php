		<!-- Dam pedigree -->
		<div class="row">
			<div class="col-12">

				<div class="pedigree-table">

					<?php $dam_c_parent_url = &$c_parent_url; ?>
					
			    	<table class="table-bordered">
			    		<tr>
			    			<!-- col 1 -->
			    			<td>
			    				<div class="dog-cell dog-cell-1">
			    					<!-- Sire 1 -->

			    					<?php 
			    						$dam_sire_1 = &$dam_vp_name;
			    						if($dam_sire_1){
			    							$dam_get_sire_1 = getDogByTitleSN($dam_sire_1);
			    							if ( $dam_get_sire_1->have_posts() ) {
												
												$dam_dog = $dam_get_sire_1->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_1_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo get_the_ID() ?>&sex=female"><?php _e('Create dam' , 'web14devsn'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo get_the_ID(); ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_1_id) ){
			    						$dam_sire_2_1 = get_field('ojciec_sire' , $dam_sire_1_id);
			    						if($dam_sire_2_1){
			    							$dam_get_sire_2_1 = getDogByTitleSN($dam_sire_2_1);
			    							if ( $dam_get_sire_2_1->have_posts() ) {
												
												$dam_dog = $dam_get_sire_2_1->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_2_1_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_2_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_1_id) ){
			    						$dam_dam_2_2 = get_field('matka_dam' , $dam_sire_1_id);
			    						if($dam_dam_2_2){
			    							$dam_get_dam_2_2 = getDogByTitleSN($dam_dam_2_2);
			    							if ( $dam_get_dam_2_2->have_posts() ) {
												
												$dam_dog = $dam_get_dam_2_2->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_2_2_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_2_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_2_1_id) ){
			    						$dam_sire_3_1 = get_field('ojciec_sire' , $dam_sire_2_1_id);
			    						if($dam_sire_3_1){
			    							$dam_get_sire_3_1 = getDogByTitleSN($dam_sire_3_1);
			    							if ( $dam_get_sire_3_1->have_posts() ) {
												
												$dam_dog = $dam_get_sire_3_1->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_3_1_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_3_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_2_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_2_1_id) ){
			    						$dam_dam_3_2 = get_field('matka_dam' , $dam_sire_2_1_id);
			    						if($dam_dam_3_2){
			    							$dam_get_dam_3_2 = getDogByTitleSN($dam_dam_3_2);
			    							if ( $dam_get_dam_3_2->have_posts() ) {
												
												$dam_dog = $dam_get_dam_3_2->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_3_2_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_3_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_2_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_2_2_id) ){
			    						$dam_sire_3_3 = get_field('ojciec_sire' , $dam_dam_2_2_id);
			    						if($dam_sire_3_3){
			    							$dam_get_sire_3_3 = getDogByTitleSN($dam_sire_3_3);
			    							if ( $dam_get_sire_3_3->have_posts() ) {
												
												$dam_dog = $dam_get_sire_3_3->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_3_3_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_3_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_2_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_2_2_id) ){
			    						$dam_dam_3_4 = get_field('matka_dam' , $dam_dam_2_2_id);
			    						if($dam_dam_3_4){
			    							$dam_get_dam_3_4 = getDogByTitleSN($dam_dam_3_4);
			    							if ( $dam_get_dam_3_4->have_posts() ) {
												
												$dam_dog = $dam_get_dam_3_4->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_3_4_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_3_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_2_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_3_1_id) ){
			    						$dam_sire_4_1 = get_field('ojciec_sire' , $dam_sire_3_1_id);
			    						if($dam_sire_4_1){
			    							$dam_get_sire_4_1 = getDogByTitleSN($dam_sire_4_1);
			    							if ( $dam_get_sire_4_1->have_posts() ) {
												
												$dam_dog = $dam_get_sire_4_1->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_4_1_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_4_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_3_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_3_1_id) ){
			    						$dam_dam_4_2 = get_field('matka_dam' , $dam_sire_3_1_id);
			    						if($dam_dam_4_2){
			    							$dam_get_dam_4_2 = getDogByTitleSN($dam_dam_4_2);
			    							if ( $dam_get_dam_4_2->have_posts() ) {
												
												$dam_dog = $dam_get_dam_4_2->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_4_2_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_4_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_3_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_3_2_id) ){
			    						$dam_sire_4_3 = get_field('ojciec_sire' , $dam_dam_3_2_id);
			    						if($dam_sire_4_3){
			    							$dam_get_sire_4_3 = getDogByTitleSN($dam_sire_4_3);
			    							if ( $dam_get_sire_4_3->have_posts() ) {
												
												$dam_dog = $dam_get_sire_4_3->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_4_3_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_4_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_3_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_3_2_id) ){
			    						$dam_dam_4_4 = get_field('matka_dam' , $dam_dam_3_2_id);
			    						if($dam_dam_4_4){
			    							$dam_get_dam_4_4 = getDogByTitleSN($dam_dam_4_4);
			    							if ( $dam_get_dam_4_4->have_posts() ) {
												
												$dam_dog = $dam_get_dam_4_4->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_4_4_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_4_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_3_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_3_3_id) ){
			    						$dam_sire_4_5 = get_field('ojciec_sire' , $dam_sire_3_3_id);
			    						if($dam_sire_4_5){
			    							$dam_get_sire_4_5 = getDogByTitleSN($dam_sire_4_5);
			    							if ( $dam_get_sire_4_5->have_posts() ) {
												
												$dam_dog = $dam_get_sire_4_5->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_4_5_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_4_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_3_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_3_3_id) ){
			    						$dam_dam_4_6 = get_field('matka_dam' , $dam_sire_3_3_id);
			    						if($dam_dam_4_6){
			    							$dam_get_dam_4_6 = getDogByTitleSN($dam_dam_4_6);
			    							if ( $dam_get_dam_4_6->have_posts() ) {
												
												$dam_dog = $dam_get_dam_4_6->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_4_6_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_4_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_3_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_3_4_id) ){
			    						$dam_sire_4_7 = get_field('ojciec_sire' , $dam_dam_3_4_id);
			    						if($dam_sire_4_7){
			    							$dam_get_sire_4_7 = getDogByTitleSN($dam_sire_4_7);
			    							if ( $dam_get_sire_4_7->have_posts() ) {
												
												$dam_dog = $dam_get_sire_4_7->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_4_7_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_4_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_3_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_3_4_id) ){
			    						$dam_dam_4_8 = get_field('matka_dam' , $dam_dam_3_4_id);
			    						if($dam_dam_4_8){
			    							$dam_get_dam_4_8 = getDogByTitleSN($dam_dam_4_8);
			    							if ( $dam_get_dam_4_8->have_posts() ) {
												
												$dam_dog = $dam_get_dam_4_8->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_4_8_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_4_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<p class="undefined-label">NN</p>
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_3_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_4_1_id) ){
			    						$dam_sire_5_1 = get_field('ojciec_sire' , $dam_sire_4_1_id);
			    						if($dam_sire_5_1){
			    							$dam_get_sire_5_1 = getDogByTitleSN($dam_sire_5_1);
			    							if ( $dam_get_sire_5_1->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_1->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_1_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_1_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<p class="undefined-label">NN</p>
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_1_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_4_1_id) ){
			    						$dam_dam_5_2 = get_field('matka_dam' , $dam_sire_4_1_id);
			    						if($dam_dam_5_2){
			    							$dam_get_dam_5_2 = getDogByTitleSN($dam_dam_5_2);
			    							if ( $dam_get_dam_5_2->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_2->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_2_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_2_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_1_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_4_2_id) ){
			    						$dam_sire_5_3 = get_field('ojciec_sire' , $dam_dam_4_2_id);
			    						if($dam_sire_5_3){
			    							$dam_get_sire_5_3 = getDogByTitleSN($dam_sire_5_3);
			    							if ( $dam_get_sire_5_3->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_3->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_3_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_3_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_2_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_4_2_id) ){
			    						$dam_dam_5_4 = get_field('matka_dam' , $dam_dam_4_2_id);
			    						if($dam_dam_5_4){
			    							$dam_get_dam_5_4 = getDogByTitleSN($dam_dam_5_4);
			    							if ( $dam_get_dam_5_4->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_4->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_4_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_4_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_2_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_4_3_id) ){
			    						$dam_sire_5_5 = get_field('ojciec_sire' , $dam_sire_4_3_id);
			    						if($dam_sire_5_5){
			    							$dam_get_sire_5_5 = getDogByTitleSN($dam_sire_5_5);
			    							if ( $dam_get_sire_5_5->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_5->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_5_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_5_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_3_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_4_3_id) ){
			    						$dam_dam_5_6 = get_field('matka_dam' , $dam_sire_4_3_id);
			    						if($dam_dam_5_6){
			    							$dam_get_dam_5_6 = getDogByTitleSN($dam_dam_5_6);
			    							if ( $dam_get_dam_5_6->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_6->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_6_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_6_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_3_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_4_4_id) ){
			    						$dam_sire_5_7 = get_field('ojciec_sire' , $dam_dam_4_4_id);
			    						if($dam_sire_5_7){
			    							$dam_get_sire_5_7 = getDogByTitleSN($dam_sire_5_7);
			    							if ( $dam_get_sire_5_7->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_7->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_7_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_7_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_4_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_4_4_id) ){
			    						$dam_dam_5_8 = get_field('matka_dam' , $dam_dam_4_4_id);
			    						if($dam_dam_5_8){
			    							$dam_get_dam_5_8 = getDogByTitleSN($dam_dam_5_8);
			    							if ( $dam_get_dam_5_8->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_8->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_8_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_8_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_4_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_4_5_id) ){
			    						$dam_sire_5_9 = get_field('ojciec_sire' , $dam_sire_4_5_id);
			    						if($dam_sire_5_9){
			    							$dam_get_sire_5_9 = getDogByTitleSN($dam_sire_5_9);
			    							if ( $dam_get_sire_5_9->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_9->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_9_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_9_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_5_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_4_5_id) ){
			    						$dam_dam_5_10 = get_field('matka_dam' , $dam_sire_4_5_id);
			    						if($dam_dam_5_10){
			    							$dam_get_dam_5_10 = getDogByTitleSN($dam_dam_5_10);
			    							if ( $dam_get_dam_5_10->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_10->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_10_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_10_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_5_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_4_6_id) ){
			    						$dam_sire_5_11 = get_field('ojciec_sire' , $dam_dam_4_6_id);
			    						if($dam_sire_5_11){
			    							$dam_get_sire_5_11 = getDogByTitleSN($dam_sire_5_11);
			    							if ( $dam_get_sire_5_11->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_11->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_11_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_11_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_6_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_4_6_id) ){
			    						$dam_dam_5_12 = get_field('matka_dam' , $dam_dam_4_6_id);
			    						if($dam_dam_5_12){
			    							$dam_get_dam_5_12 = getDogByTitleSN($dam_dam_5_12);
			    							if ( $dam_get_dam_5_12->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_12->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_12_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_12_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_6_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_sire_4_7_id) ){
			    						$dam_sire_5_13 = get_field('ojciec_sire' , $dam_sire_4_7_id);
			    						if($dam_sire_5_13){
			    							$dam_get_sire_5_13 = getDogByTitleSN($dam_sire_5_13);
			    							if ( $dam_get_sire_5_13->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_13->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_13_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_13_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_7_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_sire_4_7_id) ){
			    						$dam_dam_5_14 = get_field('matka_dam' , $dam_sire_4_7_id);
			    						if($dam_dam_5_14){
			    							$dam_get_dam_5_14 = getDogByTitleSN($dam_dam_5_14);
			    							if ( $dam_get_dam_5_14->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_14->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_14_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_14_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_sire_4_7_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
			    					if( isset($dam_dam_4_8_id) ){
			    						$dam_sire_5_15 = get_field('ojciec_sire' , $dam_dam_4_8_id);
			    						if($dam_sire_5_15){
			    							$dam_get_sire_5_15 = getDogByTitleSN($dam_sire_5_15);
			    							if ( $dam_get_sire_5_15->have_posts() ) {
												
												$dam_dog = $dam_get_sire_5_15->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_sire_5_15_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_sire_5_15_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_8_id ?>&sex=male"><?php _e('Create sire'); ?></a>	
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
			    					if( isset($dam_dam_4_8_id) ){
			    						$dam_dam_5_16 = get_field('matka_dam' , $dam_dam_4_8_id);
			    						if($dam_dam_5_16){
			    							$dam_get_dam_5_16 = getDogByTitleSN($dam_dam_5_16);
			    							if ( $dam_get_dam_5_16->have_posts() ) {
												
												$dam_dog = $dam_get_dam_5_16->posts[0];
												$dam_permalink = get_permalink($dam_dog->ID);
												$dam_dam_5_16_id = $dam_dog->ID;
												$dam_dog_color = get_post_meta( $dam_dam_5_16_id , 'dog_color' , true);
												echo '<div class="dog-cell-inner dog-color-'.$dam_dog->ID.' " style="background:'.$dam_dog_color.'">';
												echo '<div class="dog-cell-card">';
												echo '<a href="'.$dam_permalink.'">'.$dam_dog->post_title.'</a>';
												echo '</div>';
												echo '</div>';
												
											}else{ ?>
												<div class="undefined-cell-inner">
			        								<!-- <p class="undefined-label">NN</p> -->
			        								<a href="<?php echo $dam_c_parent_url ?>?child_id=<?php echo $dam_dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
			        							</div>
											<?php }
			    						}else{ ?>
			    							<div class="undefined-cell-inner">
			    								<!-- <p class="undefined-label">NN</p> -->
			    								<a href="<?php echo $dam_c_parent_url ?>/?child_id=<?php echo $dam_dam_4_8_id ?>&sex=female"><?php _e('Create dam'); ?></a>	
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
		<!-- Dam pedigree end -->