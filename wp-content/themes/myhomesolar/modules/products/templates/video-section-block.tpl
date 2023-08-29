<?php

    $videoTitle = get_field('video_title');
    $videoContent = get_field('video_content');
    $videoVideo = get_field('video');

    $videoPosition = $videoVideo['video_position']['value'];
    $videoType = $videoVideo['video_type']['value'];
    $videoSrc = $videoVideo['video_embed_link'];
    $videoThumbnail = $videoVideo['video_thumbnail'];

    if($videoThumbnail){
        $videoPoster = "poster=" . $videoThumbnail['sizes']['medium_large'] . " ";
    }

    echo "<section class=\"videoBlock\">"
        . "<div class=\"videoBlock-content\">"
            . "<h3>" . $videoTitle . "</h3>"
            . $videoContent
        . "</div>"
        . "<div class=\"videoBlock-video videoBlock-video--" . $videoPosition . "\">";

        switch($videoType){
            case "myhomesolar":
                echo "<video src=\"" . $videoSrc . "\" $videoPoster controls loop playsinline=\"\" preload=\"none\" muted=\"\" type=\"video/mp4\"></video>";
                break;
            case "youtube":
                echo "<iframe width=\"100%\" height=\"100%\" src=\"" . $videoSrc . "\" title=\"" . $videoTitle . "\" frameborder=\"0\" allow=\"accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture\" allowfullscreen></iframe>";
                break;
            case "vimeo":
                echo "<iframe width=\"100%\" height=\"100%\" src=\"" . $videoSrc . "\" frameborder=\"0\" allow=\"autoplay; fullscreen; picture-in-picture\" allowfullscreen></iframe>";
                break;
        }

        echo "</div>";

    echo "</section>";

?>