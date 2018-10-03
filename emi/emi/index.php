<?php get_header(); ?>

       <header>
       
            <section class="top-emi">
                
                     <div class="container">
               
                         
                     <div class="caption-emi">
<!--                    get content name-->

<div class="content-header animated bounceIn">

    
    <?php dynamic_sidebar('header-down-emi'); ?>
    
    
</div>

                </div>    
                         
                                </div>
           
            </section>
            
           <section class="slider">
               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <?php
  dynamic_sidebar("header-down-emi");
  ?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
           </section>
        </header>
 <div class="container">
   <?php
   dynamic_sidebar("home-box");
   ?>
      </div>

<?php get_footer(); ?>