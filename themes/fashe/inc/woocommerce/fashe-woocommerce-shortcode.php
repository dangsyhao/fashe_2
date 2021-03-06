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

    // Get terms and workaround WP bug with parents/pad counts.
    $args = array(
        'limit'      => '-1',
        'orderby'    => 'count',
        'order'      => 'DESC',
        'hide_empty' => 1,
        'parent'     => '',
        'ids'        => '',
    );

    $product_categories = get_terms( 'product_cat', $args );

    if ( '' !== $atts['parent'] ) {
        $product_categories = wp_list_filter( $product_categories, array(
            'parent' => $atts['parent'],
        ) );
    }

    $atts['limit'] = '-1' === $atts['limit'] ? null : intval( $atts['limit'] );
    if ( $atts['limit'] ) {
        $product_categories = array_slice( $product_categories, 0, $atts['limit'] );
    }

    ob_start();

    if ( $product_categories ) {
        woocommerce_product_loop_start();

        wc_get_template( 'template-parts/blocs/sub-category.php', array(
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

    $query_cat_name = isset($_GET['query_cat_name']) ? wc_clean( wp_unslash( $_GET['query_cat_name'])) : '';
?>

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
                        // if no Product loaded .
                        if(parseInt(total_results) === 0) {
                            var results_html = '<div class ="row">';
                            results_html +='<span > Product not found ! </span>' ;
                            results_html += '</div>' ;

                            $('#load_ajax_shop_product').html(results_html) ;
                        }
                    }
                });

            }//End function

            //Load Page Default .
            load_products_ajax(page_default = true);
            // Load Page Default if Click Reset Button .
            $('button.reset-filter-shoppage-button').click(function(){
                window.location.href = "<?php echo get_bloginfo('url').'/shop' ;?>" ;
            });

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

            //Load page with Filter by color
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

            //Load page with Filter by Price (noUI Style)
            $('#price-noui-filter-button').on('click', function () {

                var price_lower = $('#value-lower').text();
                var price_upper = $('#value-upper').text();
                price = [price_lower, price_upper];

                load_products_ajax(page_default = false);

                //Reset Filter Price by Price box
                $('#orderby_price option:first').prop('selected', true);
                $('span.select2-selection__rendered').text('Price');
            });

            //Load page with Fillter by Category .
            $('#get_product_cat_ajax li.p-t-4').each(function () {
                $(this).click(function () {
                    //If isset category query by $_GET ..then Clear it .
                    if(typeof query_cat_name !== "undefined" && query_cat_name !== '' ){
                        var uri = window.location.toString();
                        if (uri.indexOf("?") > 0) {
                            var clean_uri = uri.substring(0, uri.indexOf("?"));
                            window.history.replaceState({}, document.title, clean_uri);
                        }
                        query_cat_name = '' ;
                    }
                    //Filter and Load Product .
                    filter_by_cat = $(this).attr('value');
                    load_products_ajax(page_default = false);
                    // Set Current Style for Product .
                    $('#get_product_cat_ajax li.p-t-4 a').removeClass('active1');
                    $(this).children().addClass('active1');
                });
            });

            // Set Style for Category if call by $_GET .
            if(typeof query_cat_name !== "undefined" && query_cat_name !== '' ){
                $('#get_product_cat_ajax li.p-t-4 a').removeClass('active1');
                $('#get_product_cat_ajax li[value="'+query_cat_name+'"]').children().addClass('active1');
            }

        })//End Jquery .

    </script>


<?php
}