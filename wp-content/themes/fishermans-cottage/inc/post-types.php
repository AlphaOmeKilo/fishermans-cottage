<?php
/**
 * Post types and custom taxonomies get registered here.
 *
 * @package fishermans-cottage
 * @since fishermans-cottage 0.1
 */

/**
 * Register custom post types
 */
function fc_init_post_types() {
  $event_labels = array(
    'name'               => 'Events',
    'singular_name'      => 'Event',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Event',
    'edit_item'          => 'Edit Event',
    'new_item'           => 'New Event',
    'all_items'          => 'All Events',
    'view_item'          => 'View Event',
    'search_items'       => 'Search Events',
    'not_found'          => 'No Events found',
    'not_found_in_trash' => 'No Events found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );

  $event_args = array(
    'labels'             => $event_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'with_front' => false, 'slug' => 'events' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,
    'taxonomies'         => array(),
    'menu_position'      => 4,
    'menu_icon'          => 'dashicons-calendar-alt',
    'supports'           => array( 'editor', 'title', 'thumbnail', 'page-attributes' )
  );

   register_post_type( 'event', $event_args );
}
add_action( 'init', 'fc_init_post_types' );