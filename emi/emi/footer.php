
      <section class="mapa">
          <div id="map">
              
          </div>
      </section>
</div>
<footer>
    <div class="row">
    <div class="col-md-4">
        <div class="dane_firmy">
   <?php
   dynamic_sidebar("footer-emi");
   ?>
    </div>

    </div>
    <div class="col-md-8">
         
        <div class="row" id="footer_links">
            <div class="col-md-4">
                <h3>Informacje</h3>
<?php  wp_nav_menu(array('theme-location' => 'extra-menu',"menu"=>"MenuFooter")); ?>
                
                
            </div>
            <div class="col-md-4">
                  <h3>Kursy angielskiego</h3>
    <?php  wp_nav_menu(array('theme-location' => 'ang-menu',"menu"=>"AngMenu")); ?>
     
            </div>
                  <div class="col-md-4">
                        <h3>Social media</h3>
                        <div class="social_media">
                  <?php 
                  dynamic_sidebar("social-box");
                  ?>
                        </div>
            </div>
        </div>
    </div>
    </div>
</footer>
<?php

wp_footer();

?>
 
</body>
</html>

