/* Preloader */
$(window).on("load", function () {
    $("#preloader").delay(500).fadeOut();
    $("body").delay(500).css("overflow", "visible");
});


$(document).ready(function () {

    /*
     * Dodanie target _blank do testu
     * 
     */

    $("#menu-menu-top li:last-child a").on("click", function () {
        $(this).attr("target", "_blank");
    });

    $('.carousel').carousel();

    /* Menu hamburger */
    var click_hamburger = 0;
    $(".menu-hamburger").click(function () {
        console.log("klik" + click_hamburger);

        if ((click_hamburger % 2) == 0) {
            $(".menu-hamburger").html("<i class='fa fa-close' aria-hidden='true' ></i>");
            $(".menu-emi-pion, .menu-emi").fadeIn(300).css("display", "table");

        } else {
            $(".menu-emi-pion, .menu-emi").fadeOut(300);
            $(".menu-hamburger").html("<i class='fa fa-bars' aria-hidden='true' ></i>");

        }
        click_hamburger++;
    });

    //    Slider 


    $("#carouselExampleIndicators .carousel-inner .carousel-item").each(function () {
        console.log($(this).children("img").attr("src"));
        $(this).css("background-image", "url(" + $(this).children("img").attr("src") + ")");
    });

    /* Animacje */
    function scroll_anim(effect_in, effect_out) {
        $(".slogan_first_home > div").each(function (t) {
            console.log("EFFECT:" + effect_out + effect_in);
            t++;
            if ($(this).is(":in-viewport")) {
                $(this).delay(1000 + (t * 1250)).removeClass(effect_out);
                $(this).delay(1000 + (t * 1250)).addClass("animated " + effect_in);
            }
            else {
                $(this).delay(1000 + (t * 1250)).removeClass(effect_in);
                $(this).delay(1000 + (t * 1250)).addClass("animated " + effect_out);

            }

        });
    }


    // if ($(".slogan_first_home").length > 0) {

    //     scroll_anim("fadeInUp", "fadeInDown");
    // } else {
    //     scroll_anim("fadeIn", "fadeOut");
    // }

    // $(window).scroll(function () {

    //     if ($(".slogan_first_home").length > 0) {

    //         scroll_anim("fadeInUp", "fadeInDown");
    //     } else {
    //         scroll_anim("fadeIn", "fadeOut");
    //     }


    // });


    $(window).scroll(function () {




        var height_scroll = $(window).scrollTop();


        if ($(".slider").length > 0) {
            if ($(window).width() > 767) {
                if (height_scroll > $(window).height() / 2) {
                    //console.log("add class");
                    $(".top_ui").addClass("hook_menu");
                    $("body").css("margin-top", $(".top_ui").height());
                }

                if (height_scroll < $(window).height() / 2) {
                    //           console.log("turn off");

                    $(".top_ui").removeClass("hook_menu");
                    $("body").css("margin-top", "0");
                }
            }
        } else {
            //console.log("brak");

            $(".top_ui").addClass("hook_menu");
            if ($(window).width() > 767) {
                $("body").css("margin-top", $(".top_ui").height());
            }
        }

    });



    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 53.3785798, lng: 14.6512067 },
        zoom: 17,
        disableDefaultUI: true,
        scrollwheel: false,
        styles: [{ "featureType": "administrative", "elementType": "all", "stylers": [{ "saturation": "-100" }] }, { "featureType": "administrative.province", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 65 }, { "visibility": "on" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": "50" }, { "visibility": "simplified" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": "-100" }] }, { "featureType": "road.highway", "elementType": "all", "stylers": [{ "visibility": "simplified" }] }, { "featureType": "road.arterial", "elementType": "all", "stylers": [{ "lightness": "30" }] }, { "featureType": "road.local", "elementType": "all", "stylers": [{ "lightness": "40" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "saturation": -100 }, { "visibility": "simplified" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "hue": "#ffff00" }, { "lightness": -25 }, { "saturation": -97 }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "lightness": -25 }, { "saturation": -100 }] }]

    });

    var infowindow = new google.maps.InfoWindow({
        content: $(".dane_firmy").html()
    });


    myLatLng = { lat: 53.3785798, lng: 14.6512067 };
    var icon_map;
    if (document.location.pathname == "/emi/") {
        icon_map = document.location.href + 'wp-content/themes/emi/img/emi-icon.png?v=2';
    } else {
        icon_map = '../wp-content/themes/emi/img/emi-icon.png?v=2';
    }

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,

        icon: icon_map,

        title: 'Emi school'

    });


    marker.addListener("click", function () {
        // console.log("gg");
        infowindow.open(map, marker);
    });

    //console.log("tt "+document.location.pathname);



    // get phone and email 

    $(".telefon_down, .mail_down").each(function () {
        if ($(this).hasClass("telefon_down")) {
            $(".top_phone p").text($(this).text());
        }
        else {
            $(".top_mail p").text($(this).text());
        }
    });
});

// input radio style  
$(".wpcf7-list-item").hover(function () {
    $(this).addClass("activeHoverBtn");
}).on("mouseleave", function () {
    $(this).removeClass("activeHoverBtn");

}).click(function () {
    console.log("klik-radio");
    $("input[type='radio']").attr("checked", false);
    $(this).children("input").attr("checked", "checked");
});
