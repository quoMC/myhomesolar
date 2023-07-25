<?php

    $downloadBlocks = get_field('download_block');

    echo "<section class=\"downloadBlocks\">"
        . "<h3>Downloads</h3>";

    foreach ($downloadBlocks as $downloadId => $downloadBlock) {

        $downloadBlock_title = $downloadBlock['download_title'];
        $downloadBlock_thumb = $downloadBlock['download_thumbnail']['sizes']['medium_large'];
        if(empty($downloadBlock_thumb)){
            $downloadBlock_thumb = "/wp-content/uploads/2023/07/download-placeholder.jpg";
        }
        $downloadBlock_file = $downloadBlock['download_file']['url'];
        $downloadBlock_fileTitle = $downloadBlock['download_file']['title'];

        echo "<article class=\"downloadBlocks-downloadBlock\">"
                . "<a href=\"$downloadBlock_file\" title=\"" . $downloadBlock_fileTitle . "\" target=\"_blank\">"
                    . "<picture class=\"downloadBlocks-downloadBlock-image\">"
                        . "<source srcset=\"" . $downloadBlock_thumb . "\" media=\"(orientation: landscape)\">"
                        . "<img src=\"" . $downloadBlock_thumb . "\" alt=\"" . $downloadBlock_title . "\">"
                    . "</picture>"
                    . "<section class=\"downloadBlocks-downloadBlock-content\">"
                        . "<h4>" . $downloadBlock_fileTitle . "</h4>"
                    . "</section>"
                . "</a>"
            . "</article>";

    }

    echo "</section>";

?>