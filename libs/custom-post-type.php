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
		'label' => 'Bootcamps',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_icon' => 'dashicons-calendar',
		//'rewrite' => array('slug' => '/bootcamps/'),
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
		//'rewrite' => array('slug' => '/bootcamps/'),
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
		//'rewrite' => array('slug' => '/bootcamps/'),
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
    register_post_type( 'Stories', $args );
    
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
		  'author'
		) 
	  );
	register_post_type( 'Blog', $args );

	}
	add_action( 'init', 'register_post_types' );