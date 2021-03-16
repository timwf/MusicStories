<?php

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

	$postTypes = array(
		"story" => "Story",
    "retailer" => "Retailer",
	);

	$categoryPostTypes = array('story', 'retailer'); 

	$sortOrder = 5;
	foreach($postTypes as $postTypeSlug=>$postType){

    //adds plural for story ie "Stories"
    $postType == "Story" ? $pluralPostType = "Stories" : $pluralPostType = $postType . 's';

		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( $postType.'s', 'Post Type General Name', 'tbwdf' ),
			'singular_name'       => _x( $postType, 'Post Type Singular Name', 'tbwdf' ),
			'menu_name'           => __( $pluralPostType, 'tbwdf' ),
			'parent_item_colon'   => __( 'Parent '.$postType, 'tbwdf' ),
			'all_items'           => __( 'All '. $pluralPostType, 'tbwdf' ),
			'view_item'           => __( 'View '.$postType, 'tbwdf' ),
			'add_new_item'        => __( 'Add New '.$postType, 'tbwdf' ),
			'add_new'             => __( 'Add New', 'tbwdf' ),
			'edit_item'           => __( 'Edit '.$postType, 'tbwdf' ),
			'update_item'         => __( 'Update '.$postType, 'tbwdf' ),
			'search_items'        => __( 'Search '.$postType, 'tbwdf' ),
			'not_found'           => __( 'Not Found', 'tbwdf' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'tbwdf' ),
		);

		// Set other options for Custom Post Type

		$args = array(
			'label'               => __( $postType, 'tbwdf' ),
			'description'         => __( $postType, 'tbwdf' ),
			'labels'              => $labels,
			'taxonomies'          => array( $postTypeSlug.'_category' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_rest'        => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => $sortOrder++,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			"rewrite" => array( "slug" => $postTypeSlug, "with_front" => true ),
			"query_var" => true,
			'supports'            => array( 'title',  'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
			"rest_controller_class" => "WP_REST_Posts_Controller",
		);

		if(in_array($postTypeSlug,$categoryPostTypes)){
			register_taxonomy(
				$postTypeSlug.'_category',
				$postTypeSlug,
				array(
					'label' => __( 'Category' ),
					"public" => true,
					"publicly_queryable" => true,
					"hierarchical" => true,
					"show_ui" => true,
					"show_in_menu" => true,
					"show_in_nav_menus" => true,
					"query_var" => true,
					'rewrite' => array( 'slug' => $postTypeSlug.'_category', 'with_front' => true ),
					"show_in_rest" => true,
					"rest_base" => $postTypeSlug.'_category',
					"rest_controller_class" => "WP_REST_Terms_Controller",
					"show_in_quick_edit" => false,
				)
			);
		}

		// Registering your Custom Post Type
		register_post_type( $postTypeSlug, $args );
	}

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'custom_post_type', 0 );




add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {
	$path = dirname( dirname( __FILE__ ) ) . '/acf-json';
	return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
	unset($paths[0]);
	$paths[] = dirname( dirname( __FILE__ ) ) . '/acf-json';
	return $paths;
}