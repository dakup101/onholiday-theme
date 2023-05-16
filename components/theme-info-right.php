<?php $info = wp_parse_args($args, array(
    "title" => "I am title!",
    "subtitle" => "I am subtitle",
    "text" => "I am text content.",
    "img" => THEME_IMG . "hero-default.jpg",
    "btn_link" => "#",
    "btn_text" => "Wanna see more?"
)) ?>
<section class="info-section right"
         id="<?php echo !empty(get_field("p")) ? get_field("section_info_right_id") : "" ?>">
    <article class="container info-section-inner">
        <figure class="info-section-img">
            <img src="<?php echo $info["img"] ?>"
                 alt="<?php echo $info["title"] ?>">
        </figure>
        <main class="info-section-content">
            <?php get_template_part(THEME_CMP_CMN, "text-title", array(
                "title" => $info["title"],
                "subtitle" => $info["subtitle"],
                "alignment" => "left",
                "class" => "font-alt"
            )) ?>
            <div class="info-section-text">
                <?php echo $info["text"] ?>
            </div>
            <?php if ($info["btn_link"]) : ?>
            <?php get_template_part(THEME_CMP_CMN, "btn", array(
                    "link" => $info["btn_link"],
                    "text" => $info["btn_text"],
                    "class" => "btn-content",
                    "type" => "alt-dark",
                )) ?>
            <?php endif; ?>
        </main>
    </article>
</section>