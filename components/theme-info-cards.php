<?php $cards = wp_parse_args( $args, array() ) ?>

<div class="info-cards">
    <?php foreach($cards as $card) get_template_part( THEME_CMP, "info-cards-item", $card ); ?>
</div>