<?php

    $contentSectionBlocks = get_field('content_section_block');

    echo "<section class=\"contentBlocks\">";

    foreach ($contentSectionBlocks as $contentId => $contentSectionBlock) {

        $contentSectionBlock_image = $contentSectionBlock['content_section_block_image']['sizes']['large'];
        $contentSectionBlock_imageTitle = $contentSectionBlock['content_section_block_image']['title'];
        $contentSectionBlock_heading = $contentSectionBlock['content_section_block_content']['heading'];
        $contentSectionBlock_body = $contentSectionBlock['content_section_block_content']['body'];

        $contentSectionBlock_Button = "";

        if(!empty($contentSectionBlock['content_section_block_content']['button']['button_link'])){
            $button_label = $contentSectionBlock['content_section_block_content']['button']['button_label'];
            $button_title = $contentSectionBlock['content_section_block_content']['button']['button_link']['title'];
            $button_url = $contentSectionBlock['content_section_block_content']['button']['button_link']['url'];

            $contentSectionBlock_Button = "<a class=\"contentBlocks-contentBlock-button\" href=\"" . $button_url . "\" title=\"" . $button_title . "\">" . $button_label . "</a>";
        }

        echo "<article class=\"contentBlocks-contentBlock\">"
                . "<picture class=\"contentBlocks-contentBlock-image\">"
                    . "<source srcset=\"" . $contentSectionBlock_image . "\" media=\"(orientation: landscape)\">"
                    . "<img src=\"" . $contentSectionBlock_image . "\" alt=\"" . $contentSectionBlock_imageTitle . "\">"
                . "</picture>"
                . "<section class=\"contentBlocks-contentBlock-content\">"
                    . "<h4>" . $contentSectionBlock_heading . "</h4>"
                    . $contentSectionBlock_body
                    . $contentSectionBlock_Button
                . "</section>"
            . "</article>";
    }

    echo "</section>";

?>