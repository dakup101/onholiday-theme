<?php $terms = get_the_terms(get_the_ID(), 'ido_loc'); ?>
<article class="apartaments-item"
         data-objectId="<?php echo get_field("ido_id"); ?>"
         data-loc="<?= $terms[0]->term_id ?>">
    <figure class="apartaments-item-img">
        <img src="<?php echo get_field("media")[0]["url"] ?>"
             alt="<?php echo get_the_title()  ?>"
             loading="lazy">
    </figure>
    <div class="apartaments-item-content">
        <h3 class="font-alt">
            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
        </h3>
        <div class="apartaments-item-text">
            <?php echo get_field("desc_short") ?>
        </div>
        <div class="apartaments-item-bottom">
            <span class="apartaments-item-price-wrap">
                <?php echo __("Cena w wybranym okresie:", "oh-theme") ?>
                <span class="apartaments-item-price"><?php echo __("Obliczam cenę wynajmu...", "oh-theme") ?></span>
            </span>
            <?php get_template_part(THEME_CMP_CMN, "btn", array(
            "link" => get_the_permalink(),
            "text" => __("Sprawdź szczegóły", "oh-theme"),
            "class" => "",
            "type" => "accent btn-content",
        )) ?>
        </div>
    </div>
</article>