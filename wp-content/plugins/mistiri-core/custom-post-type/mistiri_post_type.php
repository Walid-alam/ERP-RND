<?php

//Register post type Project
function register_Project() {

    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'mistiri' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'mistiri' ),
        'menu_name'             => __( 'Project', 'mistiri' ),
        'name_admin_bar'        => __( 'Project', 'mistiri' ),
        'archives'              => __( 'Project Archives', 'mistiri' ),
        'parent_item_colon'     => __( 'Parent Project:', 'mistiri' ),
        'all_items'             => __( 'All Projects', 'mistiri' ),
        'add_new_item'          => __( 'Add New Project', 'mistiri' ),
        'add_new'               => __( 'Add Project', 'mistiri' ),
        'new_item'              => __( 'New Project', 'mistiri' ),
        'edit_item'             => __( 'Edit Project', 'mistiri' ),
        'update_item'           => __( 'Update Project', 'mistiri' ),
        'view_item'             => __( 'View Project', 'mistiri' ),
        'search_items'          => __( 'Search Project', 'mistiri' ),
        'not_found'             => __( 'Not found', 'mistiri' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'mistiri' ),
        'featured_image'        => __( 'Featured Image', 'mistiri' ),
        'set_featured_image'    => __( 'Set featured image', 'mistiri' ),
        'remove_featured_image' => __( 'Remove featured image', 'mistiri' ),
        'use_featured_image'    => __( 'Use as featured image', 'mistiri' ),
        'insert_into_item'      => __( 'Insert into project', 'mistiri' ),
        'uploaded_to_this_item' => __( 'Uploaded to this project', 'mistiri' ),
        'items_list'            => __( 'Projects list', 'mistiri' ),
        'items_list_navigation' => __( 'Projects list navigation', 'mistiri' ),
        'filter_items_list'     => __( 'Filter projects list', 'mistiri' ),
    );
    $args = array(
        'label'                 => __( 'Project', 'mistiri' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
        'taxonomies'            => array( 'project_category' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'rewrite'               => array( 'slug' => 'project', 'with_front' => true),
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'register_Project', 0 );

// Register Custom Taxonomy
function projectTaxonomy() {

    $labels = array(
        'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'mistiri' ),
        'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'mistiri' ),
        'menu_name'                  => __( 'Project Category', 'mistiri' ),
        'all_items'                  => __( 'All Categories', 'mistiri' ),
        'parent_item'                => __( 'Parent Category', 'mistiri' ),
        'parent_item_colon'          => __( 'Parent Category:', 'mistiri' ),
        'new_item_name'              => __( 'New Category Name', 'mistiri' ),
        'add_new_item'               => __( 'Add New Category', 'mistiri' ),
        'edit_item'                  => __( 'Edit Category', 'mistiri' ),
        'update_item'                => __( 'Update Category', 'mistiri' ),
        'view_item'                  => __( 'View Category', 'mistiri' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'mistiri' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'mistiri' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'mistiri' ),
        'popular_items'              => __( 'Popular Categories', 'mistiri' ),
        'search_items'               => __( 'Search Categories', 'mistiri' ),
        'not_found'                  => __( 'Not Found', 'mistiri' ),
        'no_terms'                   => __( 'No categories', 'mistiri' ),
        'items_list'                 => __( 'Categories list', 'mistiri' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'mistiri' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'project_category', array( 'project' ), $args );

}
add_action( 'init', 'projectTaxonomy', 0 );