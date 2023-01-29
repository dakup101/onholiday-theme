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
                "type" => "main",
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
    <?php else: ?>
    <article class="hero-wrapper">
        <?php $content = $hero["content"][0]; ?>
        <main class="hero-inner">
            <h1 class="hero-title">
                <?php echo $content["title"] ?>
            </h1>
            <p>
                <?php echo $content["text"] ?>
            </p>
            <?php
            $btn_main = $content["btn_main"];
            $btn_additional = $content["btn_additional"];
            if ($btn_main["active"] || $btn_additional["active"]) :
            ?>
            <div class="hero-btns">
                <?php
            if ($btn_additional['active']) get_template_part( THEME_CMP_CMN, "btn", $btn_additional );
            if ($btn_main['active']) get_template_part( THEME_CMP_CMN, "btn", $btn_main );
            ?>
            </div>
            <?php endif; ?>
        </main>
        <?php if ($content["bg_img"]) : ?>
        <img src="<?php echo $content["bg_img"] ?>" alt="<?php echo $content["title"] ?>" class="hero-bg">
        <?php endif; ?>
        <?php if ($content["bg_video"]) : ?>
        <video class="lazy" autoplay loop muted poster="<?php echo $content["bg_img"]; ?>">
            <source data-src="<?php echo $content["bg_video"]; ?>" type="video/mp4">
        </video>
        <?php endif; ?>
    </article>
    <?php endif; ?>
</section>