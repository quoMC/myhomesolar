<?php

/** Template Name: Product Type Page */

get_header();

?>

<style>
    <?php include get_stylesheet_directory() . "/modules/products/css/style.min.css"; ?>
    <?php include get_stylesheet_directory() . "/vendor/fancybox/fancybox.min.css"; ?>
</style>


<?php

    //echo "<pre>" . print_r(get_fields()) . "</pre>";

    $postTitle = get_the_title();

    /** Breadcrumbs Section */

    $post_categories = wp_get_post_categories( $post->ID, array( 'fields' => 'all' ) );

    echo "<section class=\"productBreadcrumbs\">"
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

            echo $postTitle;

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
                    . "<picture>"
                        . "<source srcset=\"" . $manufacturerLogo_source ."\" media=\"(orientation: portrait)\">"
                        . "<img src=\"" . $manufacturerLogo_source . "\" alt=\"" . $manufacturerLogo_title . "\">"
                    . "</picture>"
                . "</div>"
                . "<div class=\"manufacturerSection-intro\">"
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
                            . $seriesBlock['series_content_column_2']
                        . "</div>"
                        . "<div class=\"seriesBlocks-seriesBlock-seriesOverview-imageBlock\">"
                            . "<picture>"
                                . "<source srcset=\"" . $seriesBlock['series_image']['sizes']['medium'] ."\" media=\"(orientation: portrait)\">"
                                . "<img src=\"" . $seriesBlock['series_image']['sizes']['medium_large'] . "\" alt=\"" . $seriesBlock['series_image']['title'] . "\">"
                            . "</picture>"
                        . "</div>"
                    . "</div>"
                . "</section>"
                . "<section class=\"seriesBlocks-seriesBlock-seriesVariants\">";

                    foreach ($seriesVariants as $seriesVariantId => $seriesVariant) {

                        echo "<article class=\"seriesBlocks-seriesBlock-seriesVariants-seriesVariant\">"
                            . "<h4>" . $seriesVariant['series_variant_title'] . "</h4>"
                            . $seriesVariant['series_variant_content'];

                        if($seriesVariant['series_variant_button']){
                            $button_label = $seriesVariant['series_variant_button']['button_label'];
                            $button_title = $seriesVariant['series_variant_button']['button_link']['title'];
                            $button_url = $seriesVariant['series_variant_button']['button_link']['url'];

                            echo "<a class=\"seriesBlocks-seriesBlock-seriesVariants-seriesVariant-button\" href=\"" . $button_url . "\" title=\"" . $button_title . "\">" . $button_label . "</a>";
                        }

                        echo "</article>";

                    }

            echo "</section>"
            . "</article>";

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

    if(get_field('series_spec_table_row')){

        echo "<section class=\"seriesSpec-specTable\">"
            . "<h3>" . get_field('series_spec_table_title') . "</h3>";

            echo "<div class=\"seriesSpec-specTable-table\">"
                    . "<table>"
                        . "<tr>"
                            . "<th>Model</th>"
                            . "<th>Power Output</th>"
                            . "<th>Maximum Efficiency</th>"
                            . "<th>Weight</th>"
                            . "<th>Solar Cell Technology</th>"
                            . "<th>Dimensions</th>"
                        . "</tr>"
                        . "<tr>";

                        $seriesSpecTableRows = get_field('series_spec_table_row');

                        $modelArray=[];
                        $powerOutputArray=[];
                        $maxEfficiencyArray=[];
                        $weightArray=[];
                        $cellTechnologyArray=[];
                        $dimensionsArray=[];

                        foreach ($seriesSpecTableRows as $seriesSpecTableRow){

                            $modelArray[] = $seriesSpecTableRow['model'];
                            $powerOutputArray[] = $seriesSpecTableRow['power_output'];
                            $maxEfficiencyArray[] = $seriesSpecTableRow['maximum_efficiency'];
                            $weightArray[] = $seriesSpecTableRow['weight'];
                            $cellTechnologyArray[] = $seriesSpecTableRow['solar_cell_technology'];
                            $dimensionsArray[] = $seriesSpecTableRow['dimensions'];

                            echo "<tr>"
                                    . "<td>" . $seriesSpecTableRow['model'] . "</td>"
                                    . "<td>" . $seriesSpecTableRow['power_output'] . "</td>"
                                    . "<td>" . $seriesSpecTableRow['maximum_efficiency'] . "</td>"
                                    . "<td>" . $seriesSpecTableRow['weight'] . "</td>"
                                    . "<td>" . $seriesSpecTableRow['solar_cell_technology'] . "</td>"
                                    . "<td>" . $seriesSpecTableRow['dimensions'] . "</td>"
                                . "</tr>";

                        }

                echo "</table>"
            . "</div>";

            echo "<script type=\"application/ld+json\">"
                . "{"
                    . "\"@context\" : [\"https://schema.org\", {\"csvw\": \"http://www.w3.org/ns/csvw#\"}],"
                    . "\"@type\" : \"Dataset\","
                    . "\"name\" : \"" . get_field('series_spec_table_title') . "\","
                    . "\"description\" : \"Power, weight, technology and dimensions of " . $postTitle . "\","
                    . "\"publisher\" : {"
                        . "\"@type\" : \"Organization\","
                        . "\"name\" : \"My Home Solar Ltd.\""
                    . "},"
                    . "\"license\" : \"https://creativecommons.org/licenses/by-nc-sa/4.0\","
                    . "\"creator\" :{"
                        . "\"@type\" : \"Organization\","
                        . "\"url\" : \"https://myhomesolar.uk\","
                        . "\"name\" : \"My Home Solar Ltd.\","
                        . "\"contactPoint\":{"
                            . "\"@type\" : \"ContactPoint\","
                            . "\"contactType\" : \"Customer Service\","
                            . "\"telephone\" : \"+448001933933\","
                            . "\"email\" : \"quotes@myhomesolar.uk\""
                        . "}"
                    . "},"
                    . "\"mainEntity\" : {"
                        . "\"@type\" : \"csvw:Table\","
                        . "\"csvw:tableSchema\" : {"
                            . "\"csvw:columns\" : ["
                                . "{"
                                    . "\"csvw:name\" : \"Model\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($modelArray as $model){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $model . "\","
                                                . "\"csvw:primaryKey\": \"" . $model . "\"";
                                            if( $model === end( $modelArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "},"
                                . "{"
                                    . "\"csvw:name\" : \"Power Output\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($powerOutputArray as $powerOuputId => $powerOuput){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $powerOuput . "\","
                                                . "\"csvw:primaryKey\": \"" . $modelArray[$powerOuputId] . "\"";
                                            if( $powerOuput === end( $powerOutputArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "},"
                                . "{"
                                    . "\"csvw:name\" : \"Maximum Efficiency\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($maxEfficiencyArray as $maxEfficiencyId => $maxEfficiency){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $maxEfficiency . "\","
                                                . "\"csvw:primaryKey\": \"" . $modelArray[$maxEfficiencyId] . "\"";
                                            if( $maxEfficiency === end( $maxEfficiencyArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "},"
                                . "{"
                                    . "\"csvw:name\" : \"Weight\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($weightArray as $weightId => $weight){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $weight . "\","
                                                . "\"csvw:primaryKey\": \"" . $modelArray[$weightId] . "\"";
                                            if( $weight === end( $weightArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "},"
                                . "{"
                                    . "\"csvw:name\" : \"Cell Technology\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($cellTechnologyArray as $cellTechnologyId => $cellTechnology){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $cellTechnology . "\","
                                                . "\"csvw:primaryKey\": \"" . $modelArray[$cellTechnologyId] . "\"";
                                            if( $cellTechnology === end( $cellTechnologyArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "},"
                                . "{"
                                    . "\"csvw:name\" : \"Cell Technology\","
                                    . "\"csvw:datatype\" : \"string\","
                                    . "\"csvw:cells\" : [";

                                        foreach($dimensionsArray as $dimensionsId => $dimensions){
                                            echo "{"
                                                . "\"csvw:value\" : \"" . $dimensions . "\","
                                                . "\"csvw:primaryKey\": \"" . $modelArray[$dimensionsId] . "\"";
                                            if( $dimensions === end( $dimensionsArray ) ) {
                                                echo "}";
                                            } else {
                                                echo "},";
                                            }
                                        }

                                    echo "]"
                                . "}"
                            . "]"
                        . "}"
                    . "}"
                . "}"
            . "</script>"

        . "</section>";

    }

    /** Content Section */

    if(get_field('content_section_block')){

        include get_stylesheet_directory() . "/modules/products/templates/content-section-block.tpl";

    }

    /** Promo Banner Section */

    echo "<section class=\"promoBanner\">"
        . "<div class=\"promoBanner-inner\">"
            . "<h4>At MyHomeSolar, we believe in the potential of solar power to transform homes</h4>"
            . "<p>We're excited to offer " . $postTitle . " as part of our mission to help you harness this potential. Contact us today to find out more about these remarkable solar panels and how they can help power your home sustainably and efficiently.</p>"
        . "</div>"
    . "</section>";

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