
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
Function phân trang PHP có dạng 1,2,3 ...
 ********************/

function query_ajax_pagination( $args){

    $args_merge = array_merge(
        array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => 1,
        'post_status' => 'publish'
        ),(array) $args
        );

    $q_svl = new WP_Query( $args_merge );

    /*Tổng bài viết trong query trên*/
    $total_records = $q_svl->found_posts;

    /*Tổng số page*/
    $total_pages = ceil($total_records/$args_merge['posts_per_page']);

    ob_start();

    if($q_svl->have_posts()):

        echo '<div class="ajax_pagination p-r-50 p-r-0-lg" posts_per_page="'.$args_merge['posts_per_page'].'" post_type="'.$args_merge['post_type'].'">';

            while($q_svl->have_posts()):$q_svl->the_post();
                get_template_part('template-parts/blocs/post-items');
            endwhile;

        echo '</div>';

        $paginate = fashe_paginate_ajax(array(
                                            'posts_per_page'=>$args_merge['posts_per_page'],
                                            'paged'=>$args_merge['paged'],
                                            'total_pages'=>$total_pages
                                        ));
        echo $paginate;

    endif;
    wp_reset_query();

    return ob_get_clean();
}

/******************
Function phân trang PHP có dạng 1,2,3 ...
 ********************/

function fashe_paginate_ajax($args)
{

    $args_merge = array_merge(array(
                                    'posts_per_page' => '5',
                                    'paged' => '1',
                                    'total_records' => '0',
                                    'total_pages' => '0'
                                    ),
                                    (array)$args
                            );


    if($args['total_pages'] <= 1){

        return '';
    }

    ob_start();

    ?>

    <div class="pagination flex-m flex-w p-t-26">
        <?php for($i=1;$i<=$args_merge['total_pages'];$i++):?>
            <a  class="item-pagination flex-c-m trans-0-4 <?= ($args_merge['paged']==$i)?'active-pagination':'';?>" href="#" data-page="<?=$i?>"><?= $i;?></a>
        <?php endfor;?>
    </div>

    <?php
    return ob_get_clean();

}

