 <div class="col-sm-4">
                    <div class="row">
                        <?php 
                        dynamic_sidebar("home_left_blocks");
                        ?>
<!--                        <div class="profil _widget">
                            <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/avatar-img.png" />
                            <h4 class="_widget-subtitle">Kilka słów</h4>
                            <h3 class="_widget-title">O mnie</h3>

                            <p class="_widget-text">

                                Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus
                                felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum
                                commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor. Pellentesque
                                facilisis. Nulla imperdiet sit amet magna. Vestibulum dapibus, mauris nec malesuada fames
                                ac turpis velit, rhoncus eu, luctus et interdum adipiscing wisi.


                            </p>
                            <span class="sign">Lidia Prasał</span>
                        </div>-->
                        
<!--                        <div class="_widget">
                            <h3 class="_widget-title">Facebook</h3>
                            <div id="facebook-box">
                                <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/fb-box.png" />
                            </div>

                        </div>-->
<!--                        <div class="_widget">
                            <h3 class="_widget-title">Twitter Feed</h3>
                            <div id="facebook-box">
                                <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/twitter-box.png" />
                            </div>

                        </div>-->
                        <div class="_widget">

                            <h3 class="_widget-title" style="display:none;">Instagram</h3>
                            <div id="instagram-box" style="display:none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg1.png" />
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg2.png" />
                                    </div>
                                    <div class="col-lg-6">

                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg1.png" />
                                    </div>
                                    <div class="col-lg-6">

                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg1.png" />
                                    </div>

                                    <div class="col-lg-6">

                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg2.png" />
                                    </div>

                                    <div class="col-lg-6">

                                        <img src="<?php bloginfo('url'); ?>/wp-content/themes/lidka_blog/assets/img/instagramimg2.png" />
                                    </div>

                                </div>
                            </div>
 
                            <?php
                            $get_categor = get_categories();
                            ?>
                            <div id="cats_slider">
                            <div id="kategorie" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">

                                    <?php
                                    $cat_inc = 0;
                                    foreach ($get_categor as $cat) :
                                        $cat_inc++;
                                        ?>

                                        <div class="carousel-item <?php if ($cat_inc == 1) : ?>active<?php endif; ?>">
                                            <a href="<?php echo get_category_link($cat->term_id); ?>">
                                                <span class="label-kategoria">Kategoria</span>
                                                <h3><?php echo $cat->name; ?></h3>
                                                <p>POSTY: <?php echo $cat->category_count; ?></p>
                                            </a>
                                        </div>
    


                            
                            <?php
  //    echo $cat->name;
  //echo "<br/>ilość: ".$cat->category_count;
  //echo "link".get_category_link($cat->term_id);
  endforeach;
  
  ?>
                                      </div>
                                  <a class="carousel-control-prev" href="#kategorie" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#kategorie" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                            </div>
                            
<!--                            echo get_the_category_list();
                            echo "<br/>---<br/>";
                            print_r(get_categories());
                            -->
                           
                            
                            
                            
                        </div>


                    </div>
    