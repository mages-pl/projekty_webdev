<?php

function get_breadcrumbs() {
    
    $breadcrumb = 'Jesteś tu: <br/>';
  
    // HOME
if(is_home()) :
    $breadcrumb .= "<a href='" . get_home_url() . "'><i class='fa fa-home' aria-hidden='true'></i></a> ";
     else  :
    $breadcrumb .= "<a href='" . get_home_url() . "'><i class='fa fa-home' aria-hidden='true'></i></a> / ";
          
     endif;

    // KATEGORIA 
    if (is_category()) :
        $get_category = get_the_category();
//        foreach ($get_category as $cat_data) :
//            $breadcrumb .= "<a href='" . get_category_link($cat_data->term_id) . "'>" . $cat_data->name . "</a>";
//
//        endforeach;
//        
    // $breadcrumb .= " <a href='".get_category_link(get_the_ID())."'>".get_the_category(get_the_ID())[0]->name."</a>";
    
    $current_category = get_category(get_query_var('cat'));
    
     $breadcrumb .= " <a href='".get_category_link(get_the_ID())."'>".$current_category->name."</a>";
    
    
    endif;
 
    // POSTY i STRONY
    
    if (is_single) :
        
        // STRONY 
        
        if (is_page()) :
            $get_page = get_post();
            $id_page = $get_page_id->ID;


            $breadcrumb .= "<a href='" . get_permalink($id_page) . "'>" . get_the_title($id_page) . "</a>";

        endif;
        
        // POSTY
        
        if ((!is_page()) && (!is_home())) :
            $get_post = get_post();
            $id_post = $get_post_id->ID;

            if(is_single()) :
                if (has_category($id_post)) :
                      $breadcrumb .= "<a href='".get_category_link(get_the_category()[0]->term_id)."'>".get_the_category()[0]->name."</a> / ";
                endif; 
            endif;
          
            if (has_category($id_post)) :
                  if(is_single()) :
                $breadcrumb .=  " <a href='" . get_permalink($id_post) . "'>" . get_the_title($id_post) . "</a>";
            endif;
            endif;
             

        endif;
    endif;
    return $breadcrumb;
}

function lidka_sidebars() {
    register_sidebar(array(
        'name' => 'lewy blok',
        'description' => 'panel lewy',
        'id' => 'home_left_blocks',
        "before_title" => "<h3 class='_widget-title'>",
        "after_title" => "</h3>"
    ));

    register_sidebar(
            array(
                'name' => 'top blok',
                "description" => 'panel górny',
                "id" => 'home_top_block',
                "before_widget" => "<div class='col-sm-6'>",
                "after_widget" => "</div>"
            )
    );

    register_nav_menus(array(
        'header_menu' => __('HeaderMenu'),
        'extra_menu' => __('ExtraMenu'),
        'footer_menu' => __('FooterMenu')
    ));
    register_sidebar(
            array(
               'name' => 'footer_block',
                'description' => 'Panel stopka',
                'id' => 'footer_block_inst'
            ));
}

function custom_logo() {
    add_theme_support("custom-logo", array(
        'flex-width' => true
            )
    );
}

add_theme_support('post-thumbnails');

add_image_size('custom-size-lp', 420, 480, true);

show_admin_bar(false);

add_action("init", "lidka_sidebars");
add_action("init", "custom_logo");

add_action("init", "get_breadcrumbs");

add_theme_support('html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));
