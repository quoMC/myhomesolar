<?php

    /** Register Product type post type */
    function product_type_page_init() {
        $args = array(
            'labels' => array(
                'name' => __('Product Types'),
                'singular_name' => __('Product Type'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'product-type',
                'with_front' => true,
                'hierarchical' => true
            ),
            'supports' => array('title','thumbnail','custom-fields'),
            'menu_icon' => 'dashicons-index-card',
            'menu_position' => 20,
            'show_in_menu' => 'edit.php?post_type=product',
            'show_in_rest' => true,
            'taxonomies' => array( 'category' )
        );
        register_post_type( 'product-type' , $args );
    }
    add_action('init', 'product_type_page_init');

    /** Register Product post type */
    function products_page_init() {
        $args = array(
            'labels' => array(
                'name' => __('Products'),
                'singular_name' => __('Product'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array(
                'slug' => 'product',
                'with_front' => true,
                'hierarchical' => true
            ),
            'supports' => array('title','custom-fields'),
            'menu_icon' => 'dashicons-products',
            'menu_position' => 20,
            'show_in_rest' => true,
            'taxonomies' => array( 'category' )
        );
        register_post_type( 'product' , $args );
    }
    add_action('init', 'products_page_init');