<?php 

/*
* Creating a function to create our CPT
*/
 
function portfolio_custom_post_type() {
      // Set UI labels for Custom Post Type
          $labels = array(
              'name'                => _x( 'Portfolio', 'Post Type General Name', 'twentytwenty' ),
              'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'twentytwenty' ),
              'menu_name'           => __( 'Portfolio', 'twentytwenty' ),
              'parent_item_colon'   => __( 'Parent Portfolio', 'twentytwenty' ),
              'all_items'           => __( 'All Portfolio Pieces', 'twentytwenty' ),
              'view_item'           => __( 'View Portfolio Pieces', 'twentytwenty' ),
              'add_new_item'        => __( 'Add New Portfolio Piece', 'twentytwenty' ),
              'add_new'             => __( 'Add New', 'twentytwenty' ),
              'edit_item'           => __( 'Edit Portfolio', 'twentytwenty' ),
              'update_item'         => __( 'Update Portfolio', 'twentytwenty' ),
              'search_items'        => __( 'Search Portfolio', 'twentytwenty' ),
              'not_found'           => __( 'Not Found', 'twentytwenty' ),
              'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
          );   
      // Set other options for Custom Post Type
           
          $args = array(
              'label'               => __( 'portfolio', 'twentytwenty' ),
              'description'         => __( 'Portfolio peices', 'twentytwenty' ),
              'labels'              => $labels,
              // Features this CPT supports in Post Editor
              'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
              // You can associate this CPT with a taxonomy or custom taxonomy. 
              // 'taxonomies' => array('post_tag'),
      
              /* A hierarchical CPT is like Pages and can have
              * Parent and child items. A non-hierarchical CPT
              * is like Posts.
              */ 
              'hierarchical'        => false,
              'public'              => true,
              'show_ui'             => true,
              'show_in_menu'        => true,
              'show_in_nav_menus'   => true,
              'show_in_admin_bar'   => true,
              'menu_icon'           => 'dashicons-art',
              'menu_position'       => 5,
              'can_export'          => true,
              'has_archive'         => true,
              'exclude_from_search' => false,
              'publicly_queryable'  => true,
              'capability_type'     => 'post',
              'show_in_rest' => true,
       
          );
      
          // Registering your Custom Post Type
          register_post_type( 'portfolio', $args );
      
       
      }
       
      /* Hook into the 'init' action so that the function
      * Containing our post type registration is not 
      * unnecessarily executed. 
      */
       
      add_action( 'init', 'portfolio_custom_post_type', 0 );
        
      // Register Custom Taxonomy
      function portfolio_taxononmy_tags() {
      
          $labels = array(
              'name'                       => 'Portfolio Tag',
              'singular_name'              => 'Portfolio Tag',
              'menu_name'                  => 'Portfolio Tags',
              'all_items'                  => 'All Portfolio Tags',
              'parent_item'                => 'Parent Portfolio Tag',
              'parent_item_colon'          => 'Parent Portfolio Tag:',
              'new_item_name'              => 'New Portfolio Tag',
              'add_new_item'               => 'Add New Portfolio Tag',
              'edit_item'                  => 'Edit Portfolio Tag',
              'update_item'                => 'Update Portfolio Tag',
              'separate_items_with_commas' => 'Separate Portfolio Tags with commas',
              'search_items'               => 'Search Portfolio Tags',
              'add_or_remove_items'        => 'Add or remove Portfolio Tags',
              'choose_from_most_used'      => 'Choose from the most used Portfolio Tags',
              'not_found'                  => 'Not Found',
          );
          $args = array(
              'labels'                     => $labels,
              'hierarchical'               => false,
              'public'                     => true,
              'show_ui'                    => true,
              'show_admin_column'          => true,
              'show_in_nav_menus'          => true,
              'show_tagcloud'              => true,
          );
          register_taxonomy( 'portfolio-tags', array( 'portfolio' ), $args );
      
      }
      
      // Hook into the 'init' action
      add_action( 'init', 'portfolio_taxononmy_tags', 0 );
?>