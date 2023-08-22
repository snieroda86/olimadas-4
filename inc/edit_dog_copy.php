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

    // Chceck errors
    $validation_check = false;
    if(!empty($validation_errors) && count($validation_errors) > 0){
        $validation_check = false;
    }else{
        $validation_check = true;
    }

    if($validation_check === true){
        // Insert post

        return;

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
                    // Check image size
                    $image_size = $p_image['size'] / 1024; // Rozmiar w kilobajtach
                    if ($image_size > 300) {
                        $validation_errors[] = 'Error: photo size cannot exceed 300kb';
                        return;
                    }

                    // Sprawdzanie typu obrazka
                    $image_type = strtolower(pathinfo($p_image['name'], PATHINFO_EXTENSION));
                    if (!in_array($image_type, array('jpg', 'jpeg', 'png', 'gif'))) {
                        $validation_errors[] = "Error: wrong image type ( allowed types: 'jpg', 'jpeg', 'png')";
                        return;
                    }



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

                // Redirect
                $redirect_url = get_permalink( $post_id);
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
