
<h4 class="m-text23 p-t-65 p-b-34">
    <?php _e('Featured Products','fashe');?>
</h4>

<?php
        $atts = array_merge(array(
        'limit' => '6',
        'orderby' => 'date',
        'order' => 'DESC',
        'category' => '',
        'cat_operator' => 'IN',
        ), (array)$atts);

        //$atts['visibility'] = 'featured';

        $shortcode = new fashe_product_shortcode_class($atts, 'featured_products');
        $products = $shortcode->fashe_get_query_results();


        echo '<ul class="bgwhite">';
            foreach ($products->ids as $product_id) {

            $GLOBALS['post'] = get_post($product_id); // WPCS: override ok.
            setup_postdata($GLOBALS['post']);
            global $product;
            ?>
                <li class="flex-w p-b-20">
                    <a href="<?= get_permalink();?>" class="dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4">
                        <img src="<?= get_the_post_thumbnail_url();?>" alt="IMG-PRODUCT">
                    </a>
                    <div class="w-size23 p-t-5">
                        <a href="<?= get_permalink();?>" class="s-text20">
                            <?php the_title()?>
                        </a>
                        <?=fashe_get_price_html('',array(
                            'price_tag'=>'<span class="dis-block s-text17 p-t-6">',
                            'get_price_sale'=>false
                        )); ?>
                    </div>
                </li>

            <?php
            }
        echo '</ul>';
        wp_reset_postdata();
?>



