<?php 
// Edit post ( rodowody_psow ) 

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

if(isset($_POST['edit_rodowod_psa'])){

    $dog_id = isset($_GET['dog_id']) ? intval($_GET['dog_id']) : 0;
    $current_dog = get_post($dog_id);
    $current_dog_name = $current_dog ? sanitize_text_field($current_dog->post_title) : '';

    $post_title = sanitize_text_field($_POST['post_title']) ;
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

    if ($validation_check === true) {
        // Update post
        $post_id = intval($_GET['dog_id']); // Pobranie ID posta do edycji

        $existing_post_obj = get_post($post_id);
        if (!$existing_post_obj) {
            $validation_errors[] = 'Post not found!';
            return;
        }

        // Check if dog name already exists
        // $existing_post = get_page_by_title($post_title, OBJECT, 'rodowody_psow');
        // if ($existing_post) {
        //     $validation_errors[] = 'Dog name already exists!';
        //     return;
        // }

        // get owner id
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
        


        // Get breeder id
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








        $updated_post = array(
            'ID' => $post_id,
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_type' => 'rodowody_psow',
        );

        // Edycja istniejącego posta
        $updated = wp_update_post($updated_post);
        if ($updated) {
            // Aktualizacja innych metadanych
            // update_post_meta($post_id, 'dog_color', $color);
            update_field('wlasciciel', $new_wlasciciel_id, $post_id);
            update_field('plec_psa', $gender, $post_id);
            // update_field('owner_country', $owner_country, $post_id);
            update_field('hodowca', $new_hodowca_id, $post_id);
            // update_field('breeder_country', $breeder_country, $post_id);
            update_field('ojciec_sire', $new_sire_id, $post_id);
            update_field('matka_dam', $new_dam_id, $post_id);
            update_field('data_urodzenia', $data_urodzenia, $post_id);
            update_field('tytuly', $tytuly, $post_id);

            /*
            ** Upload image
            */

            if (isset($_FILES['dog_photo']) && !empty($_FILES['dog_photo']['name'])) {
                // Sprawdzenie rozmiaru obrazka
                $image_size = $_FILES['dog_photo']['size'] / 1024; // Rozmiar w kilobajtach
                if ($image_size > 300) {
                    $validation_errors[] = 'Error: photo size cannot exceed 300kb';
                    return;
                }

                // Sprawdzenie typu obrazka
                $image_type = strtolower(pathinfo($_FILES['dog_photo']['name'], PATHINFO_EXTENSION));
                if (!in_array($image_type, array('jpg', 'jpeg', 'png', 'gif'))) {
                    $validation_errors[] = "Error: wrong image type (allowed types: 'jpg', 'jpeg', 'png')";
                    return;
                }

                $upload_dir = wp_upload_dir();
                $file = $upload_dir['path'] . '/' . $_FILES['dog_photo']['name'];
                move_uploaded_file($_FILES['dog_photo']['tmp_name'], $file);
                $wp_filetype = wp_check_filetype(basename($file), null);
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title' => preg_replace('/\.[^.]+$/', '', basename($file)),
                    'post_content' => '',
                    'post_status' => 'inherit'
                );
                $attach_id = wp_insert_attachment($attachment, $file, $post_id);
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attach_data = wp_generate_attachment_metadata($attach_id, $file);
                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($post_id, $attach_id);
            }

             // Create new dog card if not exists in db
                

            // Przekierowanie
            $redirect_url = get_permalink($post_id);
            if (wp_redirect($redirect_url)) {
                exit;
            }
        } else {
            $validation_errors[] = "The dog's contact card has not been updated";
            return;
        }
    }


}
