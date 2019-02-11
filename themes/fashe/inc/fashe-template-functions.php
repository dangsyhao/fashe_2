
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


/*
 * Set Html tags Close </> in Function
 */

function fashe_get_tag_close($tag_open){


    if(preg_match('/span/',$tag_open,$matches)){
        return '</'.$matches[0].'>';
    }

    if(preg_match('/div/',$tag_open,$matches)){
        return '</'.$matches[0].'>';
    }

    if(preg_match('/del/',$tag_open,$matches)){

        return '</'.$matches[0].'>';
    }

}

/******************
 * Thêm shortcode ajax_pagination
 ********************/
function ajax_pagination_svl( $atts ){
    $atts = shortcode_atts(
        array(
            'posts_per_page' => 3,
            'paged' => 1,
            'post_type' => 'post'
        ), $atts,'ajax_pagination'
    );
    $posts_per_page = intval($atts['posts_per_page']);
    $paged = intval($atts['paged']);
    $post_type = sanitize_text_field($atts['post_type']);
    $allpost  = '<div id="result_ajaxp" class="col-md-8 col-lg-9 p-b-75">';
    $allpost .= query_ajax_pagination( $post_type, $posts_per_page , $paged );
    $allpost .= '</div>';

    return $allpost;
}
add_shortcode('ajax_pagination', 'ajax_pagination_svl');

/******************
Function phân trang PHP có dạng 1,2,3 ...
 ********************/

function query_ajax_pagination( $post_type = 'post', $posts_per_page = 5, $paged = 1){

    $args_svl = array(
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'post_status' => 'publish'
    );
    $q_svl = new WP_Query( $args_svl );

    /*Tổng bài viết trong query trên*/
    $total_records = $q_svl->found_posts;

    /*Tổng số page*/
    $total_pages = ceil($total_records/$posts_per_page);

    ob_start();
    if($q_svl->have_posts()):

        echo '<div class="ajax_pagination p-r-50 p-r-0-lg" posts_per_page="'.$posts_per_page.'" post_type="'.$post_type.'">';

            while($q_svl->have_posts()):$q_svl->the_post();
                get_template_part('template-parts/blocs/post-items');
            endwhile;

        echo '</div>';

        $paginate = paginate_function( $posts_per_page, $paged, $total_records, $total_pages);
        echo $paginate;

    endif;
    wp_reset_query();

    return ob_get_clean();
}

/******************
Function phân trang PHP có dạng 1,2,3 ...
 ********************/

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{

    if($total_pages <= 1){

        return '';
    }

    ob_start();

    echo '<div class="pagination flex-m flex-w p-r-50">';

    for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
        if($i > 0){
            echo '<a class="item-pagination flex-c-m trans-0-4" href="#" data-page="'.$i.'">'.$i.'</a>';
        }
    }

    if($current_page){
        echo '<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">'.$current_page.'</a>';
    }

    for($i = $current_page+1; $i < $current_page+3 ; $i++){ //create right-hand side links
        if($i<=$total_pages){
            echo '<a class="item-pagination flex-c-m trans-0-4" href="#" data-page="'.$i.'">'.$i.'</a>';
        }
    }

    echo '</div>';

    return ob_get_clean();

}

/**
 * Load post items in blog page
 */

function fashe_load_post_index(){

    get_template_part('template-parts/blocs/post-items');
}
