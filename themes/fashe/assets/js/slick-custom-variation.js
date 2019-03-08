
/*
    *JS File created by Dang Sy Hao
 */

$(document).ready(function () {

        var variation_data = $('form.variations_form').attr('data-product_variations');
            variation_data = (typeof variation_data !== 'undefined') ? $.parseJSON(variation_data) : '' ;
        var num_selected = 0 ;
        var num_variation_dot = $('ul.slick3-dots li').length;

        // Reset Slick Function .
        function slick_init(){

            $('.slick3').slick('unslick');

            $('.slick3').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                dots: true,
                appendDots: $('.wrap-slick3-dots'),
                dotsClass:'slick3-dots',
                infinite: true,
                autoplay: false,
                autoplaySpeed: 6000,
                arrows: true,
                customPaging: function(slick, index) {
                    var portrait = $(slick.$slides[index]).data('thumb');
                    return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                },
            });

        } // End-function .

        // Call click event .
        $('div.variations').on('change', function(){

            //Get attributes of get variation product.
            var variation_attr = [];

            $("select[class = 'selection-2 select2-hidden-accessible' ]").each(function(i){
                variation_attr[i] = $(this).attr('data-attribute_name');
            });

            //Get values of get variation product.
            var variation_val = [] ;

            $('.selection-2 > option:selected').each(function(i){
                variation_val[i] = typeof ($(this).val() !== 'undefined') ? $(this).val() : '';
            });

            var variation_length = variation_attr.length;
            var check_attr = [] ;
            var check = [] ;

            // Check out
            $.each(variation_data,function(index) {

                for (var attr_i = 0; attr_i < variation_length; attr_i++){

                    if(variation_data[index]['attributes'][variation_attr[attr_i]] === variation_val[attr_i] && variation_val[attr_i] !== ''){

                        check_attr[index+'_'+[variation_attr[attr_i]]] = 'true' ;

                    }else{

                        check_attr[index+'_'+[variation_attr[attr_i]]] = 'false' ;
                    }

                    if(check_attr[ index+'_'+[variation_attr[attr_i]] ] === 'false'){

                        check[index] = 'false';
                    }
                }

                if(check[index] !== 'false'){

                    check[index] = 'true';
                }

            });

            var obj_key ='';

            // Get all results
            $.each( check , function (index ,value) {

                if(value === 'true' ){

                    obj_key = index ;
                }

            });

            var variation_html_info = '<p>Sorry, this product is unavailable. Please choose a different combination !</p>';

            if( obj_key !== ''){

                num_selected ++;

                variation_html_info ='<table class="table">' ;
                variation_html_info += (typeof variation_data[obj_key]['price_html'] !== 'undefined' ) ? '<tr><td>Price</td><td><p>'+variation_data[obj_key]['price_html']+'</p></td></tr>' : '' ;
                variation_html_info += (typeof variation_data[obj_key]['sku'] !== 'undefined' ) ? '<tr><td>SKU</td><td><p>'+variation_data[obj_key]['sku'] +'</p></td></tr>' : '' ;
                variation_html_info += (typeof variation_data[obj_key]['variation_description'] !== 'undefined' ) ? '<tr><td>Variation Description</td><td><p>'+variation_data[obj_key]['variation_description'] +'</p></td></tr>' : '' ;
                variation_html_info += (typeof variation_data[obj_key]['weight_html'] !== 'undefined' ) ? '<tr><td>Weight</td><td><p>'+variation_data[obj_key]['weight_html'] +'</p></td></tr>' : '' ;
                variation_html_info += '</table>' ;

                var img_product_w = variation_data[obj_key]['image']['src_w'] ;
                var img_product_h = variation_data[obj_key]['image']['src_h'] ;
                var img_product_src = variation_data[obj_key]['image']['src'] ;
                var img_product_srcset = variation_data[obj_key]['image']['srcset'] ;
                var img_product_title = variation_data[obj_key]['image']['title'] ;
                var img_product_thumb = variation_data[obj_key]['image']['gallery_thumbnail_src'] ;

                // Show current image sellectd from Form .
                var variation_html_img = '' ;
                variation_html_img += '<div data-thumb="'+img_product_thumb+'" class="item-slick3 slick-slide" >' ;
                variation_html_img += '<div class ="wrap-pic-w">';
                variation_html_img += '<img src="'+img_product_src+'" title="'+img_product_title+'" >';
                variation_html_img += '</div>';
                variation_html_img += '</div>';

                // Keep the pictures Variation in true place .
                if(num_selected > 1) {
                    $('div.slick3').slick('slickRemove',num_variation_dot);
                }

                $('div.slick3').slick('slickAdd',variation_html_img);
                $('div.slick3').slick('slickGoTo', 'slickCurrentSlide' - 1);

            }

            // Output Html resutls.
            $('div.variation-product-desc').html(variation_html_info);
            // Hidden reset button .
            $('button.variation-reset-btn').attr('hidden' ,false) ;


        });//End Click Event .

        // Call Reset Event .
        $('button.variation-reset-btn').click(function(){

            // Reset Form field , reset select2 values .
            $('form.variations_form')[0].reset();
            $('.select2-hidden-accessible').val(null).trigger("change");

            // Close variation information .
            $('div.variation-product-desc').html(null);

            // Remove Image variation current.
            if( num_selected > 0 ){

                $('div.slick3').slick('slickRemove',num_variation_dot);
            }

            num_selected = 0 ;

            // Restart Slick .
            slick_init() ;

            // Hidden reset button after seleted.
            $(this).attr('hidden' , true) ;
        });

    });


