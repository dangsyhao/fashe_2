<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">

<?php

if ( $max_value && $min_value === $max_value ) {
	?>

    <div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	/* translators: %s: Quantity. */
	$labelledby = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'woocommerce' ), strip_tags( $args['product_name'] ) ) : '';
	?>
    <div class="flex-w bo5 of-hidden w-size17">
        <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
            <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
        </button>
		<input
			type="number"
			class="size8 m-text18 t-center num-product"
			step="<?php echo esc_attr( $step ); ?>"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			pattern="<?php echo esc_attr( $pattern ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
        />
        <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
            <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
</div>

<?php
}
