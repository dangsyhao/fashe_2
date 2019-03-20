
<?php get_header();?>

<section class="bgwhite p-t-60 p-b-25">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-50 p-r-0-lg">
                    <?php while (have_posts()):the_post();?>

                        <?php get_template_part('template-parts/blocs/single-post/post-content')?>
                        <!-- Leave a comment -->
                        <?php get_template_part('template-parts/blocs/single-post/comment')?>

                    <?php endwhile;?>
                </div>
            </div>
            <!--Load Right-Bar-->
            <?php while (have_posts()):the_post();?>
                <?php global $product?>
                <?php get_template_part('template-parts/blocs/right-bar/right-bar')?>
            <?php endwhile;?>

        </div>
    </div>
</section>

<?php get_footer(); ?>
