<?php // Template Name: Galeria
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => __("Najnowsze zdjęcia", "oh-theme"),
            "alignment" => "center",
            "tag" => "h1",
            "class" => "font-alt"
        )) ?>
        <div class="gallery-intro-desc">
            <?php echo get_field("gallery_desc") ?>
        </div>
    </div>
</section>

<?php foreach (get_field("galleries") as $galleries) : ?>
<section id="<?php echo !empty(get_field("section_id")) ? get_field("section_id") : "" ?>">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
                "title" => $galleries["title"],
                "subtitle" => null,
                "alignment" => "center",
                "tag" => "h2",
                "class" => "font-alt gallery-title"
            )) ?>
        <div class="gallery">
            <?php foreach ($galleries["gallery"] as $img) : ?>
            <a href="<?php echo $img["url"] ?>"
               class="glightbox gallery-item">
                <img src="<?php echo $img["url"] ?>"
                     alt="<?php echo $img["caption"] ?>"
                     class="gallery-img">

            </a>
            <?php endforeach; ?>
        </div>
        <?php if (!empty($galleries["desc"])) : ?>
        <div class="gallery-desc">
            <?php echo $galleries["desc"] ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endforeach; ?>

<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_footer(); ?>