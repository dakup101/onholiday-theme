<?php
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Global fields',
        'menu_title'    => 'Global fields',
        'menu_slug'     => 'theme-globals',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-globals',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-globals',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Recipes Archive Settings',
        'menu_title'    => 'Recipes Archive',
        'parent_slug'   => 'theme-globals',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Posts Archive Settings',
        'menu_title'    => 'Posts Archive',
        'parent_slug'   => 'theme-globals',
    ));
  }