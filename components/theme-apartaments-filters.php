<?php
$has_location = false;
$has_date = false;
$has_guests = false;
$has_addons = false;
if (isset($_POST["searchLocation"]) && !empty($_POST["searchLocation"])) $has_location = true;
if (isset($_POST["searchDates"]) && !empty($_POST["searchDates"])) $has_date = true;
if (isset($_POST["searchGuests"]) && !empty($_POST["searchGuests"])) $has_guests = true;
if (isset($_POST["searchAddons"]) && !empty($_POST["searchAddons"])) $has_addons = true;

if ($has_guests) $guests = $_POST["searchGuests"];
if ($has_location) $location = $_POST["searchLocation"];
if ($has_date) $dates = explode(",", $_POST["searchDates"]);

if ($has_addons) {
    $addons = explode(",", $_POST["searchAddons"]);
}

?>
<?php if ($has_guests || $has_location || $has_addons || $has_date) : ?>

<form class="apartaments-filters-inner" autocomplete="off">
    <div class="apartaments-filters-item stats">
        <p class="apartaments-filters-title">Wyszukanie:</p>
        <div class="apartaments-stats">
            <?php if ($has_location) : ?>
            <div class="apartaments-stats-item">
                <strong>Miejscowość:</strong>
                <span><?= get_term_by("slug", $location, "ido_category")->name ?></span>
            </div>
            <?php endif; ?>
            <?php if ($has_date) : ?>
            <div class="apartaments-stats-item">
                <strong>Przyjazd:</strong>
                <span><?= $dates[0] ?></span>
            </div>
            <div class="apartaments-stats-item">
                <strong>Wyjazd:</strong>
                <span><?= $dates[1] ?></span>
            </div>
            <?php endif; ?>
            <?php if ($has_guests) : ?>
            <div class="apartaments-stats-item">
                <strong>Ilość Gości:</strong>
                <span><?= $guests ?></span>
            </div>
            <?php endif; ?>
            <?php if ($has_addons) : ?>
            <div class="apartaments-stats-item">
                <strong>Udogodnienia:</strong>
                <?php
                        $addons_count = count($addons);
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

    <!-- Filter: City -->
    <!-- <div class="apartaments-filters-item city">
        <p class="apartaments-filters-title">Miasto:</p>
        <div class="apartaments-filters-wrapper">
            <input type="radio" name="city" id="kolobrzeg" checked="checked">
            <label for="kolobrzeg">
                Kołobrzeg
            </label>
            <input type="radio" name="city" id="swieradow">
            <label for="swieradow">
                Świeradów-Zdrój
            </label>
        </div>
    </div> -->
    <!-- Filter: Region -->
    <div class="apartaments-filters-item region">
        <p class="apartaments-filters-title">Dzielnice:</p>
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
                    if (get_term_by("id", $cat, "ido_category")->slug == $location) :
                    ?>
            <input type="radio" name="region" id="<?= $loc->term_id ?>">
            <label for="<?= $loc->term_id ?>">
                <?= $loc->name ?>
            </label>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Filter: Amenities
    <div class="apartaments-filters-item amenities">
        <p class="apartaments-filters-title">Udogodnienia:</p>
        <div class="apartaments-filters-wrapper">
            <input type="checkbox" name="basen" id="basen" checked>
            <label for="basen">
                Basen
            </label>
            <input type="checkbox" name="konsolaps4" id="konsolaps4">
            <label for="konsolaps4">
                Konsola PS4
            </label>
            <input type="checkbox" name="konsolaps3" id="konsolaps3">
            <label for="konsolaps3">
                Konsola PS3
            </label>
            <input type="checkbox" name="tv" id="tv">
            <label for="tv">
                Duzy telewizor
            </label>
        </div>
    </div> -->
</form>
<?php endif; ?>
<div class="apartaments-filters-inner articles">
    <div class="apartaments-filters-item">
        <p class="apartaments-filters-title">Nie mozesz wybrać?</p>
        <p class="apartaments-filters-text">Przygotowaliśmy dla Ciebie informacje na temat apartamentów w Kołobrzegu i
            Świeradowie-Zdroju. Zapraszamy do
            przeczytania!</p>
        <div class="apartaments-filters-articles">
            <a href="#">Atrakcje w Kołobrzegu</a>
            <a href="#">Atrakcje w Świeradowie-Zdroju</a>
            <a href="#">Oferta: Kołobrzeg</a>
            <a href="#">Oferta: Świeradów Zdrój</a>
        </div>
    </div>
</div>