<?php 
if(!is_home()) {
    ?>
 </div>
<section class="kontakt">
             
                <div class="row kontakt-stopka">
                    <div class="container">
                    <div class="row col-md-12">
                            <?php dynamic_sidebar( 'section_footer' ); ?> 
                    </div>
                    <div class="row">
                    <div class="clearfix"></div>
                    <div class="copy">
                        copyright &copy; 2018 RKDive / Wszelkie Prawa Zastrzeżone
                    </div>
                    </div>
                        </div>
                </div>

             
        </section> 
          
<?php

}
?>

<div class="kontakt_bottom">
    <i class="lnr lnr-envelope"></i> <?php print_r(langi()['kontakt'][get_locale()]); ?>
</div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVpPYV9NGBVljNagEwpWT7_yc0v73dIC8"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js?v=<?php echo time(); ?>"></script>
        <?php wp_footer(); ?>

    </body>
</html>