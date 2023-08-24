<?php 
// Get all owners name
function getAllOwners(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1, 
	));

	$wlasciciele = array();

	foreach ($posts as $post) {

	    $wlasciciel = get_post_meta($post->ID, 'wlasciciel', true);

	    if (!in_array($wlasciciel, $wlasciciele)) {
	        $wlasciciele[] = $wlasciciel;
	    }
	}

	return $wlasciciele;
}

// Get all breeders
function getAllBreeders(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1, 
	));

	$hodowcy = array();

	foreach ($posts as $post) {

	    $hodowca = get_post_meta($post->ID, 'hodowca', true);

	    if (!in_array($hodowca, $hodowcy)) {
	        $hodowcy[] = $hodowca;
	    }
	}

	return $hodowcy;
}

// Get all sire
function getAllSire(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'plec_psa',
	            'value' => 'male',
	            'compare' => '='
	        )
	    )
	));

	$sireArr =[];
	foreach ($posts as $post) {
		$sireArr[] = $post->post_title;
	}

	return $sireArr; 
}

// Get all dam
function getAllDam(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'plec_psa',
	            'value' => 'female',
	            'compare' => '='
	        )
	    )
	));

	$damArr =[];
	foreach ($posts as $post) {
		$damArr[] = $post->post_title;
	}

	return $damArr; 
}

// Get all dogs
function getAllDogs(){
	$posts = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'post_status'    => 'publish',
	));

	$dogsArr =[];
	foreach ($posts as $post) {
		$dogsArr[] = $post->post_title;
	}

	return $dogsArr; 
}

/*
* Get page / post object by title
*/

function getPageByTitleSN( $title , $type){
	$args = array(
	    'post_type'      => $type,
	    'post_status'    => 'publish',
	    'posts_per_page' => 1,
	    'title'          => $title
	);

	$query = new WP_Query( $args );

	return $query;

}

// Get dog by ID
function getDogByID( $id ){
	$args = array(
	   'post_type'      => 'rodowody_psow',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'p'              => $id 
	);

	$dog = new WP_Query( $args );

	return $dog;

}

// Get post type hodowcy_psow by ID
function getHodowcaByID( $id ){
	$args = array(
	   'post_type'      => 'hodowcy_psow',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'p'              => $id 
	);

	$hodowca = new WP_Query( $args );

	return $hodowca;

}



function getDogByTitleSN($title ){

	$args_gd = array(
	   'post_type'      => 'rodowody_psow',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'   => $title 
	);

	$dog_gd = new WP_Query( $args_gd );

	return $dog_gd;
}

// Dog offspring
function getDogOffspring( $post_title , $gender ){
	if($gender == 'male'){

		$offspring = get_posts(array(
		    'post_type' => 'rodowody_psow',
		    'posts_per_page' => -1 ,
		    'meta_query' => array(
		        array(
		            'key' => 'ojciec_sire',
		            'value' => $post_title ,
		            'compare' => '='
		        )
		    )
		));

	}else{

		$offspring = get_posts(array(
		    'post_type' => 'rodowody_psow',
		    'posts_per_page' => -1 ,
		    'meta_query' => array(
		        array(
		            'key' => 'matka_dam',
		            'value' => $post_title ,
		            'compare' => '='
		        )
		    )
		));

	}

	return $offspring; 
}

// Sinblings

function getDogSiblings( $post_id ,  $sire , $dam){

	$siblings = null;

	if(!empty($post_id) && !empty($sire) &&  !empty($dam) ){

		$siblings = get_posts(array(
		    'post_type' => 'rodowody_psow',
		    'posts_per_page' => -1,
		    'post__not_in' => array($post_id),
		    'meta_query' => array(
		        'relation' => 'AND',
		        array(
		            'key' => 'matka_dam',
		            'value' => $dam ,
		            'compare' => '='
		        ),
		        array(
		            'key' => 'ojciec_sire',
		            'value' => $sire,
		            'compare' => '='
		        )
		    )
		));
	}

	return $siblings;

}

// Get all owner dogs
function getAllOwnerDogs( $owner ){
	$ownerDogs = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'wlasciciel',
	            'value' => $owner ,
	            'compare' => '='
	        )
	    )
	));

	return $ownerDogs; 
}

// Get all breeder dogs
function getAllBreederDogs( $breeder ){
	$breederDogs = get_posts(array(
	    'post_type' => 'rodowody_psow',
	    'posts_per_page' => -1 ,
	    'meta_query' => array(
	        array(
	            'key' => 'hodowca',
	            'value' => $breeder ,
	            'compare' => '='
	        )
	    )
	));

	return $breederDogs; 
}

// Get all hodowcy psów
function getAllHodowcyPsow(){
	$posts = get_posts(array(
	    'post_type' => 'hodowcy_psow',
	    'posts_per_page' => -1 ,
	    'orderby'  => 'title',
	));

	$allHodowcyPsow =[];
	foreach ($posts as $post ) {
		$allHodowcyPsow[] = $post->post_title;
	}

	return $allHodowcyPsow; 
}