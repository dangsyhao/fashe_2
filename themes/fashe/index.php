<?php get_header(); ?>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">

                <div id="result_ajaxp" class="col-md-8 col-lg-9 p-b-75">
                    <?php echo query_ajax_pagination(array('posts_per_page'=> 3,'post_type' => 'post')); ?>

                </div>;

                <!-- Load right-bar-->
                <?php get_template_part('template-parts/blocs/right-bar')?>

            </div>
        </div>
    </section>

<?php get_footer();
