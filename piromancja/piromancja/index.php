<?php
get_header();
?>
<?php
include('nav.php');
?>
<div class="slider_video">
    <!--<video id="video_intro" autoplay muted loop> 
    <source src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/media/piromancja_intro.mp4" type="video/mp4">
    </video>-->
    <!--<div style="display: none;">-->
    <iframe id="video_intro" src="https://www.youtube.com/embed/w1qnlHx0yZM?mute=1&controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=w1qnlHx0yZM" frameborder="0" allowfullscreen></iframe>
    <!--</div>-->
 
</div>


<div class="oferta" id="oferta">

    <div class="gui_pasek yellow--bar">

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><a href="#pdf"><i class="fa fa-download" aria-hidden="true"></i>
                            Pobierz PDF</a></h1> 
                </div>
                <div class="col-sm-6">
                    <h1 class="text-right">Oferta</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container"> 
        <div class="oferta_img">
            <div class="row">

                <div class="col-sm-6">
                    <a href="<?php echo get_permalink('23'); ?>" id="pokaz_mini" data-url="pokaz-mini">
                        <div class="oferta_img_box">
                            <div class="caption"> 
                                <div>
                                    <?php 
                                    echo get_the_excerpt('23');
                                    ?>
                                
                                </div>
                            </div>
                            <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/fireshow_min1.jpg" alt="Teatr Ognia oferta pokaz MINI" />
                        </div>

                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo get_permalink('25'); ?>" id="pokaz_standard" data-url="pokaz-standard">
                        <div class="oferta_img_box">
                            <div class="caption">
                                <div>
                                    <?php 
                                    echo get_the_excerpt('25');
                                    ?>
                               
                                </div>
                            </div>
                            <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/fireshow_min2.jpg" alt="Teatr Ognia oferta pokaz MINI" />
                        </div>    

                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo get_permalink('27'); ?>" id="pokaz_standard_plus" data-url="pokaz-standard-plus"> 
                        <div class="oferta_img_box">
                            <div class="caption"> 
                                <div>
                                     <?php 
                                    echo get_the_excerpt('27');
                                    ?>
                               
                                </div>
                            </div>
                            <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/fireshow_min3.jpg" alt="Teatr Ognia oferta pokaz MINI" />
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo get_permalink('29'); ?>">
                        <div class="oferta_img_box" id="pokaz_premium" data-url="pokaz-premium">
                            <div class="caption"> 
                                <div>
                                 <?php 
                                    echo get_the_excerpt('29');
                                    ?>
                                </div>
                            </div>
                            <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/fireshow_min4.jpg" alt="Teatr Ognia oferta pokaz MINI" />
                        </div> 
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div id="pokazy">

    </div>
</div>

<div class="galeria" id="galeria">
    <div class="gui_pasek">
        <div class="container">
            <h1>Galeria</h1>

        </div>
    </div>
    <div class="media">
        <div class="container"> 
            <div class="row">
                <div class="col-sm-6">
                    <a href="#zdjecia_piro" id="zdjecia_piro">
                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/piromancja_zdjecia.jpg" alt="" />
                        <h1>
                            Zdjęcia
                        </h1>
                    </a>
                </div>

                <div class="col-sm-6"> 
                    <a href="#filmy_piro" id="filmy_piro">
                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/piromancja_filmy.jpg" alt="" />
                        <h1>
                            Filmy
                        </h1>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="media_content">
    </div>
</div>
<div class="onas" id="onas">

    <div class="gui_pasek">
        <div class="container">
            <?php
            $post_onas = get_post('2');

            echo '<h1 class="text-right">' . $post_onas->post_title . '</h1>';
            ?>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <?php
                echo get_the_post_thumbnail($post_onas->ID, 'full');
                ?>
            </div>

            <div class="clearfix"></div>
            <br/><br/>

            <div class="col-sm-12"> 
                <div class="text">        
                    <?php
                    //print_r($post_onas);

                    echo $post_onas->post_content;
                    ?>
                </div>
 
            </div>
        </div>
    </div>
</div>

<div class="wspolpraca" id="wspolpraca">
    <div class="gui_pasek">
        <div class="container">
            <?php
            $post_wspolpraca = get_post('7');

            echo '<h1>' . $post_wspolpraca->post_title . '</h1>';
            ?>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="text text-center">
<?php
echo $post_wspolpraca->post_content;
?>

                </div>
            </div>
            <div class="col-sm-6">
                <img src="<?php bloginfo('url'); ?>/wp-content/themes/piromancja/img/pokaz_ognia_bok.jpg" />
            </div>
        </div>
    </div>

</div>

<?php
get_footer();
?>