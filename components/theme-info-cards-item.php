<?php
// title, text, is_icon, icon, link, link_text 
$card = wp_parse_args($args, array());
?>
<article class="info-cards-item">
    <figure class="info-cards-item-icon">
        <?php if ($card["is_icon"]) : ?>
        <?php echo file_get_contents($card["icon"]); ?>
        <?php else : ?>
        <img src="<?php echo $card["icon"] ?>" alt="<?php echo $card["title"] ?>">
        <?php endif; ?>
    </figure>
    <main class="info-cards-item-content">
        <h3 class="info-cards-item-title font-alt">
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