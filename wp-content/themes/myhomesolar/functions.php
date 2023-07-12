<?php

    /**
     * Load Custom scripts and styles
     */

    function theme_scripts() {
        //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
        wp_enqueue_script("jquery");
        wp_enqueue_script("slick-slider", get_stylesheet_directory_uri() . "/vendor/slick-slider/slick.min.js", "jQuery", null, true );
    }
    add_action( 'wp_enqueue_scripts', 'theme_scripts' );

	/** Disable sidebar in selected post types (front end) */
	function product_post_sidebar_layout( $layout ) {
		$post_types = array( 'products' );

		if ( in_array( get_post_type(), $post_types ) ) {
			return 'no-sidebar';
		}

		return $layout;
	}
	add_filter( 'generate_sidebar_layout', 'product_post_sidebar_layout' );

	/** Include the Events Functions */
	include_once("functions/products/functions.php");