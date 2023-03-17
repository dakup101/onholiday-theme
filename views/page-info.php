<?php
// Template Name: Info
?>

<?php get_header(); ?>
<section class="gallery-intro">
    <div class="container">
        <?php get_template_part(THEME_CMP_CMN, "text-title", array(
            "title" => get_the_title(),
            "subtitle" => null,
            "alignment" => "center",
            "tag" => "h1",
            "class" => "font-alt"
        )) ?>
        <div class="gallery-intro-desc">
            <?php echo get_field("info_desc") ?>
        </div>
    </div>
</section>
<section class="container info">
    <?php foreach (get_field("repeat_info") as $repeater) : ?>
        <?php if ($counter % 2 == 0) : ?>
            <?php get_template_part(THEME_CMP, "info-right", $repeater["info"]) ?>

        <?php else : ?>
            <?php get_template_part(THEME_CMP, "info-left", $repeater["info"]) ?>

        <?php endif; ?>
    <?php $counter++;
    endforeach; ?>
</section>

<?php get_footer(); ?>