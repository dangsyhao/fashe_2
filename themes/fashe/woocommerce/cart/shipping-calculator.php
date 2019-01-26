<?php
/**
 * Shipping Calculator
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/shipping-calculator.php.
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

do_action( 'woocommerce_before_shipping_calculator' ); ?>

<span class="s-text19">Calculate Shipping</span>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

    <?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_country', true ) ) : ?>

        <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
				<select name="calc_shipping_country"  class="selection-2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
					<option value=""><?php esc_html_e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
					<?php
					foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
						echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
					}
					?>
				</select>
        </div>

		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) : ?>
				<?php
				$current_cc = WC()->customer->get_shipping_country();
				$current_r  = WC()->customer->get_shipping_state();
				$states     = WC()->countries->get_states( $current_cc );

				if ( is_array( $states ) && empty( $states ) ) {
					?>
					<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>" />
					<?php
				} elseif ( is_array( $states ) ) {
					?>
					<span>
						<select name="calc_shipping_state" class="state_select" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'woocommerce' ); ?>">
							<option value=""><?php esc_html_e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
							<?php
							foreach ( $states as $ckey => $cvalue ) {
								echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
							}
							?>
						</select>
					</span>
					<?php
				} else {
					?>
                    <div class="size13 bo4 m-b-12">
                        <input  class="sizefull s-text7 p-l-15 p-r-15" type="text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="State /  country" name="calc_shipping_state" id="calc_shipping_state" />
                    </div>
					<?php
				}
				?>
		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) : ?>
            <div class="size13 bo4 m-b-12">
				<input class="sizefull s-text7 p-l-15 p-r-15" type="text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'woocommerce' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
			</div>
		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>
            <div class="size13 bo4 m-b-12">
				<input class="sizefull s-text7 p-l-15 p-r-15" type="text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'woocommerce' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
			</div>
		<?php endif; ?>

        <div class="size14 trans-0-4 m-b-10">
            <button type="submit" name="calc_shipping" value="1" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"><?php esc_html_e( 'Update Totals', 'woocommerce' ); ?></button>
        </div>
		<?php wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>

</form>

<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>
