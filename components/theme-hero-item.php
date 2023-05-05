<?php $args = wp_parse_args($args, array()); 
$content = $args["content"];
?>
<article class="hero-wrapper">
    <main class="hero-inner container">
        <?php if ($args["key"] < 1) : ?>

        <h1 class="hero-title font-alt">
            <?php echo $content["title"] ?>
        </h1>

        <?php else: ?>

        <h2 class="hero-title font-alt">
            <?php echo $content["title"] ?>
        </h2>

        <?php endif; ?>
        <?php if (!empty($content["text"])): ?>
        <div class="hero-content">
            <?php echo $content["text"] ?>
        </div>
        <?php endif; ?>
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
        <img src="<?php echo $content["bg_img"] ?>"
             alt="<?php echo $content["title"] ?>"
             class="hero-bg-img"
             loading="lazy">
        <?php endif; ?>
        <?php if ($content["bg_video"]) : ?>
        <video class="hero-bg-video lazy"
               preload="none"
               autoplay
               loop
               muted
               playsinline
               poster="<?php echo $content["bg_img"]; ?>">
            <source data-src="<?php echo $content["bg_video"]; ?>"
                    type="video/mp4">
        </video>
        <?php endif; ?>
    </figure>
    <figure class="hero-overlay"></figure>
</article>