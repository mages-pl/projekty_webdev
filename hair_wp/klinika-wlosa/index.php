<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pl">
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="google-site-verification" content="ZgyMpORNMYFP9i2Jls_mQR3KKgNa-zjTpl7MsA0CeBI" />
        <?php wp_head(); ?>
       <meta name="description" itemprop="description" content="Kompleksowe zabiegi skóry głowy i włosów, zwalczanie łupieżu, łojotoku, łysienia." />

<meta name="keywords" itemprop="keywords" content="klinika włosa, zabiegi trychologiczne szczecin, zabiegi lecznicze skóry głowy, zwalczanie łupieżu, problem z łuszczycą, zniszczone włosy" />
 
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=12" type="text/css" />
        <!-- Latest compiled and minified CSS -->
       <link href='https://fonts.googleapis.com/css?family=Fira+Sans:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  
        <link rel="stylesheet" href="<?php echo get_bloginfo('url'); ?>/wp-content/themes/klinika-wlosa/css/bootstrap.min.css"/>
      
    </head>
    <body>
<div id="wptime-plugin-preloader"></div>
        <div id="main">
            <div class="header">

                <div class="container"> 
<a href="https://www.facebook.com/klinikawlosa.trycholog" target="_blank" class="fb_ico">
<i class="fa fa-facebook"></i>
</a>
<a href="https://www.instagram.com/klinikawlosa.szczecin.pl/?hl=pl" target="_blank" class="fb_ico">
<i class="fa fa-instagram"></i>
</a>
<a href="https://www.moment.pl/klinika-wlosa-szczecin" target="_blank" class="fb_ico">
<i class="fa fa-calendar-o" aria-hidden="true"></i>
</a>

                    <a href="<?php echo get_bloginfo('url'); ?>" title="Klinika Włosa - gabinet trychologiczny" class="logo">

                    </a>
                    <div class="clearfix"></div>
          
                                 <?php 
                     $defaults = array(
    'menu' => 'Menu gorne',
    'menu_class' => 'menu',
    'menu_id' => 'menu',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
                     wp_nav_menu($defaults); ?> 
                </div>
            </div>
            <div class="container">
                <div class="clearfix"></div>
                <div class="row">
  <h1>Zdrowa skóra głowy to zdrowe lśniące włosy</h1>
                  
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><?php the_title(); ?></h2>
 
<p><?php the_content(__('(more...)')); ?></p>
   <?php endwhile; else: ?>
<p><?php _e('Nie znaleziono strony'); ?></p><?php endif; ?>
                </div>

            </div>

            <div class="green_block">
                <div class="container">
                    <div class="row">
                        <h1>Masz pytanie?</h1>
                        <div class="center_block">
                                              <?php dynamic_sidebar('bottom-green-widget'); ?>
                        </div>

                    </div>
                </div> 
            </div>  

            <div class="gray_foot">
                <div class="container">
                    <div class="row">
                                 <?php dynamic_sidebar('bottom-grey-widget'); ?>
                      
                        <div class="col-md-4">
                            <div class="info_foot">  
                                                 <?php 
                     $defaults = array(
 'menu' => 'Menu gorne',
    'menu_class' => 'menu_f',
    'menu_id' => '',
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
                     wp_nav_menu($defaults); ?> 
                            </div>
                        </div>                                           
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="container">
                    COPYRIGHT(C) 2015 | <a href="<?php echo get_bloginfo('url'); ?>" title="Klinika Włosa - gabinet trychologiczny">KLINIKAWLOSA.SZCZECIN.PL</a><br/>
                    DESIGN BY <a href="http://jendraszczyk.pl" title="Profesjonalne strony internetowe i grafika Szczecin Stargard Gorzów" target="_blank">MICHAŁ JENDRASZCZYK</a>
                </div>
            </div>
        </div>
<script src="<?php echo get_bloginfo('url'); ?>/wp-content/themes/klinika-wlosa/js/bootstrap.min.js"></script>
 
    </body>
</html>
