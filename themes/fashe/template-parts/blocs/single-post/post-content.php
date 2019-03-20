<div class="p-b-40">

    <div class="blog-detail-img wrap-pic-w">
        <img src="<?= get_the_post_thumbnail_url();?>" alt="IMG-BLOG">
    </div>

    <div class="blog-detail-txt p-t-33">
        <h4 class="p-b-11 m-text24">
            <?php the_title();?>
        </h4>

        <div class="s-text8 flex-w flex-m p-b-21">
            <span><?php _e('By','fashe');?>&nbsp;<?php the_author()?><span class="m-l-3 m-r-6">|</span></span>
            <span><?php _e('Cooking, Food','fashe'); ?><span class="m-l-3 m-r-6">|</span></span>
            <span><?php echo get_comments_number();?>&nbsp;<?php _e('Comments','fashe');?></span>
        </div>

        <?php the_content();?>

    </div>

    <div class="flex-m flex-w p-t-20">
        <span class="s-text20 p-r-20">Tags</span>

        <div class="wrap-tags flex-w">

            <?php $tags=get_tags();?>
            <?php foreach ($tags as $tag):?>
                <a href="<?= get_tag_link($tag->term_id);?>" class="tag-item">
                    <?= $tag->name;?>
                </a>
            <?php endforeach;?>

        </div>

    </div>

</div>
