<?php
/**
 * web14devsn Theme Customizer
 *
 * @package web14devsn
 */


if (class_exists('WP_Customize_Control')) {
    
	// Class start
	class Nt_Customize_Control_Multiple_Select extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 */
	public $type = 'multiple-select';

	/**
	 * Displays the multiple select on the customize screen.
	 */
	public function render_content() {

	if ( empty( $this->choices ) )
	    return;
	?>
	    <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <select <?php $this->link(); ?> multiple="multiple" style="height: 150px;">
	            <?php
	                foreach ( $this->choices as $value => $label ) {
	                    $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
	                    echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
	                }
	            ?>
	        </select>
	    </label>
	<?php }}
	// Class end
}


function web14devsn_customize_register( $wp_customize ) {




	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'web14devsn_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'web14devsn_customize_partial_blogdescription',
			)
		);
	}

	/*
	** Front page settings
	*/ 

	$posts_list = get_posts(array(
		 'post_type'  	=> 'post',
		 'numberposts'	=> -1
	));

	$posts_choices_list = [];
 
    //Loop through the array and add the correct values every time
	foreach( $posts_list as $rjs_single_post ) {
	    $posts_choices_list[$rjs_single_post->ID] = esc_html__( $rjs_single_post->post_title, 'web14devsn' );
	}

	// Get post categories
	$sn_categories_full_list = get_categories( array( 'orderby' => 'name', ) );

	$sn_cats_choises = [];
 
    //Loop through the array and add the correct values every time
	foreach( $sn_categories_full_list as $sn_single_cat ) {
	    $sn_cats_choises[$sn_single_cat->slug] = esc_html__( $sn_single_cat->name, 'web14devsn' );
	}

	// Categories ids array
	$sn_cats_ids_arr = [];
	foreach( $sn_categories_full_list as $sn_single_cat ) {
	    $sn_cats_ids_arr[$sn_single_cat->term_id] = esc_html__( $sn_single_cat->name, 'web14devsn' );
	}

	// Panel 1
	$wp_customize->add_panel( 'front_page_sn_ctz', array(
	  'title' =>'Strona główna ',
	  'capability' => 'edit_theme_options', 
	  'priority' => 10, 
	) );

	// Banner 1
	$wp_customize->add_section( 'fp_sn_banner_1' , array(
	  'title' => 'Banner reklamowy 1',
	  // 'description' => 'To jest opis' ,
	  'panel' => 'front_page_sn_ctz',
	) );
	$wp_customize->add_setting( 'fp_sn_banner_1_field', array(
	  // 'capability' => 'edit_theme_options',
	  'default' => 'Kod bannera',
	  // 'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'fp_sn_banner_1_field', array(
	  'type' => 'textarea',
	  'section' => 'fp_sn_banner_1', 
	  'settings' => 'fp_sn_banner_1_field' ,
	  'label' => __( 'Miejsce na reklamę' )
	
	) );

	// Hot topics



	$wp_customize->add_section( 'fp_hot_topics' , array(
	  'title' => 'Hot topics',
	  'panel' => 'front_page_sn_ctz',
	) );

	// Section title
	$wp_customize->add_setting( 'fp_sn_hot_title', array(
	  'default' => 'Hot topics',
	) );
	$wp_customize->add_control( 'fp_sn_hot_title', array(
	  'type' => 'text',
	  'section' => 'fp_hot_topics', 
	  'settings' => 'fp_sn_hot_title' ,
	  'label' => __( 'Tytuł sekcji' )
	
	) );

	// Main post
	$wp_customize->add_setting( 'fp_sn_main_post', array(
	  'default' => '',
	  'transport' => 'refresh',
      'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 'fp_sn_main_post', 
		array(
		  'type' => 'select',
		  'section' => 'fp_hot_topics', // Add a default or your own section
		  'label' => __( 'Główny artykuł' ),
		  'description' => __( 'Wybierz główny artykuł z listy' ),
		  'choices' => $posts_choices_list ,
		)
	);

	// Secondary post
	$wp_customize->add_setting( 'fp_sn_sec_post', array(
	  'default' => '',
	  'transport' => 'refresh',
      'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 'fp_sn_sec_post', 
		array(
		  'type' => 'select',
		  'section' => 'fp_hot_topics', // Add a default or your own section
		  'label' => __( 'Drugorzędny artykuł' ),
		  'description' => __( 'Wybierz drugorzędny artykuł z listy' ),
		  'choices' => $posts_choices_list ,
		)
	);

	// Three articles on right side
	// $wp_customize->add_setting( 'fp_sn_three_post', array(
	//   'default' => '',
	//   'transport' => 'refresh',
      
	// ) );
	// $wp_customize->add_control( 'fp_sn_three_post', 
	// 	array(
	// 	  'type' => 'select',
	// 	  'section' => 'fp_hot_topics', // Add a default or your own section
	// 	  'label' => __( 'Trzy artykuły po prawej stronie' ),
	// 	  'description' => __( 'Wybierz kategorię artykułów' ),
	// 	  'choices' => $sn_cats_choises ,
	// 	)
	// );

	$wp_customize->add_setting( 'fp_sn_three_post', array(
	  'default' => '',
	  'transport' => 'refresh',
      // 'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		 new Nt_Customize_Control_Multiple_Select (
	        $wp_customize,
	        'fp_sn_three_post',
	        array(
	            'settings' => 'fp_sn_three_post',
	            'label'    => 'Trzy artykuły po prawej stronie',
	            'section'  => 'fp_hot_topics', 
	            'type'     => 'multiple-select', 
	            'choices' => $posts_choices_list
	        )
	    )
	);

	// Recommended posts 
	$wp_customize->add_section( 'fp_recom_posts' , array(
	  'title' => 'Polecane',
	  'panel' => 'front_page_sn_ctz',
	) );

	// Section title
	$wp_customize->add_setting( 'fp_sn_rec_title', array(
	  'default' => 'Polecane',
	) );
	$wp_customize->add_control( 'fp_sn_rec_title', array(
	  'type' => 'text',
	  'section' => 'fp_recom_posts', 
	  'settings' => 'fp_sn_rec_title' ,
	  'label' => __( 'Tytuł sekcji' )
	
	) );

	// Slider
	$wp_customize->add_setting( 'fp_recom_posts_sl', array(
	  'default' => '',
	  'transport' => 'refresh',
      // 'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		 new Nt_Customize_Control_Multiple_Select (
	        $wp_customize,
	        'fp_recom_posts_sl',
	        array(
	            'settings' => 'fp_recom_posts_sl',
	            'label'    => 'Slider - wybierz artykuły',
	            'section'  => 'fp_recom_posts', 
	            'type'     => 'multiple-select', 
	            'choices' => $posts_choices_list
	        )
	    )
	);

	// Post grid under the slider
	$wp_customize->add_setting( 'fp_recom_posts_grid', array(
	  'default' => '',
	  'transport' => 'refresh',
      // 'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		 new Nt_Customize_Control_Multiple_Select (
	        $wp_customize,
	        'fp_recom_posts_grid',
	        array(
	            'settings' => 'fp_recom_posts_grid',
	            'label'    => 'Wyróżnione posty pod sliderem',
	            'section'  => 'fp_recom_posts', 
	            'type'     => 'multiple-select', 
	            'choices' => $posts_choices_list
	        )
	    )
	);

	// Button link to category
	$wp_customize->add_setting( 'fp_recom_cat_link_1', array(
	  'default' => '',
	  'transport' => 'refresh',
      'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		'fp_recom_cat_link_1', 
		array(
		  'type' => 'select',
		  'section' => 'fp_recom_posts', // Add a default or your own section
		  'label' => __( 'Link do kategorii' ),
		  'choices' => $sn_cats_ids_arr ,
		)
	);

	// Banner 2
	$wp_customize->add_section( 'fp_sn_banner_2' , array(
	  'title' => 'Banner reklamowy 2',
	  // 'description' => 'To jest opis' ,
	  'panel' => 'front_page_sn_ctz',
	) );
	$wp_customize->add_setting( 'fp_sn_banner_2_field', array(
	  // 'capability' => 'edit_theme_options',
	  'default' => 'Kod bannera',
	  // 'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'fp_sn_banner_2_field', array(
	  'type' => 'textarea',
	  'section' => 'fp_sn_banner_2', 
	  'settings' => 'fp_sn_banner_2_field' ,
	  'label' => __( 'Miejsce na reklamę' )
	
	) );

	// IN house

	$wp_customize->add_section( 'fp_house_posts' , array(
	  'title' => 'In house',
	  'panel' => 'front_page_sn_ctz',
	) );

	// Section title
	$wp_customize->add_setting( 'fp_sn_house_title', array(
	  'default' => 'In house',
	) );
	$wp_customize->add_control( 'fp_sn_house_title', array(
	  'type' => 'text',
	  'section' => 'fp_house_posts', 
	  'settings' => 'fp_sn_house_title' ,
	  'label' => __( 'Tytuł sekcji' )
	
	) );

	// In house grid
	$wp_customize->add_setting( 'fp_inhouse_grid', array(
	  'default' => '',
	  'transport' => 'refresh',
      // 'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		 new Nt_Customize_Control_Multiple_Select (
	        $wp_customize,
	        'fp_inhouse_grid',
	        array(
	            'settings' => 'fp_inhouse_grid',
	            'label'    => 'Wyróżnione posty w sekcji',
	            'section'  => 'fp_house_posts', 
	            'type'     => 'multiple-select', 
	            'choices' => $posts_choices_list
	        )
	    )
	);

	// Button 2 link
	$wp_customize->add_setting( 'fp_recom_cat_link_2', array(
	  'default' => '',
	  'transport' => 'refresh',
      'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( 
		'fp_recom_cat_link_2', 
		array(
		  'type' => 'select',
		  'section' => 'fp_house_posts', // Add a default or your own section
		  'label' => __( 'Link do kategorii' ),
		  'choices' => $sn_cats_ids_arr ,
		)
	); 




}
add_action( 'customize_register', 'web14devsn_customize_register' );




/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function web14devsn_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function web14devsn_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function web14devsn_customize_preview_js() {
	wp_enqueue_script( 'web14devsn-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'web14devsn_customize_preview_js' );
