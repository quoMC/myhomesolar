<?php

    echo "<section class=\"systemOverview\">";

        echo "<section class=\"systemOverview-title\">"
            . "<h3>" . get_field('system_overview_title') . "</h3>"
        . "</section>";

        $overviewIntroContent = get_field('system_overview_intro_content');
        $overviewIntroContent_split_columns = $overviewIntroContent['split_columns'];
        $overviewIntroContent_content = $overviewIntroContent['content'];

        echo "<section class=\"systemOverview-content";
            if(!$overviewIntroContent_split_columns){echo " systemOverview-content--singleCol";}
        echo "\">"
            . $overviewIntroContent_content
        . "</section>";

        echo "<section class=\"systemOverview-components\">";

        $componentBlocks = get_field('system_overview_components');

        foreach ($componentBlocks as $componentBlockId => $componentBlock) {

            echo "<article class=\"systemOverview-components-componentBlock\">"
                    . "<header><img src=\"" . $moduleBaseUrl . "\/assets\/" . $componentBlock['component_type']['value'] . "-icon.png\" alt=\"" . $componentBlock['component_type']['label'] . "\" /></header>"
                    . "<main>"
                        . "<h5>" . $componentBlock['component_title'] . "</h5>"
                        . "<p>" . $componentBlock['component_detail'] . "</p>"
                    . "</main>"
                . "</article>";

        }

        echo "</section>";

        $overviewFooterContent = get_field('system_overview_footer_content');
        $overviewFooterContent_split_columns = $overviewFooterContent['split_columns'];
        $overviewFooterContent_content = $overviewFooterContent['content'];

        echo "<section class=\"systemOverview-content";
            if(!$overviewFooterContent_split_columns){echo " systemOverview-content--singleCol";}
        echo "\">"
            . $overviewFooterContent_content
        . "</section>";

    echo "</section>";

?>