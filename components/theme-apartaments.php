<?php
// Reset search values
session_unset();

$args = array(
    "post_type" => "ido-apartaments",
    "status" => "publish",
    "posts_per_page" => -1,
    "tax_query" => array(
        "relation" => "AND",
        "operator" => "IN"
    )
);

$has_location = false;
$has_date = false;
$has_guests = false;
$has_addons = false;
if (isset($_POST["searchLocation"]) && !empty($_POST["searchLocation"])) $has_location = true;
if (isset($_POST["searchDates"]) && !empty($_POST["searchDates"])) $has_date = true;
if (isset($_POST["searchGuests"]) && !empty($_POST["searchGuests"])) $has_guests = true;
if (isset($_POST["searchAddons"]) && !empty($_POST["searchAddons"])) $has_addons = true;

$ido = new IdoBooking_API;

$date_filtered_offers = array();

$dates = array();
$guests = null;
$addons = null;
$location = null;

if ($has_guests) {
    $guests = $_POST["searchGuests"];
    $_SESSION["guests"] = $guests;
}
if ($has_location) {
    $location = $_POST["searchLocation"];
    $args["tax_query"][] = array(
        'taxonomy' => 'ido_category',
        'field' => 'slug',
        'terms' =>  $location,
    );
}

if ($has_addons) {
    $addons = explode(",", $_POST["searchAddons"]);
    foreach ($addons as $addon) {
        $args["tax_query"][] = array(
            'taxonomy' => 'ido_amen',
            'field' => 'slug',
            'terms' =>  $addon,
        );
    }
}

if ($has_date) {
    $dates = explode(",", $_POST["searchDates"]);
    $guests = $_POST["searchGuests"];

    $_SESSION["searchDates"] = $dates;
    $_SESSION["searchGuest"] = $guests;

    $ido_avi = $ido->get_aviability($dates[0], $dates[1], $guests)->offers;
    if (!empty($ido_avi)) {
        foreach ($ido_avi as $item) {
            $date_filtered_offers[] = $item->offerId;
        }
    }
}
$apartaments = new WP_Query($args);
$shown_result = false;
?>


<?php get_template_part(THEME_CMP, "search-form"); ?>
<section class="container apartaments">
    <?php get_template_part(THEME_CMP_CMN, "text-title", array(
        "title" => "OnHoliday - Apartamenty",
        "subtitle" => "Jakościowy wypoczynek",
        "tag" => "h1",
    )) ?>
    <div class="apartaments-inner">
        <aside class="apartaments-filters">
            <?php get_template_part(THEME_CMP, "apartaments-filters") ?>
        </aside>
        <?php if ($apartaments->have_posts()) : ?>
            <div class="apartaments-list">
                <?php
                while ($apartaments->have_posts()) {
                    $apartaments->the_post();
                    if (!empty($date_filtered_offers)) {
                        if (in_array(get_field('ido_id'), $date_filtered_offers)) {
                            get_template_part(THEME_CMP, "apartaments-item");
                            $shown_result = true;
                        }
                    } else {
                        get_template_part(THEME_CMP, "apartaments-item");
                        $shown_result = true;
                    }
                }
                wp_reset_query();
                ?>
            </div>
        <?php else : $shown_result = false; ?>
        <?php endif; ?>
        <?php if (!$shown_result) : ?>
            <div class="apartaments-no-items">
                <strong>Brak dostępnych apartamentów</strong>
                <span>Spróbuj wybrać inną datę / udogodnienia</span>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php get_template_part(THEME_CMP, "cta", get_field("cta")) ?>
<?php get_template_part(THEME_CMP, "info-right", get_field("info-right")) ?>
<?php get_template_part(THEME_CMP, "info-left", get_field("info-left")) ?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>