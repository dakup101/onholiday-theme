<?php
add_action('wp_enqueue_scripts', 'theme_scripts');
function theme_scripts() {
	wp_enqueue_style( 'tailwind', THEME_URI.'assets/compiled/tailwind.css');
	wp_enqueue_style( 'theme', THEME_URI.'assets/compiled/theme.css');
	wp_enqueue_script('theme', THEME_URI.'assets/compiled/theme.js', '', '', true);
}