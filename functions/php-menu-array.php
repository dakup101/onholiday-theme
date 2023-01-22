<?php
function wp_get_menu_array($current_menu, $post_id): array {
	$menu_name = $current_menu; //menu slug
	$locations = get_nav_menu_locations();
	$menu_obj = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$array_menu = wp_get_nav_menu_items($menu_obj);
	$menu = array();
	foreach ($array_menu as $m) {
		if (empty($m->menu_item_parent)) {
			$menu[$m->ID] = array();
			$menu[$m->ID]['ID'] = $m->ID;
			$menu[$m->ID]['active'] = $post_id == $m->ID ? true : false;
			$menu[$m->ID]['title'] = $m->title;
			$menu[$m->ID]['url'] = $m->url;
			$menu[$m->ID]['children'] = array();
			
			$is_megamenu = get_field('is_megamenu', $m);
			$menu[$m->ID]['is_megamenu'] = $is_megamenu;
		}
	}
	$submenu = array();
	foreach ($array_menu as $m) {
		if ($m->menu_item_parent) {
			$submenu[$m->ID] = array();
			$submenu[$m->ID]['ID'] = $m->ID;
			$submenu[$m->ID]['title'] = $m->title;
			$submenu[$m->ID]['url'] = $m->url;

			$is_megamenu = get_field('is_megamenu', $m);
			$submenu[$m->ID]['is_megamenu'] = $is_megamenu;
			if ($is_megamenu){
				$submenu[$m->ID]['desc'] = get_field("desc", $m);
				$submenu[$m->ID]['bg_img'] = get_field("bg_img", $m);
			}

			$menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
		}
	}
	return array(
		'menus' => $menu,
		'submenus' => $submenu
	);
}