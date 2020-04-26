<?php
/*
Plugin Name: Movies Theme hooks and functions
Version:  1.0
Author: Serhii H.
*/

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
/*
* Add film item at index.php
*/
function unite_film_item(){
	$unite_films = new WP_Query(array('post_type' => 'movies', 'posts_per_page'=> 4,));
	if ( $unite_films->have_posts() ) :  while ( $unite_films->have_posts() ) : $unite_films->the_post();
	 	get_template_part('inc/film-item');
		endwhile;
			unite_paging_nav();
		else :
			get_template_part( 'content', 'none' );
		wp_reset_postdata();
	endif;
}
/**
 * Add Font awesome icon
 **/
function unite_font_awesome() {
  if (!is_admin()) {
    wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css');
    wp_enqueue_style('font-awesome');
  }
}
add_action('wp_enqueue_scripts', 'unite_font_awesome');
/**
 * Connect custom taxonomies
 **/
function genre_taxonomy(){
	$categories = get_categories(array(
		'orderby' => 'id',
		'taxonomy' => 'genre'
	));
	foreach( $categories as $category ){
		echo '<span>'. $category->cat_name . '</span>';
	}
}
function country_taxonomy(){
	$categories = get_categories(array(
		'orderby' => 'id',
		'taxonomy' => 'country'
	));
	foreach( $categories as $category ){
		echo '<span>'. $category->cat_name . '</span>';
	}
}
