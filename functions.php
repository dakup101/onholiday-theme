<?php
// *** Defines *** //

define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('THEME_FUN', THEME_DIR . 'inc/functions-wp/wp-');
define('THEME_IDO', THEME_DIR . 'inc/functions-ido/ido-');
define('THEME_IMG', THEME_URI . 'assets/img/');
define('THEME_VID', THEME_URI . 'assets/video/');
define('THEME_CMP', '/components/theme');
define('THEME_CMP_CMN', '/components/common/theme');

// *** Theme Functions *** ?

require_once THEME_FUN . 'theme-setup.php';
require_once THEME_FUN . 'theme-scripts.php';
require_once THEME_FUN . 'register-menus.php';
require_once THEME_FUN . 'menu-array.php';
require_once THEME_FUN . 'disable-gutenberg.php';
require_once THEME_FUN . 'disable-jquery.php';
require_once THEME_FUN . 'make-menu-item-classes.php';
require_once THEME_FUN . 'allow-svg.php';
require_once THEME_FUN . 'remove-post-term.php';

// *** Post Types *** //

require_once THEME_FUN . 'post-type-ido-apartament.php';

// *** Taxonomies *** //

// *** ACF *** //

require_once THEME_FUN . 'acf-options-page.php';

// *** AJAX *** //

require_once THEME_FUN . 'ajax-city-offer.php';
require_once THEME_FUN . 'ajax-load-prices.php';


// *** IDO BOOKING *** //

// Ido Booking - main API class
require_once THEME_IDO . 'class-IdoBooking.php';
// Ido Booking - API commands extend
require_once THEME_IDO . 'class-IdoBooking-API.php';
// Ido Booking - admin page
require_once THEME_IDO . 'admin-page.php';
// Ido Booking - create db table on theme switch (@ after_switch_theme)
require_once THEME_IDO . 'db-table.php';
require_once THEME_IDO . 'ajax-make-posts.php';
require_once THEME_IDO . 'ajax-update-posts.php';


function get_language_shortcode()
{
    return apply_filters('wpml_current_language', null);
}

add_filter( 'redirect_canonical', 'custom_post_redirect' );
function custom_post_redirect( $redirect_url ) {
    // Get the current post ID
    $post_id = get_queried_object_id();

    // Get the current post slug
    $post_slug = get_post_field( 'post_name', $post_id );

    // Check if the post slug starts with "blog-post/"
    if ( strpos( $post_slug, 'blog-post/' ) === 0 ) {
        // Remove "blog-post/" from the slug
        $new_slug = str_replace( 'blog-post/', '', $post_slug );

        // Build the new URL with the new slug
        $new_url = home_url( $new_slug . '/' );

        // Redirect to the new URL
        wp_redirect( $new_url, 301 );
        exit;
    }

    return $redirect_url;
}

add_action( 'parse_query', function ( $wp_query ) {
    $wp_query->query_vars['cache_results'] = false;
 } );