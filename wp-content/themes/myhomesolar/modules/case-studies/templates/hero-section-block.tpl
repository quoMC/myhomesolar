<?php

    echo "<section class=\"heroSection\">";

        echo "<section class=\"heroSection-text\">"
            . "<h2>" . get_field('hero_section_text') . "</h2>"
        . "</section>";

        $galleryBlocks = get_field('hero_section_gallery');

        echo "<section class=\"heroSection-gallery\">"
            . "<div class=\"caseStudyGallery\">";

                $galleryBlockCount = 0;

                foreach ($galleryBlocks as $galleryBlockId => $galleryBlock) {

                    if($galleryBlockCount <= 2) {
                    echo "<div class=\"caseStudyGallery-galleryItem\" data-fancybox=\"caseStudyGallery\" data-src=\"" . $galleryBlock['sizes']['large'] . "\">"
                            . "<img src=\"" . $galleryBlock['sizes']['large'] . "\" />"
                        . "</div>";
                    } else {
                        echo "<div class=\"caseStudyGallery-galleryItem--hidden\" data-fancybox=\"caseStudyGallery\" data-src=\"" . $galleryBlock['sizes']['large'] . "\"></div>";
                    }
                    $galleryBlockCount++;

                };

        echo "</div>"
        . "</section>";

    echo "</section>";

?>