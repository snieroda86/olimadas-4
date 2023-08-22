<?php
// Custom database tables

// Colors

if (!function_exists('sn_dogs_colors_table_create')) {
    function sn_dogs_colors_table_create() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'dog_colors';
        
        if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE $table_name (
                id INT(11) NOT NULL AUTO_INCREMENT,
                color_code VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate;";
            
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);

            $colors = array();

            while (count($colors) < 500) {
                $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                
                if (!in_array($color, $colors)) {
                    $colors[] = $color;
                }
            }

            foreach ($colors as $color) {
                $wpdb->insert($table_name, array('color_code' => $color));
            }
        }
    }

    add_action('after_switch_theme', 'sn_dogs_colors_table_create');
}






