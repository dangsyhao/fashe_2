
<?php

    if(count($category) < 1 ){
        return '' ;
    }
    $total_category_max = 5 ;
    $total_category_limit = count($category) > $total_category_max ? $total_category_max : count($category) ;
    $cat_per_section = 2;
    //section is 2 categories on a column
    $total_section = ceil($total_category_limit / $cat_per_section);
    $total_section_max = 3 ;
    $total_section_limit = ($total_section > $total_section_max) ? $total_section_max : $total_section ;
?>

<?php for($section = 1;$section <= $total_section_limit;$section++):?>
    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
        <?php $item_start=($section - 1)*$cat_per_section ?>
        <?php for($j=$item_start;$j<$item_start+$cat_per_section;$j++): ?>
            <?php if($category[$j]->term_id):?>
                <!-- Blog -->
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <?php $item_category=$category[$j];

                    do_action('fashe_woocommerce_subcategory_thumbnail',$item_category);
                    ?>
                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="<?php echo "/shop?query_cat_name=".$category[$j]->name ;?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            <?= $category[$j]->name; ?>
                        </a>
                    </div>
                </div>
            <?php else:?>
            <!--Sing Up-->
                <?php if(!is_user_logged_in()): ?>

                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img src="<?= ASSETS_PATH;?>images/icons/bg-01.jpg" alt="IMG">
                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                <?php _e('Sign up &amp; get 20% off','fashe');?>
                            </h4>
                            <p class="t-center w-size4">
                                <?php _e('Be the fist to know about the latest fashion news and get exclu-sive offers','fashe');?>
                            </p>
                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="<?= get_bloginfo('url').'/my-account';?>" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                    <?php _e('Sign Up','fashe'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php else:?>
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img src="<?= ASSETS_PATH;?>images/icons/bg-01.jpg" alt="IMG">
                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                <?php _e('See you next time !','fashe');?>
                            </h4>

                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="<?php echo wp_logout_url( home_url() ); ?>" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                    <?php _e('Sign Out','fashe'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endif ;?>
                <?php break;?>

            <?php endif;?>

        <?php endfor;?>
    </div>
<?php endfor;?>