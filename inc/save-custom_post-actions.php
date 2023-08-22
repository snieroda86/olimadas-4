<?php

// CPT - rodowody_psow

function sn_save_dog_color_meta($post_id) {

    if ('rodowody_psow' === get_post_type($post_id)) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'dog_colors';

        $table_exists = $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'");

        if ($table_exists === $table_name) {
            $color = get_post_meta($post_id, 'dog_color', true);

            if(empty($color)){
                $query = "SELECT color_code FROM $table_name ORDER BY RAND() LIMIT 1";
                $color = $wpdb->get_var($query);

                if ($color) {
                    update_post_meta($post_id, 'dog_color', $color);
                    // Delete color from table
                    $delete_query = "DELETE FROM $table_name WHERE color_code = %s";
                    $wpdb->query($wpdb->prepare($delete_query, $color));
                }else{
                    $color = '#ffffff';
                    update_post_meta($post_id, 'dog_color', $color);
                }
            }

        } else {
            $color = '#ffffff';
            update_post_meta($post_id, 'dog_color', $color);
           
        }

    }
}
add_action('wp_insert_post', 'sn_save_dog_color_meta', 10, 1);

// Post delete
add_action('before_delete_post', 'sn_delete_post_insert_color');
function sn_delete_post_insert_color($post_id) {
    $color = get_post_meta($post_id , 'dog_color' , true);

    if(!empty($color)){
        global $wpdb;
        $table_name = $wpdb->prefix . 'dog_colors';
        $data = array(
            'color_code' => $color,
        );

        $wpdb->insert($table_name, $data);
    }
}
