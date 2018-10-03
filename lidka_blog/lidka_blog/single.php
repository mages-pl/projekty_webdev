<?php
get_header();
?>
<main>
    <div class="container">
         <div class="row">
            <div class="breadcrumb">
 <?php
   echo get_breadcrumbs();
            ?>
        </div>
        </div>
        <div class="row">

            <!--  Left block - News-->
            <div class="col-sm-8">
                <div class="row">
                    <div class="post_blog">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                         <div class="post_date">
                                 <i class="fa fa-clock-o" aria-hidden="true"></i>
   <?php the_date('Y-m-d H:i', '', ''); ?>

                                </div>
                        <h1 class="_widget-title"><?php the_title(); ?></h1>
                        <div class="post_thumb">
                            <?php
                           // echo "id:".get_the_ID();
                           echo  get_the_post_thumbnail(get_the_ID(),'full');
                               ?>
                        </div>
                        <div class="post_tresc">
                                <?php
                                
                                the_content();
                                ?>
                        </div>
                                
                               
                               <?php 
                               $attachments = new Attachments('attachments');
                               
                               if($attachments->exist()) : 
                                   ?>
                               <h5>Załączniki</h5>
                               <ul class="attachment list-group">
                               <?php 
                               while($attachments->get()) :
                                   ?>
                                   
                                    <a href="<?php echo $attachments->url(); ?>">
                                   <li class="list-group-item list-group-item-action">
                                      
                                   <?php
                                   echo $attachments->image('thumbnail')."<strong>".$attachments->field('caption')."</strong>";
                                   ?>
                                         
                                           <?php
                                   echo $attachments->filesize();
                                   ?>
                                      
                                    
                                      
                                   </li>
                                    </a>
                                   <?php
                               endwhile;
                               
                               ?>
                               <?php
                                   
                               endif;
                               ?>
                               </ul>
                               
                              
                                <div class="clearfix"></div>                       
<?php

 if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
?>

                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>


            <?php
            get_sidebar();
            ?>
        </div>
    </div>
</main>
<?php
get_footer();
?>