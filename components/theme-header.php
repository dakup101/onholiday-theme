<header class="header">
    <section class="container header-content">
        <a href="<?php echo get_home_url(); ?>"
           class="header-logo">
            <img src="<?php echo THEME_IMG . 'onholiday-logo.png'; ?>"
                 alt="OnHoliday"
                 class="header-logo-img"
                 loading="lazy"
                 style="height: 80px; width: 113.2px" />
        </a>
        <div class="header-content-right">
            <?php echo get_template_part(THEME_CMP, "header-nav"); ?>

            <?php get_template_part(THEME_CMP_CMN, "btn", array(
                "link" => null,
                "text" => __("Rezerwuj", "oh-theme"),
                "class" => "header-nav-btn btn-content move-to-search",
                "type" => "accent",
            )) ?>
            <?php do_action('wpml_add_language_selector'); ?>
        </div>
    </section>
</header>