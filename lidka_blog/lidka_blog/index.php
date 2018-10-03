<?php
get_header();
?>
<!-- Content -->

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
                    <div class="newsy">
                        <?php
                        $posty = get_posts(array('numberposts' => 8, 'post_status' => 'publish'));
                        //  print_r($posty);
                        //echo "<hr/>";

                        foreach ($posty as $post) :
                            ?>
                            <div class="news news-1">
                                <a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>">
                                <?php
                                echo get_the_post_thumbnail($post->ID);
                                ?>
                            </a>
                                <span class="category-news">
                                    <?php
                                    echo get_the_category($post->ID)[0]->name;
                                    ?>
                                </span>
                                <a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>"> <h1 class="title-news">
                                    <?php
                                    echo $post->post_title;
                                    ?>
                                </h1>
                                </a>
                                
                                <p class="date-news">
                                    <?php
                                    echo $post->post_date.' | by '.get_the_author_meta('nickname', $post->post_author);
                                    ?> 
                                </p>
                                <p>
                                    <?php
                                    echo $post->post_excerpt;
                                    ?>
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <div class="more_post">
                                                <a href="<?php the_permalink($post->ID); ?>"></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                      
 
 
                      
                    </div>
                </div>
                  <hr/>
                  <div class="text-center">
                      <?php echo paginate_links($args); ?>
</div>
            </div>
            <!--Right Block - Sidebar-->

            <?php
            get_sidebar();
            ?>
            </main>
            <?php
            get_footer();
            ?>
