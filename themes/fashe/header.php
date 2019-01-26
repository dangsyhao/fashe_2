
<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <title><?= get_bloginfo('title');?></title>
    <meta charset="<?= get_bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= ASSETS_PATH;?>images/icons/favicon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/slick/slick.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/slick/slick-theme.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>css/util.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" type="text/css" href="<?= ASSETS_PATH;?>css/main.css">
    <!--===============================================================================================-->

    <?php wp_head();?>
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <!-- top-bar -->
        <?php get_template_part('template-parts/header/top-bar')?>
        <div class="wrap_header">
            <!-- Logo -->
            <?php get_template_part('template-parts/header/logo')?>

            <!-- Menu -->
            <?php get_template_part('template-parts/header/nav_menu')?>

            <!-- Header Icon -->
            <?php get_template_part('template-parts/header/header_icons/header_icons')?>

        </div>
    </div>

    <!-- Menu Mobile -->
    <?php get_template_part('template-parts/header_mobile/header_mobile')?>

    <!-- Menu Mobile -->
    <?php get_template_part('template-parts/header_mobile/menu_mobile')?>

</header>
