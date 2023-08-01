<?php

/** Template Name: Product Page */

get_header();

?>

<style>
    <?php include get_stylesheet_directory() . "/modules/products/css/style.min.css"; ?>
    <?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.css"; ?>
</style>

<?php

    /** Breadcrumbs Section */

    $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );
    $primary_cat_id = get_post_meta($post->ID,'_yoast_wpseo_primary_category', true);

    if($post_categories){

        function compareByTermID($a, $b){
            return $a->term_id - $b->term_id;
        }

        usort($post_categories, 'compareByTermID');

        foreach($post_categories as $key => $data) {
            if ($data->term_id == $primary_cat_id) {
                unset($post_categories[$key]);
                $post_categories[-1] = $data;
                break;
            }
        }

        ksort($post_categories);
        $post_categories = array_values($post_categories);

        $post_category_1 = $post_categories['0']->slug;
        $post_categories['1']->slug = $post_categories['0']->slug . "/" . $post_categories['0']->slug . "-" . $post_categories['1']->slug;
    }

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

?>

<?php
    if(get_field('hero_section')) {
        $heroSection = get_field('hero_section');
        $heroSectionImage = $heroSection['hero_section_image'];
        $heroSectionContent = $heroSection['hero_section_content'];
        $heroSectionTabs = $heroSection['hero_section_content_tabs'];

        $heroSectionImage_source = $heroSectionImage['sizes']['medium_large'];
        $heroSectionImage_title = $heroSectionImage['title'];

        $heroSectionContent_heading = $heroSectionContent['hero_section_content_heading'];
        $heroSectionContent_body = $heroSectionContent['hero_section_content_body'];

?>

    <!-- Hero Section -->
    <main class="heroSection">
        <picture>
            <source srcset="<?php echo $heroSectionImage_source ?>" media="(orientation: portrait)">
            <img src="<?php echo $heroSectionImage_source ?>" alt="<?php echo $heroSectionImage_title ?>">
        </picture>
        <section>
            <div class="heroSectionContent">
                <a class="heroSectionContent-toggle" href="#"></a>
                <h2 itemprop="name"><?php echo $heroSectionContent_heading ?></h2>
                <div class="heroSectionContent-body">
                    <?php echo $heroSectionContent_body ?>
                </div>
            </div>
            <div class="heroSectionContent-tabs">
                <ul class="heroSectionContent-tabs-tabList" role="tablist">
                <?php
                    $tabListCounter = 0;
                    foreach ($heroSectionTabs as $tabId => $heroSectionTab) {

                        $active = $tabListCounter == 0 ? " active" : "";

                        echo "<li class=\"heroSectionContent-tabs-tab heroSectionContent-tabs-tab--" . strtolower($heroSectionTab['tab_title']) . $active . "\" role=\"none\" data-tabTarget=\"heroSectionContent-tabs-tabContent__" . $tabId ."\">"
                            . $heroSectionTab['tab_title']
                        . "</li>";

                        $tabListCounter = $tabListCounter + 1;
                    }
                ?>
                </ul>
                <div class="heroSectionContent-tabs-wrapper">
                    <?php
                        $tabCounter = 0;
                        foreach ($heroSectionTabs as $tabId => $heroSectionTab) {

                            $active = $tabCounter == 0 ? " active" : "";

                            echo "<div id=\"heroSectionContent-tabs-tabContent__" . $tabId ."\" class=\"heroSectionContent-tabs-tabContent" . $active . "\">"
                                . $heroSectionTab['tab_content']
                            . "</div>";

                            $tabCounter = $tabCounter + 1;
                        }
                    ?>
                    </div>
                </div>
        </section>
    </main>

<?php

    }

    /** Content Section */

    if(get_field('content_section_block')){

        include get_stylesheet_directory() . "/modules/products/templates/content-section-block.tpl";

    }

    /** Product Gallery Section */

    if(get_field('custom_gallery')){

        include get_stylesheet_directory() . "/modules/products/templates/custom-gallery-block.tpl";

    }

    /** Product Downloads Section */

    if(get_field('download_block')){

        include get_stylesheet_directory() . "/modules/products/templates/download-section-block.tpl";

    }

    /** Product FAQs Section */

    if(get_field('faq_block')){

        include get_stylesheet_directory() . "/modules/products/templates/faq-block.tpl";

    }

get_footer();

?>

<script><?php include get_stylesheet_directory() . "/vendor/macy/macy.min.js" ?></script>
<script><?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.js" ?></script>
<script><?php include get_stylesheet_directory() . "/modules/products/js/products.min.js" ?></script>