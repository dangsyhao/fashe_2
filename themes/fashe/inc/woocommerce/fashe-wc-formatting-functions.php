<?php
/**
 * Simple Product Class.
 *
 * The default product type kinda product.
 *
 * @package WooCommerce/Classes/Products
 */

defined( 'ABSPATH' ) || exit;

//---------------------------------------------------------------------

/**
 * Format a price range for display.
 */
function fashe_wc_format_price_range( $from, $to , $args = array() ) {
    /* translators: 1: price from 2: price to */
    $price = sprintf( _x( '%1$s &ndash; %2$s', 'Price range: from-to', 'woocommerce' ), is_numeric( $from ) ? fashe_wc_price( $from,$args ) : $from, is_numeric( $to ) ? fashe_wc_price( $to,$args ) : $to );
    return apply_filters( 'woocommerce_format_price_range', $price, $from, $to );
}


/**
 * Format a sale price for display.
 */
function fashe_wc_format_sale_price( $regular_price, $sale_price,$args = array() ) {

    $args = apply_filters(
        'wc_price_args', wp_parse_args(
            $args, array(
                'sale_price_tag_sale'       => '<span>',
                'sale_price_tag_regular'    => '<span>',
                'get_price_sale'            => true,
                'price_tag'                 => ''
            )
        )
    );

    if($args['get_price_sale'] === false ) {

        $price = $args['price_tag'] . ( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price,$args ) : $sale_price ).'</span>';

    }else{

        $price = '<del>'.$args['sale_price_tag_regular'] . ( is_numeric( $regular_price ) ? fashe_wc_price( $regular_price,$args ) : $regular_price ) . '</span></del>&nbsp;'.$args['sale_price_tag_sale'] . ( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price,$args ) : $sale_price ).'</span>';

    }

    return apply_filters( 'woocommerce_format_sale_price', $price, $regular_price, $sale_price );
}

/*
 * wc_price
 */

function fashe_wc_price( $price, $args = array() ) {

    global $product;

    $args = apply_filters(
        'wc_price_args', wp_parse_args(
            $args, array(
                'ex_tax_label'          => false,
                'currency'              => '',
                'decimal_separator'     => wc_get_price_decimal_separator(),
                'thousand_separator'    => wc_get_price_thousand_separator(),
                'decimals'              => wc_get_price_decimals(),
                'price_format'          => get_woocommerce_price_format(),
                'price_tag'             => '<span>',
                'get_price_sale'        => true
            )
        )
    );

    $unformatted_price = $price;
    $negative          = $price < 0;
    $price             = apply_filters( 'raw_woocommerce_price', floatval( $negative ? $price * -1 : $price ) );
    $price             = apply_filters( 'formatted_woocommerce_price', number_format( $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] ), $price, $args['decimals'], $args['decimal_separator'], $args['thousand_separator'] );

    if ( apply_filters( 'woocommerce_price_trim_zeros', false ) && $args['decimals'] > 0 ) {
        $price = wc_trim_zeros( $price );
    }

    $formatted_price = ( $negative ? '-' : '' ) . sprintf( $args['price_format'], '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol( $args['currency'] ) . '</span>', $price );

    // set tag block
    $tag_close = fashe_get_tag_close($args['price_tag']);


    if($product->is_on_sale() && $product->get_type() === 'simple'){

        $return          = $formatted_price;

    }else{
        $return          = $args['price_tag'] . $formatted_price . $tag_close;
    }

    if ( $args['ex_tax_label'] && wc_tax_enabled() ) {
        $return .= ' <small class="woocommerce-Price-taxLabel tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
    }

    /**
     * Filters the string of price markup.
     *
     * @param string $return            Price HTML markup.
     * @param string $price             Formatted price.
     * @param array  $args              Pass on the args.
     * @param float  $unformatted_price Price as float to allow plugins custom formatting. Since 3.2.0.
     */
    return apply_filters( 'wc_price', $return, $price, $args, $unformatted_price );
}


/**
 * Get template Price Products.
 */

 function fashe_get_price_html( $deprecated = '',$args=array()) {
     global $product;

    if($product->get_type() === 'variable'){

        $prices = $product->get_variation_prices( true );

        if ( empty( $prices['price'] ) ) {

            $price = apply_filters( 'woocommerce_variable_empty_price_html', '', $product );

        } else {

            $min_price     = current( $prices['price'] );
            $max_price     = end( $prices['price'] );
            $min_reg_price = current( $prices['regular_price'] );
            $max_reg_price = end( $prices['regular_price'] );

            if ( $min_price !== $max_price) {
                $price = fashe_wc_format_price_range( $min_price, $max_price, $args );
            } elseif ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) {
                $price = fashe_wc_format_sale_price( fashe_wc_price( $max_reg_price ,$args ), fashe_wc_price( $min_price,$args ) );
            } else {
                $price = fashe_wc_price( $min_price,$args );
            }
            $price = apply_filters( 'woocommerce_variable_price_html', $price . $product->get_price_suffix(), $product );
        }

    }else{

        if ( '' === $product->get_price() ) {
            $price = apply_filters( 'woocommerce_empty_price_html', '', $product );
        } elseif ( $product->is_on_sale() ) {
            $price = fashe_wc_format_sale_price( wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ), wc_get_price_to_display( $product ),$args ) . $product->get_price_suffix();
        } else {
            $price = fashe_wc_price( wc_get_price_to_display( $product ),$args) . $product->get_price_suffix();
        }

    }

     return apply_filters( 'woocommerce_get_price_html', $price, $product );

}
