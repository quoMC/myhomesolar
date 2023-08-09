<?php

$moduleBaseUrl = get_stylesheet_directory_uri() . "/modules/case-studies";

/** Template Name: Case Study Page */

add_filter( 'wpseo_replacements', function( $replacements ){

    $overviewIntroContent = get_field('system_overview_intro_content');
    $overviewIntroContent_content = $overviewIntroContent['content'];

    if(!sizeof($replacements) && !empty($overviewIntroContent_content)){
        $replacements['%%excerpt%%'] = wp_html_excerpt(do_shortcode($overviewIntroContent_content), 155);
    }

    return $replacements;
});

get_header();

?>

<style>
    <?php include get_stylesheet_directory() . "/modules/case-studies/css/single/style.min.css"; ?>
    <?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.css"; ?>
</style>

<?php

    /** Breadcrumbs Section */

    $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );

    echo "<section class=\"moduleBreadcrumbs\">"
        . "<div>"
            . "<a href=\"" . site_url() . "\" title=\"MyHomeSolar - Home\"><i class=\"fa-solid fa-house\"></i></a>"
            . " &gt; "
            . "<a href=\"" . site_url() . "/previous-installation\" title=\"MyHomeSolar - Previous Installations\">Previous Installations</a>"
            . " &gt; ";

            /* if( $post_categories ){
                foreach($post_categories as $post_category){
                    echo "<a href=\"/" . $post_category->slug . "\" title=\"" . $post_category->name . "\">"
                        . $post_category->name
                    . "</a>"
                    . " &gt; ";
                }
            } */

            if( $post_categories ){
                foreach($post_categories as $post_category){
                    echo $post_category->name
                    . " &gt; ";
                }
            }

            the_title();

        echo "</div>"
    . "</section>";

    /** Hero Section */
    include get_stylesheet_directory() . "/modules/case-studies/templates/hero-section-block.tpl";

    /** System Overview Section */
    include get_stylesheet_directory() . "/modules/case-studies/templates/system-overview-block.tpl";

    /** Testimonial Section */
    if(get_field('testimonial_title') || get_field('testimonial_content') || get_field('testimonial_video')){
        include get_stylesheet_directory() . "/modules/case-studies/templates/testimonial-block.tpl";
    }

    /** Installation Detail Section */
    if(!empty(get_field('install_detail_block'))){
        include get_stylesheet_directory() . "/modules/case-studies/templates/installation-detail-block.tpl";
    }

    /** Bottom Content */
    if(!empty(get_field('footer_content'))){

        $footerContent = get_field('footer_content');
        $footerContent_split_columns = $footerContent['split_columns'];
        $footerContent_content = $footerContent['content'];

        echo "<section class=\"footerContent";
            if(!$footerContent_split_columns){echo " footerContent--singleCol";}
        echo "\">"
            . "<div class=\"inner\">"
                . $footerContent_content
            . "</div>"
        . "</section>";

    }

    get_footer();

?>

<script><?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.js" ?></script>
<script><?php include get_stylesheet_directory() . "/modules/case-studies/js/case-studies.min.js" ?></script>