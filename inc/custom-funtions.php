<?php
/**
 * DsignFly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DsignFly
 * @subpackage DsignFly/inc/custom-functions
 */
add_theme_support( 'menus' );
function designfly_custom_post_type() {
	
	$labels = array(
			'name'           => esc_html__( 'Portfolio', 'design-fly' ),
			'singular_name'  => esc_html__( 'Portfolio', 'design-fly' ),
			'add_new'        => esc_html__( 'Add Portfolio Item', 'design-fly' ),
			'all_items'      => esc_html__( 'All Portfolio Items', 'design-fly' ),
			'add_new_item'   => esc_html__( 'Add Portfolio item', 'design-fly' ),
			'edit_item'      => esc_html__( 'Edit Portfolio Item', 'design-fly' ),
			'new_item'       => esc_html__( 'New Portfolio Item', 'design-fly' ),
			'view_item'      => esc_html__( 'View Portfolio Item', 'design-fly' ),
			'search_item'    => esc_html__( 'Search Portfolio', 'design-fly' ),
			'not_found'      => esc_html__( 'No portfolio items found', 'design-fly' ),
		'not_found_in_trash' => esc_html__( 'No portfolio items found in trash', 'design-fly' ),
		'parent_item_colon'  => esc_html__( 'Parent Item', 'design-fly' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'query_var'          => true,
        'rewrite'            => true,
        'hierarchical'       => true,
		'capability_type'    => 'post',
		'menu_icon'          => 'dashicons-instagram',
		'supports'            => array(
			'title',
			'author',
			'custom-fields',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'revision',
		),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'menu_position'       => 5,
		'exclude_from_search' => false,
		'rewrite'             => array( 'slug' => 'df-portfolio' ),
	);

	register_post_type( 'df-portfolio', $args );
}



add_action( 'init', 'designfly_custom_post_type' );
function wporg_add_custom_post_types($query) {
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'df-portfolio' ) );
    }
    return $query;
}
add_action('pre_get_posts', 'wporg_add_custom_post_types');

/**
 * function for maintaining the styling of active class
 * 
 * @since 1.0.2
 */
function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
	  $classes[] = 'active ';
	}
	return $classes;
  }
  
  add_filter( 'nav_menu_css_class' , 'special_nav_class' , 10 , 2 );
  