<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NPT46HZ');
    </script>
    <!-- End Google Tag Manager -->



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo wp_title() ?>
    </title>
    <link rel="preconnect"
          href="https://fonts.googleapis.com" />
    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin />
    <link rel="dns-prefetch"
          href="smartsuppchat.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&family=Roboto:wght@400;500;700&family=Sriracha&display=swap"
          rel="stylesheet">



    <?php wp_head(); ?>
</head>

<body <?php echo body_class("text-dark"); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NPT46HZ"
                height="0"
                width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php get_template_part(THEME_CMP, "header"); ?>
    <main>