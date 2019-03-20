<?php global $post;?>

<?php
$page_link = get_page_link($post->ID);
while (have_rows('title_banner','option')): the_row();?>
    <?php $banner_title_page = get_sub_field('page_link_banner');
          $page_link_banner = get_sub_field('banner_image');
    ?>
    <?php if($page_link === $banner_title_page): ?>
        <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= $page_link_banner;?>);">
            <h2 class="l-text2 t-center"><?php echo $post->post_title;?></h2>
        </section>
    <?php endif;?>
<?php endwhile;?>