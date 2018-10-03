(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 200
        }
    });
    

    // Initialize and Configure Scroll Reveal Animation
    window.sr = ScrollReveal();
    sr.reveal('.sr-icons', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 200);
    sr.reveal('.sr-button', {
        duration: 1000,
        delay: 200
    });
    sr.reveal('.sr-contact', {
        duration: 600,
        scale: 0.3,
        distance: '0px'
    }, 300);

    // Initialize and Configure Magnific Popup Lightbox Plugin
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    }); 
    


var prevButton = '<button type="button" data-role="none" class="slick-prev" aria-label="prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" version="1.1"><path fill="#FFFFFF" d="M 16,16.46 11.415,11.875 16,7.29 14.585,5.875 l -6,6 6,6 z" /></svg></button>',
    nextButton = '<button type="button" data-role="none" class="slick-next" aria-label="next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M8.585 16.46l4.585-4.585-4.585-4.585 1.415-1.415 6 6-6 6z"></path></svg></button>';

$('.single-item').slick({
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1000,
  cssEase: 'ease-in-out',
  prevArrow: prevButton,
  nextArrow: nextButton
});

$('.quote-container').mousedown(function(){
  $('.single-item').addClass('dragging');
});
$('.quote-container').mouseup(function(){
  $('.single-item').removeClass('dragging');
});

 

$('.quotes').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 6000,
  speed: 800,
  slidesToShow: 1,
  adaptiveHeight: true
});


 
$( document ).ready(function() {
$('.no-fouc').removeClass('no-fouc');
});

    
    
    
    
    $('.tabs_kalkulacja_2 .uslugi').each(function(y) {
        $(this).attr('id','usluga-'+y);
      
        $('.tabs_kalkulacja_2 .uslugi .col-md-3').each(function(z) {
            $(this).attr('id',$('.tabs_kalkulacja_2 .uslugi').attr('id')+'-'+z);
        });
        y++;
    });
    $('.tabs_kalkulacja_1 .col-md-3 span').each(function(x) {
        
        var ceny = new Array("400-600","500-900","750-2500","1000-1800","100-350","150-400","100-300","150-550",
"350-700","100-250","150-250","150-250","500-2000","300-700","250-500","100-200"
);

 $(".uslugi .col-md-3").click(function() {
       //alert($(this).attr('id'));
         $('.tabs_kalkulacja_2 .uslugi .col-md-3').css('background','none');
         
        // $('.uslugi .col-md-3').animate({background: '#CDB46F'},600);
     
        
        $(this).fadeIn(function(){$(this).css('background','#CDB46F');});
        
       var id_object = $(this).attr('id');
      var cut_id = $(this).attr('id').substring(id_object.indexOf("-")+3,id_object.length);
     // alert("cut:"+cut_id);
     
       $("#title_koszt").html("Szacunkowy koszt usługi");
       $("#cena_projektu").html(ceny[cut_id]);
       $("#currency_proj").html("zł");
    });
    
    $('.tabs_kalkulacja_1 .col-md-3 span').click(function() {
       var element =  $(this).attr('id');
        
    $('.tabs_kalkulacja_1 .col-md-3 span').removeClass('hover_kalkulacja');
        $(this).addClass('hover_kalkulacja');
        
  //  $(this).css('background','#907f61');
           //alert(element);
           $(".uslugi").css('display','none');
  $(".uslugi:eq("+element+")").css('display','block');
  //  $(".uslugi:eq("+element+")").toggle();
       // alert(x);

   
});
});
var k=0;  
$('#more-projects').click(function() {
   
 
     if((k%2)==0) {
          
         $('#more-portfolio').slideDown(600);
          
     } if ((k%2)!=0)  {
         
       $('#more-portfolio').slideUp(600); 
      
     }
      
 
 
    k++; 
});
$('.page-scroll').click(function() { 
   $('#more-portfolio').hide();  
});
  $('.kontakt_form input[type=button]').click(function() {
    //alert('send');
    $.ajax({
            type:'post',
            url:'mail.php',
            data: $('#formularz_kontaktowy').serialize(),
            success:function(data) {
              $('#powiadomienie_mail').html(data);
              
              
               if(data === "Wiadomość wysłana") {
             
                    $('#powiadomienie_mail').removeClass("fail");
                $('#powiadomienie_mail').addClass("success");
               $('#powiadomienie_mail').fadeIn(300);
                $('#powiadomienie_mail').html(data);

               } else { 
                    
                      $('#powiadomienie_mail').removeClass("success");
                $('#powiadomienie_mail').addClass("fail");
                  $('#powiadomienie_mail').fadeIn(300);
                  $('#powiadomienie_mail').html(data);

               }
                $('#formularz_kontaktowy input[type=text], #formularz_kontaktowy textarea').val('');   
 
            }, error: function(data) { 
            
                $('#powiadomienie_mail').fadeIn(300);
                                   $('#powiadomienie_mail').html(data);

            }
        } 
   );
  });  
})(jQuery); // End of use strict
