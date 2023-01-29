<section class="icons-row">
    <div class="container">
        <div class="icons-row-wrapper">
            <?php foreach(get_field("icons_row", "options") as $icon): ?>
            <div class="icons-row-item">
                <figure class="icons-row-item-icon">
                    <?php echo file_get_contents($icon["icon"]) ?>
                </figure>
                <p class="icons-row-item-text">
                    <?php echo $icon["text"] ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>