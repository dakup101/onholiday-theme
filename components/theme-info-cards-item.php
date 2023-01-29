<?php 
// title, text, icon, link, link_text 
$card = wp_parse_args( $args, array());
?>
<article class="info-cards-item">
    <figure class="info-cards-item-icon">
        <?php echo file_get_contents($card["icon"]); ?>
    </figure>
    <main class="info-cards-item-content">
        <h3 class="info-cards-item-title">
            <?php echo $card["title"]; ?>
        </h3>
        <p class="info-cards-item-text">
            <?php echo $card["text"]; ?>
        </p>
        <a href="<?php echo $card["link"]; ?>" class="info-cards-item-link">
            <?php echo $card["link_text"]; ?>
        </a>
    </main>
</article>