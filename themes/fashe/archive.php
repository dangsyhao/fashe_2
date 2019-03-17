<?php get_header();?>
<section class="bgwhite p-t-60">
    <div class="container">
        <div class="row">
            <div id="result_ajaxp" class="col-md-8 col-lg-9 p-b-75">
                <?php while(have_posts()):the_post() ;?>
                <?php get_template_part('template-parts/blocs/post-items');?>
                <?php endwhile;?>
            </div>
            <!-- Load right-bar-->
            <?php get_template_part('template-parts/blocs/right-bar/right-bar') ;?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
