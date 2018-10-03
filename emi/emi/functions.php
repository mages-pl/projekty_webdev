<?php
function theme_logo() { 
add_theme_support("custom-logo",array(   
    'flex-width'=>true
)       
        );


} 
function emi_menu() {
register_nav_menus(
        array(
        'header-menu' =>  __('HeaderMenu'),
       'extra-menu' => __('ExtraMenu')
//     'ang-menu' => __('AngMenu')
        )
        );
}
function emi_sidebar() {
    
    register_sidebar( array(
        'id' => 'sidebar1',
        'name' => 'top-emi',
        'description' => 'Obszar na górze strony'
        
        
    )    
            );
    
      register_sidebar( array(
        'id' => 'sidebar2',
        'name' => 'header-down-emi',
        'description' => 'Obszar na doile topu strony'
        
        
    )    
            );
      
        register_sidebar( array(
        'id' => 'sidebar3',
        'name' => 'footer-emi',
        'description' => 'Obszar w stopce strony'
        
        
    )    
            );
        
          register_sidebar( array(
        'id' => 'sidebar4',
        'name' => 'home-box',
        'description' => 'Obszar w boxów oferty'
        
        
    )    
            );
          
                register_sidebar( array(
        'id' => 'sidebar5',
        'name' => 'social-box',
        'description' => 'Obszar z social media'
        
        
    )    
            );
        
    
        
    
}
/* alternatywna wielkosć obrazka medium */ 
add_image_size('custom-size-emi',420,480,true);
show_admin_bar( false );

add_theme_support( 'title-tag' );

add_action('init','emi_sidebar');
add_action('init','emi_menu');
add_action('init','theme_logo');

	