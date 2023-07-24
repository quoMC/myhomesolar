<?php

    echo "<section class=\"installationDetail\">"
        . "<div class=\"inner\">";

    $installDetailBlocks = get_field('install_detail_block');

    foreach ($installDetailBlocks as $installDetailId => $installDetailBlock) {

        echo "<article class=\"installationDetail-installDetailBlock\">"
            . $installDetailBlock['install_detail_icon']
            . "<h4>" . $installDetailBlock['install_detail_title'] . "</h4>"
            . $installDetailBlock['install_detail_content']
        . "</article>";

    }

    echo "</div>"
    . "</section>";

?>