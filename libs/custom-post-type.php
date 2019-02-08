<?php

/**
 * custom_post_type short summary.
 *
 * custom_post_type description.
 *
 * @version 1.0
 * @author nuno.ildefonso
 */

/////////////////////////////////////////
// Custom Post Types
////////////////////////////////////////

function register_post_types() {

	$args = array(
		'label' => 'Locations',
        'description' => '',
        'taxonomies' => array('category','post_tag'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-location',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
		  'author'
		) 
	  );
	register_post_type( 'Locations', $args );

	$args = array(
		'label' => 'Bootcamps',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
        'capability_type' => 'post',
        'taxonomies' => array('category','post_tag'),
		'hierarchical' => true,
		'menu_icon' => 'dashicons-calendar',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
			'author',
			'thumbnail'
		) 
	  );
    register_post_type( 'Bootcamps', $args );
    
    $args = array(
		'label' => 'Team',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-admin-users',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
		  'author'
		) 
	  );
	register_post_type( 'Team', $args );

    $args = array(
		'label' => 'Blog',
        'description' => '',
        'taxonomies' => array('category','post_tag'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
			'author',
			'thumbnail'
		) 
	  );
    register_post_type( 'Blog', $args );
    
    $args = array(
		'label' => 'Stories',
        'description' => '',
        'taxonomies' => array('category','post_tag'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-playlist-video',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
			'author',
			'thumbnail'
		) 
	  );
	register_post_type( 'Stories', $args );

	$args = array(
		'label' => 'Events',
        'description' => '',
        'taxonomies' => array('category','post_tag'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-calendar-alt',
		'query_var' => true,
		'supports' => array(
		  'title',
		  'editor',
		  'trackbacks',
		  'custom-fields',
		  'comments',
			'author',
			'thumbnail'
		) 
	  );
	register_post_type( 'Events', $args );



	}
	add_action( 'init', 'register_post_types' );