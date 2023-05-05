<?php
// Template Name: Zarządzanie
?>

<?php get_header(); ?>
<section class="container administration-start">
    <?php get_template_part(THEME_CMP_CMN, "text-title", array(
        "title" => get_the_title(),
        "subtitle" => __("Zarabiaj z nami", "oh-theme"),
        "alignment" => "center",
        "tag" => "h1",
        "class" => "font-alt"
    )) ?>
    <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>
</section>
<section class="container administration-info" id="#zarzadzanie">
    <?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
    <?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
    <?php get_template_part(THEME_CMP, "info-right", get_field("info-right-2")) ?>
</section>
<section class="container administration-packages">
    <?php get_template_part(THEME_CMP, "admin-packages", get_field("packages")) ?>
</section>
<div class="container summary-wrapper">
    <?php get_template_part(THEME_CMP, "summary", get_field("summary")) ?>
</div>
<?php get_footer(); ?>