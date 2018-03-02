<?php
/**
 * Bulmapress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bulmapress
 */


require get_template_directory() . '/functions/bulmapress_navwalker.php';
require get_template_directory() . '/functions/breadcrumb.php';

if ( ! function_exists( 'bulmapress_setup' ) ) :

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bulmapress_setup() {
	require get_template_directory() . '/functions/navigation.php';
	require get_template_directory() . '/functions/scripts-styles.php';
}
endif;
add_action( 'after_setup_theme', 'bulmapress_setup' );

function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

function my_custom_styles( $init_array ) {

    $style_formats = array(
        // These are the custom styles
        array(
            'title' => 'Button',
            'block' => 'a',
            'classes' => 'button',
            'wrapper' => true,
        ),
			  array(
            'title' => 'Button Stream',
            'block' => 'a',
            'classes' => 'button is-success',
            'wrapper' => true,
        ),
				array(
            'title' => 'Button Watch',
            'block' => 'a',
            'classes' => 'button is-warning',
            'wrapper' => true,
        ),
				array(
            'title' => 'Button Info',
            'block' => 'a',
            'classes' => 'button is-info',
            'wrapper' => true,
        ),
				array(
            'title' => 'Button Large Full Width',
            'block' => 'a',
            'classes' => 'button is-large is-fullwidth',
            'wrapper' => true,
        ),
				array(
            'title' => 'Title Alt 1',
            'block' => 'p',
            'classes' => 'title is-1',
            'wrapper' => true,
        ),
				array(
            'title' => 'Title Alt 2',
            'block' => 'p',
            'classes' => 'title is-2',
            'wrapper' => true,
        ),
				array(
            'title' => 'Title Alt 3',
            'block' => 'p',
            'classes' => 'title is-3',
            'wrapper' => true,
        ),
				array(
            'title' => 'Title Alt 4',
            'block' => 'p',
            'classes' => 'title is-4',
            'wrapper' => true,
        ),
				array(
            'title' => 'Title Alt 5',
            'block' => 'p',
            'classes' => 'title is-5',
            'wrapper' => true,
        ),
				array(
            'title' => 'subtitle 1',
            'block' => 'p',
            'classes' => 'subtitle is-1',
            'wrapper' => true,
        ),
				array(
            'title' => 'subtitle 2',
            'block' => 'p',
            'classes' => 'subtitle is-2',
            'wrapper' => true,
        ),
				array(
            'title' => 'subtitle 3',
            'block' => 'p',
            'classes' => 'subtitle is-3',
            'wrapper' => true,
        ),
				array(
            'title' => 'subtitle 4',
            'block' => 'p',
            'classes' => 'subtitle is-4',
            'wrapper' => true,
        ),
				array(
            'title' => 'subtitle 5',
            'block' => 'p',
            'classes' => 'subtitle is-5',
            'wrapper' => true,
        ),

    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );

function remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_menus' );








function create_posttype() {
		register_post_type( 'banners',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Banners' ),
                'singular_name' => __( 'Banner' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'banners'),
        )
    );
		register_post_type( 'slides',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Slides' ),
                'singular_name' => __( 'Slide' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'slides'),
        )
    );
		register_post_type( 'videos',
		 // CPT Options
				 array(
						 'labels' => array(
								 'name' => __( 'Videos' ),
								 'singular_name' => __( 'Video' )

						 ),
						 'public' => true,
						 'has_archive' => true,
						 'rewrite' => array('slug' => 'videos'),

				 )
		 );
		register_post_type( 'rooms',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Rooms' ),
                'singular_name' => __( 'Room' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'rooms'),
        )
    );
		register_post_type( 'bands',
			// CPT Options
				array(
						'labels' => array(
								'name' => __( 'Bands' ),
								'singular_name' => __( 'Band' )
						),
						'public' => true,
						'has_archive' => false,
						'rewrite' => array('slug' => 'label/bands'),
				)
		);
		register_post_type( 'releases',
	    // CPT Options
	        array(
	            'labels' => array(
	                'name' => __( 'Releases' ),
	                'singular_name' => __( 'Release' )
	            ),
	            'public' => true,
	            'has_archive' => true,
	            'rewrite' => array('slug' => 'releases'),
	        )
	    );
		register_post_type( 'events',
			// CPT Options
				array(
						'labels' => array(
								'name' => __( 'Events' ),
								'singular_name' => __( 'Event' )
						),
						'public' => true,
						'has_archive' => true,
						'rewrite' => array('slug' => 'events'),
				)
		);
		register_post_type( 'team',
		 // CPT Options
				 array(
						 'labels' => array(
								 'name' => __( 'Team Members' ),
								 'singular_name' => __( 'Team Member' )

						 ),
						 'public' => true,
						 'has_archive' => true,
						 'rewrite' => array('slug' => 'team'),
				 )
		 );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

add_theme_support( 'post-thumbnails' );

function sk_add_category_taxonomy_to_events() {
	register_taxonomy_for_object_type( 'category', 'releases' );
	register_taxonomy_for_object_type( 'category', 'events' );
	register_taxonomy_for_object_type( 'category', 'bands' );
	register_taxonomy_for_object_type( 'category', 'slides' );
	register_taxonomy_for_object_type( 'category', 'banners' );
	register_taxonomy_for_object_type( 'category', 'videos' );
}
add_action( 'init', 'sk_add_category_taxonomy_to_events' );

function mvandemar_remove_post_type_support() {

    remove_post_type_support( 'releases', 'editor' );

	  remove_post_type_support( 'bands', 'editor' );



    remove_post_type_support( 'team', 'editor' );

    remove_post_type_support( 'rooms', 'editor' );
		remove_post_type_support( 'slides', 'editor' );
		remove_post_type_support( 'banner', 'editor' );

}
add_action( 'init', 'mvandemar_remove_post_type_support' );


/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  // Hide the editor on the page titled 'Homepage'

  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if($template_file == 'template-content-2.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-content-2.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-home-1.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-home-2.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-landing.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-catalog.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-about.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
	if($template_file == 'template-contact.php'){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}


function wpd_subcategory_template( $template ) {
    $cat = get_queried_object();
    if( 0 < $cat->category_parent )
        $template = locate_template( 'category-video-subcategory.php' );
    return $template;
}
add_filter( 'category_template', 'wpd_subcategory_template' );



function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', array( 'post', 'videos' ) );

    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');

function order_category_archives( $query ) {
  if ( is_category() && $query->is_main_query() ){ // is_category() can specify a category, if necessary
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}

add_action( 'pre_get_posts', 'order_category_archives' );


/**
 * Remove archive title prefixes.
 *
 * @param  string  $title  The archive title from get_the_archive_title();
 * @return string          The cleaned title.
 */
function grd_custom_archive_title( $title ) {
	// Remove any HTML, words, digits, and spaces before the title.
	return preg_replace( '#^[\w\d\s]+:\s*#', '', strip_tags( $title ) );
}
add_filter( 'get_the_archive_title', 'grd_custom_archive_title' );


add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="post-count">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}
?>
