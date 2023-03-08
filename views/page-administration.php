<?php
// Template Name: Zarządzanie
?>

<?php get_header(); ?>
<section class="container">
    <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>
</section>
<?php get_footer(); ?>