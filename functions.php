<?php
if ( ! function_exists( 'unite_setup' ) ) :
	function unite_setup() {
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
function unite_child_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'unite_child_styles' );

/**
 *	Connect plugin
 **/
require get_stylesheet_directory() .'/inc/custom-plugin.php';

/**
* Shortcode recent films
**/
function unite_recent_films(){
	ob_start();?>
	<ul>
	<?php
	global $post;
	$postslist = get_posts( array( 'posts_per_page' => 5, 'order'=> 'ASC', 'orderby' => 'date', 'post_type' =>'movies' ) );
	foreach ( $postslist as $post ){
		setup_postdata($post);
		?>
		<li class="d-flex flex-row">
			<a href="<?php esc_url(the_permalink()); ?>">
					<?php esc_html(the_title()); ?>
			</a>
		</li>
		<?php
	}
	wp_reset_postdata();
	?>
	</ul>
	<?php
	return ob_get_clean();
}
add_shortcode( 'film', 'unite_recent_films' );
