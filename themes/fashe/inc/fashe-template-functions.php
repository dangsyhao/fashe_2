
<?php




/*
 *
 */

function fashe_categories_template_home($category){

    $total_category=count($category);
    $cat_per_section=2;
    $total_section=($total_category % $cat_per_section) ==0 ?intval($total_category / $cat_per_section):intval($total_category / $cat_per_section)+1;
    ?>
    <?php for($section=1;$section<=$total_section;$section++):?>
        <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
        <?php $item_start=($section-1)*$cat_per_section?>
        <?php for($j=$item_start;$j<$item_start+$cat_per_section;$j++):?>
            <?php if($category[$j]->term_id):?>
            <!-- Blog -->
            <div class="block1 hov-img-zoom pos-relative m-b-30">
                <?php $item_category=$category[$j];
                    do_action('fashe_woocommerce_subcategory_thumbnail',$item_category);
                ?>
                <div class="block1-wrapbtn w-size2">
                    <!-- Button -->
                    <a href="<?= get_category_link($category[$j]->term_id)?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                        <?= $category[$j]->name; ?>
                    </a>
                </div>
            </div>
            <!-- Blog -->
            <?php else:?>

                <div class="block2 wrap-pic-w pos-relative m-b-30">
                    <img src="<?= ASSETS_PATH;?>images/icons/bg-01.jpg" alt="IMG">

                    <div class="block2-content sizefull ab-t-l flex-col-c-m">
                        <h4 class="m-text4 t-center w-size3 p-b-8">
                            Sign up &amp; get 20% off
                        </h4>

                        <p class="t-center w-size4">
                            Be the frist to know about the latest fashion news and get exclu-sive offers
                        </p>

                        <div class="w-size2 p-t-25">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                Sign Up
                            </a>
                        </div>
                    </div>
                </div>

            <?php endif;?>
        <?php endfor;?>

        </div>
    <?php endfor;?>

    <?php
}

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

