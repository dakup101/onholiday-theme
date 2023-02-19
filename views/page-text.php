<?php // Template Name: Sam Tekst
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => get_field("subtitle"),
            "alignment" => "center",
            "tag" => "h1"
        )) ?>
    </div>
</section>

<section>
    <div class="container text">
        <?php echo get_field("the_text"); ?>
    </div>
</section>
<?php get_footer(); ?>