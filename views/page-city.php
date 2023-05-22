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
        "title" => get_field("title"),
        "subtitle" => get_field("subtitle"),
        "class" => "font-alt"
    )) ?>
    <div class="text-center">
        <?php echo get_field("desc"); ?>
    </div>


    <?php $city_offer = get_field("aps_start"); if (!empty($city_offer)) : ?>


    <div class="city-offer">
        <?php foreach($city_offer as $offer_id): ?>
        <article class="apartament-list-item">
            <a href="<?php echo get_the_permalink($offer_id["id"]) ?>"
               class="apartament-list-item-inner">
                <div class="apartament-list-item-name">
                    <?php echo get_the_title($offer_id["id"]) ?>
                </div>
                <span class="apartament-list-item-link">
                    <?php echo __("Sprawdź szczegóły", "oh-theme") ?>
                </span>
            </a>
            <figure class="apartament-list-item-bg">
                <img src="<?php echo get_field("media", $offer_id["id"])[0]["url"] ?>"
                     alt="<?php echo get_the_title($offer_id["id"])  ?>"
                     loading="lazy">
                <div class="overlay"></div>
            </figure>
        </article>
        <?php endforeach; ?>
        <div class="city-offer-more">
            <?php get_template_part(THEME_CMP_CMN, "btn", array(
                "link" => null,
                "text" => __("Zobacz więcej", "oh-theme"),
                "class" => "btn-content city-offer-btn page-" . get_the_ID(),
                "type" => "accent",
            )) ?>
        </div>
    </div>
    <?php endif; ?>



    <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>

    <!-- 
    <form action="/apartamenty/" method="POST">
        <input type="hidden" name="searchLocation" value="<?php echo is_page(700) ? "swieradow-zdroj" : "kolobrzeg"; ?>">
        <?php get_template_part(THEME_CMP_CMN, "btn", array(
            "link" => null,
            "text" => is_page(700) ? "Apartamenty w Świeradowie" : "Apartamenty w Kołobrzegu",
            "class" => "search-form-action btn-content",
            "type" => "accent",
        )) ?>
    </form> -->

</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<div class="container summary-wrapper">
    <?php get_template_part(THEME_CMP, "summary", get_field("summary")) ?>
</div>
<?php get_footer(); ?>