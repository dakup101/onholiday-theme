<?php $args = wp_parse_args($args, array(
    "ido_loc" => null,
    "ido_cat" => null,
)) ?>


<section class="search-form">
    <div class="container">
        <!-- Location -->
        <div id="item-search-start"
             class="search-form-item">
            <?php
            $select = array(
                "name" => "location",
                "id" => "location",
                "visibleName" => __("Miasto", "oh-theme"),
                "startName" => __("Wybierz miejsce pobytu", "oh-theme"),
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/geo-icon.svg'),
                "options" => array(
                    "kolobrzeg" => "Kołobrzeg",
                    "swieradow-zdroj" => "Świeradów-Zdrój",
                ),
                "class" => "select-location",
            );
            if ($args["ido_loc"] != null) {
                $select["options"] = array();
                $select["options"][$args["ido_cat"]->slug] = $args["ido_cat"]->name;
            }
            if ($args["ido_cat"]) {
                $select["selected"] = $args["ido_cat"]->slug;
            }
            get_template_part(THEME_CMP_CMN, "select", $select);
            ?>
        </div>

        <!-- Date -->
        <div class="search-form-item search-date ">
            <input type="hidden"
                   name="dates"
                   id="dates"
                   data-lang="<?php echo get_language_shortcode(); ?>">
            <label class="select-value-wrapper search-date-value"
                   for="startDate"
                   data-lang="<?php echo get_language_shortcode(); ?>">
                <svg width="16"
                     height="16"
                     viewBox="0 0 16 16"
                     fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.5"
                       clip-path="url(#clip0_3_101)">
                        <path d="M13.3333 13.3333H10.6667V10.6667H13.3333V13.3333ZM9.33333 6.66667H6.66667V9.33333H9.33333V6.66667ZM13.3333 6.66667H10.6667V9.33333H13.3333V6.66667ZM5.33333 10.6667H2.66667V13.3333H5.33333V10.6667ZM9.33333 10.6667H6.66667V13.3333H9.33333V10.6667ZM5.33333 6.66667H2.66667V9.33333H5.33333V6.66667ZM16 1.33333V16H0V1.33333H2V2C2 2.73533 2.598 3.33333 3.33333 3.33333C4.06867 3.33333 4.66667 2.73533 4.66667 2V1.33333H11.3333V2C11.3333 2.73533 11.9313 3.33333 12.6667 3.33333C13.402 3.33333 14 2.73533 14 2V1.33333H16ZM14.6667 5.33333H1.33333V14.6667H14.6667V5.33333ZM13.3333 0.666667C13.3333 0.298667 13.0353 0 12.6667 0C12.298 0 12 0.298667 12 0.666667V2C12 2.368 12.298 2.66667 12.6667 2.66667C13.0353 2.66667 13.3333 2.368 13.3333 2V0.666667ZM4 2C4 2.368 3.702 2.66667 3.33333 2.66667C2.96467 2.66667 2.66667 2.368 2.66667 2V0.666667C2.66667 0.298667 2.96467 0 3.33333 0C3.702 0 4 0.298667 4 0.666667V2Z"
                              fill="#0F172A"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_3_101">
                            <rect width="16"
                                  height="16"
                                  fill="white"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <div class="select-value"
                     data-name="Daty pobytu">
                    <input type="hidden"
                           id="startDate"
                           data-lang="<?php echo get_language_shortcode(); ?>"
                           placeholder="<?php echo __('Wybierz daty pobytu', 'oh-theme') ?>"
                           data-input
                           class="startDate"
                           required
                           value="" />
                </div>
            </label>
        </div>
        <!-- People -->
        <div class="search-form-item ">
            <?php
            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "people",
                "id" => "people",
                "visibleName" => __("Gości", "oh-theme"),
                "startName" => __("Ilość gości", "oh-theme"),

                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/people-icon.svg'),
                "options" => array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6"
                ),
                "class" => "select-people",
            ));
            ?>
        </div>
        <!-- Addons -->
        <div class="search-form-item ">
            <?php
            $addons = get_terms(array(
                'taxonomy' => 'ido_amen', //i guess campaign_action  is your  taxonomy 
                'hide_empty' => true
            ));
            $addons_array = array();
            foreach ($addons as $addon) {
                if (get_field("show_in_search", $addon)) $addons_array[$addon->slug] = $addon->name . " (" . $addon->count . ")";
            }

            echo get_template_part(THEME_CMP_CMN, "select", array(
                "name" => "addons",
                "id" => "addons",
                "visibleName" => __("Udogodnienia", "oh-theme"),
                "startName" => __("Wybierz Udogonienia", "oh-theme"),

                "multiple" => true,
                "with_icon" => true,
                "icon" => file_get_contents(THEME_IMG . '/icon/plus-icon.svg'),
                "options" => $addons_array,
                "class" => "select-addons",
            ));
            ?>
        </div>
        <!-- Search -->
        <?php

        $action_url = __("/apartamenty/", "oh-theme");
        ?>
        <form class="search-form-item search-backend "
              action="<?php echo $action_url ?><?php if ($args["ido_loc"]) echo $args["ido_loc"]->slug . "/" ?>"
              method="POST">
            <input type="hidden"
                   name="searchLocation"
                   id="searchLocation">
            <input type="hidden"
                   name="searchGuests"
                   id="searchGuests">
            <input type="hidden"
                   name="searchAddons"
                   id="searchAddons">
            <input type="hidden"
                   name="searchDates"
                   id="searchDates">

            <?php get_template_part(THEME_CMP_CMN, "btn", array(
                "link" => null,
                "text" => __("Szukaj", "oh-theme"),
                "class" => "search-form-action btn-full",
                "type" => "dark",
            )) ?>
        </form>
    </div>
</section>

<div class="hidden">
    <li class="select-options-item">

    </li>
</div>