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
                    
                    <div>
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                        <h1 class="_widget-title"><?php the_title(); ?></h1>
                                <div class="post_date">
                                    <?php the_date('Y-m-d H:i', '<p>', '</p>'); ?>

                                </div>
                         <div class="clearfix"></div>             
                                <?php
                                the_content();
                                ?>
                                
                               
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