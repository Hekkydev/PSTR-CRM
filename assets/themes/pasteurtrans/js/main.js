/*
 Project Name : Trans pro
 Author Company : themecanyon
 Project Date: 18 jan, 2017
 Author Website : http://demo.themecanyon.org
 Template Developer: sufyan319@outlook.com
 */


/* Table of Content
 ==================================================
 1.Parallax
 2.Header
 3.Count Function
 4.Map
 5.Progress bar
 6.Contact Form
 7.Testimonials
 8.Tooltip
*/

jQuery(function($) {

    "use strict";
    //============================================
    //Parallax
    //=============================================
    $('.parallax').parallax("50%", 0.1);
    $('.parallax1').parallax("100%", 0.1);
    $('.parallax2').parallax("100%", 0.1);
    $('.parallax3').parallax("100%", 0.1);
    $('.parallax4').parallax("100%", 0.1);

    //============================================
    //Header
    //=============================================
    //offCanvas menu
    $("div.offcanvas-inner ul > li.parent").append('<div class="more"></div>');
    $("div.offcanvas-inner .sp-module-content").on("click", ".more", function(e) {
        e.stopPropagation();
        $(this).parent().toggleClass("current")
            .children("div.offcanvas-inner ul > li.parent").toggleClass("open");
    });

    var $body = $('body'),
        $wrapper = $('.body-innerwrapper'),
        $toggler = $('#offcanvas-toggler'),
        $close = $('.close-offcanvas'),
        $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event) {
        event.preventDefault();
        stopBubble(event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event) {
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function() {
        $body.addClass('offcanvas');
        $wrapper.on('click', offCanvasClose);
        $close.on('click', offCanvasClose);
        $offCanvas.on('click', stopBubble);

    };

    var offCanvasClose = function() {
        $body.removeClass('offcanvas');
        $wrapper.off('click', offCanvasClose);
        $close.off('click', offCanvasClose);
        $offCanvas.off('click', stopBubble);
    };

    var stopBubble = function(e) {
        e.stopPropagation();
        return true;
    };
    //========================================
    // count function
    //======================================

    $('.counter-block').each(function() {
        $(this).appear(function() {
            var focus = $(this),
                i = focus.find(".odometer");
            window.setTimeout(function () {
                i.html(focus.attr("data-count"))
            }, 500)
        });
    });
    //============================================
    //map
    //=============================================
    // google.maps.event.addDomListener(window, 'load', function() {
    //
    //     $('.sppb-addon-gmap-canvas').each(function(index) {
    //         var mapId = 'sppb-addon-gmap' + (index + 1);
    //         var self = this;
    //
    //         $(this).attr('id', mapId);
    //
    //         var zoom = $(self).data('mapzoom');
    //         var mousescroll = $(self).data('mousescroll');
    //
    //         var latlng = new google.maps.LatLng($(self).data('lat'), $(self).data('lng'));
    //         var mapOptions = {
    //             zoom: zoom,
    //             center: latlng,
    //             scrollwheel: mousescroll
    //         };
    //         var map = new google.maps.Map(document.getElementById(mapId), mapOptions);
    //         var marker = new google.maps.Marker({
    //             position: latlng,
    //             map: map
    //         });
    //         map.setMapTypeId(google.maps.MapTypeId[$(self).data('maptype')]);
    //
    //     });
    //
    // });
    //================================================
    //Progress Bar
    //=================================================
    $('.skill').each(function() {
        $(this).appear(function() {
            $(this).find('.skill-box').animate({
                width: jQuery(this).attr('data-percent')
            }, 1000);
        });
    });

    /* ---------------------------------------------------------------------- */
    /*  Contact Form
     /* ---------------------------------------------------------------------- */

    var submitContact = $('#submit_contact'),
        message = $('#msg');

    submitContact.on('click', function(e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            type: "POST",
            url: 'contact.php',
            dataType: 'json',
            cache: false,
            data: $('#contact-form').serialize(),
            success: function(data) {

                if (data.info !== 'error') {
                    $this.parents('form').find('input[type=text],textarea,select').filter(':visible').val('');
                    message.hide().removeClass('success').removeClass('error').addClass('success').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                } else {
                    message.hide().removeClass('success').removeClass('error').addClass('error').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                }
            }
        });
    });
    //================================================
    //Testimonials
    //=================================================
    var sync1 = $("#sync1");
    var sync2 = $("#sync2");

    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        navigation: false,
        pagination: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
        autoPlay: 6000
    });

    sync2.owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsMobile: [479, 3],
        pagination: false,
        responsiveRefreshRate: 100,
        afterInit: function(el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        $("#sync2")
            .find(".owl-item")
            .removeClass("synced")
            .eq(current)
            .addClass("synced");
        if ($("#sync2").data("owlCarousel") !== undefined) {
            center(current)
        }
    }

    $("#sync2").on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }

        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }

    }

    //============================================
    //tooltip
    //=============================================
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();



/******************************************
-  PREPARE PLACEHOLDER FOR SLIDER  -
 ******************************************/


                        var setREVStartSize = function() {
                            var tpopt = new Object();
                            tpopt.startwidth = 1200;
                            tpopt.startheight = 550;
                            tpopt.container = jQuery('#rev_slider_1_1');
                            tpopt.fullScreen = "off";
                            tpopt.forceFullWidth = "off";

                            tpopt.container.closest(".rev_slider_wrapper").css({
                                height: tpopt.container.height()
                            });
                            tpopt.width = parseInt(tpopt.container.width(), 0);
                            tpopt.height = parseInt(tpopt.container.height(), 0);
                            tpopt.bw = tpopt.width / tpopt.startwidth;
                            tpopt.bh = tpopt.height / tpopt.startheight;
                            if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
                            if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
                            if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
                            if (tpopt.bh > 1) {
                                tpopt.bw = 1;
                                tpopt.bh = 1
                            }
                            if (tpopt.bw > 1) {
                                tpopt.bw = 1;
                                tpopt.bh = 1
                            }
                            tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
                            if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
                            if (tpopt.fullScreen == "on") {
                                tpopt.height = tpopt.bw * tpopt.startheight;
                                var cow = tpopt.container.parent().width();
                                var coh = jQuery(window).height();
                                if (tpopt.fullScreenOffsetContainer != undefined) {
                                    try {
                                        var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                                        jQuery.each(offcontainers, function(e, t) {
                                            coh = coh - jQuery(t).outerHeight(true);
                                            if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight
                                        })
                                    } catch (e) {}
                                }
                                tpopt.container.parent().height(coh);
                                tpopt.container.height(coh);
                                tpopt.container.closest(".rev_slider_wrapper").height(coh);
                                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                                tpopt.container.css({
                                    height: "100%"
                                });
                                tpopt.height = coh;
                            } else {
                                tpopt.container.height(tpopt.height);
                                tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
                            }
                        };

                        /* CALL PLACEHOLDER */
                        setREVStartSize();


                        var tpj = jQuery;
                        tpj.noConflict();
                        var revapi1;



                        tpj(document).ready(function() {



                            if (tpj('#rev_slider_1_1').revolution == undefined) {
                                revslider_showDoubleJqueryError('#rev_slider_1_1');
                            } else {
                                revapi1 = tpj('#rev_slider_1_1').show().revolution({

                                    dottedOverlay: "none",
                                    delay: 9000,
                                    startwidth: 1200,
                                    startheight: 550,
                                    hideThumbs: 200,

                                    thumbWidth: 100,
                                    thumbHeight: 50,
                                    thumbAmount: 3,

                                    simplifyAll: "off",
                                    navigationType: "bullet",
                                    navigationArrows: "solo",
                                    navigationStyle: "preview1",
                                    touchenabled: "on",
                                    onHoverStop: "on",
                                    nextSlideOnWindowFocus: "off",

                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    drag_block_vertical: false,


                                    keyboardNavigation: "off",

                                    navigationHAlign: "center",
                                    navigationVAlign: "bottom",
                                    navigationHOffset: 0,
                                    navigationVOffset: 20,

                                    soloArrowLeftHalign: "left",
                                    soloArrowLeftValign: "center",
                                    soloArrowLeftHOffset: 20,
                                    soloArrowLeftVOffset: 0,

                                    soloArrowRightHalign: "right",
                                    soloArrowRightValign: "center",
                                    soloArrowRightHOffset: 20,
                                    soloArrowRightVOffset: 0,

                                    shadow: 0,
                                    fullWidth: "on",
                                    fullScreen: "off",

                                    spinner: "spinner0",

                                    stopLoop: "off",
                                    stopAfterLoops: -1,
                                    stopAtSlide: -1,

                                    shuffle: "off",

                                    autoHeight: "off",
                                    forceFullWidth: "off",



                                    hideThumbsOnMobile: "off",
                                    hideNavDelayOnMobile: 1500,
                                    hideBulletsOnMobile: "off",
                                    hideArrowsOnMobile: "off",
                                    hideThumbsUnderResolution: 0,

                                    hideSliderAtLimit: 0,
                                    hideCaptionAtLimit: 0,
                                    hideAllCaptionAtLilmit: 0,
                                    startWithSlide: 0,
                                    isJoomla: true
                                });



                            }
                        }); /*ready*/
});
