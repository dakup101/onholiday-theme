<?php
function modify_taxonomy_terms_breadcrumb($links) {
    // Define the specific taxonomy and term slugs or names
    $taxonomy = 'ido_loc';
    $term_slugs = array( 'dzielnica-podczele', 'dzielnica-uzdrowiskowa', 'dzielnica-wschodnia', 'dzielnica-zachodnia' );
    
    // Check if it's the desired taxonomy term
    if (is_tax($taxonomy) && has_term($term_slugs, $taxonomy)) {
        if (is_array($links) && count($links) >= 2) {
            $second_item = $links[1];
            $modified_item = array(
                'url' => 'https://onholiday.com.pl/apartamenty-w-kolobrzegu/',
                'text' => 'Kołobrzeg Apartamenty',
            );
            $links[1] = $modified_item;
        }
    }

    return $links;
}
add_filter('wpseo_breadcrumb_links', 'modify_taxonomy_terms_breadcrumb');