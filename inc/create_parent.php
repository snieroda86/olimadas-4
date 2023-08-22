<?php 

// Existing parent
if(isset($_POST['create_ex_parent'])){

	$ex_errors = [];

	if(isset($_POST['ex_sex'])){

		if($_POST['ex_sex']=='male'){
			$sireName = sanitize_text_field($_POST['ex_sire_name']) ;

			if(!empty($sireName)){
				// Check if sire exists
				$check_sire_ex = getDogByTitleSN($sireName);
				if($check_sire_ex->have_posts()){
					$check_sire_ex->the_post();
					$ex_sire_name = get_the_title();
                	if(!empty($ex_sire_name)){
                		update_field('ojciec_sire', $ex_sire_name , $_GET['child_id']);
                		wp_reset_postdata();
                		$child_url = get_permalink($_GET['child_id']);
                		wp_redirect($child_url);
                	}
					

				}else{
					// Create new sire
					$new_sire = array(
                        'post_title' => $sireName,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_sire_id = wp_insert_post($new_sire);
                    update_field('ojciec_sire', $sireName , $_GET['child_id']);
                    $child_url = get_permalink($_GET['child_id']);
                	wp_redirect($child_url);
				}	
			}else{
				$ex_errors[] = 'Sire name cannot be empty'; 
			}
			
			

		}

		if($_POST['ex_sex']=='female'){
			$damName = sanitize_text_field($_POST['ex_dam_name']);

			if(!empty($damName)){
				// Check if dam exists
				$check_dam_ex = getDogByTitleSN($damName);
				if($check_dam_ex->have_posts()){
					$check_dam_ex->the_post();
					$ex_dam_name = get_the_title();
					if(!empty($ex_dam_name)){
                		update_field('matka_dam', $ex_dam_name , $_GET['child_id']);
                		wp_reset_postdata();
                		$child_url = get_permalink($_GET['child_id']);
                		wp_redirect($child_url);
                	}
					
				}else{
					// Create new dam
					$new_dam = array(
                        'post_title' => $damName,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_dam_id = wp_insert_post($new_dam);
                    update_field('matka_dam', $damName , $_GET['child_id']);
                    $child_url = get_permalink($_GET['child_id']);
                	wp_redirect($child_url);

				}	
			}else{
				$ex_errors[] = 'Dam name cannot be empty'; 
			}
			
	
		}
	}

}

// New parent

// Validation start
            
$post_title = '';
$gender = '';
$wlasciciel = '';
$owner_country = '';
$hodowca = '';
$breeder_country = '';
$ojciec_sire = '';
$matka_dam = '';
$data_urodzenia = '';
$tytuly = '';

if(isset($_POST['insert_rodowod_psa'])){
    $post_title = $_POST['post_title'];
    $gender = $_POST['gender'];
    $wlasciciel = $_POST['wlasciciel'];
    $owner_country = $_POST['owner_country'];
    $hodowca = $_POST['hodowca'];
    $breeder_country = $_POST['breeder_country'];
    $ojciec_sire = $_POST['ojciec_sire'];
    $matka_dam = $_POST['matka_dam'];
    $data_urodzenia = $_POST['data_urodzenia'];
    $tytuly = $_POST['tytuly'];
    $p_image = $_FILES['dog_photo'];

    // Validation
    $validation_errors = [];
    if(empty($post_title)){
        $validation_errors[] = 'Dog name field is required';
    }

    if(empty($gender)){
        $validation_errors[] = 'Gender field is required';
    }
    if(empty($wlasciciel)){
        $validation_errors[] = 'Owner name field is required';
    }
    if(empty($owner_country)){
        $validation_errors[] = 'Owner country field is required';
    }

    if(empty($hodowca)){
        $validation_errors[] = 'Breeder name field is required';
    }

    if(empty($breeder_country)){
        $validation_errors[] = 'Breeder country field is required';
    }

    if(empty($ojciec_sire)){
        $validation_errors[] = 'Sire field is required';
    }

    if(empty($matka_dam)){
        $validation_errors[] = 'Dam field is required';
    }
    if(empty($data_urodzenia)){
        $validation_errors[] = 'Birth date field is required';
    }
	
		    // Image upload
    if (isset($_FILES['dog_photo']) && !empty($_FILES['dog_photo']['name'])) {
        // Check image size
        $image_size = $p_image['size'] / 1024; // Rozmiar w kilobajtach
        if ($image_size > 300) {
            $validation_errors[] = 'Error: photo size cannot exceed 300kb';
            return;
        }

        // Chcek image type
        $image_type = strtolower(pathinfo($p_image['name'], PATHINFO_EXTENSION));
        if (!in_array($image_type, array('jpg', 'jpeg', 'png', 'gif'))) {
            $validation_errors[] = "Error: wrong image type ( allowed types: 'jpg', 'jpeg', 'png')";
            return;
        }
    }

    // Chceck errors
    $validation_check = false;
    if(!empty($validation_errors) && count($validation_errors) > 0){
        $validation_check = false;
    }else{
        $validation_check = true;
    }

    if($validation_check === true){
        // Insert post

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
            'post_status' => 'publish',
            'post_type' => 'rodowody_psow',
        );

        $existing_post = get_page_by_title($post_title, OBJECT, 'rodowody_psow');
        if ($existing_post) {
            $validation_errors[] = 'Dog name already exists!';
            return;
        }else{

            $post_id = wp_insert_post($new_post);

            if ($post_id) {
                add_post_meta($post_id, 'dog_color', $color);

                // ACF fileds
                update_field('wlasciciel', $wlasciciel , $post_id);
                update_field('plec_psa', $gender , $post_id);
                update_field('owner_country', $owner_country , $post_id);
                update_field('hodowca', $hodowca , $post_id);
                update_field('breeder_country', $breeder_country , $post_id);
                update_field('ojciec_sire', $ojciec_sire , $post_id);
                update_field('matka_dam', $matka_dam , $post_id);
                update_field('data_urodzenia', $data_urodzenia , $post_id);
                update_field('tytuly', $tytuly , $post_id);

                /*
                ** Upload image
                */ 

                if (isset($_FILES['dog_photo']) && !empty($_FILES['dog_photo']['name'])) {
                   
                    $upload_dir = wp_upload_dir();
                    $file = $upload_dir['path'] . '/' . $p_image['name'];
                    move_uploaded_file( $p_image['tmp_name'], $file );
                    $wp_filetype = wp_check_filetype( basename( $file ), null );
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $file ) ),
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
                }

                // Create new dog card if not exists in db
                // Sire 
                $checkSireExists = getDogByTitleSN($ojciec_sire);
                if ( !$checkSireExists->have_posts()) {
                    // Create dog empty card
                    $new_sire = array(
                        'post_title' => $ojciec_sire,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_sire_id = wp_insert_post($new_sire);
                    update_field('plec_psa', 'male' , $new_sire_id);

                }

                // Dam
                $checkDamExists = getDogByTitleSN($matka_dam);
                if ( !$checkDamExists->have_posts()) {
                    // Create dog empty card
                    $new_dam = array(
                        'post_title' => $matka_dam,
                        'post_status' => 'publish',
                        'post_type' => 'rodowody_psow',
                    );

                    $new_dam_id = wp_insert_post($new_dam);
                    update_field('plec_psa', 'female' , $new_dam_id);

                }
				
				// Create parent
				if($_GET['sex']=='male'){
					 update_field('ojciec_sire', $post_title , intval($_GET['child_id']));
				} 
				
				if($_GET['sex']=='female'){
					 update_field('matka_dam', $post_title , intval($_GET['child_id']));
				}
								

                // Redirect
                $redirect_url = get_permalink( $_GET['child_id']);
                if ( wp_redirect( $redirect_url ) ) {
                    exit;
                }


            } else {
                $validation_errors[] = "The dog's contact card has not been created";
                return;
            }
        }

    }

}
