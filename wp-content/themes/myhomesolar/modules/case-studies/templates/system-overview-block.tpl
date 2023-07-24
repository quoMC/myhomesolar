<?php

    echo "<section class=\"systemOverview\">";

        echo "<section class=\"systemOverview-title\">"
            . "<h3>" . get_field('system_overview_title') . "</h3>"
        . "</section>";

        echo "<section class=\"systemOverview-components\">";

        $componentBlocks = get_field('system_overview_components');

        foreach ($componentBlocks as $componentBlockId => $componentBlock) {

            echo "<article class=\"systemOverview-components-componentBlock\">"
                    . "<header><img src=\"" . $moduleBaseUrl . "\/assets\/" . $componentBlock['component_type']['value'] . "-icon.png\" alt=\"" . $componentBlock['component_type']['label'] . "\" /></header>"
                    . "<main>" . $componentBlock['component_detail'] . "</main>"
                . "</article>";

        }

        echo "</section>";

        echo "<section class=\"systemOverview-content\">"
            . get_field('system_overview_content')
        . "</section>";

    echo "</section>";

?>