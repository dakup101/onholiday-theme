<?php $nav = wp_get_menu_array('primary', get_the_ID()); ?>
<nav class="theme-header-nav">
    <?php if (!empty($nav)): ?>
    <ul>
        <?php foreach($nav['menus'] as $nav_item): ?>
        <?php
            $is_megamenu = $nav_item['is_megamenu'];
            $title = $nav_item['title'];
            $url = $nav_item['url'];
            $children = $nav_item['children'];
            $is_active = $nav_item['active'];
            ?>
        <li class="<?php echo make_menu_item_classes($is_active, $is_megamenu, !empty($children)) ?>">
            <a href="<?php echo $url; ?>">
                <?php echo $title ?>
                <?php if (!empty($children)): ?>
                <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg"
                    class="menu-item-active-caret w-2 h-5 fill-current">
                    <g>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.334 8.08371C13.4195 7.97208 13.4583 7.84621 13.4583 7.72271C13.4583 7.41475 13.216 7.125 12.8653 7.125H6.13538C5.78308 7.125 5.54163 7.41554 5.54163 7.72271C5.54163 7.847 5.58121 7.97287 5.6675 8.0845C6.61988 9.31475 8.242 11.4087 9.03842 12.4371C9.15083 12.5827 9.32342 12.6667 9.50708 12.6667C9.68917 12.6667 9.86254 12.582 9.97496 12.4363C10.7682 11.4079 12.3848 9.31317 13.334 8.08371Z" />
                    </g>
                </svg>
                <?php endif; ?>
            </a>

        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</nav>