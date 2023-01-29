<?php // Template Name: Strona Główna ?>

<?php get_header(); ?>
<?php
// Hero
$hero = get_field("hero");
$is_slider = count($hero) > 1 ? true : false;
get_template_part(THEME_CMP, "hero", array(
    "is_slider" => $is_slider,
    "content" => $hero
));
// Search Form
get_template_part(THEME_CMP, "search-form");
?>
<section class="container about-kolobrzeg">
    <?php get_template_part( THEME_CMP_CMN, "text-title", array(
        "title" => "Apartamenty - Kołobrzeg",
        "subtitle" => "nadmorskie apartamenty",
    ) ) ?>
    <p class="text-center">Proponujemy Wam kilkanaście prestiżowych<br>apartamentów w najlepszych lokalizacjach w
        Kołobrzegu.</p>
    <div class="apartament-list addons">
        <?php $i = array("", "", "", "", ""); foreach($i as $el) :?>
        <article class="apartament-list-item">
            <a href="#" class="apartament-list-item-inner">
                <div class="apartament-list-item-name">
                    Apartamenty z basenem
                </div>
                <span href="#" class="apartament-list-item-link">
                    Dowiedz się więcej
                </span>
            </a>
            <figure class="apartament-list-item-bg">
                <img src="<?php echo THEME_IMG . "default-apartament.jpg" ?>" alt="">
                <div class="overlay"></div>
            </figure>
        </article>
        <?php endforeach; ?>
    </div>
    <?php get_template_part( THEME_CMP_CMN, "btn", array(
            "link" => null,
            "text" => "Apartamenty w Kołobrzegu",
            "class" => "search-form-action btn-content",
            "type" => "accent",
    ) ) ?>
    <?php get_template_part( THEME_CMP, "info-cards", get_field("cards") ) ?>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<?php get_footer(); ?>