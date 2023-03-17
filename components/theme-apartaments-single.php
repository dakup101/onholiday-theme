<?php
// Widget Url with searchForm data

$_SESSION["apartament"] = get_field("ido_id");

$ido = new IdoBooking_API;
$ido_avi = $ido->get_aviability($_SESSION["searchDates"][0], $_SESSION["searchDates"][1], $_SESSION["searchGuests"])->offers;
$date_filtered_offers = array();
if (!empty($ido_avi)) {
    foreach ($ido_avi as $item) {
        $date_filtered_offers[$item->offerId] = $item->widgetUrl;
    }
}

if (!empty($ido_avi->offers)) {
    $apartament_link = $date_filtered_offers[$_SESSION["apartament"]];
} else $apartament_link = "https://client8748.idosell.com/widget2/index.php?ob[" . get_field("ido_id") . "]=&from_own_button=1&language=1";

// Hero
get_template_part(THEME_CMP, "hero", array(
    "is_slider" => false,
    "content" => array(
        array(
            "title" => get_the_title(),
            "text" => get_field("desc_short"),
            "bg_img" => get_field("media")[0]["url"],
            "btn_main" => array(
                // Use in component?
                "active" => true,
                // Array structure for btn component
                "link" => $apartament_link,
                "text" => "Zarererwuj apartament!",
                "class" => "apartament-make-reservation",
                "type" => "accent",
                "no_follow" => true,
            ),
        )
    ),
));
?>
<section class="ido-gallery container">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2 ido-gallery-swiper">
        <div class="swiper-wrapper">
            <?php foreach (get_field("media") as $img) : ?>
                <div class="swiper-slide">
                    <figure class="ido-gallery-item">
                        <img src="<?php echo $img["url"] ?>" alt="<?php echo get_the_title(); ?>">
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach (get_field(("media")) as $img) : ?>
                <div class="swiper-slide">
                    <figure class="ido-gallery-item">
                        <img src="<?php echo $img["url"] ?>" alt="<?php echo get_the_title(); ?>">
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="container ido-apartament-info">
    <div class="ido-apartamends-aside">
        <div class="ido-amenities-wrapper">
            <h2>Udogodnienia:</h2>
            <div class="ido-amenities">

                <?php foreach (get_the_terms(get_the_ID(), "ido_amen") as $amt) : ?>
                    <div class="ido-ament">
                        <img src="https://client8748.idosell.com/images/amenities/<?php echo $amt->slug ?>.svg" alt="">

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
        <span>Rezerwuj</span>
        <button class="ido-reservation-close">
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="m12 10.93 5.719-5.72c.146-.146.339-.219.531-.219.404 0 .75.324.75.749 0 .193-.073.385-.219.532l-5.72 5.719 5.719 5.719c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.385-.073-.531-.219l-5.719-5.719-5.719 5.719c-.146.146-.339.219-.531.219-.401 0-.75-.323-.75-.75 0-.192.073-.384.22-.531l5.719-5.719-5.72-5.719c-.146-.147-.219-.339-.219-.532 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" />
            </svg>
        </button>

    </div>
    <iframe src="" frameborder="0" target="_blank" class="ido-reservation-frame">

    </iframe>
</div>