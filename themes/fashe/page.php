<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */
get_header();

if(is_page('shop' )){

    //
    get_template_part('template-parts/page/page/page-default');



}else{

    while (have_posts()){
        the_post();
        the_content();

    }
}


get_footer();
?>