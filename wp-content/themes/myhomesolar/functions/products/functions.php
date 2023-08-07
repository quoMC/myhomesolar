<?php

    /** Register Product type post type */
    add_action('init', 'product_type_page_init');

    /** Register Product post type */
    add_action('init', 'products_page_init');

    /** Add product type/product excerpt */
    //add_action('acf/save_post', 'update_products_excerpt');

    /** Action functions */

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
            'supports' => array('title','thumbnail','custom-fields','revisions','excerpt'),
            'menu_icon' => 'dashicons-index-card',
            'menu_position' => 20,
            'show_in_menu' => 'edit.php?post_type=product',
            'show_in_rest' => true,
            'taxonomies' => array( 'category' )
        );
        register_post_type( 'product-type' , $args );
    }

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
            'supports' => array('title','custom-fields','revisions','excerpt'),
            'menu_icon' => 'dashicons-products',
            'menu_position' => 20,
            'show_in_rest' => true,
            'taxonomies' => array( 'category' )
        );
        register_post_type( 'product' , $args );
    }

    function update_products_excerpt($post_id){

        global $post;

        $postType = $post->post_type;
        $postExcerpt = $_POST['excerpt'];

        if($postExcerpt == ""){

            if ($postType == "product-type" || $postType == "product"){

                switch($postType){
                    case "product-type" :
                        //$excerptContent = wp_strip_all_tags(substr(get_field('manufacturer_intro'),0,155) . "...");
                        break;
                    case "product" :
                        $heroSection = get_field('hero_section');
                        $heroSectionContent = $heroSection['hero_section_content']['hero_section_content_body'];
                        $excerptContent = wp_strip_all_tags(substr($heroSectionContent,0,155) . "...");
                        break;
                }

                wp_update_post(
                    array(
                        "ID" => $post_id,
                        "post_excerpt" => $excerptContent
                    )
                );

            }

        }
    }