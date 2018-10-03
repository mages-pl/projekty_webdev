<?php

// Przesuń skrypty z head => footer
function remove_head_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);

    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');

//Usunięcie paska admina na froncie
show_admin_bar(false);

// Dodanie miniaturek postów

add_theme_support('post-thumbnails');


register_sidebar(array(
    "name" => __("HomeWspolpraca", $text_domain),
    "description" => __("Pole na miejsce o wspolpracy", $text_domain),
    "id" => "HomeWspolpraca",
    'class' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));


register_sidebar(array(
    "name" => __("HomeFooter", $text_domain),
    "description" => __("Pole na stopke", $text_domain),
    "id" => "HomeFooter",
    'class' => '',
    'before_widget' => '<div class="col-sm-6">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
));

add_post_type_support('page', 'excerpt');
