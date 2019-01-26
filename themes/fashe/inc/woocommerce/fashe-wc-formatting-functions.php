<?php
/**
 * Simple Product Class.
 *
 * The default product type kinda product.
 *
 * @package WooCommerce/Classes/Products
 */

defined( 'ABSPATH' ) || exit;

/**
 * Format a price range for display.
 */
function fashe_wc_format_price_range( $from, $to ) {
    /* translators: 1: price from 2: price to */
    $price = sprintf( _x( '%1$s &ndash; %2$s', 'Price range: from-to', 'woocommerce' ), is_numeric( $from ) ? fashe_wc_price( $from ) : $from, is_numeric( $to ) ? fashe_wc_price( $to ) : $to );
    return apply_filters( 'woocommerce_format_price_range', $price, $from, $to );
}
/**
 * Format a sale price for display.
 *
 */
function fashe_wc_format_sale_price( $regular_price, $sale_price ) {

    global $product;
    if($product->get_type() ==='variation'){

        if(is_single()){

            $price = '<del>'. ( is_numeric( $regular_price ) ? fashe_wc_price( $regular_price ) : $regular_price ) . '</del>'
                .'&nbsp;'.( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price ) : $sale_price );

        }else{

            $price = '<span class="block2-oldprice m-text7 p-r-5">' . ( is_numeric( $regular_price ) ? fashe_wc_price( $regular_price ) : $regular_price ) . '</span>'
                .'<span class="block2-newprice m-text8 p-r-5">'. ( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price ) : $sale_price ).'</span>';
        }

    }else{

        if(is_single()){

            $price = '<del><span class="m-text17">' . ( is_numeric( $regular_price ) ? fashe_wc_price( $regular_price ) : $regular_price ) . '</span></del>'
                .'&nbsp;'.'<span class="m-text17">' . ( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price ) : $sale_price ).'</span>';

        }else{

            $price = '<span class="block2-oldprice m-text7 p-r-5">' . ( is_numeric( $regular_price ) ? fashe_wc_price( $regular_price ) : $regular_price ) . '</span>'
                .'<span class="block2-newprice m-text8 p-r-5">'. ( is_numeric( $sale_price ) ? fashe_wc_price( $sale_price ) : $sale_price ).'</span>';
        }

    }

    return apply_filters( 'woocommerce_format_sale_price', $price, $regular_price, $sale_price );
}

/**
 * Format the price with a currency symbol.
 */

function fashe_wc_price( $price, $args = array() ) {
    global $product;

    $args = apply_filters(
        'wc_price_args', wp_parse_args(
            $args, array(
                'ex_tax_label'       => false,
                'currency'           => '',
                'decimal_separator'  => wc_get_price_decimal_separator(),
                'thousand_separator' => wc_get_price_thousand_separator(),
                'decimals'           => wc_get_price_decimals(),
                'price_format'       => get_woocommerce_price_format(),
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

    //Format template price by hao
    if($product->get_type() ==='variable'){

        if(is_single()){
            $return          = '<span class="m-text17">'.$formatted_price.'</span>';
        }else{
            $return          = '<span class="block2-price m-text6 p-r-5">'.$formatted_price.'</span>';
        }

    }else{//Default:product type is simple

        if($product->is_on_sale()){
            $return          = $formatted_price;
        }else{

            if(is_single()){
                $return          = '<span class="m-text17">'.$formatted_price.'</span>';
            }else{
                $return          = '<span class="block2-price m-text6 p-r-5">'.$formatted_price.'</span>';
            }
        }
    }

    if ( $args['ex_tax_label'] && wc_tax_enabled() ) {
        $return .= ' <small class="woocommerce-Price-taxLabel tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
    }

    /**
     * Filters the string of price markup.
     */
    return apply_filters( 'wc_price', $return, $price, $args, $unformatted_price );
}

/**
 * Get template Price Products.
 */

 function fashe_get_price_html( $deprecated = '' ) {
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
                $price = fashe_wc_format_price_range( $min_price, $max_price );
            } elseif ( $product->is_on_sale() && $min_reg_price === $max_reg_price ) {
                $price = fashe_wc_format_sale_price( fashe_wc_price( $max_reg_price ), fashe_wc_price( $min_price ) );
            } else {
                $price = fashe_wc_price( $min_price );
            }
            $price = apply_filters( 'woocommerce_variable_price_html', $price . $product->get_price_suffix(), $product );
        }

    }else{

        if ( '' === $product->get_price() ) {
            $price = apply_filters( 'woocommerce_empty_price_html', '', $product );
        } elseif ( $product->is_on_sale() ) {
            $price = fashe_wc_format_sale_price( wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) ), wc_get_price_to_display( $product ) ) . $product->get_price_suffix();
        } else {
            $price = fashe_wc_price( wc_get_price_to_display( $product ) ) . $product->get_price_suffix();
        }

    }

     return apply_filters( 'woocommerce_get_price_html', $price, $product );

}
