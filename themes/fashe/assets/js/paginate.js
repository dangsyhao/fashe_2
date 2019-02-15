/*******
 Author LeVanToan - https://levantoan.com
 *********/
// JavaScript Document


        //Load Post index .
        $(document).on( 'click','div.pagination a', function( e ) {
            /** Prevent Default Behaviour */
            //e.preventDefault();
            /** Get data-page */
            var data_page = $(this).attr( 'data-page' );
            var posts_per_page = $('.ajax_pagination').attr( 'posts_per_page' );
            var post_type = $('.ajax_pagination').attr( 'post_type' );

            /** Ajax Call */
            $.ajax({
                cache: false,
                url: svl_array_ajaxp.admin_ajax,
                type: "POST",
                dataType :"html",
                data: ({
                    action          :  'LoadPostPagination',
                    data_page    :  data_page,
                    posts_per_page    :  posts_per_page,
                    post_type    :  post_type
                }),
                beforeSend: function() {
                    //$( '.loading_ajaxp' ).css( 'display','block' );

                },
                success: function( data, textStatus, jqXHR ){
                    $( '#result_ajaxp' ).html( data );
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                },
                complete: function( jqXHR, textStatus ){
                    //
                }
            });
        });


