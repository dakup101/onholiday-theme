<?php // Template Name: Kontakt
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => "Skontaktuj się z nami",
            "alignment" => "center",
            "tag" => "h1"
        )) ?>
    </div>
</section>

<section class="container contact-rows">
    <div class="contact-info text">
        <?php echo get_field("contact_info"); ?>
    </div>
    <div class="contact-form">
        <?php echo do_shortcode(get_field("contact_form")) ?>
    </div>
</section>
<?php get_footer(); ?>