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
        "title" => "Apartamenty - Kołobrzeg",
        "subtitle" => "nadmorskie apartamenty",
        "class" => "font-alt"
    )) ?>
    <p class="text-center">Proponujemy Wam kilkanaście prestiżowych<br>apartamentów w najlepszych lokalizacjach w
        Kołobrzegu.</p>
    <div class="apartament-list addons">
        <?php $kolobrzeg_items = new WP_Query(array(
            "post_type" => "ido-apartaments",
            "status" => "publish",
            "orderby" => "rand",
            "posts_per_page" => 5,
            "tax_query" => array(
                "relation" => "AND",
                "operator" => "IN",
                array(
                    'taxonomy' => 'ido_category',
                    'field' => 'slug',
                    'terms' =>  "kolobrzeg",
                )
            )
        ));

        if ($kolobrzeg_items->have_posts()) :

            while ($kolobrzeg_items->have_posts()) : $kolobrzeg_items->the_post(); ?>
                <article class="apartament-list-item">
                    <a href="<?php echo get_the_permalink() ?>" class="apartament-list-item-inner">
                        <div class="apartament-list-item-name">
                            <?php echo get_the_title() ?>
                        </div>
                        <span class="apartament-list-item-link">
                            Sprawdź szczegóły
                        </span>
                    </a>
                    <figure class="apartament-list-item-bg">
                        <img src="<?php echo get_field("media")[0]["url"] ?>" alt="<?php echo get_the_title()  ?>" loading="lazy">
                        <div class="overlay"></div>

                    </figure>
                </article>
            <?php endwhile;
            wp_reset_query(); ?>

        <?php endif; ?>
    </div>
    <form action="/apartamenty/" method="POST">
        <input type="hidden" name="searchLocation" value="kolobrzeg">
        <?php get_template_part(THEME_CMP_CMN, "btn", array(
            "link" => null,
            "text" => "Apartamenty w Kołobrzegu",
            "class" => "search-form-action btn-content",
            "type" => "accent",
        )) ?>
    </form>
    <?php get_template_part(THEME_CMP, "info-cards", get_field("cards")) ?>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>
<?php get_footer(); ?>