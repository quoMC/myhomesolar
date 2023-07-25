<?php

    echo "<section class=\"testimonial\">";

        echo "<section class=\"testimonial-intro\">"
            . "<h3>" . get_field('testimonial_title') . "</h3>"
            . get_field('testimonial_intro')
        . "</section>";

        if(get_field('testimonial_content')){
            echo "<section class=\"testimonial-content\">"
                . "<div>"
                    . get_field('testimonial_content')
                    . "<cite>" . get_field('testimonial_name') . "</cite>"
                . "</div>"
            . "</section>";
        }

        if(get_field('testimonial_video')){
            echo "<section class=\"testimonial-video\">"
                . get_field('testimonial_video')
            . "</section>";
        }

    echo "</section>";

?>