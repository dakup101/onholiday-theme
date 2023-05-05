<?php
add_action('init', 'return_city_offer_init');

function return_city_offer_init(){
    add_action( 'wp_ajax_nopriv_city_offer', 'return_city_offer' );
    add_action( 'wp_ajax_city_offer', 'return_city_offer' );
}

function return_city_offer(){
    $page_id = $_POST["page_id"];
    echo city_offer_content($page_id);
    wp_die();
}

function city_offer_content($page_id){
ob_start() ?>

<?php 
$kolobrzeg_items = new WP_Query( array(
    "post_type" => "ido-apartaments",
    "status" => "publish",
    "posts_per_page" => -1,
    "offset" => 8,
    'orderby' => 'menu_order',
    'order' => 'DESC',
    "tax_query" => array(
        array(
            "taxonomy" => "ido_category",
            "field" => "slug",
            "terms" => $page_id == 369 ? "kolobrzeg" : "swieradow-zdroj",
        )
    )
));
if ($kolobrzeg_items->have_posts()): ?>
<?php while ($kolobrzeg_items->have_posts()): $kolobrzeg_items->the_post(); ?>
<article class="apartament-list-item">
    <a href="<?php echo get_the_permalink() ?>"
       class="apartament-list-item-inner">
        <div class="apartament-list-item-name">
            <?php echo get_the_title() ?>
        </div>
        <span class="apartament-list-item-link">
            <?php echo __("Sprawdź szczegóły", "oh-theme") ?>
        </span>
    </a>
    <figure class="apartament-list-item-bg">
        <img src="<?php echo get_field("media")[0]["url"] ?>"
             alt="<?php echo get_the_title()  ?>"
             loading="lazy">
        <div class="overlay"></div>

    </figure>
</article>
<?php endwhile; wp_reset_postdata()?>
<?php endif; ?>

<?php
return ob_get_flush();
}