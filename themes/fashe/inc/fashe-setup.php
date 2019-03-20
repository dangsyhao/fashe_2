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
    add_image_size( 'Product-image-sale-special', 570, 427, true );
    //
    add_image_size( 'Post-image-thumnail-beauty-collection', 570, 427, true );
    //
    add_image_size( 'fashe-thumbnail-avatar', 100, 100, true );
    //
    add_image_size( 'fashe-loop-category-long-thumbnail',370,479,true );
    //
    add_image_size( 'fashe-loop-category-short-thumbnail',370,339,true );
    //
    add_image_size( 'fashe-main-banners',1903,570,true );
    //s
    add_image_size( 'fashe-title-banner',1920,239,true );
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
    add_image_size( 'fashe-mini-cart-thumbnaisls',80,80,true );
    //
    add_image_size( 'fashe-logo-header',120,27,true );
    //
    add_image_size( 'fashe-loop-products',270,360,true );
//
    add_image_size( 'fashe-payment-logo',34,22,true );

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

/** Xử lý Ajax trong WordPress */

add_action( 'wp_ajax_LoadPostPagination', 'LoadPostPagination_init' );
add_action( 'wp_ajax_nopriv_LoadPostPagination', 'LoadPostPagination_init' );

function LoadPostPagination_init() {
    $posts_per_page = intval($_POST['posts_per_page']);
    $paged = intval($_POST['data_page']);
    $post_type = sanitize_text_field($_POST['post_type']);
    $allpost = query_ajax_pagination( array('posts_per_page'=>$posts_per_page ,'paged'=>$paged ,'post_type'=>$post_type));
    echo $allpost;
    exit;
}


/** Xử lý Ajax trong WordPress */

add_action( 'wp_ajax_LoadProductPagination', 'LoadProductPagination_init' );
add_action( 'wp_ajax_nopriv_LoadProductPagination', 'LoadProductPagination_init' );

function LoadProductPagination_init() {

    //Get Data From Ajax .
    $posts_per_page = _sanitize_text_fields($_POST['posts_per_page']);
    $paged = isset($_POST['paged']) ? wc_clean( wp_unslash( intval($_POST['paged']) )) : false ;
    $product_color_att = isset($_POST['query_product_color']) && $_POST['query_product_color'] !== '' ? 'product-color' : false;
    $produc_color_term = isset($_POST['query_product_color']) && $_POST['query_product_color'] !== '' ? wc_clean( wp_unslash( $_POST['query_product_color'] )) :false;
    $orderby = isset($_POST['orderby']) && $_POST['orderby'] !== '' ? wc_clean( wp_unslash( $_POST['orderby'] )) :false;
    $keyword = isset($_POST['query_keyword']) ? wc_clean( wp_unslash( $_POST['query_keyword'] )) :'';
    $price = isset($_POST['price']) && $_POST['price'] !== '' ?  wc_clean( wp_unslash( $_POST['price'] ) ) :false;
    $category = isset($_POST['filter_by_cat']) ? wc_clean( wp_unslash( $_POST['filter_by_cat'] )) :'';

    //Put Data to Product Shorcode
    $atts =  array(
        'limit'     => $posts_per_page,
        'cat_operator' => 'AND',
        'orderby'       => $orderby,
        'category'      => $category,
        'page'          => $paged,
        'paginate'      => true,
        's'             => $keyword,
        'price'         => $price,
        'attribute'    => $product_color_att,
        'terms'         => $produc_color_term,
    );

    $shortcode = new fashe_product_shortcode_class( $atts);
    $get_attrs = $shortcode->fashe_get_query_results();
    $total_product = $get_attrs->total;

    echo '<div class="row product_results" data-total-results="'.$total_product.'">';
    echo $shortcode->fashe_get_content();
    echo '</div>';
    echo $shortcode ->fashe_get_shop_paginate();

    exit();
}

/** Xử lý Ajax trong WordPress */

add_action( 'wp_enqueue_scripts', 'devvn_useAjaxPagination', 1 );

function devvn_useAjaxPagination() {

    /** Thêm js vào website */
    wp_enqueue_script( 'devvn-ajax',ASSETS_PATH. 'js/paginate.js', array( 'jquery' ), '1.0', true );
    $php_array = array(
        'admin_ajax' => admin_url( 'admin-ajax.php' )
    );
    wp_localize_script( 'devvn-ajax', 'svl_array_ajaxp', $php_array );

}

/**
 * Custom Feild Setting .
 */

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Fashe Template Option',
        'menu_title'	=> 'Fashe Template Option',
        'menu_slug' 	=> 'fashe-option',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => __('Blocks', 'fashe'),
        'menu_title'    => __('Blocks', 'fashe'),
        'parent_slug'   => 'fashe-theme-settings',
    ));


}