<?php

/** Template Name: Product Type Page */

get_header();

?>

<style>
    <?php include get_stylesheet_directory() . "/modules/products/css/style.min.css"; ?>
    <?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.css"; ?>
</style>


<?php

    $postTitle = get_the_title();

    /** Breadcrumbs Section */

    $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );
    $primary_cat_id = get_post_meta($post->ID,'_yoast_wpseo_primary_category', true);
    $aCatNames = array();
    $aCatSlugs = array();

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

    echo "<section class=\"moduleBreadcrumbs\">"
        . "<div>"
            . "<a href=\"" . site_url() . "\" title=\"MyHomeSolar - Home\"><i class=\"fa-solid fa-house\"></i></a>"
            . " &gt; ";

            if( $post_categories ){
                foreach($post_categories as $post_category){

                    $aCatNames[] = $post_category->name;
                    $aCatSlugs[] = $post_category->slug;

                    $catLink = site_url() . "/" . $post_category->slug;

                    if( $post_category === end( $post_categories ) ) {
                        $lastCat = "noLink";
                        $catLink = get_page_link();
                        $onClick = " onclick=\"return false;\"";
                        $postTitle = "";
                    }

                    echo "<a class=\"" . $lastCat . "\" href=\"" . $catLink . "\" title=\"" . $postTitle . "\"" . $onClick . ">"
                        . $post_category->name
                    . "</a>";
                    if( $post_category != end( $post_categories ) ) {
                        echo " &gt; ";
                    }
                }
            }

        echo "</div>"
    . "</section>";

    /** Header Image */
    echo "<section class=\"productPageHeader\" style=\"background-image:url('" . get_the_post_thumbnail_url() . "')\"></section>";

    /** Manufacturer Section */
    if(get_field('manufacturer_intro')){

        $manufacturerLogo = get_field('manufacturer_logo');
        $manufacturerLogo_source = $manufacturerLogo['sizes']['medium'];
        $manufacturerLogo_title = $manufacturerLogo['title'];

        echo "<main class=\"manufacturerSection\">"
                . "<div class=\"manufacturerSection-logo\">"
                    . "<a href=\"/" . $aCatSlugs[0] . "\" title=\"" . $aCatNames[0] . "\">"
                    . "<picture>"
                        . "<source srcset=\"" . $manufacturerLogo_source ."\" media=\"(orientation: portrait)\">"
                        . "<img src=\"" . $manufacturerLogo_source . "\" alt=\"" . $manufacturerLogo_title . "\">"
                    . "</picture>"
                    . "</a>"
                . "</div>"
                . "<div class=\"manufacturerSection-intro\">"
                    //. readmore(get_field('manufacturer_intro'))
                    . get_field('manufacturer_intro')
                . "</div>"
            . "</main>";
    }

    /** Series Section */
    if(get_field('series_block')){

        $seriesBlocks = get_field('series_block');

        echo "<section class=\"seriesBlocks\">";

        foreach ($seriesBlocks as $seriesId => $seriesBlock) {

            $seriesVariants = $seriesBlock['series_variant'];

            echo "<article class=\"seriesBlocks-seriesBlock\">"
                . "<section class=\"seriesBlocks-seriesBlock-seriesOverview\">"
                    .  "<div class=\"inner\">"
                        . "<div class=\"seriesBlocks-seriesBlock-seriesOverview-contentBlock\">"
                            . "<h3>" . $seriesBlock['series_title'] . "</h3>"
                            . $seriesBlock['series_content_column_1']
                        . "</div>"
                        . "<div class=\"seriesBlocks-seriesBlock-seriesOverview-contentBlock\">"
                            . $seriesBlock['series_content_column_2'];

                            if(!empty($seriesBlock['single_series_button']['button_link']['url'])){
                                $button_label__single = $seriesBlock['single_series_button']['button_label'];
                                $button_title__single= $seriesBlock['single_series_button']['button_link']['title'];
                                $button_url__single = $seriesBlock['single_series_button']['button_link']['url'];

                                echo "<a class=\"seriesBlocks-seriesBlock-seriesVariants-seriesVariant-button\" href=\"" . $button_url__single . "\" title=\"" . $button_title__single . "\">" . $button_label__single . "</a>";
                            }

                        echo "</div>"
                        . "<div class=\"seriesBlocks-seriesBlock-seriesOverview-imageBlock\">"
                            . "<picture>"
                                . "<source srcset=\"" . $seriesBlock['series_image']['sizes']['medium'] ."\" media=\"(orientation: portrait)\">"
                                . "<img src=\"" . $seriesBlock['series_image']['sizes']['medium_large'] . "\" alt=\"" . $seriesBlock['series_image']['title'] . "\">"
                            . "</picture>"
                        . "</div>"
                    . "</div>"
                . "</section>";

                if(!empty($seriesVariants[0]['series_variant_title'])){

                    echo "<section class=\"seriesBlocks-seriesBlock-seriesVariants\">";

                    foreach ($seriesVariants as $seriesVariantId => $seriesVariant) {

                        echo "<article class=\"seriesBlocks-seriesBlock-seriesVariants-seriesVariant\">"
                            . "<h4>" . $seriesVariant['series_variant_title'] . "</h4>"
                            . $seriesVariant['series_variant_content'];

                        if(!empty($seriesVariant['series_variant_button']['button_label'])){
                            $button_label = $seriesVariant['series_variant_button']['button_label'];
                            $button_title = $seriesVariant['series_variant_button']['button_link']['title'];
                            $button_url = $seriesVariant['series_variant_button']['button_link']['url'];

                            echo "<a class=\"seriesBlocks-seriesBlock-seriesVariants-seriesVariant-button\" href=\"" . $button_url . "\" title=\"" . $button_title . "\">" . $button_label . "</a>";
                        }

                        echo "</article>";

                    }

                    echo "</section>";

                }

            echo "</article>";

        }

        echo "</section>";

    }

    /** Specs. Panel Section */
    if(get_field('series_spec_block_title')){

        echo "<section class=\"seriesSpec-specPanels\">"
            . "<section class=\"seriesSpec-specPanels-content\">"
                . "<h3>" . get_field('series_spec_block_title') . "</h3>"
                . get_field('series_spec_block_title_content')
            . "</section>";

            echo "<section class=\"seriesSpec-specPanels-outer\">";

                $seriesSpecPanels = get_field('series_card');

                foreach ($seriesSpecPanels as $seriesSpecPanel) {

                    echo "<article class=\"seriesSpec-specPanels-specPanel\">"
                        . "<header><h4>" . $seriesSpecPanel['series_card_title'] . "</h4></header>"
                        . "<main>" . $seriesSpecPanel['series_card_content'] . "</main>"
                    . "</article>";

                }

            echo "</section>";

            echo "<section class=\"seriesSpec-specPanels-content\">"
                    . get_field('series_spec_block_title_content_footer')
                . "</section>";

        echo "</section>";

    }

    /** Specs. Table Section */
    if(get_field('series_spec_table_content')){
        include get_stylesheet_directory() . "/modules/products/templates/table-product-type.tpl";
    }

    /** Content Section */
    if(get_field('content_section_block')){

        include get_stylesheet_directory() . "/modules/products/templates/content-section-block.tpl";

    }

    /** MHS - Promo Banner Section */
    if(get_field('promo_banner_title')){
        echo "<section class=\"promoBanner\">"
            . "<div class=\"promoBanner-inner\">"
                . "<h4>" . get_field('promo_banner_title') . "</h4>"
                . get_field('promo_banner_title_content')
            . "</div>"
        . "</section>";
    } else {
        echo "<section class=\"promoBanner\">"
            . "<div class=\"promoBanner-inner\">"
                . "<h4>At MyHomeSolar, we believe in the potential of solar power to transform homes</h4>"
                . "<p>We're excited to offer " . $postTitle . " as part of our mission to help you harness this potential. Contact us today to find out more about these remarkable " . strtolower($aCatNames[1]) . " and how they can help power your home sustainably and efficiently.</p>"
            . "</div>"
        . "</section>";
    }

    /** MHS - Benefits */
    if(get_field('benefit_block')){
        echo "<section class=\"mhsBenefits\">"
            . "<h4>" . get_field('benefit_title') . "</h4>"
            . "<div class=\"inner\">";

        $mhsBenefits = get_field('benefit_block');

        foreach ($mhsBenefits as $mhsBenefitId => $mhsBenefit) {

            echo "<article class=\"mhsBenefits-mhsBenefit\">"
                . $mhsBenefit['benefit_icon']
                . "<h4>" . $mhsBenefit['benefit_title'] . "</h4>"
                . $mhsBenefit['benefit_content']
            . "</article>";

        }

        echo "</div>"
        . "</section>";

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