
<?php

/*
 * Main Banner Function ... .
 */

function fashe_main_banner(){

    $args=array(
        'orderby' => 'ID',
        'order' => 'DESC',
        'post_type' => 'main_banner'
    );

    $the_query= new WP_Query($args);
    $posts=$the_query->posts;
    $banner_items=array();

    foreach ($posts as $post){

        $banner_items[]=get_field('main_banners',$post->ID);
    }

return $banner_items;

}
 add_filter('fashe_main_banner','fashe_main_banner');

/*
 * Main Banner Function ... .
 */

function fashe_news_posts(){

    $args=array(
        'posts_per_page' =>  3,
        'orderby'       => 'post_date',
        'order'         => 'DESC',
        'post_type'     => 'post',
        'post_status'   =>  'publish'
    );

    $the_query= new WP_Query($args);
    $posts=$the_query->posts;

    return $posts;

}
add_filter('fashe_news_posts','fashe_news_posts');

/*
 * Main Banner Function ... .
 */

function fashe_mini_cart_header(){

  the_widget( 'WC_Widget_Cart', 'title=' );

}
add_action('fashe_mini_cart_header','fashe_mini_cart_header');

/*
 * Main Banner Function ... .
 */

function fashe_single_product_left_section()
{
    global $product;
    $attachment_ids = $product->get_gallery_image_ids();
    $attachment_ids[] = $product->get_image_id();

    if(!empty($attachment_ids)){

        wc_get_template('template-parts/single_product/single_product_left.php', array('attachment_ids' => $attachment_ids));

    }
}

add_action('fashe_single_product_left_section','fashe_single_product_left_section');


/*
 *
 */

function fashe_single_product_right_section()
{
    global $product;

    wc_get_template('template-parts/single_product/single_product_right.php');
}

add_action('fashe_single_product_right_section','fashe_single_product_right_section');

/*
 *
 */

function fashe_featured_right_bar()
{

    wc_get_template('template-parts/single_product/single_product_right.php');
}

add_action('fashe_single_product_right_section','fashe_single_product_right_section');
