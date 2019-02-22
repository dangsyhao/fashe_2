<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

    <div class="flex-sb-m flex-w p-b-35">
        <div class="flex-w">
            <!-- Price -->
<!--            <form  class="woocommerce-ordering" method="get" >-->
                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                    <select id="orderby_filters" class="selection-2 select2-hidden-accessible orderby_filters" name="orderby" tabindex="-1" aria-hidden="true">
                        <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
                            <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
<!--            </form>-->
            <!-- Price -->
<!--            <form  class="woocommerce-ordering" method="get" >-->
                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                    <select id="orderby_price" class="selection-2 select2-hidden-accessible" name="orderby_price" tabindex="-1" aria-hidden="true">

                        <?php

                            $min_price= 0;
                            $max_price = 200;
                            $delta_price = 50;
                            $min_price_html = number_format_i18n($min_price,2);
                            $max_price_html  = number_format_i18n($max_price,2);

                            for ($i = -1 ;$i <= ceil($max_price/$delta_price); $i++):

                                $first_price = $i*$delta_price;
                                $second_price = ($i+1)*$delta_price;
                                $first_price_html = number_format_i18n( $first_price,2) ;
                                $second_price_html = number_format_i18n( $second_price,2) ;
                                $arr_price = array($first_price,$second_price);
                                $json_price = json_encode($arr_price);

                        ?>
                           <?php
                                if($i == -1){
                                    ?>
                                     <option <?php echo isset($_POST['price']) ? 'selected = "selected"' : ''?> >Price</option>
                                    <?php

                                }else{
                                    ?>
                                    <option value="<?php echo $json_price ;?>" <?php echo (isset($_POST['price']) && $_POST['price'] == $first_price) ? ' selected ="selected" ' :'' ;?> >
                                        <?php echo $first_price === $max_price ? '$'.$max_price_html.'+' : '$'.$first_price_html.' - '.'$'.$second_price_html ;?>
                                    </option>
                                    <?php
                                }

                                ?>


                        <?php endfor;?>
                    </select>
                </div>

<!--            </form>-->

        </div>

        <!-- Show results -->
        <span class="s-text8 p-t-5 p-b-5">
                    <?php
//                    if ( $total <= $per_page || -1 === $per_page ) {
//                        /* translators: %d: total results */
//                        printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
//                    } else {
//                        $first = ( $per_page * $current ) - $per_page + 1;
//                        $last  = min( $total, $per_page * $current );
//                        /* translators: 1: first result 2: last result 3: total results */
//                        printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
//                    }
                    ?>
            Showing all <span class="show_all_results"></span> results

        </span>
        <input type="hidden" name="paged" value="1" />
        <?php wc_query_string_form_fields( null, array('orderby', 'submit', 'paged', 'product-page' ) ); ?>
    </div>



