<?php 

// Search result - redirect
function sn_search_result_redirect(){
	if(isset($_POST['search_dog_name'])){
		$dog_name = sanitize_text_field($_POST['search_dog_name']);

		$result = getDogByTitleSN( $dog_name );
		if ($result->have_posts()) { 
		    $dog = $result->posts[0];
		    $dog_url = get_permalink($dog->ID); 

		    wp_redirect($dog_url);
		    exit();
		}else{
			$dogs_list_url = get_post_type_archive_link('rodowody_psow').'?search_result=false';
		    wp_redirect($dogs_list_url);
			
		}
	}
}
add_action('template_redirect' , 'sn_search_result_redirect');
