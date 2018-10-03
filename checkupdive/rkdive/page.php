<?php get_header(); ?>
<div class="container">
    <div class="row page-view">
        <div class="col-md-3">
            <div class="page-left menu-left">
                <?php
                wp_nav_menu([
                    "menu" => "Menu LEFT ".get_locale(),
                    "container" => "ul",
                    "menu_class" => "menu"
                        ]
                );
                ?>
                <div class="clearfix"></div>
                <div class="left-sidebar d-none d-md-block d-lg-block">
                    <?php dynamic_sidebar("section_first_right") ?>
                </div>
            </div>
        </div>
        <div class="col-md-9 page-right">
            <div id="dane_markers" data-url="<?php echo get_template_directory_uri(); ?>" style="display:none;">
<!--{
"lokalizacje": [{
"id": "znacznik1",
"lat": "53.438354",
"lng": "14.548285",
"title": "Szczecin-basen SDS"
},
{
"id": "znacznik2",
"lat": "53.439793",
"lng": "15.550705",
"title": "Baza nurkowa-Ińsko"
},
{
"id": "znacznik3",
"lat": "53.637329",
"lng": "15.612835",
"title": "Łobez"
},
{
"id": "znacznik4",
"lat": "51.16896",
"lng": "14.06475",
"title": "Kamieniołom Sparmann"
},
{
"id": "znacznik5",
"lat": "25.086294",
"lng": "34.926760",
"title": "Morze Czerwone"
},
{
"id": "znacznik6",
"lat": "37.714564",
"lng": "20.922920",
"title": "Zakynthos - Grecja"
}
]
}-->
</div> 
            <?php
            
 
 
 
            
            while (have_posts()) : the_post();
                ?>	
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                    <div class="entry-content">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                                    ?>
                                <a href="<?php the_post_thumbnail_url(); ?>" data-fancybox="gallery"><img src="<?php the_post_thumbnail_url(); ?>" alt="" /></a>

                                </div>
                                <div class="col-md-6">
                                    <h2 class="small"><?php print_r(langi()['spec'][get_locale()]); ?></h2>
                                    <ul class="specyfikacja">
                                        <?php
       
                                         $custom_fields = get_post_custom(get_the_ID());
                                          
                                         $features = [];
 
                                         foreach ($custom_fields as $key => $value) {
                                         if(($key != '_edit_last') && ($key != '_edit_lock') && ($key != '_thumbnail_id')){
                                              
                                             $feature = [
                                                 'cecha' => $key,
                                                 'wartosc' => $value[0]
                                             ];
                                            ?>
 
                                            <?php
                                                    array_push($features,  $feature);
                                        } 
                                         }
                                        
                                         
                                         $keys = array_column($features, 'cecha');

                                        $result = array_multisort($keys, SORT_ASC, $features);
     
                                        //print_r($features);
                                        
                                        foreach($features as $kf => $feature) { 
                                            ?>
                                        <li> 
                                            <?php
                                            echo $feature['cecha']." : ".$feature['wartosc'];
                                            ?>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12"> 
                            <?php
                            //echo "CAT:".print_r(get_the_category());
                            if(in_category('Oferta') || in_category('Oferta-EN') || in_category('Oferta-DE')) :
                                ?>
                            <h2 class="small"> <?php print_r(langi()['opis'][get_locale()]); ?></h2>
                            <?php 
                            endif;
                            ?>
                            <?php
                            the_content();
                            ?>
                        </div>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'twentyseventeen'),
                                'after' => '</div>',
                            ));
                            ?>
                    </div><!-- .entry-content -->

    <?php
endwhile; // End of the loop.
?>
                    <?php wp_reset_query();	?>
            </div><!-- #primary -->

        </div><!-- .wrap -->

    </div>
</div>
<?php
get_footer();
