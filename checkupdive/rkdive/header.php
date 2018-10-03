<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<title><?php echo bloginfo('name'); ?></title>
<meta name="keywords" content="<?php echo bloginfo('keywords'); ?>" />
<meta name="description" content="<?php echo bloginfo('description'); ?>" />
<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png"/>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/css/font-awesome.min.css" />-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css?v=<?php echo time(); ?>" />
        <style type="text/css">
.lang { 
    display:none;
}
                <?php 
                echo ".lang.".get_locale(); ?>
                {
                    display:block !important;
                }
              
        </style>
</head>

  <body>
        <header class="top">
            <div class="nav-top text-center">
                <div class="container-fluid  no-padding">
                    <div class="row no-padding no-margin overflow_hidden">
                        <div class="col-md-6 text-left">
                        <?php dynamic_sidebar( 'section_top_left' ); ?>
                        </div>
                        <div class="col-md-6 text-right">
                        <?php dynamic_sidebar( 'section_top_right' ); ?>
                    </div>    
                    </div>
                </div>
            </div>
            <!-- nav top -->
            <nav class="navbar navbar-expand-lg navbar-light">

               
                <a class="d-lg-none d-xl-none navbar-brand" href="<?php echo bloginfo('url'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand.jpg" />
                            </a>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                     
                    
                    <ul class="navbar-nav" style="">
                    <?php 
                   
                     
                    $MenuItems = wp_get_nav_menu_items("Menu TOP ".get_locale());
                    
                    //print_r($items);
                     
                    foreach($MenuItems as $key => $item)  {
                        
                        if($key==2) { 
                            ?>
                        <li class="d-none d-lg-block d-xl-block">
                            <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/brand.jpg" />
                            </a>
                        </li>
                        <?php
                        }
                     echo "<li class='nav-item'>";  
                      echo "<a class='nav-link' href='".$item->url."'>".$item->title."</a>";
                     echo "</li>";
                    }
                    
                    ?>
                </ul>
                    <?php 
                    dynamic_sidebar('menu_mobile');
                    ?>
                </div>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div></div>

            </nav>
            <!-- end nav top -->
            <!-- slider -->
<?php 
if(is_home()) {
include('slider.php');
}
?>


            <!-- end slider -->
        </header>