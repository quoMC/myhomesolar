<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.min.css"/>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/5f1528e6b8.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <style>body{margin:0;padding:0;font-family: sans-serif;}h3{font-size: 35px;}</style>

        <div class="homeSlider">
        <?php
            $json = file_get_contents("slider-data.json");
            $data = json_decode($json, true);
            foreach($data as $slideItem) {
                echo "<div class=\"homeSlider-slide\">" .
                        "<div class=\"homeSlider-slide-image\" style=\"background-image:url('" . $slideItem['slide_image'] . "')\">" ."</div>" .
                        "<div class=\"homeSlider-slide-content\">" . $slideItem['slide_content'] . "</div>" .
                    "</div>";
            }
        ?>
        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script>
            jQuery(document).ready(function() {
                jQuery(".homeSlider").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    fade: true,
                    appendArrows: '.homeSlider-slide-content',
                    prevArrow: '<span class="homeSlider-prev slick-prev"><i class="fas fa-caret-left"></i></span>',
                    nextArrow: '<span class="homeSlider-next slick-next"><i class="fas fa-caret-right"></i></span>'
                });
                jQuery(".homeSlider .slick-prev").on("click", function () {
                    jQuery(".homeSlider").slick("slickPrev");
                });
                jQuery(".homeSlider .slick-next").on("click", function () {
                    jQuery(".homeSlider").slick("slickNext");
                });
            });
        </script>
    </body>
</html>