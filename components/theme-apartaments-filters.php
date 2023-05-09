<?php
$args = wp_parse_args($args, array(
    "items" => array(),
));
?>

<?php if (!empty($args["items"])) : $query = $args["items"] ?>

<form class="apartaments-filters-inner"
      autocomplete="off">
    <div class="apartaments-filters-item stats">
        <p class="apartaments-filters-title font-alt"><?php echo __("Wyszukanie", "oh-theme") ?>:</p>
        <div class="apartaments-stats">
            <?php if ($query["searchLocation"] != null) : ?>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Miejscowość", "oh-theme") ?>:</strong>
                <span><?= get_term_by("slug", $query["searchLocation"], "ido_category")->name ?></span>
            </div>
            <?php endif; ?>
            <?php if ($query["searchLocationSub"] != null) : ?>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Dzielnica", "oh-theme") ?>:</strong>
                <span><?= get_term_by("slug", $query["searchLocationSub"], "ido_loc")->name ?></span>
            </div>
            <?php endif; ?>
            <?php if ($query["searchDates"] != null) : ?>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Przyjazd", "oh-theme") ?>:</strong>
                <span><?= $query["searchDates"][0] ?></span>
            </div>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Wyjazd", "oh-theme") ?>:</strong>
                <span><?= $query["searchDates"][1] ?></span>
            </div>
            <?php endif; ?>
            <?php if ($query["searchGuests"] != null) : ?>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Ilość Gości", "oh-theme") ?>:</strong>
                <span><?= $query["searchGuests"] ?></span>
            </div>
            <?php endif; ?>
            <?php if ($query["searchAddons"]) : ?>
            <div class="apartaments-stats-item">
                <strong><?php echo __("Udogodnienia", "oh-theme") ?>:</strong>
                <?php
                        $addons_count = count($query["searchAddons"]);
                        $counter = 1;
                        ?>
                <span>
                    <?php foreach ($addons as $slug) : ?>
                    <?= get_term_by('slug', $slug, 'ido_amen')->name ?>
                    <?= $counter < $addons_count ? ", " : "" ?>
                    <?php $counter++;
                            endforeach; ?>
                </span>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Filter: Region -->
    <div class="apartaments-filters-item region">
        <p class="apartaments-filters-title font-alt"><?php echo __("Dzielnice", "oh-theme") ?>:</p>
        <div class="apartaments-filters-wrapper">
            <?php
                $locs = get_terms(array(
                    'taxonomy' => 'ido_loc',
                    'hide_empty' => false,
                ));
                foreach ($locs as $loc) :
                ?>
            <?php
                    $cat = get_field("cat", $loc);
                    if ($cat->slug == $query["searchLocation"]) :
                    ?>
            <a href="<?php echo get_term_link($loc) ?>"
               class="<?php if (get_term_by("slug", $query["searchLocationSub"], "ido_loc")->slug == $loc->slug) echo "active"; ?>">
                <?= $loc->name ?>
            </a>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- <div class="apartaments-filters-item region">
        <a href="<?php echo __("/apartamenty/", "oh-theme"); ?>"
           class="return-to-apartaments">
            <?php echo __("Wróć do wszystkich apartamentów", "oh-theme") ?>
        </a>
    </div> -->
</form>
<?php endif; ?>