<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>  
        <meta charet="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <?php wp_head(); ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <title><?php bloginfo('title'); ?> <?php wp_title(); ?></title>
       
<!--        Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
<!--        Blackwheels Theme-->
     <link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/css/font-awesome.min.css" />
   <link href="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/css/animate.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/css/blackwheels.css" />
  
    <!-- Blackwheels JS -->
    
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/js/jquery.js"></script>
    
    <link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/css/jquery.fancybox.min.css" />
<script src="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/js/jquery.fancybox.min.js"></script>

    
    
    
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/js/isInViewport.min.js" async="async"></script>   
  
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/blackwheels/js/blackwheels.js" async="async"></script>
    </head>
    
    <body> 
        <div id="preloader"></div>
        <?php 
        if(is_front_page())  {
          ?>
          <div class="top_ui">
                         <div class="col-sm-3">
                         <div class="logo">
<!--  Logotyp Blackwheels -->

<?php
if(function_exists("the_custom_logo")) {
the_custom_logo();
} else {
    echo "<img src='../wp-content/themes/blackwheels/img/logo.png' alt='Oficjalna strona marki Blackwheels'/>";
}
?>

                </div>
                             
                         </div>
                         <div class="col-sm-9">
                                <span class="menu-hamburger"><i class="fa fa-bars" aria-hidden="true" ></i></span>
                <div class="menu-blackwheels">
                    
                 
<!--    Menu i języki blackwheels -->
<?php  wp_nav_menu(array('theme-location' => 'header-menu')); ?>
                </div>
                
                <div class="clearfix"></div>
                
                
            </div>
                </div>
        
        <?php
          
        } else {
         ?>
         
           <div class="col-sm-3">
               <div class="extend_ui">
                                    <span class="menu-hamburger"><i class="fa fa-bars" aria-hidden="true" ></i></span>
              
               <div class="logo">
<!--  Logotyp Blackwheels -->

<?php
if(function_exists("the_custom_logo")) {
the_custom_logo();
} else {
    echo "<img src='../wp-content/themes/blackwheels/img/logo.png' alt='Oficjalna strona marki Blackwheels'/>";
}
?>

                </div>
               <div class="menu-blackwheels-pion">
                   <?php  wp_nav_menu(array('theme-location' => 'header-menu')); ?>
               </div>
                   
                    <div class="footer_social">
                         <?php dynamic_sidebar('footer-blackwheels'); ?>
<!--                  <a href="#fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#fb"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<a href="#fb"><i class="fa fa-instagram" aria-hidden="true"></i></a>
<a href="#fb"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
<a href="#fb"><i class="fa fa-google-plus" aria-hidden="true"></i></a>-->
           
            </div> 
                   
               </div>

                </div>
        <div class="col-sm-9">
             
  
        
        <?php
        }
        
        ?>
 
   

 