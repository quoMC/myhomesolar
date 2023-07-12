<?php

    $faqBlocks = get_field('faq_block');

    echo "<section class=\"faqBlocks\" itemscope itemtype=\"https://schema.org/FAQPage\">"
        . "<h3>FAQ</h3>";

    foreach ($faqBlocks as $faqId => $faqBlock) {

        $faqBlock_heading = $faqBlock['faq_title'];
        $faqBlock_content = $faqBlock['faq_content'];

        echo "<article class=\"faqBlocks-faqBlock\" itemscope itemprop=\"mainEntity\" itemtype=\"https://schema.org/Question\">"
                . "<section class=\"faqBlocks-faqBlock-heading\">"
                    . "<h5 itemprop=\"name\">" . $faqBlock_heading . "</h5>"
                . "</section>"
                . "<section class=\"faqBlocks-faqBlock-content\" itemscope itemprop=\"acceptedAnswer\" itemtype=\"https://schema.org/Answer\">"
                    . "<div itemprop=\"text\">"
                        . $faqBlock_content
                    . "</div>"
                . "</section>"
            . "</article>";

    }

    echo "</section>";

?>