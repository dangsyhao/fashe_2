


    jQuery(document).ready(function($) {

        var page_default =1;

        // Load Products Function .
        function load_products_ajax(data_page) {
            var posts_per_page = 4;

            /** Ajax Call */
            $.ajax({
                cache: false,
                url: svl_array_ajaxp.admin_ajax,
                type: "POST",
                dataType: "html",
                data: ({
                    action: 'LoadProductPagination',
                    data_page: data_page,
                    posts_per_page: posts_per_page,
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

                }

            });

        }//End fucntion


        //Load Page Default .
        load_products_ajax(page_default);

        //Load page with Pagination
        $('body').on('click','div.pagination a',function (e) {

            e.preventDefault();

            var data_page = 1;

            load_products_ajax(data_page);

        });


    })//End javascript

