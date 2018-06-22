jQuery(document).ready(function () {
    //flexslider
    jQuery('#banner_slider').flexslider({
        animation: "slide",
        controlNav: false,
        slideshow: false
    });
    jQuery(window).resize(function () {
        jQuery('#banner_slider').flexslider({
            animation: "slide",
            controlNav: false
        });
    });

    /********input number****/
//    jQuery(".qty_number").append('<div class="inc button">+</div><div class="dec button">-</div>');
//    jQuery(".qty_number .button").on("click", function () {
//        var $button = jQuery(this);
//        var oldValue = $button.parent().find("input").val();
//        if ($button.text() == "+") {
//            var newVal = parseFloat(oldValue) + 1;
//        } else {
//            // Don't allow decrementing below zero
//            if (oldValue > 0) {
//                var newVal = parseFloat(oldValue) - 1;
//            } else {
//                newVal = 0;
//            }
//        }
//        $button.parent().find("input").val(newVal);
//    });
    if(jQuery(window).width() <= 1024 ){
//        jQuery("<span class='caret'></span>").insertAfter(".mega-menu-item-has-children a:eq(0)");
        jQuery("<span class='caret'></span>").appendTo(".mega-menu-item-has-children a:eq(0)");
    }
    
    if(jQuery(window).width() <= 1024 ){
        jQuery('.mega-menu-item.mega-menu-item-has-children').mouseenter(function (){
            jQuery('.mega-sub-menu').hide(); 
        });
        jQuery('.mega-menu-item.mega-menu-item-has-children span').click(function (e){
           e.preventDefault();
            jQuery('.mega-sub-menu').show();
        });
    }
});
/***************************** isotop *************************/
jQuery(window).load(function () {
    var $container = jQuery('.filter').isotope({
        itemSelector: '.element-item',
        layoutMode: 'fitRows'
    });
    var filterFns = {
        numberGreaterThan50: function () {
            var number = jQuery(this).find('.number').text();
            return parseInt(number, 1) > 25;
        },
        ium: function () {
            var name = jQuery(this).find('.name').text();
            return name.match(/ium$/);
        }
    };
    jQuery('#filters').on('click', 'a', function (e) {
        e.preventDefault();
        var filterValue = jQuery(this).attr('data-filter');
        filterValue = filterFns[ filterValue ] || filterValue;
        $container.isotope({filter: filterValue});
    });
    jQuery('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        $buttonGroup.on('click', 'a', function () {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            jQuery(this).addClass('is-checked');
        });
    });
});
/******************************************** activity dropdown ********************************************/
jQuery(document).ready(function () {
    jQuery('.activity_arrow').click(function () {
        if (jQuery(this).siblings('.dropdown-menu').hasClass('open')) {
            jQuery(this).siblings('.dropdown-menu').removeClass('open');
        }
        else if (jQuery(this).parent('.dropdown').siblings('.dropdown').children('.dropdown-menu').hasClass('open')) {
            jQuery(this).parent('.dropdown').siblings('.dropdown').children('.dropdown-menu').removeClass('open');
            jQuery(this).siblings('.dropdown-menu').addClass('open');
        }
        else {
            jQuery(this).siblings('.dropdown-menu').addClass('open');
        }
    });


    //slider range
    jQuery("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [0, 80],
        slide: function (event, ui) {
            jQuery("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery("#amount").val("$" + jQuery("#slider-range").slider("values", 0) +
            " - $" + jQuery("#slider-range").slider("values", 1));
});



var window_height = jQuery(window).height();

var header_height = jQuery('header').height();

var banner_height = jQuery('.banner_bg').outerHeight();

var footer_height = jQuery('footer').height();

var sub_total = header_height + banner_height + footer_height;

var total_height = (window_height - sub_total) - 32;
jQuery('.main_section').css('min-height', total_height);

jQuery(window).resize(function () {
    jQuery('.main_section').css('min-height', total_height);
});

jQuery(document).ready(function () {
    var jQuerywindow = jQuery(window),
            flexslider1;
            
    if (jQuery(window).width() > 1199 && jQuery(window).width() < 1920) {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 360,
            itemMargin: 30,
            move: 1,
            minItems: 3,
            maxItems: 3,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    } else if (jQuery(window).width() > 991 && jQuery(window).width() < 1199) {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 300,
            itemMargin: 30,
            move: 1,
            minItems: 3,
            maxItems: 3,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    } else if (jQuery(window).width() > 767 && jQuery(window).width() < 991) {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 360,
            itemMargin: 30,
            move: 1,
            minItems: 2,
            maxItems: 2,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    } else if (jQuery(window).width() > 567 && jQuery(window).width() < 767) {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 280,
            itemMargin: 20,
            move: 1,
            minItems: 2,
            maxItems: 2,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    } else if (jQuery(window).width() < 567) {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 250,
            itemMargin: 20,
            move: 1,
            minItems: 1,
            maxItems: 1,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    } else {
        jQuery('#product_slider2').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 360,
            itemMargin: 30,
            move: 1,
            minItems: 3,
            maxItems: 3,
            asNavFor: '#product_slider1',
            start: function (slider) {
                flexslider1 = slider;
            }
        });
        jQuery('#product_slider1').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#product_slider2",
            directionNav: false,
            smoothHeight:true,
            auto: false
        });
    }
    jQuery(window).resize(function () {
        if (jQuery(window).width() > 1199 && jQuery(window).width() < 1920) {
            flexslider1.vars.minItems = 3;
            flexslider1.vars.maxItems = 3;
        } else if (jQuery(window).width() > 991 && jQuery(window).width() < 1199) {
            flexslider1.vars.minItems = 3;
            flexslider1.vars.maxItems = 3;
        } else if (jQuery(window).width() > 767 && jQuery(window).width() < 991) {
            flexslider1.vars.minItems = 2;
            flexslider1.vars.maxItems = 2;
        } else if (jQuery(window).width() > 567 && jQuery(window).width() < 767) {
            flexslider1.vars.minItems = 2;
            flexslider1.vars.maxItems = 2;
        } else if (jQuery(window).width() < 567) {
            flexslider1.vars.minItems = 1;
            flexslider1.vars.maxItems = 1;
        } else {
            flexslider1.vars.minItems = 3;
            flexslider1.vars.maxItems = 3;
        }
    });
});
jQuery(function () {
    jQuery("#accordion-2").accordion({
        collapsible: true
    });
});