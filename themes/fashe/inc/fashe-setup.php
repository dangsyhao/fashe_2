<?php

function fashe_setup() {

    load_theme_textdomain( 'fashe' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    //
    add_image_size( 'fashe-thumbnail-avatar', 100, 100, true );
    //
    add_image_size( 'fashe-loop-category-long-thumbnail',370,479,true );
    //
    add_image_size( 'fashe-loop-category-short-thumbnail',370,339,true );
    //
    add_image_size( 'fashe-main-banners',1903,570,true );
    //
    add_image_size( 'fashe-post-thumbnail-front',370,277,true );
    //
    add_image_size( 'fashe-post-thumbnail-blog-list',820,615,true );
    //
    add_image_size( 'fashe-post-thumbnail-single-post',820,481,true );
    //
    add_image_size( 'fashe-product-cart-thumbnail',90,120,true );
    //
    add_image_size( 'fashe-single-product-thumbnails',90,120,false );
    //
    add_image_size( 'fashe-mini-cart-thumbnails',80,80,true );


    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'fashe' ),
        'social' => __( 'Social Links Menu', 'fashe' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );


}
add_action( 'after_setup_theme', 'fashe_setup' );

/**
 * Enqueue scripts and styles.
 */
function fashe_scripts() {

    // Load Font.
    wp_enqueue_style( 'fashe-fonts-awesome', get_theme_file_uri('/assets/fonts/font-awesome-4.7.0/css/ont-awesome.min.css'), array(), null );
    wp_enqueue_style( 'fashe-fonts-themify', get_theme_file_uri('/assets/fonts/themify/themify-icons.css'), array(), null );
    wp_enqueue_style( 'fashe-fonts-linear', get_theme_file_uri('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css'), array(), null );
    wp_enqueue_style( 'fashe-fonts-elegant', get_theme_file_uri('/assets/fonts/elegant-font/html-css/style.css'), array(), null );

    // Load CSS.
    wp_enqueue_style( 'fashe-css-bootstrap', get_theme_file_uri('/assets/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style( 'fashe-css-animate', get_theme_file_uri('/assets/vendor/animate/animate.css'));
    wp_enqueue_style( 'fashe-css-hamburgers', get_theme_file_uri('/assets/vendor/css-hamburgers/hamburgers.min.css'));
    wp_enqueue_style( 'fashe-css-animsition', get_theme_file_uri('/assets/vendor/animsition/css/animsition.min.css'));
    wp_enqueue_style( 'fashe-css-select2', get_theme_file_uri('/assets/vendor/select2/select2.min.css'));
    wp_enqueue_style( 'fashe-css-danterange', get_theme_file_uri('/assets/vendor/daterangepicker/daterangepicker.css'));
    wp_enqueue_style( 'fashe-css-slick', get_theme_file_uri('/assets/vendor/slick/slick.css'));
    wp_enqueue_style( 'fashe-css-lightbox', get_theme_file_uri('/assets/vendor/lightbox2/css/lightbox.min.css'));
    wp_enqueue_style( 'fashe-css-until', get_theme_file_uri('/assets/css/util.min.css'));
    wp_enqueue_style( 'fashe-css-main', get_theme_file_uri('/assets/css/main.min.css'));


    // Add custom fonts, used in the main scripts.
    wp_enqueue_script( 'fashe-js-jquery', get_theme_file_uri( '/assets/vendor/jquery/jquery-3.2.1.min.js' ), array( 'jquery' ), '3.2.1', true );
    wp_enqueue_script( 'fashe-js-animsition', get_theme_file_uri( '/assets/vendor/animsition/js/animsition.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-poper', get_theme_file_uri( '/assets/vendor/bootstrap/js/popper.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-bootstrap', get_theme_file_uri( '/assets/vendor/bootstrap/js/bootstrap.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-select2', get_theme_file_uri( '/assets/vendor/select2/select2.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-slick', get_theme_file_uri( '/assets/vendor/slick/slick.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-slick-custom', get_theme_file_uri( '/assets/js/slick-custom.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-countdowntime', get_theme_file_uri( '/assets/vendor/countdowntime/countdowntime.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-lightbox2', get_theme_file_uri( '/assets/vendor/lightbox2/js/lightbox.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-sweetalert', get_theme_file_uri( '/assets/vendor/sweetalert/sweetalert.min.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-parallax', get_theme_file_uri( '/assets/vendor/parallax100/parallax100.js' ), array(), null, true );
    wp_enqueue_script( 'fashe-js-main', get_theme_file_uri( '/assets/js/main.min.js' ), array(), null, true );

}
//add_action( 'wp_enqueue_scripts', 'fashe_scripts' );