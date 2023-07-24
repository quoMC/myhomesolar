<?php

    echo "<section class=\"testimonial\">";

        echo "<section class=\"testimonial-content\">"
            . "<div>"
                . get_field('testimonial_content')
                . "<cite>" . get_field('testimonial_name') . "</cite>"
            . "</div>"
        . "</section>";

        echo "<section class=\"testimonial-video\">"
            . get_field('testimonial_video')
        . "</section>";

    echo "</section>";

?>