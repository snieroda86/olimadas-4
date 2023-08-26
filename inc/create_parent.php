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
					// $ex_sire_id = get_the_ID();
                    $ex_sire_id = get_the_ID();
                	if(!empty($ex_sire_id)){
                		update_field('ojciec_sire', $ex_sire_id , $_GET['child_id']);
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
                    update_field('ojciec_sire', $new_sire_id , $_GET['child_id']);
                    update_field('plec_psa', 'male' , $new_sire_id);

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
					$ex_dam_id = get_the_ID();
					if(!empty($ex_dam_id)){
                		update_field('matka_dam', $ex_dam_id , $_GET['child_id']);
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
                    update_field('matka_dam', $new_dam_id , $_GET['child_id']);
                    update_field('plec_psa', 'female' , $new_dam_id);

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

//  Sprawdzić dlaczego tworzy psa ale nie pzydziela go jako rodzica - chyba nie jest sprawdzane $_GET['sex'] male lub female

           
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

        $new_parent_args = array(
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_type' => 'rodowody_psow',
        );

        $existing_post = get_page_by_title($post_title, OBJECT, 'rodowody_psow');
        if ($existing_post) {
            $validation_errors[] = 'Dog name already exists!';
            return;
        }else{


            // Insert or create "Owner"
            $existing_wlasciciel = get_page_by_title($wlasciciel, OBJECT, 'hodowcy_psow');
            if(!$existing_wlasciciel){

               
                    $post_args = array(
                        'post_title'   => $wlasciciel,
                        'post_status'  => 'publish', // Status posta: opublikowany
                        'post_type'    => 'hodowcy_psow' // Nazwa custom post type
                        
                    );

                    $new_wlasciciel_id = wp_insert_post($post_args); 
                    update_field('narodowosc', $owner_country , $new_wlasciciel_id);  
                

               
            }else{
                $new_wlasciciel_id = $existing_wlasciciel->ID;
                update_field('narodowosc', $owner_country , $new_wlasciciel_id);  

            }



             // Insert or create "Breeder"
            $existing_hodowca = get_page_by_title($hodowca, OBJECT, 'hodowcy_psow');
            if(!$existing_hodowca){

               if($wlasciciel !==$hodowca){
                 $post_args = array(
                        'post_title'   => $hodowca,
                        'post_status'  => 'publish', // Status posta: opublikowany
                        'post_type'    => 'hodowcy_psow' // Nazwa custom post type
                        
                    );

                    $new_hodowca_id = wp_insert_post($post_args); 
                    update_field('narodowosc', $breeder_country , $new_hodowca_id);  
               }
               
            }else{
                $new_hodowca_id = $existing_hodowca->ID;
                update_field('narodowosc', $breeder_country , $new_hodowca_id);  

            }


            // Insert or create sire
             $existing_sire = get_page_by_title($ojciec_sire, OBJECT, 'rodowody_psow');
            if(!$existing_sire){

              
                $post_args = array(
                    'post_title'   => $ojciec_sire,
                    'post_status'  => 'publish', // Status posta: opublikowany
                    'post_type'    => 'rodowody_psow' // Nazwa custom post type
                    
                );

                $new_sire_id = wp_insert_post($post_args); 
                update_field('plec_psa', 'male' , $new_sire_id);

                
               
               
            }else{
                $new_sire_id = $existing_sire->ID;
            }



             // Insert or create dam
             $existing_dam = get_page_by_title($matka_dam, OBJECT, 'rodowody_psow');
            if(!$existing_dam){

              
                $post_args = array(
                    'post_title'   => $matka_dam,
                    'post_status'  => 'publish', // Status posta: opublikowany
                    'post_type'    => 'rodowody_psow' // Nazwa custom post type
                    
                );

                $new_dam_id = wp_insert_post($post_args); 
                update_field('plec_psa', 'female' , $new_dam_id);

                
               
               
            }else{
                $new_dam_id = $existing_dam->ID;
            }





            // create dog
            $new_parent_id_c = wp_insert_post($new_parent_args);

            if ($new_parent_id_c) {
                add_post_meta($new_parent_id_c, 'dog_color', $color);

                // ACF fileds
                update_field('wlasciciel', $new_wlasciciel_id , $new_parent_id_c);
                update_field('plec_psa', $gender , $new_parent_id_c);
                // update_field('owner_country', $owner_country , $new_parent_id_c);
                update_field('hodowca', $new_hodowca_id , $new_parent_id_c);
                // update_field('breeder_country', $breeder_country , $new_parent_id_c);
                update_field('ojciec_sire', $new_sire_id , $new_parent_id_c);
                update_field('matka_dam', $new_dam_id , $new_parent_id_c);
                update_field('data_urodzenia', $data_urodzenia , $new_parent_id_c);
                update_field('tytuly', $tytuly , $new_parent_id_c);


                // Update/create child parent
                $child_id = $_GET['child_id'];

                if($_GET['sex']=='male'){
                    update_field('ojciec_sire', $new_parent_id_c , $child_id);

                }elseif($_GET['sex']=='female'){
                    update_field('matka_dam', $new_parent_id_c , $child_id);

                }

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
                    $attach_id = wp_insert_attachment( $attachment, $file, $new_parent_id_c );
                    require_once( ABSPATH . 'wp-admin/includes/image.php' );
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $new_parent_id_c, $attach_id );
                }

               


                // Redirect
                $redirect_url = get_permalink( $new_parent_id_c);
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
