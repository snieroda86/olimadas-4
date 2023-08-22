<?php 
// Customize login  page

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
	        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/uploads/logo_olimadas_long.png);
			height: 209;
			width:320px;
			background-size: 320px 209px;
			background-repeat: no-repeat;
			background-position: center;
        	padding-bottom: 30px;

        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Hide admin bar
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

// redirect after login
function example_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for admins
        if ( in_array( 'administrator', $user->roles ) ) {
            // redirect Admins to WP Admin
            return home_url('wp-admin');
        } else {
            // redirect everyone else to the home page
            return home_url();
        }
    } else {
        return home_url();
    }
}
add_filter( 'login_redirect', 'example_login_redirect', 10, 3 );

// Logo link
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url($url) {
    return home_url();
}
