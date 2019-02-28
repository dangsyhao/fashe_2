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
        'per_page'     => '6',
        'page'  => 1,
        'paginate'      =>true
    ), $atts);

?>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var paged_default ="<?php echo $atts['page']?>";
            var posts_per_page = "<?php echo $atts['per_page'];?>";

            // Load Products Function .
            function load_products_ajax( paged_default , price) {

                /** Get data-page */
                 var paged = ( paged_default === false ) ? $('div.pagination a').attr('data-page') : 1 ;
                 var orderby = ( paged_default === false) ? $('#orderby_filters option:selected').attr('value') : 'popularity';

                 //Set Price filter Bar .
                 price = ( paged_default === false && typeof price !== 'undefined') ? price : '';

                 var query_keyword = ( paged_default === false) ? $('#left-bar-search-product').val() : '';
                 var query_product_color = ( paged_default === false) ? $( "input.checkbox-color-filter:checked" ).val() : '';

                /** Ajax Call */
                $.ajax({
                    cache: false,
                    url: svl_array_ajaxp.admin_ajax,
                    type: "POST",
                    data: ({
                        action: 'LoadProductPagination',
                        paged: paged,
                        posts_per_page: posts_per_page,
                        orderby : orderby,
                        price : price,
                        query_keyword : query_keyword,
                        query_product_color : query_product_color
                    }),
                    beforeSend: function () {
                },
                    success: function (data, textStatus, jqXHR) {

                        $('#load_ajax_shop_product').html(data);
                },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('The following error occured: ' + textStatus, errorThrown);
                },
                    complete: function (jqXHR, textStatus){

                        //Show total results after Loaded ajax product .
                        var total_results = $('div.product_results').attr('data-total-results');
                        $('span.show_all_results').html(total_results);
                }

                });

            }//End function

            //Load Page Default .
            load_products_ajax( paged_default = true );

            //Load Product filters by orderby box
            $('#orderby_filters').change(function() {

                load_products_ajax(paged_default = false);
            });

            //Load Product filters by Price box
            $('#orderby_price').change(function() {

                var price_filter_box = $('#orderby_price option:selected').attr('value');
                var price = ( typeof price_filter_box !== 'undefined') ? $.parseJSON(price_filter_box) : '' ;

                load_products_ajax(paged_default = false , price );

                // Reset noUI Slide
                jQuery('#filter-bar')[0].noUiSlider.reset();

            });


            //Load page with Pagination
            $('#load_ajax_shop_product').on('click', 'div.pagination a', function () {

                load_products_ajax();
            })

            //Load page with Search Product
            $('#left-bar-search-product').on('keyup',function () {

                load_products_ajax(paged_default = false);

            });

            //Load page with Pagination
            $( "#filter-product-color" ).on( "click",'input.checkbox-color-filter',function() {

                var box = $(this);
                box.attr('name','notCheck');

                if (box.is(":checked"))
                {
                    var group = "input:checkbox[name='" + box.attr("name") + "']";
                    $(group).prop("checked", false);
                    box.prop("checked",true);
                }

                load_products_ajax(paged_default = false);

            });


            //Load page with Pagination
            $('#price-noui-filter-button').on('click',function () {

                var price_lower = $('#value-lower').text();
                var price_upper = $('#value-upper').text();
                var price = [price_lower,price_upper];

                load_products_ajax(paged_default = false , price );

                //Reset Filter Price by Price box
                $('#orderby_price option:first').prop('selected',true);
                $('span.select2-selection__rendered').text('Price');
            })


        })//End javascript

    </script>


<?php
}