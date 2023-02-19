<?php
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
                "link" => "#",
                "text" => "Wynajmuje!",
                "class" => "apartament-make-reservation",
                "type" => "accent",
                "no_follow" => false,
            ),
            "btn_additional" => array(
                // Use in component?
                "active" => true,
                // Array structure for btn component
                "link" => "#",
                "text" => "Dowiedz się więcej",
                "class" => "apartament-read-more",
                "type" => "alt",
                "no_follow" => false,
            ),
        )
    ),
));
?>
<section class="ido-gallery container">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
        class="swiper mySwiper2 ido-gallery-swiper">
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