<?php

/*
 *
 */
function feshe_recent_product_loop_home( $atts ){
    $atts = array_merge( array(
        'limit'        => 12,
        'columns'      => 4,
        'orderby'      => 'date',
        'order'        => 'DESC',
        'category'     => '',
        'cat_operator' => 'IN',
    ), (array) $atts );

    $shortcode = new fashe_product_shortcode_class( $atts, 'recent_products' );
    return $shortcode->fashe_get_content();
}

/*
 *
 */

function fashe_product_categories_loop_home( $atts ) {
    if ( isset( $atts['number'] ) ) {
        $atts['limit'] = $atts['number'];
    }

    $atts = shortcode_atts( array(
        'limit'      => '-1',
        'orderby'    => 'term_id',
        'order'      => 'DESC',
        'columns'    => '4',
        'hide_empty' => 1,
        'parent'     => '',
        'ids'        => '',
    ), $atts, 'product_categories' );

    $ids        = array_filter( array_map( 'trim', explode( ',', $atts['ids'] ) ) );
    $hide_empty = ( true === $atts['hide_empty'] || 'true' === $atts['hide_empty'] || 1 === $atts['hide_empty'] || '1' === $atts['hide_empty'] ) ? 1 : 0;

    // Get terms and workaround WP bug with parents/pad counts.
    $args = array(
        'orderby'    => $atts['orderby'],
        'order'      => $atts['order'],
        'hide_empty' => $hide_empty,
        'include'    => $ids,
        'pad_counts' => true,
        'child_of'   => $atts['parent'],
    );

    $product_categories = get_terms( 'product_cat', $args );

    if ( '' !== $atts['parent'] ) {
        $product_categories = wp_list_filter( $product_categories, array(
            'parent' => $atts['parent'],
        ) );
    }

    if ( $hide_empty ) {
        foreach ( $product_categories as $key => $category ) {
            if ( 0 === $category->count ) {
                unset( $product_categories[ $key ] );
            }
        }
    }

    $atts['limit'] = '-1' === $atts['limit'] ? null : intval( $atts['limit'] );
    if ( $atts['limit'] ) {
        $product_categories = array_slice( $product_categories, 0, $atts['limit'] );
    }

    $columns = absint( $atts['columns'] );

    wc_set_loop_prop( 'columns', $columns );
    wc_set_loop_prop( 'is_shortcode', true );

    ob_start();

    if ( $product_categories ) {
        woocommerce_product_loop_start();

        wc_get_template( 'content-product_cat.php', array(
            'category' => $product_categories,
        ) );

        woocommerce_product_loop_end();
    }

    woocommerce_reset_loop();

    return ob_get_clean();
}

/**
 * List products in a category shortcode.
 *
 * @param array $atts Attributes.
 * @return string
 */
function fashe_woocommerce_product_category( $atts ) {

    if ( empty( $atts['category'] ) ) {
       return '';
    }

    $atts = array_merge( array(
        'per_page'     => 6,
        'orderby'      => 'menu_order title',
        'order'        => 'ASC',
        'category'     => '',
        'cat_operator' => 'AND',
        'paginate'     =>true
    ), (array) $atts );

    $shortcode = new fashe_product_shortcode_class( $atts, 'product_category' );

    return $shortcode->fashe_get_content();
}

/**
 * Show Short Code Product.
 */

function fashe_woocommerce_short_code_shop($atts) {


    $atts = shortcode_atts( array(
        'per_page'     => 6,
        'cat_operator' => 'AND',
        'paginate'      =>true,
        'html'        =>'<div class="row">'
    ), $atts);

    $shortcode = new fashe_product_shortcode_class( $atts);

    return $shortcode->fashe_get_content();
}