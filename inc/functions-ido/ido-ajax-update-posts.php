<?php
add_action('init', 'ido_update_posts');

function ido_update_posts()
{
    add_action('wp_ajax_nopriv_ido_update_posts', 'ido_update_posts_hadnle');
    add_action('wp_ajax_ido_update_posts', 'ido_update_posts_hadnle');
}

function ido_update_posts_hadnle()
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
            'meta_value'    => $item->id,
            'suppress_filters' => false

        );

        $posts = get_posts($my_args);

        if (empty($posts)) {
            echo json_encode(array(
                "page" => $page,
                "fetched" => true,
                "msg" => "ido#" . $item->id . ": apartament nie jest pobrany na stronę"
            ));
            wp_die();
        }

        $post_id = $posts[0]->ID;

        // Addons
        $rows = (array) get_field('addons', $post_id);
        if (!empty($rows)) {
            $count = count($rows);
            for ($x = $count; $x >= 1; $x--) {
                $index = $x;
                delete_row('addons', $index, $post_id);
            }
        }

        foreach ($item->addons as $addon) {
            $row = array(
                'id' => $addon->id,
                'name' => $addon->name,
                'costless' => $addon->costless,
                'optional' => $addon->optional,
                'type' => $addon->type
            );
            add_row('addons', $row, $post_id);
        }



        // MEDIA
        $rows = (array) get_field('media', $post_id);
        if (!empty($rows)) {
            $count = count($rows);
            for ($x = $count; $x >= 1; $x--) {
                $index = $x;
                delete_row('media', $index, $post_id);
            }
        }

        foreach ($ido->get_media($item->id) as $media) {
            $row = array(
                'url' => $media->url,
            );
            add_row('media', $row, $post_id);
        }


        // Description
        $desc = $ido->get_description($item->id);
        update_field('desc_short', $desc[0]->shortDescription, $post_id);
        update_field('desc', $desc[0]->longDescription, $post_id);

        // Amenities
        $tags = get_the_terms($post_id, 'ido_amen');


        foreach ($tags as $tag) {
            remove_post_term($post_id, $tag, 'ido_amen');
        }

        foreach ($ido->get_amenities($item->id) as $amend) {
            $add_to_tags = term_exists($amend->name, 'ido_amen');
            if (!$add_to_tags) wp_insert_term($amend->name, 'ido_amen', array(
                'description' => '',
                'slug' => $amend->id,
            ));

            $setTerm = wp_set_post_terms($post_id, $amend->name, 'ido_amen', true);
        }

        echo json_encode(array(
            "page" => $page,
            "fetched" => true,
            "msg" => "ido#" . $item->id . ": zaktualizowano apartament (wp#" . $post_id . ")"
        ));
        wp_die();
    } else {
        echo json_encode(array(
            "page" => $page,
            "fetched" => false,
            "msg" => "Koniec pobierania"
        ));
        wp_die();
    }
}
