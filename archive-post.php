<?php // Template Name: Blog
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => __("Bądź w temacie", "oh-theme"),
            "alignment" => "center",
            "tag" => "h1"
        )) ?>
    </div>
</section>

<section>
    <div class="container blog-archive">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part(THEME_CMP, "blog-grid-item") ?>

        <?php endwhile; ?>
    </div>
</section>
<?php get_footer(); ?>