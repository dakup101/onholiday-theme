<?php $item = wp_parse_args($args, array(
    "title" => "Package",
    "color" => "#333",
    "desc" => "This package contains:",
    "items" => array(
        array(
            "value" => "Package item"
        )
    )
)); ?>

<div class="administration-packgae">
    <h3 class="administration-package-header" style="background-color: <?php echo $item["color"] ?>;">
        <?php echo $item["title"]; ?>
    </h3>
    <p class="administration-package-desc">
        <?php echo $item["desc"] ?>
    </p>
    <ul class="administration-package-list">
        <?php foreach ($item["items"] as $el) : ?>
            <li class="administration-package-list-item">
                <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M9 22l-10-10.598 2.798-2.859 7.149 7.473 13.144-14.016 2.909 2.806z" />
                    </svg>
                </figure>
                <span>
                    <?php echo $el["value"]; ?>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php get_template_part(THEME_CMP_CMN, "btn", array(
        "link" => "/kontakt/",
        "text" => "Wybieram",
        "class" => "btn-content",
        "type" => "alt-dark",
    )) ?>
</div>