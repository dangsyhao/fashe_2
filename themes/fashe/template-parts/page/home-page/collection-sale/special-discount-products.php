
<?php $product_sale_data = get_field('special_discount_products','option') ?>
<?php if($product_sale_data): ?>

<?php

    global $post ;
    $product_item = $product_sale_data['product_item'];
    $dead_time_sale = $product_sale_data['dead_time_for_sale'];
    $the_query = new WP_Query(array('post_type' =>'product','p' =>$product_item->ID)) ;

?>

<input type="hidden" id="special_discount_products" data-deadtime-sale="<?php echo $dead_time_sale ;?>" >

<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
    <div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
    <?php while ($the_query->have_posts()): $the_query->the_post() ;?>
    <?php global $product ; setup_postdata($post);?>

        <?php echo woocommerce_get_product_thumbnail('Product-image-sale-special') ?>
        <div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
            <div class="t-center">
                <a href="<?php the_permalink($product_item->ID)?>" class="dis-block s-text3 p-b-5">
                    <?php the_title();?>
                </a>

                <?php
                    echo fashe_get_price_html('',array(
                                        'price_tag'=>'<span class="block2-newprice m-text8">',
                                        'sale_price_tag_regular' => '<span class= "block2-oldprice m-text7 p-r-5" >',
                                        'sale_price_tag_sale' => '<span class="block2-newprice m-text8" >',
                    ));
                ?>

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
    <?php endwhile; ?>
    </div>
</div>
<?php endif ;?>