<?php
if ( ! function_exists( 'unite_setup' ) ) :
	function jobbrs_setup() {
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'unite' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'unite_setup' );

/**
  *	Add styles and scripts
**/


/**
  *	Add custom post type "Movies"
**/

add_action( 'init', 'unite_post_type' );
function unite_post_type() {
	register_taxonomy( 'genre', [ 'movies' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Genres',
			'singular_name'     => 'Genre',
			'search_items'      => 'Search Genres',
			'all_items'         => 'All Genres',
			'view_item '        => 'View Genre',
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Edit Genre',
			'update_item'       => 'Update Genre',
			'add_new_item'      => 'Add New Genre',
			'new_item_name'     => 'New Genre Name',
			'menu_name'         => 'Genre',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );
	register_taxonomy( 'country', [ 'movies' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Country',
			'singular_name'     => 'Country',
			'search_items'      => 'Search Country',
			'all_items'         => 'All Country',
			'view_item '        => 'View Country',
			'parent_item'       => 'Parent Country',
			'parent_item_colon' => 'Parent Country:',
			'edit_item'         => 'Edit Country',
			'update_item'       => 'Update Country',
			'add_new_item'      => 'Add New Country',
			'new_item_name'     => 'New Country Name',
			'menu_name'         => 'Country',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );
	register_taxonomy( 'year', [ 'movies' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Years',
			'singular_name'     => 'Year',
			'search_items'      => 'Search Years',
			'all_items'         => 'All Year',
			'view_item '        => 'View Year',
			'parent_item'       => 'Parent Year',
			'parent_item_colon' => 'Parent Year:',
			'edit_item'         => 'Edit Year',
			'update_item'       => 'Update Year',
			'add_new_item'      => 'Add New Year',
			'new_item_name'     => 'New Year Name',
			'menu_name'         => 'Years',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );
	register_taxonomy( 'actors', [ 'movies' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Actors',
			'singular_name'     => 'Actor',
			'search_items'      => 'Search Actors',
			'all_items'         => 'All Actors',
			'view_item '        => 'View Actor',
			'parent_item'       => 'Parent Actor',
			'parent_item_colon' => 'Parent Actor:',
			'edit_item'         => 'Edit Actor',
			'update_item'       => 'Update Actor',
			'add_new_item'      => 'Add New Actor',
			'new_item_name'     => 'New Actor Name',
			'menu_name'         => 'Actors',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );

	register_post_type('movies', array(
		'label'               => __( 'Movie', 'unite' ),
		'labels'              => array(
			'name'           		=> _x( 'Movies', 'Post type general name', 'unite' ),
			'singular_name' 		=> _x( 'Movie', 'Post type singular name', 'unite' ),
			'menu_name'     		=> _x( 'Movies', 'Admin Menu text', 'unite' ),
			'name_admin_bar' 		=> _x( 'Movie', 'Add New on Toolbar', 'unite' ),
			'all_items'     		=> __( 'All movies', 'unite' ),
			'add_new'       		=> __( 'Add New', 'unite' ),
			'add_new_item'  		=> __( 'Add new movies', 'unite' ),
			'edit_item'     		=> __( 'Edit movies', 'unite' ),
			'new_item'      		=> __( 'New movies', 'unite' ),
			'view_item'             => __( 'View movie', 'unite' ),
			'search_items'          => __( 'Search movies', 'unite' ),
			'parent_item_colon'     => __( 'Parent movies:', 'unite' ),
			'not_found'             => __( 'No movies found.', 'unite' ),
			'not_found_in_trash'    => __( 'No movies found in Trash.', 'unite' ),
			),
		'description'         =>  __( 'Movies reviews', 'unite' ),
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_rest'        => false,
		'rest_base'           => '',
		'show_in_menu'        => true,
    	'menu_position'       => 9,
    	'menu_icon'           => 'dashicons-welcome-view-site',
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'has_archive'         => 'films',
		'query_var'           => true,
		'supports'            => array( 'title','editor','thumbnail'),
		) );
}
