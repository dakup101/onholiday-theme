<?php
// Global Theme Btn Component
$btn = wp_parse_args( $args, array(
    "link" => "#",
    "text" => "I'm button!",
    "class" => null,
    "type" => "main",
    "no_follow" => false,
) )
?>

<?php if ($btn["link"]): ?>

<a href="<?php echo $btn["link"]; ?>" <?php if ($btn["no_follow"]) echo 'rel="nofollow"' ?>
    class="btn btn-<?php echo $btn["type"] ?> <?php if ($btn['class']) echo $btn['class'] ?>">
    <?php echo $btn["text"]; ?>
</a>

<?php else: ?>

<button class="btn btn-<?php echo $btn["type"] ?> <?php if ($btn['class']) echo $btn['class'] ?>">
    <?php echo $btn["text"]; ?>
</button>

<?php endif; ?>