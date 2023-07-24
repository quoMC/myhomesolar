<?php

$moduleBaseUrl = get_stylesheet_directory_uri() . "/modules/case-studies";

/** Template Name: Case Study Page */

get_header();

?>

<style>
    <?php include get_stylesheet_directory() . "/modules/case-studies/css/style.min.css"; ?>
    <?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.css"; ?>
</style>

<?php

    /** Breadcrumbs Section */

    $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );

    echo "<section class=\"moduleBreadcrumbs\">"
        . "<div>"
            . "<a href=\"" . site_url() . "\" title=\"MyHomeSolar - Home\"><i class=\"fa-solid fa-house\"></i></a>"
            . " &gt; ";

            if( $post_categories ){
                foreach($post_categories as $post_category){
                    echo "<a href=\"/" . $post_category->slug . "\" title=\"" . $post_category->name . "\">"
                        . $post_category->name
                    . "</a>"
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
    include get_stylesheet_directory() . "/modules/case-studies/templates/testimonial-block.tpl";

    /** Installation Detail Section */
    include get_stylesheet_directory() . "/modules/case-studies/templates/installation-detail-block.tpl";

    /** Bottom Content */
    if(get_field('bottom_content')){
        echo "<section class=\"bottomContent\">"
            . get_field('bottom_content')
        . "</section>";
    }

    get_footer();

?>

<script><?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.js" ?></script>
<script><?php include get_stylesheet_directory() . "/modules/case-studies/js/case-studies.min.js" ?></script>