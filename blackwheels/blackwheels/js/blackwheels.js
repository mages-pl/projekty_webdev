 
$(window).on("load",function() {
    $("#preloader").delay(500).fadeOut();
  $("body").delay(500).css("overflow","visible");
});
 

$(document).ready(function() {
    var click_hamburger=0;
   $(".menu-hamburger").click(function() {
       console.log("klik"+click_hamburger);
      
       if((click_hamburger %2) == 0) {
           $(".menu-hamburger").html("<i class='fa fa-close' aria-hidden='true' ></i>");
       $(".menu-blackwheels-pion, .menu-blackwheels").fadeIn(300).css("display","table");
        
   } else { 
       $(".menu-blackwheels-pion, .menu-blackwheels").fadeOut(300);
       $(".menu-hamburger").html("<i class='fa fa-bars' aria-hidden='true' ></i>");
       
   }
    click_hamburger++;
   });
    
    function scroll_anim(effect_in,effect_out) {
       $(".produkty .photo, .gallery .photo, .timeline span").each(function(t) {
           console.log("EFFECT:"+effect_out+effect_in);
      t++;
           if($(this).is(":in-viewport")) {
              $(this).delay(1000+(t*1250)).removeClass(effect_out);
    $(this).delay(1000+(t*1250)).addClass("animated "+effect_in);
       }
       else {
              $(this).delay(1000+(t*1250)).removeClass(effect_in);
  $(this).delay(1000+(t*1250)).addClass("animated "+effect_out);
     
       }
       
   });
       }
       if($(".timeline").length > 0) {
          
        scroll_anim("fadeInUp","fadeInDown");
      } else {
             scroll_anim("fadeIn","fadeOut");
      }
    
   $(window).scroll(function() {
       
        if($(".timeline").length > 0) {
          
        scroll_anim("fadeInUp","fadeInDown");
      } else {
             scroll_anim("fadeIn","fadeOut");
      } 
    
       
   });
   
   
    $(window).scroll(function() {
        
       var height_scroll = $(window).scrollTop();
       
     
       if(height_scroll > $(window).height()) {
            //console.log("add class");
          $(".top_ui").addClass("hook_menu");
            
       }
        
       if (height_scroll < $(window).height()) {
//           console.log("turn off");
    
            $(".top_ui").removeClass("hook_menu");
       } 
      
    });
});
