<?php
/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://codex.wordpress.org/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

defined( 'ABSPATH' ) || exit;

?>
<script type="text/template" id="tmpl-variation-template">
	<div class="woocommerce-variation-description dropdown-content dis-none p-t-15 p-b-23">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price dropdown-content dis-none p-t-15 p-b-23">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability dropdown-content dis-none p-t-15 p-b-23">{{{ data.variation.availability_html }}}</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'woocommerce' ); ?></p>
</script>
