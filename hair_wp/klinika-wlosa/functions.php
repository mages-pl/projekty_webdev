<?php
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
register_sidebar( array(
    'id'          => 'bottom-green-widget',
    'name'        => __( 'bottom-green-widget', $text_domain ),
    'description' => __( 'Kontakt telefonicny.', $text_domain ),
) );
register_sidebar( array(
    'id'          => 'bottom-grey-widget',
    'name'        => __( 'bottom-grey-widget', $text_domain ),
    'description' => __( 'Dane adresowe na dole.', $text_domain ),
) );
?>
