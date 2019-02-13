<?php
add_action('fashe_product_loop_shop','fashe_product_loop_shop',10);

//
add_action('fashe_product_loop_home','fashe_product_loop_home',10);
//
add_action('fashe_categories_template_home','fashe_categories_template_home',10);
//
add_filter('fashe_recent_product_loop_home','fashe_recent_product_loop_home');

//
add_shortcode('fashe_woocommerce_short_code_shop','fashe_woocommerce_short_code_shop');

//Paginate in Shop or Blog

add_action('fashe_paginate_ajax','fashe_paginate_ajax');
//
add_action('fashe_woocommerce_pagination','fashe_woocommerce_pagination');
//
add_action('fashe_woocommerce_orderby','fashe_woocommerce_orderby');

//
add_action('fashe_get_price_html','fashe_get_price_html');

//

add_filter('fashe_load_post_index','fashe_load_post_index');
