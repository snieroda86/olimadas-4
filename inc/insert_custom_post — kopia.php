<?php 
// Insert post ( rodowody_psow ) into database

function save_rodowody_psow_from_front_end() {
    if (isset($_POST['insert_rodowod_psa'])) { 

        if( $_POST['validation_check'] == 'false'){
            die('Walidacja nie przeszła');
        }

        $post_title = sanitize_text_field($_POST['post_title']);
        $post_title = sanitize_text_field($_POST['post_title']);
        $post_title = sanitize_text_field($_POST['post_title']);
        $post_title = sanitize_text_field($_POST['post_title']);
        $post_title = sanitize_text_field($_POST['post_title']);

        

		global $wpdb;
        $table_name = $wpdb->prefix . 'dog_colors';

        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'");

        if ($table_exists === $table_name) {
        	$query = "SELECT color_code FROM $table_name ORDER BY RAND() LIMIT 1";
            $color = $wpdb->get_var($query);

            if (empty($color)) { 
            	$color = '#ffffff';
            }
                

        }else{
        	$color = '#ffffff';
        }

        $new_post = array(
            'post_title' => $post_title,
            'post_content' => 'Zawartość psa z frontu',
            'post_status' => 'publish',
            'post_type' => 'rodowody_psow',
        );

        $existing_post = get_page_by_title($post_title, OBJECT, 'rodowody_psow');
	    if ($existing_post) {
	        die('Post o takiej nazwie juz istnieje');
	    }else{

	    	$post_id = wp_insert_post($new_post);

	        if ($post_id) {
	            add_post_meta($post_id, 'dog_color', $color);

	            // ACF fileds
	            update_field('wlasciciel', 'Własciciel z frontu', $post_id);
	        } else {
	            die('Nie udało się wstawić');
	        }
	    }


    }
}

// Rejestracja hooka
add_action('template_redirect', 'save_rodowody_psow_from_front_end');