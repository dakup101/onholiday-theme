<?php
if (function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Komponenty',
        'menu_title'    => 'Komponenty',
        'menu_slug'     => 'theme-components',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Nagłowek strony',
        'menu_title'    => 'Nagłówek',
        'parent_slug'   => 'theme-components',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Stopka strony',
        'menu_title'    => 'Stopka',
        'parent_slug'   => 'theme-components',
    ));
}