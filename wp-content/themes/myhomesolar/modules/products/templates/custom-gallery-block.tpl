<?php

    $galleryBlocks = get_field('custom_gallery');

    echo "<section class=\"galleryBlocks\">"
        . "<h3>Gallery</h3>";

        echo "<div class=\"productGallery\">";

            foreach ($galleryBlocks as $galleryBlockId => $galleryBlock) {

                echo "<div class=\"productGallery-galleryItem\" data-fancybox=\"productGallery\" data-src=\"" . $galleryBlock['sizes']['large'] . "\">"
                        . "<img src=\"" . $galleryBlock['sizes']['large'] . "\" alt=\"" . $galleryBlock['title'] . "\" />"
                    . "</div>";

            };

        echo "</div>";

    echo "</section>";

?>