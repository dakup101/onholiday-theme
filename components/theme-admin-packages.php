<?php $packages = wp_parse_args($args, array(
    "title" => "Packages",
    "subtitle" => "Our offer",
    // Items Example Structure
    "items" => array(
        array(
            "title" => "Package",
            "color" => "#333",
            "desc" => "This package contains:",
            "items" => array(
                array(
                    "value" => "Package item"
                )
            )
        )
    )
)) ?>

<?php get_template_part(THEME_CMP_CMN, "text-title", array(
    "title" => $packages["title"],
    "subtitle" => $packages["subtitle"],
    "alignment" => "center",
    "tag" => "h2",
    "class" => "font-alt"
)) ?>

<div class="administration-packages-grid">
    <?php foreach ($packages["items"] as $item) {
        get_template_part(THEME_CMP, "admin-packages-item", $item);
    } ?>
</div>