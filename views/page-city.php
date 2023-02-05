<?php // Template Name: Strona Miasta  
?>

<?php get_header(); ?>
<?php
// Hero
$hero = (array) get_field("hero");
$is_slider = count($hero) > 1 ? true : false;
get_template_part(THEME_CMP, "hero", array(
    "is_slider" => $is_slider,
    "content" => $hero,
));
// Search Form
get_template_part(THEME_CMP, "search-form");
?>
<section class="container about-kolobrzeg">
    <?php get_template_part(THEME_CMP_CMN, "text-title", array(
        "title" => "Apartamenty w Kołobrzegu – oferta",
        "subtitle" => "nadmorskie apartamenty",
    )) ?>
    <p class="text-center">On Holiday i apartamenty w Kołobrzegu to kilkanaście prestiżowych i bogato wyposażonych
        nieruchomości. Skierowane są do najbardziej wymagających klientów. Jest to doskonałe miejsce do odpoczynku
        zarówno dla całych rodzin oraz w przypadku wyjazdu w gronie przyjaciół. Miejsce przypadnie do gustu także parą i
        świetnie sprawdzi się dla indywidualnych klientów. Przestrzeń lokali bez trudu, ścisku i dyskomfortu pomieści
        nawet do 6 gości.</p>
    <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>
    <div class="apartament-list addons">
        <?php $i = array("", "", "", "", "");
        foreach ($i as $el) : ?>
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
    <?php get_template_part(THEME_CMP_CMN, "btn", array(
        "link" => null,
        "text" => "Apartamenty w Kołobrzegu",
        "class" => "search-form-action btn-content",
        "type" => "accent",
    )) ?>

</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<?php get_footer(); ?>