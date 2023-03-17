<?php
$args = wp_parse_args($args, array(
    "name" => "themeSelect",
    "id" => "themeSelect",
    "visibleName" => null,
    "startName" => null,
    "multiple" => false,
    "with_icon" => false,
    // Parse file contents of svg to icon
    "icon" => null,
    "options" => array(
        "parse_options" => "Parse Options",
    ),
    "class" => null,
));
?>

<div for="languageSwitcher" class="
<?php if ($args["multiple"]) : echo "multiple";
endif; ?> select <?php if (!empty($args['class'])) : echo $args['class'];
                    endif; ?>" data-value="">
    <?php if ($args["multiple"]) : ?>
        <input class="multiple-value hidden" type="text" name="multiple-<?php echo $args["name"] ?>" id="multiple-<?php echo $args["name"]; ?>">
    <?php endif; ?>
    <select name="<?php echo $args['name'] ?>" id="<?php echo $args['id'] ?>">
        <?php foreach ($args["options"] as $key => $option) : ?>
            <option value="<?php echo $key ?>"><?php echo $option ?></option>
        <?php endforeach; ?>
    </select>
    <div class="select-value-wrapper">
        <?php if ($args['with_icon']) : ?>
            <?php echo $args['icon']; ?>
        <?php endif; ?>
        <div class="select-value" <?php if ($args["visibleName"]) : echo 'data-name="' . $args["visibleName"] . '"';
                                    endif; ?> <?php if ($args["startName"]) : echo 'data-start-name="' . $args["startName"] . '"';
                                                endif; ?>>
            <?php if ($args["visibleName"]) echo $args["visibleName"] ?>
        </div>
        <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" class="header-nav-item-caret caret">
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.334 8.08371C13.4195 7.97208 13.4583 7.84621 13.4583 7.72271C13.4583 7.41475 13.216 7.125 12.8653 7.125H6.13538C5.78308 7.125 5.54163 7.41554 5.54163 7.72271C5.54163 7.847 5.58121 7.97287 5.6675 8.0845C6.61988 9.31475 8.242 11.4087 9.03842 12.4371C9.15083 12.5827 9.32342 12.6667 9.50708 12.6667C9.68917 12.6667 9.86254 12.582 9.97496 12.4363C10.7682 11.4079 12.3848 9.31317 13.334 8.08371Z" />
            </g>
        </svg>
    </div>
    <ul class="select-options">

    </ul>
</div>