<?php $args = wp_parse_args($args, array(
    "title" => null,
    "text" => null, 
    "links" => null,
)) ?>

<?php if (!empty($args["title"]) && !empty($args["text"])): ?>
<div class="apartaments-filters-inner articles">
    <div class="apartaments-filters-item">
        <p class="apartaments-filters-title font-alt">
            <?php echo $args["title"]; ?>
        </p>
        <p class="apartaments-filters-text">
            <?php echo $args["text"]; ?>
        </p>
        <?php if (isset($args["links"]) && !empty($args["links"])) : ?>
        <div class="apartaments-filters-articles">
            <?php foreach($args["links"] as $el) : ?>
            <a href="<?php echo $el["link"] ?>">
                <?php echo $el["text"] ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>