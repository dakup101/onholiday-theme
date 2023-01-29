<header class="header">
    <section class="container header-content">
        <a href="<?php echo get_home_url(); ?>" class="header-logo">
            <img src="<?php echo THEME_IMG . 'onholiday-logo.png'; ?>" alt="OnHoliday" class="header-logo-img"
                loading="lazy">
        </a>
        <div class="header-content-right">
            <?php echo get_template_part(THEME_CMP, "header-nav"); ?>
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "languageSwitcher",
                "id" => "languageSwitcher",
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/planet.svg'),
                "options" => array(
                    "PL" => "Polski (PL)",
                    "DE" => "Deutsch (DE)",
                ),
                "class" => "header-nav-language",
            ));
            ?>
        </div>
    </section>
</header>