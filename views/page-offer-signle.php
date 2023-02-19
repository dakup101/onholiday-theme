<?php
// Template Name: Oferta pojedyncza 
?>

<?php get_header(); ?>
<?php
// Hero
$hero = (array) get_field("hero");
$is_slider = count($hero) > 1 ? true : false;
get_template_part(THEME_CMP, "hero", array(
    "is_slider" => $is_slider,
    "content" => $hero,
));
?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<div style="margin-top: 5rem"></div>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_footer(); ?>