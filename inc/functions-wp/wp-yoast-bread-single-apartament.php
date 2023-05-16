<?php
 function modify_breadcrumb_links($links) {
    global $post;
    
    // Check if it's a specific post type and specific post ID
    if ($post->post_type === 'ido-apartaments') {
        if(has_term( "kolobrzeg", "ido_category", $post ))
        if (is_array($links) && count($links) >= 2) {
            $second_item = $links[1];
            $modified_item = array(
                'url' => 'https://onholiday.com.pl/apartamenty-w-kolobrzegu/',
                'text' => 'Apartamenty w Kołobrzegu &#8211; Tu się Odpoczywa i Bawi!',
            );
            $links[1] = $modified_item;
        }
    }
    
    return $links;
}
add_filter('wpseo_breadcrumb_links', 'modify_breadcrumb_links');