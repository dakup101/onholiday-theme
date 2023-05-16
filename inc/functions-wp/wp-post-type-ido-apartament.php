<?php
add_action('init', 'ido_amens_tax', 0);

// Register Custom Taxonomy
function ido_category_tax()
{

	$labels = array(
		'name'                       => _x('Kategorie', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Kategoria', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Kategorie', 'text_domain'),
		'all_items'                  => __('Wszystko', 'text_domain'),
		'parent_item'                => __('Rodziciel', 'text_domain'),
		'parent_item_colon'          => __('Rodziciel', 'text_domain'),
		'new_item_name'              => __('Kategoria', 'text_domain'),
		'add_new_item'               => __('Dodaj', 'text_domain'),
		'edit_item'                  => __('Edytuj', 'text_domain'),
		'update_item'                => __('Aktualizuj', 'text_domain'),
		'view_item'                  => __('Pokaż', 'text_domain'),
		'separate_items_with_commas' => __('Oddziel przecinkie,', 'text_domain'),
		'add_or_remove_items'        => __('Dodaj / Usuń', 'text_domain'),
		'choose_from_most_used'      => __('Wybierz z popularnych', 'text_domain'),
		'popular_items'              => __('Popularne', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'no_terms'                   => __('No items', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$rewrite = array(
		'slug'                       => 'apartamenty/',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy('ido_category', array('ido-apartaments'), $args);
}


// Register Custom Taxonomy
function ido_amens_tax()
{

	$labels = array(
		'name'                       => _x('Udogodnienia', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Udogodnienie', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Udogodnienia', 'text_domain'),
		'all_items'                  => __('All Items', 'text_domain'),
		'parent_item'                => __('Parent Item', 'text_domain'),
		'parent_item_colon'          => __('Parent Item:', 'text_domain'),
		'new_item_name'              => __('New Item Name', 'text_domain'),
		'add_new_item'               => __('Add New Item', 'text_domain'),
		'edit_item'                  => __('Edit Item', 'text_domain'),
		'update_item'                => __('Update Item', 'text_domain'),
		'view_item'                  => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Items', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'no_terms'                   => __('No items', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('ido_amen', array('ido-apartament'), $args);
}

add_action('init', 'ido_category_tax', 0);

// Register Custom Taxonomy
function ido_loc_tax()
{

	$labels = array(
		'name'                       => _x('Dzielnicy', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Dzielnica', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Dzielnicy', 'text_domain'),
		'all_items'                  => __('All Items', 'text_domain'),
		'parent_item'                => __('Parent Item', 'text_domain'),
		'parent_item_colon'          => __('Parent Item:', 'text_domain'),
		'new_item_name'              => __('New Item Name', 'text_domain'),
		'add_new_item'               => __('Add New Item', 'text_domain'),
		'edit_item'                  => __('Edit Item', 'text_domain'),
		'update_item'                => __('Update Item', 'text_domain'),
		'view_item'                  => __('View Item', 'text_domain'),
		'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Items', 'text_domain'),
		'search_items'               => __('Search Items', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'no_terms'                   => __('No items', 'text_domain'),
		'items_list'                 => __('Items list', 'text_domain'),
		'items_list_navigation'      => __('Items list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
			'slug' => 'apartamenty',
			'with_front' => false
		)
	);
	register_taxonomy('ido_loc', array('ido-apartament'), $args);
}

add_action('init', 'ido_loc_tax', 0);

// Register ido_apartaments
function post_type_ido_apartaments()
{

	$labels = array(
		'name'                  => _x('Apartamenty', 'Post Type General Name', 'text_domain'),
		'singular_name'         => _x('Apartament', 'Post Type Singular Name', 'text_domain'),
		'menu_name'             => __('Apartamenty', 'text_domain'),
		'name_admin_bar'        => __('Apartamenty', 'text_domain'),
		'archives'              => __('Apartamenty', 'text_domain'),
		'attributes'            => __('Atrybuty', 'text_domain'),
		'parent_item_colon'     => __('Rodziciel', 'text_domain'),
		'all_items'             => __('Wszystko', 'text_domain'),
		'add_new_item'          => __('Dodaj', 'text_domain'),
		'add_new'               => __('Dodaj', 'text_domain'),
		'new_item'              => __('Apartament', 'text_domain'),
		'edit_item'             => __('Edytuj', 'text_domain'),
		'update_item'           => __('Aktualizuj', 'text_domain'),
		'view_item'             => __('Pokaż', 'text_domain'),
		'view_items'            => __('Pokaż', 'text_domain'),
		'search_items'          => __('Szukaj', 'text_domain'),
		'not_found'             => __('404', 'text_domain'),
		'not_found_in_trash'    => __('404', 'text_domain'),
		'featured_image'        => __('Grafika Główna', 'text_domain'),
		'set_featured_image'    => __('Ustaw grafikę', 'text_domain'),
		'remove_featured_image' => __('Usuń grafikę', 'text_domain'),
		'use_featured_image'    => __('Use as featured image', 'text_domain'),
		'insert_into_item'      => __('Insert into item', 'text_domain'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
		'items_list'            => __('Items list', 'text_domain'),
		'items_list_navigation' => __('Items list navigation', 'text_domain'),
		'filter_items_list'     => __('Filter items list', 'text_domain'),
	);
	$rewrite = array(
		'slug'                  => 'apartament',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __('OH Apartament', 'text_domain'),
		'description'           => __('Apartamenty pobrane z IdoBooking', 'text_domain'),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
		'taxonomies'            => array('ido_category', 'ido_amen', 'ido_loc'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'apartamenty',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type('ido-apartaments', $args);
}
add_action('init', 'post_type_ido_apartaments', 0);