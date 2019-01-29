
<?php get_header(); ?>

    <!--Load Title -Banner-->
    <?php if (!is_front_page() || !is_home()){
        get_template_part('template-parts/page/page/title-banner');
    }
    ?>

    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <?php get_template_part('template-parts/page/page/slide-bar');?>
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

