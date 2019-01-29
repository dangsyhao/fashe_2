
<div class="item-blog p-b-80">
    <a href="<?php the_permalink();?>" class="item-blog-img pos-relative dis-block hov-img-zoom">
        <img src="<?= get_the_post_thumbnail_url();?>" alt="IMG-BLOG">
        <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1"><?php the_time('M j, Y')?></span>
    </a>
    <div class="item-blog-txt p-t-33">
        <h4 class="p-b-11">
            <a href="<?php the_permalink();?>" class="m-text24">
                <?php the_title()?>
            </a>
        </h4>
        <div class="s-text8 flex-w flex-m p-b-21">
            <span><?php _e('By','fashe');?>&nbsp;<?php the_author()?><span class="m-l-3 m-r-6">|</span></span>
            <span><?php _e('Cooking, Food','fashe'); ?><span class="m-l-3 m-r-6">|</span></span>
            <span><?php echo get_comments_number();?>&nbsp;<?php _e('Comments','fashe');?></span>
        </div>

        <p class="p-b-12">
            <?php the_excerpt();?>
        </p>

        <a href="<?php the_permalink();?>" class="s-text20">
            <?php _e('Continue Reading','fashe'); ?>
            <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
        </a>
    </div>
</div>