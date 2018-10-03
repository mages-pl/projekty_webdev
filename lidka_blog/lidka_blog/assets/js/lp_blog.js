$(document).ready(function() {
    
    $("#top_slider_blog").on("mouseenter",function() { 
        $(this).addClass('on');
        console.log("check");
    }).on("mouseleave",function() { 
        $(this).removeClass('on');
        console.log("out");
    });
    
    var waypoint = new Waypoint({
  element: document.getElementById('custom_html-4'),
  handler: function() {
    //notify('Basic waypoint triggered');
    console.log("custom html 4545");
  $("#custom_html-4").addClass("fadeInUp animate");
  
  },
  offset:50
})
    
    console.log("ok");
    
    $('.carousel').carousel()

    
    $(".hamburger").on("click",function() {
$(this).toggleClass("open");
$(".menu_box").toggle();
    });


    
});
$(function() {
$(".to_top").on("click",function() {
console.log("click to top");
    $("html,body").animate({scrollTop:"0px"},600);
 
});
});

/* set post thumbinal */

$('.post_thumb img').each(function() { 
    
    //$(this).attr('src');
    $(this).parent("div").css({'background-image':'url('+$(this).attr('src')+')'});

});

$(".searchform input[type=text]").focus(function() {
    $(this).css({
        "width":"150%",
        "background-color":"#eee"
     }); 
     $(".overlay_blog").css({
       "opacity":"0.2"  
     });
});
$(".searchform input[type=text]").blur(function() {
    $(this).css({
        "width":"100%",
        "background-color":"#fff"
    
    });
     $(".overlay_blog").css({
       "opacity":"1"  
     });
});
$(window).on("resize",function() { 
 
if($(window).width() > 980) { 
    $(".menu_box").css("display","block");
     
} else { 
    if($(".menu_box").is(":visible")) { 
      
        $(".hamburger").addClass("open");
    }
}
    });