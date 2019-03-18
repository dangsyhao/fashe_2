
<?php $product_sale_data = get_field('special_discount_products','option') ?>
<?php if($product_sale_data): ?>

<?php
global $post ;
    $product_item = $product_sale_data['product_item'];
    $dead_time_sale = $product_sale_data['product_discount_period'];
    $post_meta = get_post_meta($product_item->ID) ;
    $product_item_thumnail_img = wp_get_attachment_image_src( $post_meta['_thumbnail_id'][0], 'Product-image-sale-special' ) ;

    $the_query = new WP_Query(array('post_type' =>'product','p' =>$product_item->ID)) ;

    while ($the_query->have_posts()){
        $the_query->the_post() ;
        setup_postdata($post) ;
        global $product ;var_dump($product);

        echo fashe_get_price_html('',array(
            'price_tag'=>'<span class="block2-price m-text6 p-r-5">',
            'sale_price_tag_regular' => '<span class= "block2-oldprice m-text7 p-r-5" >',
            'sale_price_tag_sale' => '<span class=s "block2-newprice m-text8" >',

        ));
    }
    ?>

<input type="hidden" id="special_discount_products" data-deadtime-sale="<?php echo $dead_time_sale ;?>" >

<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
    <div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">

        <img src="<?= $product_item_thumnail_img[0] ;?>" alt="IMG-BANNER">
        <div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
            <div class="t-center">
                <a href="<?php the_permalink($product_item->ID)?>" class="dis-block s-text3 p-b-5">
                    <?php echo get_the_title($product_item->ID);?>
                </a>
                <?php if($post_meta['_sale_price']):?>
                <span class="block2-oldprice m-text7 p-r-5"><?php echo '$'.$post_meta['_regular_price'][0]?></span>
                <span class="block2-newprice m-text8"><?php echo '$'.$post_meta['_sale_price'][0] ?></span>
                <?php else :?>
                <span class="block2-newprice m-text8"><?php echo '$'.$post_meta['_price'][0] ?></span>
                <?php endif ;?>
            </div>

            <div class="flex-c-m p-t-44 p-t-30-xl">
                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                    <span class="m-text10 p-b-1 days"></span>
                    <span class="s-text5">days</span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                    <span class="m-text10 p-b-1 hours"></span>
                    <span class="s-text5">hours</span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                    <span class="m-text10 p-b-1 minutes"></span>
                    <span class="s-text5">mins</span>
                </div>

                <div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
                    <span class="m-text10 p-b-1 seconds"></span>
                    <span class="s-text5">secs</span>
                </div>
            </div>

        </div>

    </div>
</div>
<?php endif ;?>