<?php

register_sidebar(array('name' => 'sidebar'));

add_theme_support('post-thumbnails');  





add_action( 'init', 'register_my_menus' );

function register_my_menus() {
register_nav_menus(
array(
'menu-1' => __( 'Menu 1' ),
'menu-2' => __( 'Menu 2' )
)
);
}


// Homes For Sale: Custom Post
add_action('init', 'homes'); 
function homes() {
	
register_post_type( 'homes', array(
  'label' => 'MIR Homes',
  'singular_label' => 'Home',
  'description' => 'Homes For Sale',
  'public' => TRUE,
  'publicly_queryable' => TRUE,
  'show_ui' => TRUE,
  'query_var' => TRUE,
  'rewrite' => TRUE,
  'has_archive' => TRUE,
  'capability_type' => 'post',
  'hierarchical' => TRUE,
  'menu_position' => NULL,
  'supports' => array('title', 'editor', 'thumbnail, page-attributes'),
  'menu_position' => 20,
  'rewrite' => array(
    'slug' => 'homes/%homes_community%',
    'with_front' => FALSE,
  ),
));







register_taxonomy('homes_community', 'homes', array(
  'label' => 'Communities',
  'singular_label' => 'Community',
  'public' => TRUE,
  'show_tagcloud' => FALSE,
  'hierarchical' => TRUE,
  'query_var' => TRUE,
  'rewrite' => array(
    'slug' => 'homes'
    
  ),
));
}

add_filter('post_type_link', 'taxonomy_permalink', 1, 3);
function taxonomy_permalink( $post_link, $id = 0, $leavename = FALSE ) {
  if ( strpos('%homes_community%', $post_link) === 'FALSE' ) {
    return $post_link;
  }
  $post = get_post($id);
  if ( !is_object($post) || $post->post_type != 'homes' ) {
    return $post_link;
  }
  $terms = wp_get_object_terms($post->ID, 'homes_community');
  if ( !$terms ) {
    return str_replace('homes-for-sale/%homes_community%/', '', $post_link);
  }
  return str_replace('%homes_community%', $terms[0]->slug, $post_link);
}



// get taxonomies terms links
function custom_taxonomies_terms_links() {
	global $post, $post_id;
	// get post by post id
	$post = &get_post($post->ID);
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies($post_type);
	foreach ($taxonomies as $taxonomy) {
		// get the terms related to post
		$terms = get_the_terms( $post->ID, $taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term )
				$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
			$return = join( ', ', $out );
		}
		return $return;
	}
} 

// Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function current_jquery($version) {
        global $wp_scripts;
        if ( ( version_compare($version, $wp_scripts -> registered[jquery] -> ver) == 1 ) && !is_admin() ) {
                wp_deregister_script('jquery'); 
 
                wp_register_script('jquery',
                        'http://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js',
                        false, $version);
        }
}
 
add_action( 'wp_head', current_jquery( '1.7.1' ) ); // change number to latest version

?>
