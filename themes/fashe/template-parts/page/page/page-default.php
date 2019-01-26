
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= ASSETS_PATH;?>images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
        Women
    </h2>
    <p class="m-text13 t-center">
        New Arrivals Women Collection 2018
    </p>
</section>

<?php if(is_page('shop') || is_shop()):?>
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <?php get_template_part('template-parts/page/page/sub/page-content/slide-bar');?>
            </div>
            <!-- Product -->
            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <?php while (have_posts()):the_post();?>
                    <?php the_content(); ?>
                <?php endwhile;?>

            </div>

            </div>

        </div>
    </div>
</section>
<?php endif;?>


<?php if(is_cart()):?>


<?php while (have_posts()):the_post();?>
    <?php the_content(); ?>
<?php endwhile;?>
    </div>
</section>


<?php endif;?>
