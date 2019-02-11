<?php get_header(); ?>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">

                <?= do_shortcode('[ajax_pagination]');?>

                <!-- Load right-bar-->
                <?php get_template_part('template-parts/blocs/right-bar/right-bar')?>

            </div>
        </div>
    </section>

<?php get_footer();
