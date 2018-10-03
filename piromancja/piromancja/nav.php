<body>
    <div id="frontend_app">
        <div id="logo"></div>
        <div class="row" id="menu_top">
            
            <nav class="navbar navbar-expand-lg">
            
            <div class="container">

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <?php
                    if (is_home() == true) :
                        echo '<a class="navbar-brand home_brand" href="#logo">';
                    else :
                        ?>
                        <a class="navbar-brand navbar_single" href="<?php bloginfo('url'); ?>">
                        <?php
                        endif;
                        ?>

                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/piromancja_logo.png" id="" alt="" />

                    </a>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <div class="row"> 
<!--                        <div class="col-lg-2 col-md-12 col-sm-12">



                        </div>-->

                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div id="rezerwacja" class="pulse">
                                <a href="<?php echo get_permalink('133'); ?>">
                                    <h2><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    Zarezerwuj termin
                                    
                                </h2>
                                    </a>
                            </div>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fa fa-bars"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                
                                   <?php
                                if (is_home() == true) :
                                    ?>
                                    <ul class="navbar-nav navbar_home">
                                        <?php
                                    else:
                                        ?>
                                        <ul class="navbar-nav navbar_single">
                                        <?php
                                        endif;
                                        ?>    
          
                                    <?php
                                    if (is_home() == true) :
                                        include('nav_home.php');
                                    else :
                                        include('nav_single.php');
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </nav>
            <div class="container">
                <div class="row" id="piromancja_nav--bottom">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <h1 class="piromanacja_logo--h1">Teatr Ognia Piromancja</h1>
                        <div id="sound"><i class="fa fa-volume-up" style="font-size:2em;"></i></div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">

                        <?php
                        dynamic_sidebar("HomeWspolpraca");
                        ?>

                    </div>
                </div>
            </div>
        </div>