<?php get_header(); ?>
<!-- 
  <section class="brand">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 dark">

                        <a href="#coop" class="brand_box_cooperation wow slideInLeft">
                            <span>
                               <?php dynamic_sidebar("section_first_left") ?>
                            </span>     

                        </a>

                    </div>
                    <div class="col-md-6 white">
                        <img class="product_home_box_shop" src="https://static.wixstatic.com/media/ece0b7_9cc9d7a86f624336bcc6e4a0f188dfa7~mv2.png/v1/fill/w_250,h_250,q_85,usm_0.66_1.00_0.01/ece0b7_9cc9d7a86f624336bcc6e4a0f188dfa7~mv2.png" style="">
                        <a href="#shop" class="brand_box_shop wow fadeIn">
                            <span>
                                <?php dynamic_sidebar("section_first_right") ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="oferta">
            <div class="container">
                <div class="row features">
                    <div class="col-lg-4">
                    <a href="#" class="item-block oferta image_home_box" style="
    background-image: url(<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/img/home/box-shop.jpg);
">
 <?php dynamic_sidebar("section_second_left"); ?>
                        </a>
                    </div>

                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="item-block" href="#" style="
                                   text-align:  center;
                                   background: #e0c79e;
                                   padding: 30% 0;
                                   ">
                                    <?php
                                    dynamic_sidebar("section_second_center");
                                    ?>
                                    <img class="home_cog_icon" src="<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/img/feature/cog.png"/></a>
                            </div>

                            <div class="col-lg-6">

                                <a class="item-block" href="#" style="
                                   background: #fafafa;
                                   ">
                                    <img class="home_delivery_icon" src="<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/img/feature/delivery-truck.png" style="">
                                    <div style="
                                         color: #000;
                                         font-size: 2.5rem;
                                         margin:  20px 0;
                                         top: 95px;
                                         ">
                                      <?php dynamic_sidebar("section_second_right"); ?> 
                                    </div> 
                                </a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="#" class="item-block" style="background-position:  center;font-size:  2rem;background-image: url(<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/img/home/box-b2b.jpg);padding: 15% 20px;">
<?php  dynamic_sidebar("section_second_bottom"); ?> 
                                </a>
                            </div>               
                        </div>
                    </div>

                </div>
        </section> 
        <section class="wspolpraca">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php dynamic_sidebar("section_third_left") ?>
                        
                        <br/>
                        <a href="#" class="btn ripple btn-radius">Sprawdź</a>
                    </div>
                    <div class="col-md-6">
                        <div style="height:250px;margin-top:50px;">
                            <img class="wow slideInUp" data-wow-delay="1s" src="<?php echo bloginfo('url'); ?>/wp-content/themes/rkdive/assets/img/home/scuba.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <section class="produkty">
            <div class="container">
                <div class="row">
                    <?php
                    
                    include('bestsellers.php');
                    ?>
                </div>
            </div>

        </section>

-->
<?php get_footer(); ?>
