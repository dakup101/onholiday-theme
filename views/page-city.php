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
        "title" => __("Apartamenty w Kołobrzegu – oferta", "oh-theme"),
        "subtitle" => "nadmorskie apartamenty",
        "class" => "font-alt"
    )) ?>
    <p class="text-center">
        <?php echo __("<strong>Apartamenty OnHoliday w Kołobrzegu to kilkanaście prestiżowych, bogato wyposażonych nieruchomości które są skierowane do najbardziej wymagających klientów.</strong><br />
         Jest to doskonałe miejsce do odpoczynku dla całych rodzin, a pary spędzą tu wiele niezapomnianych chwil. 
         Nasza oferta świetnie sprawdzi się dla indywidualnych klientów oraz w przypadku wyjazdu w gronie przyjaciół. 
         <u>Przestrzeń lokali bez trudu, ścisku i dyskomfortu pomieści nawet do 6 gości.</u>", "oh-theme") ?>
    </p>


    <?php $kolobrzeg_items = new WP_Query( array(
            "post_type" => "ido-apartaments",
            "status" => "publish",
            "posts_per_page" => 8,
            'orderby' => 'menu_order',
            'order' => 'DESC',
            "tax_query" => array(
                array(
                    "taxonomy" => "ido_category",
                    "field" => "slug",
                    "terms" => get_the_ID() == 369 ? "kolobrzeg" : "swieradow-zdroj",
                )
            )
        ) );

    if ($kolobrzeg_items->have_posts()): ?>
    <div class="city-offer">
        <?php while ($kolobrzeg_items->have_posts()): $kolobrzeg_items->the_post(); ?>
        <article class="apartament-list-item">
            <a href="<?php echo get_the_permalink() ?>"
               class="apartament-list-item-inner">
                <div class="apartament-list-item-name">
                    <?php echo get_the_title() ?>
                </div>
                <span class="apartament-list-item-link">
                    <?php echo __("Sprawdź szczegóły", "oh-theme") ?>
                </span>
            </a>
            <figure class="apartament-list-item-bg">
                <img src="<?php echo get_field("media")[0]["url"] ?>"
                     alt="<?php echo get_the_title()  ?>"
                     loading="lazy">
                <div class="overlay"></div>

            </figure>
        </article>
        <?php endwhile; wp_reset_postdata() ?>
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