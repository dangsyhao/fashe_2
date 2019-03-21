<?php
/**
* Output featured products.
*
* @param array $atts Attributes.
* @return string
*/


function fashe_featured_products_right_bar( $atts )
{

    $atts = array_merge(array(
        'limit' => '6',
        'orderby' => 'date',
        'order' => 'DESC',
        'category' => '',
        'cat_operator' => 'IN',
    ), (array)$atts);

    $shortcode = new fashe_product_shortcode_class($atts, 'featured_products');
    $products = $shortcode->fashe_get_query_results();

    ob_start();

        foreach ($products->ids as $product_id) {

            $GLOBALS['post'] = get_post($product_id); // WPCS: override ok.
            setup_postdata($GLOBALS['post']);

            // Render product template.
            get_template_part('content', 'product');
        }

    wp_reset_postdata();

   return ob_get_clean();
}

add_action('fashe_featured_products_right_bar','fashe_featured_products_right_bar');