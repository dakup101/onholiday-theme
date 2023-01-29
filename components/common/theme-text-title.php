<?php $title = wp_parse_args( $args, array(
    "title" => "I am title!",
    "subtitle" => "I am subtitle!",
    "alignment" => "center",
    "tag" => "h2",
)) ?>

<div class="text-title text-<?php echo $title["alignment"]; ?>">
    <<?php echo $title["tag"] ?>>
        <?php echo $title["title"] ?>
    </<?php echo $title["tag"]?>>
    <strong><?php echo $title["subtitle"] ?></strong>
</div>