<?php
// Defines
define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('THEME_FUN', THEME_DIR . 'functions/php-');
define('THEME_IMG', THEME_URI . 'assets/img/');
define('THEME_VID', THEME_URI . 'assets/video/');

define('THEME_CMP', '/components/theme');
define('THEME_CMP_CMN', '/components/common/theme');


// Theme Functions
require_once THEME_FUN . 'theme-setup.php';
require_once THEME_FUN . 'theme-scripts.php';
require_once THEME_FUN . 'register-menus.php';
require_once THEME_FUN . 'menu-array.php';
require_once THEME_FUN . 'disable-gutenberg.php';
require_once THEME_FUN . 'disable-jquery.php';
require_once THEME_FUN . 'make-menu-item-classes.php';
require_once THEME_FUN . 'allow-svg.php';


// Post Types

// Taxonomies

// ACF
require_once THEME_FUN . 'acf-options-page.php';

// AJAX