<?php
/**
 * Template name: Homepage
 *
 */
get_header(); ?>

    <!-- Slide1 -->
<?php get_template_part('template-parts/page/home-page/banner')?>

    <!-- categories -->
<?php get_template_part('template-parts/page/home-page/categories')?>

    <!-- New Product -->
<?php get_template_part('template-parts/page/home-page/new-product')?>

    <!-- Banner2 -->
<?php get_template_part('template-parts/page/home-page/banner2')?>

    <!-- Blog -->
<?php get_template_part('template-parts/page/home-page/blog')?>

    <!-- Instagram -->
<?php get_template_part('template-parts/page/home-page/instagram')?>

    <!-- Shipping -->
<?php get_template_part('template-parts/page/home-page/shipping')?>

<?php
get_footer();
