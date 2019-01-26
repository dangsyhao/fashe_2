
<?php get_header(); ?>

    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= ASSETS_PATH;?>images/heading-pages-02.jpg);">
        <h2 class="l-text2 t-center">
            Women
        </h2>
        <p class="m-text13 t-center">
            New Arrivals Women Collection 2018
        </p>
    </section>

    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <?php get_template_part('template-parts/page/page/sub/page-content/slide-bar');?>
                </div>
                <!-- Product -->
                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <?php if (have_posts()):the_post();?>
                        <?php global $product;?>
                        <?php do_action('fashe_woocommerce_product_category',array('category'=>$product->get_categories()));?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        </div>
    </section>

<?php get_footer();?>

