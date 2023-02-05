<?php
add_action('init', 'ido_make_posts');

function ido_make_posts()
{
    add_action('wp_ajax_nopriv_ido_make_posts', 'ido_make_posts_hadnle');
    add_action('wp_ajax_ido_make_posts', 'ido_make_posts_hadnle');
}

function ido_make_posts_hadnle()
{
    $page = (int) $_POST["page"];
    $ido = new IdoBooking_API;
    $object_arr = $ido->get_object($page, 1);
    if (!empty($object_arr)) {
        $item = $object_arr[0];

        $my_args = array(
            'numberposts'    => -1,
            'post_type'        => 'ido-apartaments',
            'meta_key'        => 'ido_id',
            'meta_value'    => $item->id
        );

        $posts = get_posts($my_args);

        if (empty($posts)) {
            $my_post = array(
                'post_title'    => $item->name,
                'post_status'   => 'publish',
                'post_type'     => 'ido-apartaments',
                'post_author'   => 1,
            );

            $thePostId = wp_insert_post($my_post);
            update_field('ido_id', $item->id, $thePostId);

            echo json_encode(array(
                "page" => $page,
                "fetched" => true,
                "msg" => "ido#" . $item->id . ": utworzono apartament (wp#" . $thePostId . ")"
            ));
            wp_die();
        } else {
            $post_id = $posts[0]->ID;
            echo json_encode(array(
                "page" => $page,
                "fetched" => true,
                "msg" => "ido#" . $item->id . ": apartament już istnieje (wp#" . $post_id . ")"
            ));
            wp_die();
        }
        // search if post exists
    } else {
        echo json_encode(array(
            "page" => $page,
            "fetched" => false,
            "msg" => "Koniec pobierania"
        ));
        wp_die();
    }
}
