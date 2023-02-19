<?php
$args = array(
    "post_type" => "ido-apartaments",
    "status" => "publish",
    "posts_per_page" => -1,
);
$apartaments = new WP_Query($args);
?>

<?php get_template_part(THEME_CMP, "search-form"); ?>
<section class="container apartaments">
    <?php get_template_part(THEME_CMP_CMN, "text-title", array(
        "title" => "OnHoliday - Apartamenty",
        "subtitle" => "Jakościowy wypoczynek",
        "tag" => "h1",
    )) ?>
    <div class="apartaments-inner">
        <aside class="apartaments-filters">
            <?php get_template_part(THEME_CMP, "apartaments-filters") ?>
        </aside>
        <div class="apartaments-list">
            <?php
            while ($apartaments->have_posts()) {
                $apartaments->the_post();
                get_template_part(THEME_CMP, "apartaments-item");
            }
            wp_reset_query();
            ?>
        </div>
    </div>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>