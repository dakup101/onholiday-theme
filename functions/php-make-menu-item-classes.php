<?php
function make_menu_item_classes($is_active, $is_mega, $has_children) {
    $classList = array();
    if ($is_active) array_push($classList, "menu-item-active");
    if ($is_mega && $has_children) array_push($classList, "menu-item-megamenu menu-item-has-children");
    elseif ($is_mega && !$has_children) array_push($classList, "menu-item-megamenu");
    elseif (!$is_mega && $has_children) array_push($classList, "menu-item-has-children");
    return implode($classList, " ");
}