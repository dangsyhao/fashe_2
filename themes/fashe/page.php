<?php
/**
 * The template for displaying all pages.
 */
get_header(); ?>


    <!--Load Title -Banner-->

    <?php if (!is_front_page() || !is_home()){
        get_template_part('template-parts/page/page/title-banner');
    }
    ?>
    <!--Load shop page-->
    <?php if(is_page('shop') || is_shop()):?>
            <section class="bgwhite p-t-55 p-b-65">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                            <?php get_template_part('template-parts/page/page/slide-bar');?>
                        </div>
                        <!-- Product -->
                        <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                            <?php while (have_posts()):the_post();?>
                                <?php the_content(); ?>
                            <?php endwhile;?>
                        </div>
                    </div>
                </div>
            </section>
    <?php elseif( is_checkout() || is_user_logged_in() || is_account_page() ):?>

            <section class="cart bgwhite p-t-70 p-b-100">
                <div class="container">
<!--                    My Html-->
                    <?php while (have_posts()):the_post();?>
                        <?php the_content(); ?>
                    <?php endwhile;?>
                </div>
            </section>


    <?php else: ?>

        <?php
            while (have_posts()) {
                the_post();
                the_content();
            }
        ?>

    <?php endif;?>

<?php get_footer();?>