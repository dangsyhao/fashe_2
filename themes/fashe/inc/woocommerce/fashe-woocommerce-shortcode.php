<?php

/*
 *
 */
function feshe_recent_product_loop_home( $atts ){
    $atts = array(
        'limit'        => 12,
        'columns'      => 4,
        'orderby'      => 'date',
        'order'        => 'DESC',
        'category'     => '',
        'cat_operator' => 'IN',
    );

    $shortcode = new fashe_product_shortcode_class( $atts) ;
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

    ob_start();

    if ( $product_categories ) {
        woocommerce_product_loop_start();

        wc_get_template( 'content-product_cat.php', array(
            'category' => $product_categories,
        ) );

        woocommerce_product_loop_end();
    }

    return ob_get_clean();
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

    $query_cat_name = isset($_GET['query_cat_name']) ? $_GET['query_cat_name'] : '';
?>


    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            var paged_default = "<?php echo $atts['page']?>";
            var posts_per_page = "<?php echo $atts['per_page'];?>";
            var query_cat_name = "<?php echo $query_cat_name ;?>"
            var paged = paged_default;
            var orderby ;
            var price;
            var query_keyword;
            var query_product_color;
            var filter_by_cat;

            // Load Products Function .
            function load_products_ajax(page_default) {

                /** Get data-page */
                var paged_ajax = (page_default === false) ? paged : paged_default;
                var orderby_ajax = (page_default === false) ? orderby : 'popularity';
                var price_ajax = (page_default === false) ? price : '';
                var query_keyword_ajax = (page_default === false) ? query_keyword : '';
                var query_product_color_ajax = (page_default === false) ? query_product_color : '';
                var filter_by_cat_ajax = (page_default === false) ? filter_by_cat : '';
                //get Product if have choose category from home page .
                if( query_cat_name !== '') filter_by_cat_ajax = query_cat_name ;

                /** Ajax Call */
                $.ajax({
                    cache: false,
                    url: svl_array_ajaxp.admin_ajax,
                    type: "POST",
                    data: ({
                        action: 'LoadProductPagination',
                        paged: paged_ajax,
                        posts_per_page: posts_per_page,
                        orderby: orderby_ajax,
                        price: price_ajax,
                        query_keyword: query_keyword_ajax,
                        query_product_color: query_product_color_ajax,
                        filter_by_cat : filter_by_cat_ajax
                    }),
                    beforeSend: function () {
                    },
                    success: function (data, textStatus, jqXHR) {

                        $('#load_ajax_shop_product').html(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('The following error occured: ' + textStatus, errorThrown);
                    },
                    complete: function (jqXHR, textStatus) {

                        //Show total results after Loaded ajax product .
                        var total_results = $('div.product_results').attr('data-total-results');
                        $('span.show_all_results').html(total_results);
                    }

                });

            }//End function

            //Load Page Default .
            load_products_ajax(page_default = true);

            //Load Product filters by orderby box
            $('#orderby_filters').change(function () {

                orderby = $('#orderby_filters option:selected').attr('value');
                load_products_ajax(page_default = false);
            });

            //Load Product filters by Price box
            $('#orderby_price').change(function () {

                //Set Price filter Bar .
                var price_filter_box = $('#orderby_price option:selected').attr('value');
                price_filter_box = (typeof price_filter_box !== 'undefined') ? $.parseJSON(price_filter_box) : '';
                price = price_filter_box;

                load_products_ajax(page_default = false);

                // Reset noUI Slide
                jQuery('#filter-bar')[0].noUiSlider.reset();

            });

            //Load page with Pagination
            $('#load_ajax_shop_product').on('click', '#paginative_product_ajax a', function () {
                paged = $(this).attr('data-page');
                console.log('Jquery',paged);
                load_products_ajax(page_default = false);
            });

            //Load page with Search Product
            $('#left-bar-search-product').on('keyup', function () {
                query_keyword = $('#left-bar-search-product').val() ;
                load_products_ajax(page_default = false);
            });

            //Load page with Pagination
            $("#filter-product-color").on("click", 'input.checkbox-color-filter', function () {

                var box = $(this);
                box.attr('name', 'notCheck');

                if (box.is(":checked")) {
                    var group = "input:checkbox[name='" + box.attr("name") + "']";
                    $(group).prop("checked", false);
                    box.prop("checked", true);
                }

                query_product_color = $( "input.checkbox-color-filter:checked" ).val();

                load_products_ajax(page_default = false);

            });

            //Load page with Pagination
            $('#price-noui-filter-button').on('click', function () {

                var price_lower = $('#value-lower').text();
                var price_upper = $('#value-upper').text();
                price = [price_lower, price_upper];

                load_products_ajax(page_default = false);

                //Reset Filter Price by Price box
                $('#orderby_price option:first').prop('selected', true);
                $('span.select2-selection__rendered').text('Price');
            });

            //Load page with Pagination
            $('#get_product_cat_ajax li').on('click', function () {

                filter_by_cat = $(this).attr('value');

                load_products_ajax(page_default = false);

            });

        })//End javascript

    </script>


<?php
}