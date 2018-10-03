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
            <h1 class="_widget-title">
                <?php

             //   echo get_the_category()[0]->name;

                echo single_cat_title();

               // echo "---<br/>".var_dump(get_the_category());
                ?>
            </h1>
        </div>
        <div class="row">
 
 
            <!--  Left block - News-->
            <div class="col-sm-8">
                <div class="row">
                    <div class="newsy">
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                        <div class="news news-1">
                            <a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>"><?php
                            echo get_the_post_thumbnail();
                            ?>
                        </a>
                            <a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>">
                                <h1 class="title-news"><?php the_title(); ?></h1>
                            </a>
                             <span class="category-news">
                                    <?php
                                    echo get_the_category()[0]->name;
                                    ?>
                                </span>
                            
                             <p class="date-news">
                                    <?php
                                    echo $post->post_date.' | by '.get_the_author_meta('nickname', $post->post_author);
                                    ?> 
                                </p>
                                <p>
                                <?php
                                the_excerpt();
                                ?>
                                </p>
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <div class="more_post">
                                                <a href="<?php the_permalink(); ?>"></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>   
 
                        </div>
                                <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                             <hr/>
                  <div class="text-center">
                      <?php echo paginate_links($args); ?>
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