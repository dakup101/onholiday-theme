<?php $summary = wp_parse_args($args, array(
    "title" => "Summary",
    "desc" => "Summary desc",
    "btn" => "I show more content",
    "inner" => "I am summary inner",
)) ?>

<div class="summary">
    <?php get_template_part(THEME_CMP_CMN, "text-title", array(
        "title" => $summary["title"],
        "subtitle" => null,
        "alignment" => "left",
    )) ?>
    <div class="summary-desc">
        <?php echo $summary["desc"]; ?>
    </div>
    <details class="summary-content text">
        <summary>
            <?php echo $summary["btn"]; ?>
        </summary>
        <?php echo $summary["inner"]; ?>
    </details>
</div>