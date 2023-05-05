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