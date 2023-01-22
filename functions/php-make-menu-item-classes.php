<?php
function make_menu_item_classes($is_active, $is_mega, $has_children) {
    $classList = array("header-nav-item");
    if ($is_active) array_push($classList, "header-nav-item-active");
    if ($is_mega) array_push($classList, "header-nav-item-megamenu ");
    if ($has_children) array_push($classList, "header-nav-item-has-children");
    return implode($classList, " ");
}