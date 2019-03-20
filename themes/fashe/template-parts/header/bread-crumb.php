
<?php
    global $post ;

    $home_page_name = 'Home' ;
    $home_slug = '<a href="'.get_home_url().'" class="s-text16">
                    '.$home_page_name.'
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                 </a>' ;

    $page_name ='';
    $category_name = '';

    if(is_single()){
        $page_name = 'blog';
        $cat_post_obj = get_the_terms( $post->ID, 'category' )[0];
        $category_name =$cat_post_obj->name;
        $category_link = get_category_link($cat_post_obj) ;
    }

    if(is_product()){
        $page_name = 'shop' ;
        $cat_product_obj = get_the_terms( $post->ID, 'product_cat' )[0];
        $category_name = $cat_product_obj->name;
        $category_link = get_category_link( $cat_product_obj);
    }

    $cat_slug = '<a href="'.$category_link.'" class="s-text16">
                    '.$category_name.'
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                 </a>' ;

    $page_slug = '<a href="/'.$page_name.'" class="s-text16">
                    '.$page_name.'
                    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
                 </a>' ;

    $post_title = $post->post_title ;

    $post_slug = '<a href="'.get_permalink($post->ID).'" class="s-text17">
                    '.$post_title.'
                  </a>' ;
?>

<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
    <?php echo $home_slug.$page_slug.$cat_slug.$post_slug ;?>
</div>


