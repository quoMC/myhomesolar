
jQuery(document).ready(function() {

    if(jQuery(".galleryBlocks").length){
        var productGallery = Macy({
            container: ".productGallery",
            columns: 3,
            margin: {
                x: 10,
                y: 10,
            },
            breakAt: {
                768: 2,
                640: 1
            }
        });
    }

    Fancybox.bind("[data-fancybox]",{});

    jQuery(".heroSectionContent-toggle").on("click",function(toggleEvent){
        toggleEvent.preventDefault();
        jQuery(this).toggleClass("active");
    });

    jQuery(".heroSectionContent-tabs-tab").on("click",function(tabEvent){
        let targetTab = jQuery(this).data("tabtarget");
        jQuery(this)
            .addClass("active")
            .siblings().removeClass("active");
        jQuery("#" + targetTab)
            .addClass("active")
            .siblings().removeClass("active");
    });

    jQuery(".faqBlocks-faqBlock-heading").on("click",function(faqEvent){
        jQuery(this)
            .parents(".faqBlocks-faqBlock")
                .siblings(".faqBlocks-faqBlock")
                    .removeClass("active");
        jQuery(this)
            .parents(".faqBlocks-faqBlock")
                .toggleClass("active");
    });

});