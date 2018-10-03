    <!-- Footer-->
    <footer>
        <div class="foootage_down">
            <div class="row">
                <?php 
 
                dynamic_sidebar("footer_block_inst");
                ?>
 
            </div>

            <div class="row">
                <div class="footer_bottom">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="_widget-title">Follow us</h3>
                                <div class="social">
 <a href="https://twitter.com/LilyflyBlog"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
                                    <a href="https://www.instagram.com/lilyflyblog/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="https://www.facebook.com/Lilyfly-122909435032814"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="https://pl.pinterest.com/lilyflyblog/"> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <a href="#logo">
                                    <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/logo-footer.png" alt="" />
                                   </a>
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                <div class="text-center">
                                    <span class="to_top">
                                        <i class="fa fa-chevron-up" aria-hidden="true"></i>

                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="menu-footer">
                    <?php 
                    wp_nav_menu(
                       array(
                        "menu" => "MenuFooter"
                        
                        ));
                    ?>
                     
                </div>
                   <div class="webdeveloper">
                <div class="row">
              <div class="container">
               
               &copy; <?php echo current_time('Y',true); ?> development by Michał Jendraszczyk
                  </div>
            </div>
                </div>
            </div>
    </footer>
</div>
    <!--    Blog JS -->
        <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/js/lp_blog.js?v=0.34121"></script>
    
    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/js/bootstrap.min.js"></script>

</body>

</html>