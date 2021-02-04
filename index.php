<?php
/**
 * Plugin Name: MayeCreate Events
 * Plugin URI: https://www.mayecreate.com/
 * Description: This is the events post type plugin for MayeCreate Design
 * Version: 1.0
 * Author: Tyler Ernst, Rebecca Thomas, Creative Director Monica Pitts
 * Author URI: http://www.mayecreate.com/
 */
class MC_Event_Post_Types {
	
	public static function init() {
			add_action( 'init', array( __CLASS__, 'register_taxonomies' ), 5 );
			add_action( 'init', array( __CLASS__, 'mayecreate_create_post_type_event' ), 5 );
		}

	public static function register_taxonomies() {
	   register_taxonomy( 'eventcategory', 'menu', array( 'hierarchical' => true, 'label' => 'Event Categories', 'query_var' => true, 'rewrite' => true, 'show_in_rest' => true ) );
	}

	public static function mayecreate_create_post_type_event() {
			register_post_type( 'mc_events',
				array(
					'labels' => array(
						'name'              => __( 'Events'),
						'singular_name'     => __( 'Event' ),
						'add_new'           => __( 'Add Event' ),
						'add_new_item'      => __( 'Add New Event' ),
						'edit_item'         => __( 'Edit Event' ),  

					),
				'public' => true,
				'menu_position' => 10,
				'rewrite' => array('slug' => 'event', 'with_front' => false),
				'supports' => array('title','thumbnail','revisions','editor'),
				'menu_icon'         => 'dashicons-calendar',
				'taxonomies' => array('eventcategory'),
				'show_in_rest' => true,
				'has_archive' => true 
				)
			);
	}
	
}

MC_Event_Post_types::init();