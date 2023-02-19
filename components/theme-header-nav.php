<?php
// Custom menu function, check ./functions
$nav = wp_get_menu_array('primary', get_the_ID());
?>
<nav class="header-nav">
    <?php if (!empty($nav)) : ?>
    <ul>
        <?php foreach ($nav['menus'] as $nav_item) : ?>
        <?php
                $is_megamenu = $nav_item['is_megamenu'];
                $title = $nav_item['title'];
                $url = $nav_item['url'];
                $children = $nav_item['children'];
                $is_active = $nav_item['active'];
                ?>
        <?php if (!empty($title)) : ?>
        <li class="<?php echo make_menu_item_classes($is_active, $is_megamenu, !empty($children)) ?>">
            <a class="header-nav-item-link" href="<?php echo $url; ?>">
                <span class="header-nav-item-content">
                    <?php echo $title ?>
                </span>
                <?php if (!empty($children)) : ?>
                <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" class="header-nav-item-caret caret">
                    <g>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.334 8.08371C13.4195 7.97208 13.4583 7.84621 13.4583 7.72271C13.4583 7.41475 13.216 7.125 12.8653 7.125H6.13538C5.78308 7.125 5.54163 7.41554 5.54163 7.72271C5.54163 7.847 5.58121 7.97287 5.6675 8.0845C6.61988 9.31475 8.242 11.4087 9.03842 12.4371C9.15083 12.5827 9.32342 12.6667 9.50708 12.6667C9.68917 12.6667 9.86254 12.582 9.97496 12.4363C10.7682 11.4079 12.3848 9.31317 13.334 8.08371Z" />
                    </g>
                </svg>
                <?php endif; ?>
            </a>
            <?php if (!empty($children)) : ?>
            <nav class="header-nav-item-child <?php if ($is_megamenu) echo 'header-nav-item-megamenu'; ?> hidden">
                <?php if ($is_megamenu) : ?>
                <ul class="megamenu">
                    <?php foreach ($children as $child) : ?>
                    <li class="megamenu-item">
                        <div class="megamenu-item-content">
                            <span class="megamenu-item-title">
                                <?php echo $child['title']; ?>
                            </span>
                            <p class="megamenu-item-desc">
                                <?php echo $child['desc']; ?>
                            </p>
                            <a href="<?php echo $child['url'] ?>" class="btn btn-accent btn-content megamenu-item-link">
                                Sprawdź
                            </a>
                        </div>
                        <figure class="megamenu-item-bg">
                            <div class="megamenu-item-bg-content">
                                <img src="<?php echo $child['bg_img'] ?>" alt="<?php echo $child['title'] ?>"
                                    loading="lazy">
                                <div class="overlay dark"></div>
                            </div>
                        </figure>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else : ?>
                <ul>
                    <?php foreach ($children as $child) : ?>
                    <?php
                                            $child_children = array();
                                            foreach ($nav["submenus"] as $nav_submenu) {
                                                if ($nav_submenu["parent"] == $child["ID"]) {
                                                    array_push($child_children, $nav_submenu["ID"]);
                                                }
                                            }
                                            ?>
                    <li
                        class="header-nav-subitem <?php if (!empty($child_children)) echo "header-nav-item-has-children" ?>">
                        <a href="<?php echo $child["url"] ?>" class="header-nav-item-link">
                            <span class="header-nav-item-content">
                                <?php echo $child["title"] ?>
                            </span>
                            <?php if (!empty($child_children)) : ?>
                            <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg"
                                class="header-nav-item-caret caret">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.334 8.08371C13.4195 7.97208 13.4583 7.84621 13.4583 7.72271C13.4583 7.41475 13.216 7.125 12.8653 7.125H6.13538C5.78308 7.125 5.54163 7.41554 5.54163 7.72271C5.54163 7.847 5.58121 7.97287 5.6675 8.0845C6.61988 9.31475 8.242 11.4087 9.03842 12.4371C9.15083 12.5827 9.32342 12.6667 9.50708 12.6667C9.68917 12.6667 9.86254 12.582 9.97496 12.4363C10.7682 11.4079 12.3848 9.31317 13.334 8.08371Z" />
                                </g>
                            </svg>
                            <?php endif; ?>
                        </a>
                        <?php if (!empty($child_children)) :  ?>
                        <nav class="header-nav-item-child sub-child hidden">
                            <?php foreach ($child_children as $sub_child) : ?>
                    <li class="header-nav-subitem">
                        <a href="<?php echo $nav["submenus"][$sub_child]["url"] ?>" class="header-nav-item-link">
                            <span class="header-nav-item-content">
                                <?php echo $nav["submenus"][$sub_child]["title"] ?>
                            </span>
                        </a>
                    </li>
                    <?php endforeach; ?>
            </nav>
        </li>
        <?php endif; ?>
        </li>
        <?php endforeach; ?>

    </ul>
    <?php endif; ?>
</nav>
<?php endif; ?>
</li>
<?php endif; ?>
<?php endforeach; ?>
</ul>
<?php endif; ?>
</nav>