<?php global $posts;?>

<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= ASSETS_PATH;?>images/heading-pages-02.jpg);">
    <?php while(have_posts()): the_post() ;?>
    <h2 class="l-text2 t-center">
        <?php the_title() ;?>
    </h2>
    <?php endwhile ;?>
</section>