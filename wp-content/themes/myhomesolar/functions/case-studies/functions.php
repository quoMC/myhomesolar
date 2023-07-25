<?php

    /** Register Product post type */
    function case_study_page_init() {
        $args = array(
            'labels' => array(
                'name' => __('Case Studies'),
                'singular_name' => __('Case Study'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'case-study',
                'with_front' => true,
                'hierarchical' => true
            ),
            'supports' => array('title','excerpt','thumbnail','custom-fields'),
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 20,
            'show_in_rest' => true,
            'taxonomies' => array( 'category' )
        );
        register_post_type( 'case-study' , $args );
    }
    add_action('init', 'case_study_page_init');