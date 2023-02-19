<section class="search-form">
    <div class="container">
        <!-- Location -->
        <div class="search-form-item">
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "location",
                "id" => "location",
                "visibleName" => "Miejsce Pobytu",
                "multiple" => true,
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/geo-icon.svg'),
                "options" => array(
                    "PL" => "Kołobrzeg",
                    "DE" => "Świeradów-Zdrój",
                ),
                "class" => "select-location",
            ));
            ?>
        </div>
        <!-- Date -->
        <div class="search-form-item">
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "dateStart",
                "id" => "dateStart",
                "visibleName" => "Daty pobytu",
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/calendar-icon.svg'),
                "options" => array(
                    "null" => "Daty pobytu",
                ),
                "class" => "select-date-start",
            ));
            ?>
        </div>
        <!-- People -->
        <div class="search-form-item">
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "people",
                "id" => "people",
                "visibleName" => "Gości",
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/people-icon.svg'),
                "options" => array(
                    "null" => "Ilość gości",
                ),
                "class" => "select-people",
            ));
            ?>
        </div>
        <!-- Addons -->
        <div class="search-form-item">
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "addons",
                "id" => "addons",
                "visibleName" => "Udogodnienia",
                "multiple" => true,
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/plus-icon.svg'),
                "options" => array(
                    "null" => "Udogodnienia",
                ),
                "class" => "select-addons",
            ));
            ?>
        </div>
        <!-- Search -->
        <div class="search-form-item">
            <?php get_template_part(THEME_CMP_CMN, "btn", array(
                "link" => null,
                "text" => "Szukaj",
                "class" => "search-form-action btn-full",
                "type" => "dark",
            )) ?>
        </div>
    </div>
</section>