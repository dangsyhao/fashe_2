<?php get_header() ;?>
<?php get_header( 'shop' ); ?>

            <?php while ( have_posts() ) : the_post(); ?>
            <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
                <div class="container bgwhite p-t-35 p-b-80">
                    <div class="flex-w flex-sb">
                        <!-- Images Gallery -->
                        <?php do_action('fashe_woocommerce_show_product_images');?>

                        <div class="w-size14 p-t-30 respon5">
                            <!-- Get Title -->
                            <?php wc_get_template_part('single-product/blocs/title_single')?>

                            <!-- Get Price -->
                            <?=fashe_get_price_html('',array(
                                                                'price_tag'                 =>'<span class="m-text17">',
                                                                'sale_price_tag_regular'    => '<span class= "block2-oldprice m-text17" >',
                                                                'sale_price_tag_sale'       => '<span class= "m-text17" >',
                                                                )); ?>

                            <!-- Short-Desc -->
                            <?php wc_get_template_part('single-product/blocs/short_desc_single')?>

                            <!-- AddToCart -->
                            <?php do_action('fashe_woocommerce_template_single_add_to_cart')?>
                            <!-- Meta Product -->
                            <?php do_action('fashe_woocommerce_meta_single_product')?>

                            <!-- Description -->
                            <?php wc_get_template_part('single-product/blocs/desc_single')?>

                            <!-- Additional -->
                            <?php wc_get_template_part('single-product/blocs/addit_single')?>

                            <!-- Reviews -->
                            <?php wc_get_template_part('single-product/blocs/reviews_single')?>

                        </div>

                    </div>

                </div>

            </div>
            <?php endwhile;?>

<?php get_footer( 'shop' );?>
<?php get_footer() ;?>


