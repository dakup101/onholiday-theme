<?php // Template Name: Galeria
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => "Najnowsze zdjęcia",
            "alignment" => "center",
            "tag" => "h1"
        )) ?>
        <div class="gallery-intro-desc">
            <?php echo get_field("gallery_desc") ?>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="gallery">
            <?php foreach (get_field("gallery") as $img) : ?>
                <a href="<?php echo $img["url"] ?>" class="glightbox gallery-item">
                    <img src="<?php echo $img["url"] ?>" alt="<?php echo $img["caption"] ?>" class="gallery-img">

                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<?php get_footer(); ?>