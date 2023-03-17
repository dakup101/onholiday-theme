<?php $terms = get_the_terms(get_the_ID(), 'ido_loc'); ?>
<article class="apartaments-item" data-loc="<?= $terms[0]->term_id ?>">
    <figure class="apartaments-item-img">
        <img src="<?php echo get_field("media")[0]["url"] ?>" alt="<?php echo get_the_title()  ?>" loading="lazy">
    </figure>
    <div class="apartaments-item-content">
        <h3 class="font-alt">
            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title() ?></a>
        </h3>
        <div class="apartaments-item-text">
            <?php echo get_field("desc_short") ?>
        </div>
        <?php get_template_part(THEME_CMP_CMN, "btn", array(
            "link" => get_the_permalink(),
            "text" => "Wybieram",
            "class" => "",
            "type" => "accent btn-content",
        )) ?>
    </div>
</article>