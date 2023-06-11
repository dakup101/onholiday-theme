<?php
$_SESSION["apartament"] = get_field("ido_id");

$lang = get_language_shortcode();
$currentDate = date('Y-m-d');

$lang_iframe = $lang == "pl" ? "1" : "3";
$startDate = isset($_SESSION["searchDates"][0]) ? $_SESSION["searchDates"][0] : date('Y-m-d', strtotime($currentDate . ' +2 days'));
$endDate = isset($_SESSION["searchDates"][1]) ? $_SESSION["searchDates"][1] : date('Y-m-d', strtotime($currentDate . ' +4 days'));

if (!empty($_SESSION["searchDates"][0])) {
	$apartament_link = "https://client8748.idosell.com/widget/booking/defaultchoice/" . "start_date/" . $startDate . "/end_date/" . $endDate . "/currency/1/language/" . $lang_iframe . "/persons-adult/" . $_SESSION["guests"] . "/?ob[" . $_SESSION["apartament"] . "]";
} else $apartament_link = "https://client8748.idosell.com/widget2/index.php?ob[" . get_field("ido_id") . "]=&from_own_button=1&language=" . $lang_iframe;

// Hero

$price_string = '<span class="apartaments-item single" data-objectID="'.get_field("ido_id").'"><span class="apartaments-item-price-wrap">' . __("Cena w wybranym okresie", "oh-theme") . '<br>('.$startDate.' / '.$endDate.')' . '<span class="apartaments-item-price">' . __("Obliczam cenę wynajmu...", "oh-theme") . '</span></span></span>';

get_template_part(THEME_CMP, "hero", array(
"is_slider" => false,
"content" => array(
array(
"title" => get_the_title(),
"text" => get_field("desc_short") . $price_string,
"bg_img" => get_field("media")[0]["url"],
"btn_main" => array(
// Use in component?
"active" => true,
// Array structure for btn component
"link" => $apartament_link,
"text" => __("Zarezerwuj<br>ten apartament", "oh-theme"),
"class" => "apartament-make-reservation",
"type" => "accent",
"no_follow" => true,
),
)
),
));
?>

<input type="hidden"
       value="<?php echo isset($_SESSION["searchDates"][0]) ? $_SESSION["searchDates"][0] : date('Y-m-d', strtotime($currentDate . ' +2 days'));  ?>"
       name="searchDateFrom"
       id="searchDateFrom">

<input type="hidden"
       value="<?php echo isset($_SESSION["searchDates"][1]) ? $_SESSION["searchDates"][1] : date('Y-m-d', strtotime($currentDate . ' +4 days'));  ?>"
       name="searchDateTo"
       id="searchDateTo">

<section class="ido-gallery container">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
         class="swiper mySwiper2 ido-gallery-swiper">
        <div class="swiper-wrapper">
            <?php foreach (get_field("media") as $img) : ?>
            <div class="swiper-slide ">
                <figure class="ido-gallery-item">
                    <img src="<?php echo $img["url"] ?>"
                         alt="<?php echo get_the_title(); ?>"
                         class="glightbox">
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider=""
         class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach (get_field(("media")) as $img) : ?>
            <div class="swiper-slide">
                <figure class="ido-gallery-item">
                    <img src="<?php echo $img["url"] ?>"
                         alt="<?php echo get_the_title(); ?>">
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="container ido-apartament-info">
    <div class="ido-apartamends-aside">
        <div class="ido-amenities-wrapper">
            <h2><?php echo __("Udogodnienia", "oh-theme") . ": " ?></h2>
            <div class="ido-amenities">

                <?php foreach (get_the_terms(get_the_ID(), "ido_amen") as $amt) : ?>
                <div class="ido-ament">
                    <?php
					$icon_id = $amt->slug;
					$parts = explode("-", $icon_id);
					$icon_id_final = $parts[0];
					?>
                    <img src="https://client8748.idosell.com/images/amenities/<?php echo $icon_id_final ?>.svg"
                         alt="<?php $amt->name ?>">

                    <p>
                        <?php echo $amt->name ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="idp-apartament-desc">
        <?php echo get_field("desc") ?>
    </div>
</section>

<div class="ido-reservation">
    <div class="ido-reservation-nav">
        <span><?php echo __("Rezerwuj", "oh-theme") ?></span>
        <button class="ido-reservation-close">
            <svg clip-rule="evenodd"
                 fill-rule="evenodd"
                 stroke-linejoin="round"
                 stroke-miterlimit="2"
                 viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                      d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" />
            </svg>
        </button>

    </div>
    <iframe src=""
            frameborder="0"
            target="_blank"
            class="ido-reservation-frame">

    </iframe>
</div>