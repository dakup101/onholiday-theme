<?php $content = wp_parse_args($args, array()); ?>
<article class="hero-wrapper">
    <main class="hero-inner container">
        <h2 class="hero-title">
            <?php echo $content["title"] ?>
        </h2>
        <div class="hero-content">
            <?php echo $content["text"] ?>
        </div>
        <?php
        $btn_main = $content["btn_main"];
        $btn_additional = $content["btn_additional"];
        if ($btn_main["active"] || $btn_additional["active"]) :
        ?>
            <div class="hero-btns">
                <?php
                if ($btn_additional['active']) get_template_part(THEME_CMP_CMN, "btn", $btn_additional);
                if ($btn_main['active']) get_template_part(THEME_CMP_CMN, "btn", $btn_main);
                ?>
            </div>
        <?php endif; ?>
    </main>

    <figure class="hero-bg">
        <?php if ($content["bg_img"] && !$content["bg_video"]) : ?>
            <img src="<?php echo $content["bg_img"] ?>" alt="<?php echo $content["title"] ?>" class="hero-bg-img" loading="lazy">
        <?php endif; ?>
        <?php if ($content["bg_video"]) : ?>
            <video class="hero-bg-video lazy" autoplay loop muted poster="<?php echo $content["bg_img"]; ?>">
                <source data-src="<?php echo $content["bg_video"]; ?>" type="video/mp4">
            </video>
        <?php endif; ?>
    </figure>
    <figure class="hero-overlay"></figure>
</article>