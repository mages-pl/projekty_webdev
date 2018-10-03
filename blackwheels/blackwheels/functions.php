<?php
function theme_logo() { 
add_theme_support("custom-logo",array(   
    'flex-width'=>true
)     
        );


}
function blackwheels_menu() {
register_nav_menus(
        array(
        'header-menu' =>  __(' Header Menu '),
       'extra-menu' => __(' Extra Menu ')
        )
        );
}
function blackwheels_sidebar() {
    
    register_sidebar( array(
        'id' => 'sidebar1',
        'name' => 'top-blackwheels',
        'description' => 'Obszar na górze strony'
        
        
    )    
            );
    
      register_sidebar( array(
        'id' => 'sidebar2',
        'name' => 'header-down-blackwheels',
        'description' => 'Obszar na doile topu strony'
        
        
    )    
            );
      
        register_sidebar( array(
        'id' => 'sidebar3',
        'name' => 'footer-blackwheels',
        'description' => 'Obszar w stopce strony'
        
        
    )    
            );
        
    
}
add_action('init','blackwheels_sidebar');
add_action('init','blackwheels_menu');
add_action('init','theme_logo');

	