<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo wp_title() ?>
    </title>
    <?php wp_head(); ?>
</head>

<body class="<?php echo get_page_template_slug(); ?> text-dark">
    <?php get_template_part(THEME_CMP, "header"); ?>
    <main>