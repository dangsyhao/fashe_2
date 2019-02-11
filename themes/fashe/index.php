<?php get_header(); ?>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-75">
                    <div class="p-r-50 p-r-0-lg">
<!--                    --><?php //while(have_posts()):the_post();?>
<!--                        <!--Load Post Items-->-->
<!--                        --><?php ////fashe_get_template_part('blocs/post-items')?>
<!---->
<!---->
<!---->
<!--                    --><?php //endwhile;?>

                        <?= do_shortcode('[ajax_pagination]');?>
                    </div>


<!--                    <div class="pagination flex-m flex-w p-r-50">-->
<!--                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>-->
<!--                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>-->
<!--                    </div>-->

                </div>

                <!-- Load right-bar-->
                <?php get_template_part('template-parts/blocs/right-bar/right-bar')?>

            </div>
        </div>
    </section>

<?php get_footer();
