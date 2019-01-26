
<?php global $product;?>

<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
    <div class="block2">
        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
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

            <?= fashe_get_price_html(); ?>

        </div>
    </div>
</div>
