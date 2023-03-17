<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo wp_title() ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Roboto:wght@400;500;700&family=Sriracha&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php echo body_class("text-dark"); ?>>
    <?php get_template_part(THEME_CMP, "header"); ?>
    <main>