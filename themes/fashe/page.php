<?php
/**
 * The template for displaying all pages.
 */
get_header();
?>
    <!--Load Title -Banner-->
    <?php if (!is_front_page() || !is_home()){
        get_template_part('template-parts/blocs/title-banner');
    }
    ?>
    <!--Load shop page-->
    <?php if(is_page('shop') || is_shop()):?>
        <section class="bgwhite p-t-55 p-b-65">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                        <?php get_template_part('template-parts/blocs/left-bar/left-bar');?>
                    </div>
                    <!-- Product -->
                    <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                        <?php do_action('fashe_woocommerce_orderby'); ?>
                        <div id="load_ajax_shop_product" >
                            <?php while (have_posts()):the_post();?>
                                <?php the_content();?>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( is_checkout() || is_user_logged_in() || is_account_page() ):?>
        <section class="cart bgwhite p-t-70 p-b-100">
            <div class="container">
            <!--My Html-->
                <?php while (have_posts()):the_post();?>
                    <?php the_content(); ?>
                <?php endwhile;?>
            </div>
        </section>
    <?php else: ?>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div id="result_ajaxp" class="col-md-8 col-lg-9 p-b-75">

                <?php
                    while (have_posts()) {
                        the_post();
                        echo '<div>'.the_title().'</div>';
                        echo '<div>'.the_content().'</div>';
                    }
                ?>
                </div>
                <!-- Load right-bar-->
                <?php get_template_part('template-parts/blocs/right-bar/right-bar') ;?>
            </div>
        </div>
    </section>
    <?php endif;?>

<?php get_footer();?>