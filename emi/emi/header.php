<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>  
        <meta charet="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <?php wp_head(); ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/wp-content/themes/emi/favicon.png" type="image/png" />
        
       
<!--        Bootstrap--> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  
<!--        emi Theme--> 
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/emi/css/font-awesome.min.css" />
   <link href="<?php bloginfo('url'); ?>/wp-content/themes/emi/css/animate.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/emi/css/emi.css?v=<?php echo time(); ?>" />
  
    <!-- emi JS -->
      
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103932996-1', 'auto');
  ga('send', 'pageview');

</script>
    

    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/emi/js/jquery.js"></script>
    
    <link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/emi/css/jquery.fancybox.min.css" />
<script src="<?php bloginfo('url'); ?>/wp-content/themes/emi/js/jquery.fancybox.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVpPYV9NGBVljNagEwpWT7_yc0v73dIC8"></script>

    
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/emi/js/isInViewport.min.js" async="async"></script>   
  
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/emi/js/emi.js?v=3" async="async"></script>
    </head>
    
    <body> 
        <div id="preloader"></div>


        <?php 
       // if(is_front_page())  {
          ?>
          <div class="top_ui">
                         <div class="col-lg-2 col-md-3">
                         <div class="logo">
<!--  Logotyp emi -->

<?php
if (function_exists('the_custom_logo')) {
              the_custom_logo();
          } else {
              echo "<img src='../wp-content/themes/emi/img/logo.png' alt='Szkoła języka angielskiego, kursy językowe Szczecin'/>";
          }
?>

                </div>
                             
                         </div>
              <div class="col-lg-4 col-md-9">
                  <div class="dane-header">
                      <div class="row">
                           <div class="col-sm-6">
                             
                               <span class="top_phone">
                                <strong>Kontakt</strong> 
                                
                                <p>  </p>
                               </span>
                  </div>
                                
                           <div class="col-sm-6">    
                               <span class="top_mail">
                         
                        <strong>Napisz do nas</strong> 
                         <p>
                         
                         </p>
                               </span>
                            </div>
                      </div>
                  </div>
              </div>
                         <div class="col-lg-6">
                                <span class="menu-hamburger"><i class="fa fa-bars" aria-hidden="true" ></i></span>
                <div class="menu-emi">
                    
                 
<!--    Menu i języki emi -->
<?php  wp_nav_menu(array('theme-location' => 'header-menu', 'menu' => 'Menu Top')); ?>
                </div>
                
                <div class="clearfix"></div>
                
                
            </div>
                </div>
        
        <?php

        //}

        ?>
 
   

 