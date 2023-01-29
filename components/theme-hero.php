<?php
$hero = wp_parse_args( $args, array(
    "is_slider" => false,
    "content" => array(
        array(
            "title" => "Hero <span>title</span>",
            "text" => "It's hero content :)",
            "btn_main" => array(
                // Use in component?
                "active" => true,
                // Array structure for btn component
                "link" => "#",
                "text" => "Main button",
                "class" => null,
                "type" => "accent",
                "no_follow" => false,
            ),
            "btn_additional" => array(
                // Use in component?
                "active" => true,
                // Array structure for btn component
                "link" => "#",
                "text" => "Additional button",
                "class" => null,
                "type" => "alt",
                "no_follow" => false,
            ),
            "bg_img" => THEME_IMG . "hero-default.jpg",
            "bg_video" => THEME_VID . "sea.mp4"
        )
    )
));
?>

<section class="hero <?php if ($hero["is_slider"]) echo "hero-slider" ?>">
    <?php if ($hero["is_slider"]): ?>
    <div class="hero-swiper">
        <div class="swiper-wrapper">
            <?php foreach($hero["content"] as $content) : ?>
            <div class="swiper-slide">
                <?php get_template_part( THEME_CMP, "hero-item", $content) ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <?php else: ?>
    <?php get_template_part( THEME_CMP, "hero-item", $hero["content"][0] ) ?>
    <?php endif; ?>
</section>