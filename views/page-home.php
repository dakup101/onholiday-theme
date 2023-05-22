<?php // Template Name: Strona Główna 
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
        "title" => __("Polecane dziś apartamenty do wynajęcia", "oh-theme"),
        "subtitle" => null,
        "class" => "font-alt"
    )) ?>
    <!--     <p class="text-center">
        <?php echo __("Proponujemy Wam kilkanaście prestiżowych<br>apartamentów w najlepszych lokalizacjach.", "oh-theme") ?>
    </p> -->
    <div class="apartament-list addons">
        <?php $unique_id = uniqid(); 
        $kolobrzeg_items = new WP_Query(array(
            "post_type" => "ido-apartaments",
            "status" => "publish",
            "orderby" => "rand",
            "posts_per_page" => 10,
            'cache_busting_param' => time(),
            'cache_results' => false,
            'nocache' => true,
        ));

        if ($kolobrzeg_items->have_posts()) : ?>
        <div class="offer-slider-wrapper">
            <div class="offer-slider">
                <div class="swiper-wrapper">
                    <?php while ($kolobrzeg_items->have_posts()) : $kolobrzeg_items->the_post(); ?>
                    <div class="swiper-slide">
                        <article class="apartament-list-item">
                            <a href="<?php echo get_the_permalink() ?>"
                               class="apartament-list-item-inner">
                                <div class="apartament-list-item-name">
                                    <?php echo get_the_title() ?>
                                </div>
                                <span class="apartament-list-item-link">
                                    <?php echo __("Sprawdź", "oh-theme") ?>
                                </span>
                            </a>
                            <?php $ap_img = str_replace("/large/", "/small/", get_field("media")[0]["url"]) ?>
                            <figure class="apartament-list-item-bg"
                                    style="background-image: url('<?php echo $ap_img ?>'); background-size: cover">
                                <!-- <img src=""
                                     alt="<?php echo get_the_title()  ?>"
                                     loading="lazy"> -->
                                <div class="overlay"></div>

                            </figure>
                        </article>
                    </div>
                    <?php endwhile;
                        wp_reset_query(); ?>
                </div>

            </div>
            <div class="offer-slider-nav">
                <div class="swiper-button-prev offer-slider-button-prev"></div>
                <div class="swiper-button-next offer-slider-button-next">
                </div>
            </div>
        </div>


        <?php endif; ?>
    </div>
    <div class="home-cards">
        <div class="home-cards-column">
            <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>
            <form action="<?php echo __("/apartamenty/", "oh-theme"); ?>"
                  method="POST">
                <input type="hidden"
                       name="searchLocation"
                       value="kolobrzeg">
                <?php get_template_part(THEME_CMP_CMN, "btn", array(
                    "link" => null,
                    "text" => __("Apartamenty w Kołobrzegu", "oh-theme"),
                    "class" => "search-form-action btn-content",
                    "type" => "accent",
                )) ?>
            </form>
        </div>
        <div class="home-cards-column">
            <?php get_template_part(THEME_CMP, "info-cards", get_field("cards_extra")) ?>

            <form action="<?php echo __("/apartamenty/", "oh-theme"); ?>"
                  method="POST">
                <input type="hidden"
                       name="searchLocation"
                       value="swieradow-zdroj">
                <?php get_template_part(THEME_CMP_CMN, "btn", array(
                    "link" => null,
                    "text" => __("Apartamenty w Świeradowie-Zdroju", "oh-theme"),
                    "class" => "search-form-action btn-content",
                    "type" => "accent",
                )) ?>
            </form>
        </div>
    </div>
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