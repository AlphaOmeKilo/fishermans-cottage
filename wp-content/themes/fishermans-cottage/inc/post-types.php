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
  $product_labels = array(
    'name'               => 'Products',
    'singular_name'      => 'Product',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Product',
    'edit_item'          => 'Edit Product',
    'new_item'           => 'New Product',
    'all_items'          => 'All Products',
    'view_item'          => 'View Product',
    'search_items'       => 'Search Products',
    'not_found'          => 'No Products found',
    'not_found_in_trash' => 'No Products found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Products'
  );

  $product_args = array(
    'labels'             => $product_labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'with_front' => false, 'slug' => 'products' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'taxonomies'         => array(),
    'menu_position'      => 4,
    'menu_icon'          => 'dashicons-cart',
    'supports'           => array( 'editor', 'title', 'thumbnail', 'page-attributes' )
  );

  // register_post_type( 'product', $product_args );
}
add_action( 'init', 'fc_init_post_types' );
