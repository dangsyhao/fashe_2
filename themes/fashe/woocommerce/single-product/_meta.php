<?php

global $product;
?>
<div class="p-b-45">

<?php do_action( 'woocommerce_product_meta_start' ); ?>

    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

        <span class="s-text8 m-r-35"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

    <?php endif; ?>

    <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="s-text8">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

    <?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="s-text8">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

    <?php do_action( 'woocommerce_product_meta_end' ); ?>


</div>