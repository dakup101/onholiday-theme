<?php
// Theme settings
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');

add_filter( 'wpcf7_autop_or_not', '__return_false' );

add_action( 'init', function() {
	remove_post_type_support( 'page', 'editor' );
}, 99);