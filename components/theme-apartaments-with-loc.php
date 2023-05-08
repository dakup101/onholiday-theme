<?php
// Reset search values

$term = get_queried_object();
$city = get_field("cat", $term);

$args = array(
    "post_type" => "ido-apartaments",
    "status" => "publish",
    "posts_per_page" => -1,
    "tax_query" => array(
        "relation" => "AND",
        "operator" => "IN"
    )
);

$args["tax_query"][] = array(
    'taxonomy' => 'ido_category',
    'field' => 'slug',
    'terms' =>  $city->slug,
);

$args["tax_query"][] = array(
    'taxonomy' => 'ido_loc',
    'field' => 'slug',
    'terms' =>  $term->slug,
);

$has_guests = false;
$has_addons = false;

if (isset($_POST["searchDates"]) && !empty($_POST["searchDates"])) $has_date = true;
if (isset($_POST["searchGuests"]) && !empty($_POST["searchGuests"])) $has_guests = true;
if (isset($_POST["searchAddons"]) && !empty($_POST["searchAddons"])) $has_addons = true;

$ido = new IdoBooking_API;

$date_filtered_offers = array();



$dates = array();
$guests = null;
$addons = null;

$query = array(
    "searchLocation" => $city->slug,
    "searchLocationSub" => $term->slug,
);


if ($has_guests) {
    $guests = $_POST["searchGuests"];
    $_SESSION["guests"] = $guests;
    $query["searchGuests"] = $guests;
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
    $query["searchAddons"] = $addons;
}

$currentDate = date('Y-m-d');
if ($has_date) {
	$dates = explode(",", $_POST["searchDates"]);
	$guests = $_POST["searchGuests"];
}
else {
	$dates = array(
		date('Y-m-d', strtotime($currentDate . ' +2 days')),
		date('Y-m-d', strtotime($currentDate . ' +4 days'))
	);
	$guests = $_POST["searchGuests"];
}

$_SESSION["searchDates"] = $dates;
$_SESSION["searchGuest"] = $guests;

$ido_avi = $ido->get_aviability($dates[0], $dates[1], $guests)->offers;
if (!empty($ido_avi)) {
	foreach ($ido_avi as $item) {
		$date_filtered_offers[] = $item->offerId;
	}
}

$query["searchDates"] = $dates;

$apartaments = new WP_Query($args);
$shown_result = false;
?>


<input type="hidden"
       value="<?php echo isset($dates[0]) ? $dates[0] : date('Y-m-d', strtotime($currentDate . ' +2 days'));  ?>"
       name="searchDateFrom"
       id="searchDateFrom">

<input type="hidden"
       value="<?php echo isset($dates[1]) ? $dates[1] : date('Y-m-d', strtotime($currentDate . ' +4 days')); ?>"
       name="searchDateTo"
       id="searchDateTo">

<?php get_template_part(THEME_CMP, "search-form", array("ido_cat" => $city, "ido_loc" => $term)); ?>
<section class="container apartaments">
    <?php $title = array(
        "title" => __("Wybierz idealne miejsce na Twój wypoczynek", "oh-theme"),
        "subtitle" => $city->name . " - " . $term->name,
        "tag" => "h1",
        "class" => "font-alt"
    );
    get_template_part(THEME_CMP_CMN, "text-title", $title) ?>
    <div class="apartaments-inner">
        <aside class="apartaments-filters">
            <?php get_template_part(THEME_CMP, "apartaments-filters", array("items" => $query)) ?>
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
            <strong><?php echo __("Brak dostępnych apartamentów", "oh-theme") ?></strong>
            <span><?php echo __("Spróbuj wybrać inną datę / udogodnienia", "oh-theme") ?></span>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php get_template_part(THEME_CMP, "icons-row") ?>
<?php // get_template_part(THEME_CMP, "cta", get_field("cta")) 
?>
<?php // get_template_part(THEME_CMP, "info-right", get_field("info-right")) 
?>
<?php // get_template_part(THEME_CMP, "info-left", get_field("info-left")) 
?>
<?php get_template_part(THEME_CMP, "blog-grid", get_field("blog_grid_fields", "options")) ?>