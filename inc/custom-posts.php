<?php 
// Rodowody psów - post type
if ( ! function_exists('sn_wp_custom_post_type_rodowody_psow') ) {
	// Register Custom Post Type
	function sn_wp_custom_post_type_rodowody_psow() {
		$labels = array(
			'name'                  => _x( 'Rodowody psów', 'Post Type General Name', 'web14devsn' ),
			'singular_name'         => _x( 'Rodowód psa', 'Post Type Singular Name', 'web14devsn' ),
			'menu_name'             => __( 'Rodowody psów', 'web14devsn' ),
			'name_admin_bar'        => __( 'Rodowody psów', 'web14devsn' ),
			'archives'              => __( 'Item Archives', 'web14devsn' ),
			'attributes'            => __( 'Item Attributes', 'web14devsn' ),
			'parent_item_colon'     => __( 'Parent Item:', 'web14devsn' ),
			'all_items'             => __( 'Wszystkie', 'web14devsn' ),
			'add_new_item'          => __( 'Dodaj nowy', 'web14devsn' ),
			'add_new'               => __( 'Dodaj nowy', 'web14devsn' ),
			'new_item'              => __( 'Nowy rodowód', 'web14devsn' ),
			'edit_item'             => __( 'Edytuj rodowód', 'web14devsn' ),
			'update_item'           => __( 'Update Item', 'web14devsn' ),
			'view_item'             => __( 'Zobacz rodowód', 'web14devsn' ),
			'view_items'            => __( 'Zobacz rodowody', 'web14devsn' ),
			'search_items'          => __( 'Szukaj', 'web14devsn' ),
			'not_found'             => __( 'Nie znaleziono', 'web14devsn' ),
			'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'web14devsn' ),
			'featured_image'        => __( 'Obrazek wyróżniający', 'web14devsn' ),
			'set_featured_image'    => __( 'Ustaw obrazek', 'web14devsn' ),
			'remove_featured_image' => __( 'Usuń obrazek', 'web14devsn' ),
			'use_featured_image'    => __( 'Użyj jako obrazek wyróżniający', 'web14devsn' ),
			'insert_into_item'      => __( 'Wstaw', 'web14devsn' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'web14devsn' ),
			'items_list'            => __( 'Lista pozycji', 'web14devsn' ),
			'items_list_navigation' => __( 'Items list navigation', 'web14devsn' ),
			'filter_items_list'     => __( 'Filter items list', 'web14devsn' ),
		);
		$args = array(
			'label'                 => __( 'Rodowody psów', 'web14devsn' ),
			'description'           => __( 'Rodowody psów', 'web14devsn' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-buddicons-activity',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => true,
			'show_in_rest'		=> true,
			'can_export'            => true,
			'has_archive'           => true,
			'rewrite' => array('slug' => 'dogs-list'),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		);
		register_post_type( 'rodowody_psow', $args );
	}
	add_action( 'init', 'sn_wp_custom_post_type_rodowody_psow', 0 );
}

// Get all post type ''

function get_all_rodowody_psow(){
	$args = array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1,
	    'post_status' => 'publish'
	);

	$query = new WP_Query($args);
	return $query;
} 


// Hodowcy

// Tworzenie customowego postu 'hodowcy_psow'
function custom_post_type_hodowcy_psow() {
    $labels = array(
        'name'                  => __( 'Hodowcy Psów', 'web14devsn' ),
        'singular_name'         => __( 'Hodowca Psów', 'web14devsn' ),
        'menu_name'             => __( 'Hodowcy Psów', 'web14devsn' ),
        'all_items'             => __( 'Wszyscy Hodowcy Psów', 'web14devsn' ),
        'add_new'               => __( 'Dodaj nowego', 'web14devsn' ),
        'add_new_item'          => __( 'Dodaj nowego Hodowcę Psów', 'web14devsn' ),
        'edit_item'             => __( 'Edytuj Hodowcę Psów', 'web14devsn' ),
        'new_item'              => __( 'Nowy Hodowca Psów', 'web14devsn' ),
        'view_item'             => __( 'Zobacz Hodowcę Psów', 'web14devsn' ),
        'search_items'          => __( 'Szukaj Hodowców Psów', 'web14devsn' ),
        'not_found'             => __( 'Brak znalezionych Hodowców Psów', 'web14devsn' ),
        'not_found_in_trash'    => __( 'Brak Hodowców Psów w koszu', 'web14devsn' ),
        'parent_item_colon'     => __( 'Nadrzędny Hodowca Psów:', 'web14devsn' ),
        'menu_icon'             => 'dashicons-groups', // Ikona menu (możesz zmienić na inną z tej listy: https://developer.wordpress.org/resource/dashicons/)
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'hodowcy_psow'),
    );
    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'menu_position'         => 4,
		'menu_icon'             => 'dashicons-admin-users',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'hodowcy_psow'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title', 'editor', 'thumbnail'), // Dodatkowe opcje jakie obsługuje post (np. 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' itp.)
    );
    register_post_type('hodowcy_psow', $args);
}
add_action('init', 'custom_post_type_hodowcy_psow');
