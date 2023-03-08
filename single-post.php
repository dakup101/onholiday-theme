<?php // Template Name: Pojedynczy Wpis
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => null,
            "alignment" => "center",
            "tag" => "h1"
        )) ?>
    </div>
</section>
<section class="post-thumbnail container">
    <figure>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title() ?>">
    </figure>
</section>
<section class="container text">
    <?php echo get_the_content(); ?>
</section>
<?php get_footer(); ?>