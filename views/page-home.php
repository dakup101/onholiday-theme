<?php // Template Name: Strona Główna ?>

<?php get_header(); ?>
<?php 
// Hero
$hero = get_field("hero");
$is_slider = count($hero) > 1 ? true : false;
get_template_part(THEME_CMP, "hero", array(
    "is_slider" => $is_slider,
    "content" => $hero
)) 
?>
<?php get_footer(); ?>