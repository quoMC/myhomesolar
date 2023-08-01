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
		$post_types = array( 'products', 'case-study' );

		if ( in_array( get_post_type(), $post_types ) ) {
			return 'no-sidebar';
		}

		return $layout;
	}
	add_filter( 'generate_sidebar_layout', 'product_post_sidebar_layout' );

	/* function readmore($fullText){
			if(@strpos($fullText, '<!--more-->')){
				$morePos  = strpos($fullText, '<!--more-->');
				$fullText = preg_replace('/<!--(.|\s)*?-->/', '', $fullText);
				print substr($fullText,0,$morePos);
				print "<div class=\"read-more-content hide\">". substr($fullText,$morePos,-1) . "</div>";
				print "<a class=\"ui lined small button read-more\">Read More</a>";
			} else {
				print $fullText;
			}
		}
	*/

	function get_primary_taxonomy_term( $post = 0, $taxonomy = 'category' ) {
		if ( ! $post ) {
			$post = get_the_ID();
		}

		$terms        = get_the_terms( $post, $taxonomy );
		$primary_term = array();

		if ( $terms ) {
			$term_display = '';
			$term_slug    = '';
			$term_link    = '';
			if ( class_exists( 'WPSEO_Primary_Term' ) ) {
				$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post );
				$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
				$term               = get_term( $wpseo_primary_term );
				if ( is_wp_error( $term ) ) {
					$term_display = $terms[0]->name;
					$term_slug    = $terms[0]->slug;
					$term_link    = get_term_link( $terms[0]->term_id );
				} else {
					$term_display = $term->name;
					$term_slug    = $term->slug;
					$term_link    = get_term_link( $term->term_id );
				}
			} else {
				$term_display = $terms[0]->name;
				$term_slug    = $terms[0]->slug;
				$term_link    = get_term_link( $terms[0]->term_id );
			}
			$primary_term['url']   = $term_link;
			$primary_term['slug']  = $term_slug;
			$primary_term['title'] = $term_display;
		}
		return $primary_term;
	}

	/** Include the Products Functions */
	include_once("functions/products/functions.php");

	/** Include the Case Studies Functions */
	include_once("functions/case-studies/functions.php");