<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 add_theme_support( 'post-thumbnails' );
 add_post_type_support( 'page', 'excerpt' );
// remove_meta_box( 'categorydiv' , 'post' , 'normal' );
add_post_type_support( 'page', 'post_tag' );

    add_action( 'init', 'wpse34528_add_page_cats' );
function wpse34528_add_page_cats()
{
    register_taxonomy_for_object_type( 'category', 'page' );
}
 
 function remove_menus() { 
   remove_menu_page( 'edit-comments.php' );          //Comments
 }
  add_action( 'admin_menu', 'remove_menus' );

 
  function langi() {
        
      $tablica = [
          'spec' => [
            "pl_PL" => "Specyfikacja",
            "en_GB" => "Specyfication",
            "de_DE" => "Spezifikation",
              ],
          'opis' => [
            "pl_PL" => "Opis",
            "en_GB" => "Description",
            "de_DE" => "Beschreibung",
              ],
          'kontakt' =>
                 [
            "pl_PL" => "Skontaktuj się",
            "en_GB" => "Contact with us",
            "de_DE" => "Schreibst du uns",
              ]
         ];

      return $tablica;
  }
  
   
 
function shopUrl() { 
    $urlSmall = "//.sklep.checkupdive.pl";
    return $urlSmall;
}
 
  show_admin_bar( false);  
  
  $names = [
      [
          "id" => "section_top_left",
          "name" => "Section Top Left",
          "before_widget" => '<div>',
          "after_widget" => '</div>',
      ],
      [
          "id" => "kontrahenci",
          "name" => "Kontrahenci",        
          "before_widget" => '<div class="col-lg-4 col-md-4 col-sm-6">',
          "after_widget" => '</div>',
          'before_title'  => '',
          'after_title'   => '',
      ],
      [
          "id" => "section_mapa",
          "name" => "Section Mapa",        
          "before_widget" => '<script type="text/javascript">',
          "after_widget" => '</script>',
          'before_title'  => '',
          'after_title'   => '',
      ],
      [
          "id" => "section_top_right",
          "name" => "Section Top Right",
          "before_widget" => '<div>',
          "after_widget" => '</div>',          
      ],
      [
          "id" => "menu_mobile",
          "name" => "Menu Mobile",
          "before_widget" => '<div id="menu_mobile">',
          "after_widget" => '</div>',          
      ],
      [
          "id" => "home_slider",
          "name" => "Home Slider",
//          "before_widget" => '<div class="carousel-item">',
//          "after_widget" => '</div>',
      ],
      
      [
          "id" => "section_first_left",
          "name" => "Sekcja współpraca Home"
      ],
      [
          "id" => "section_first_right",
          "name" => "Sekcja sklep Home"
      ],
      
      [
          "id" => "section_second_left",
          "name" => "Sekcja oferta Home"
      ],
      [
          "id" => "section_second_center",
          "name" => "Sekcja dropshipping Home"
      ],
      [
          "id" => "section_second_right",
          "name" => "Sekcja wysyłka Home"
      ],
      
      [
          "id" => "section_second_bottom",
          "name" => "Sekcja b2b Home",
          "before_widget" => '',
          "after_widget" => '',
          
      ],
      [
          "id" => "section_third_left",
          "name" => "Sekcja współpraca info Home",
          'before_title'  => '<h1>',
          'after_title'   => '</h1>',
      ],
      [
          "id" => "section_footer",
          "name" => "Sekcja stopka Home",
          "before_widget" => '<div class="col-lg-4 col-md-4">',
          "after_widget" => '</div>',
          'before_title'  => '<h3>',
          'after_title'   => '</h3>',
      ]
  ];
  
  for($z=0;$z<count($names);$z++) { 
   
   register_sidebar( array(
	'id'          => $names[$z]["id"], 
	'name'        => $names[$z]["name"], 
	'description' => __( $names[$z]["name"], 'text_domain' ),
        'before_widget' => $names[$z]["before_widget"],
        'after_widget'  => $names[$z]["after_widget"],
       'before_title'  => $names[$z]["before_title"],
	 'after_title'   => $names[$z]["after_title"],
));
   
    
   }
   
   /* getting sidebar as shortcode */ 
 
 function sidebar_shortcode($atts){
     
     $atts = shortcode_atts( array(
		'id'    => '',
	), $atts, 'get_sidebar' );
     
  //extract(shortcode_atts(array('name' => ''), $atts));

  //ob_start();
  //get_sidebar($name);
  //$sidebar= ob_get_contents();
 
  if ( !empty( $atts['id'] ) ) { 
      
  # $sidebar =  get_sidebar("kontrahenci");// "fsdfdsf";//dynamic_sidebar($atts['id']);
   ob_start();
dynamic_sidebar($atts['id']);
$sidebar = ob_get_contents();
ob_end_clean();
  }
  //ob_end_clean();
//  /  ob_start();
  return $sidebar;
//  ob_end_clean();
}
add_shortcode('get_sidebar', 'sidebar_shortcode');
