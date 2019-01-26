<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
        <form  action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">

                    <table class="table-shopping-cart">
                        <thead>
                            <tr class="table-head">
                                <th class="column-1">&nbsp;</th>
                                <th class="column-2"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                                <th class="column-3"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                                <th class="column-4"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                                <th class="column-5"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                        <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                ?>
                                <tr class="table-row">

                                    <td class="column-1">
                                    <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('fashe-product-cart-thumbnail'), $cart_item, $cart_item_key );


                                    if ( ! $product_permalink ) {
                                        echo $thumbnail; // PHPCS: XSS ok.
                                    } else {
                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s"><div class="cart-img-product b-rad-4 o-f-hidden" >%s</div></a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key )),
                                            $thumbnail
                                        ), $cart_item_key );
                                    }
                                    ?>
                                    </td>

                                    <td class="column-2" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                    <?php
                                    if ( ! $product_permalink ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                    } else {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                    }

                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                    // Meta data.
                                    echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                    // Backorder notification.
                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                    }
                                    ?>
                                    </td>

                                    <td class="column-3" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                        <?php
                                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>

                                    <td class="column-4" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">

                                        <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input( array(
                                            'input_name'   => "cart[{$cart_item_key}][qty]",
                                            'input_value'  => $cart_item['quantity'],
                                            'max_value'    => $_product->get_max_purchase_quantity(),
                                            'min_value'    => '0',
                                            'product_name' => $_product->get_name(),
                                        ), $_product, false );
                                    }

                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );// PHPCS: XSS ok.
                                    ?>

                                    </td>

                                    <td class="column-5" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                        <?php
                                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>

                </div>

            </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">

            <?php if ( wc_coupons_enabled() ) { ?>

            <div class="flex-w flex-m w-full-sm">
                <div class="size11 bo4 m-r-10">
                    <input type="text" name="coupon_code" class="sizefull s-text7 p-l-22 p-r-22" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                </div>
                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
                </div>

                <?php do_action( 'woocommerce_cart_coupon' ); ?>

            </div>
            <?php } ?>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
            </div>
                <?php do_action( 'woocommerce_cart_actions' ); ?>
                <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
        </div>
     </form>



        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
        <?php
            /**
             * Cart collaterals hook.
             *
             * @hooked woocommerce_cross_sell_display
             * @hooked woocommerce_cart_totals - 10
             */
            do_action( 'woocommerce_cart_collaterals' );
        ?>
        </div>


    <!-- End Container-->
    </div>

</section>
