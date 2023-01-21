<?php
add_filter( 'wp_default_scripts', 'change_default_jquery' );

function change_default_jquery( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
    }
}