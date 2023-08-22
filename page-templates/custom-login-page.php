<?php
/**
* Template Name: Strona logowania
*/
get_header(); ?>

<div class="login-errors-sn">
	<?php 
	$err_codes = isset( $_SESSION["err_codes"] )? $_SESSION["err_codes"] : 0;
    if( $err_codes !== 0 ){
	        echo display_error_message(  $err_codes );
	}
	function display_error_message( $err_code ){
	    // Invalid username.
	    if ( in_array( 'invalid_username', $err_code ) ) {
	        $error = '<strong>ERROR</strong>: Invalid username.';
	    }
	    // Incorrect password.
	    if ( in_array( 'incorrect_password', $err_code ) ) {
	        $error = '<strong>ERROR</strong>: The password you entered is incorrect.';
	    }
	    // Empty username.
	    if ( in_array( 'empty_username', $err_code ) ) {
	        $error = '<strong>ERROR</strong>: The username field is empty.';
	    }
	    // Empty password.
	    if ( in_array( 'empty_password', $err_code ) ) {
	        $error = '<strong>ERROR</strong>: The password field is empty.';
	    }
	    // Empty username and empty password.
	    if( in_array( 'empty_username', $err_code )  &&  in_array( 'empty_password', $err_code )){
	        $error = '<strong>ERROR</strong>: The username and password are empty.';
	    }
		return $error;
	}
	?>
</div>
<?php
if ( ! is_user_logged_in() ) {
    $args = array(
        'redirect' => admin_url(), // redirect to admin dashboard.
        'form_id' => 'custom_loginform_sn',
        'label_username' => __( 'Username:' , 'web14devsn' ),
        'label_password' => __( 'Password:' , 'web14devsn' ),
        'label_remember' => __( 'Remember Me' , 'web14devsn'),
        'label_log_in' => __( 'Log Me In' , 'web14devsn'),
         'remember' => true
    );
	wp_login_form( $args ); ?>

	<div class="register-form-link">
		<a href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( "Don't have account yet?", 'web14devsn' ); ?></a>
	</div>

	<?php 
}
get_footer();