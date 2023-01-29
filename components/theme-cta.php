<?php $cta = wp_parse_args( $args, array(
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
) ) ?>
<section class="hero cta">
    <article class="hero-wrapper cta-wrapper">
        <main class="hero-inner container">
            <h2 class="hero-title">
                <?php echo $cta["title"] ?>
            </h2>
            <div class="hero-content">
                <?php echo $cta["text"] ?>
            </div>
            <?php
            $btn_main = $cta["btn_main"];
            $btn_additional = $cta["btn_additional"];
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

        <figure class="hero-bg">
            <?php if ($cta["bg_img"] && !$cta["bg_video"]) : ?>
            <img src="<?php echo $cta["bg_img"] ?>" alt="<?php echo $cta["title"] ?>" class="hero-bg-img"
                loading="lazy">
            <?php endif; ?>
            <?php if ($cta["bg_video"]) : ?>
            <video class="hero-bg-video lazy" autoplay loop muted poster="<?php echo $cta["bg_img"]; ?>">
                <source data-src="<?php echo $cta["bg_video"]; ?>" type="video/mp4">
            </video>
            <?php endif; ?>
        </figure>
        <figure class="hero-overlay"></figure>
    </article>
</section>