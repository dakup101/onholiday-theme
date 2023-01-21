<?php
// Globals
define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('THEME_FUN', THEME_DIR . 'functions/php-');
define('THEME_IMG', THEME_URI . 'assets/img/');
define('THEME_CMP','/components/ef');