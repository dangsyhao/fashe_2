
<?php

global $product;
$product_label ='';

if($product->is_on_sale()){
    $product_label ='block2-labelsale';
}else{
    //If the product starts selling within 15 days, it is a new product .
    $newness_days = 15;
    $created = strtotime( $product->get_date_created() );

    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
        $product_label ='block2-labelnew';
    }
}

?>

<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 ">
    <div class="block2">
        <div class="block2-img wrap-pic-w of-hidden pos-relative <?php echo $product_label ;?>">
            <?= woocommerce_get_product_thumbnail();?>
            <div class="block2-overlay trans-0-4">
                <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4" tabindex="0">
                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                </a>
                <div class="block2-btn-addcart w-size1 trans-0-4">
                        <?php do_action('fashe_product_loop_add_to_cart');?>
                </div>
            </div>
        </div>
        <div class="block2-txt p-t-20">
            <a href="<?php the_permalink($product->term_ID)?>" class="block2-name dis-block s-text3 p-b-5" tabindex="0">
                <?= get_the_title();?>
            </a>

            <?= fashe_get_price_html('',array(
                    'price_tag'=>'<span class="block2-price m-text6 p-r-5">',
                    'sale_price_tag_regular' => '<span class= "block2-oldprice m-text7 p-r-5" >',
                    'sale_price_tag_sale' => '<span class= "block2-newprice m-text8 p-r-5" >',

            )); ?>

        </div>
    </div>
</div>
