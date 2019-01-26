<?php


if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

$attachment_ids[]=$post_thumbnail_id;

$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
    'woocommerce-product-gallery--columns-' . absint( $columns ),
    'images',
) );
?>

<div class="w-size13 p-t-30 respon5">
    <div class="wrap-slick3 flex-sb flex-w">
        <div class="wrap-slick3-dots"></div>

        <div class="slick3 <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
                <?php

                foreach (array_reverse($attachment_ids) as $attachment_id){
                    $html = fashe_wc_get_gallery_image_html( $attachment_id, true );
                    echo $html;
                }

                ?>
        </div>
    </div>
</div>
