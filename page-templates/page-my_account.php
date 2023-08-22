<?php 
// Template Name: Moje konto

if(!is_user_logged_in()){
	wp_redirect(wp_login_url());
	exit;
}

include get_template_directory().'/inc/update_user_account.php'; 

get_header(); ?>



<main id="primary" class="site-main">
	<?php  get_template_part( 'template-parts/page', 'header' ); ?>
	<div class="container-lg page-container-sn">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
		<div class="row" style="min-height: 80vh;">
			<div class="col-md-4 order-md-1 order-2">
				<!-- Table buttons -->
                  <div class="table-buttons-sn">
                  	<!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php the_permalink(77); ?>?user_action=user_profile" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Dashboard
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php the_permalink(19); ?>" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-solid fa-plus"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Add dog
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php echo get_post_type_archive_link('rodowody_psow'); ?>" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-solid fa-list"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Dogs list
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                    <!-- Menu item -->
                    <div class="table-button-item d-flex">
                      <a href="<?php echo get_permalink(77) ?>?user_action=edit_account" class="d-flex">
                        <div class="table-button-icon">
                          <i class="fa-regular fa-pen-to-square"></i>
                        </div>
                        <div class="table-button-label btn-gold">
                          Edit account
                        </div>
                      </a>
                    </div>
                    <!-- Menu item end -->
                  </div>
                  
			</div>
			<div class="col-md-8 order-md-2 order-1">
				<?php 
				$current_user = wp_get_current_user();
				$user_action = get_query_var('user_action');

				?>
				<h4 class="pb-3"><?php printf( __( 'Welcome %s', 'web14devsn' ), esc_html( $current_user->user_login ) ); ?>!</h4>
				<p>You are logged in. You can now create and edit pedigrees, add new dogs and edit their details. Enjoy!</p>

				<?php  
				
				    if($user_action !== 'edit_account'){ ?>
				    	
				    	<table class="table thead-dark-sn table-bordered mt-3 mb-3 ">
				    		<tr>
				    			<th><?php _e('User email:', 'web14devsn'); ?></th><td><?php echo esc_html( $current_user->user_email );  ?></td>
				    		</tr>
				    		<tr>
				    			<th><?php _e('First name:', 'web14devsn'); ?></th><td><?php echo esc_html( $current_user->user_firstname );  ?></td>
				    		</tr>
				    		<tr>
				    			<th><?php _e('Last name:', 'web14devsn'); ?></th><td><?php echo esc_html( $current_user->user_lastname );  ?></td>
				    		</tr>
				    	</table>
				    <?php }
				
				?>

				<!-- Edit accounbt form -->
				<?php 
				$user_action = get_query_var('user_action');
				if (!empty($user_action)) { 
				    if($user_action == 'edit_account'){ ?>
				    	<div class="edit-account-form-sn pt-3 pb-3">
				    		<?php 
				            // Validation errors
				            if(!empty($validation_errors) && count($validation_errors) > 0){ ?>
				                <ul class="errors-list list-style-none mt-4 list-group"> 
				                    <?php 
				                    foreach ($validation_errors as $error) { ?>
				                        <li><div class="alert alert-danger" role="alert"><?php echo $error;  ?></div></li>
				                    <?php }
				                    ?>
				                </ul>
				            <?php } ?>
				    		<h4><?php _e('User details' , 'web14devsn'); ?></h4>
				    		<form method="post" action="" class="one-line-border-form">
				    			
							  <div class="form-group">
							    <label>Email</label>
							    <input type="email" name="user_email"   value="<?php echo esc_html( $current_user->user_email )?>" class="form-control" id="userEmail" placeholder="Enter email" required>							    
							  </div>
							  <div class="form-group">
							    <label>First name</label>
							    <input type="text" name="user_firstname" value="<?php echo esc_html( $current_user->user_firstname )?>" class="form-control" id="userFirstname" placeholder="Enter firstname">							    
							  </div>
							  <div class="form-group">
							    <label>Last name</label>
							    <input type="text" name="user_lastname" value="<?php echo esc_html( $current_user->user_lastname )?>" class="form-control" id="userFirstname" placeholder="Enter lastname">							    
							  </div>
							  <div class="form-group">
							    <label >Password</label>
							    <input type="password" name="user_password" class="form-control" placeholder="Password">
							  </div>
							  <div class="form-group">
							    <label >Confirm password</label>
							    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
							  </div>
							
							  <button type="submit" class="btn-main-sn btn-red b-none" name="update_user">Update user</button>
							</form>
				    		
						</div>
				    <?php }
				}

				?>
				
			</div>

		</div>
	</div>
</main><!-- #main -->

<?php get_footer(); ?>