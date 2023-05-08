<?php
add_action('init', 'return_prices_init');

function return_prices_init(){
    add_action( 'wp_ajax_nopriv_get_price', 'return_prices' );
    add_action( 'wp_ajax_get_price', 'return_prices' );
}

function return_prices(){
    $objectId = $_POST["objectId"];
    $dateFrom = $_POST["dateFrom"];
    $dateTo = $_POST["dateTo"];

    $ido = new IdoBooking_API;
    echo $ido->getPriceForDays($dateFrom, $dateTo, $objectId);

    wp_die();
}