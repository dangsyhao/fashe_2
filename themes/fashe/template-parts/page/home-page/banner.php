<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">

            <?php $banner_items=apply_filters('fashe_main_banner','fashe_main_banner');?>

            <?php foreach ($banner_items as $banner_item):?>
            <div class="item-slick1 item1-slick1" style="background-image: url(<?= $banner_item['banner_images']?>);">
                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?= $banner_item['banner_sub_title']?>
						</span>
                    <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            <?= $banner_item['banner_title']?>
                    </h2>
                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                        <!-- Button -->
                        <a href="<?= get_permalink( woocommerce_get_page_id( 'shop' ) );?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</section>