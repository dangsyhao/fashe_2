
<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Our Blog
            </h3>
        </div>

        <div class="row">
            <?php $posts = apply_filters('fashe_news_posts','fashe_news_posts');?>
            <?php foreach ($posts as $post):?>
            <?php setup_postdata($post);?>
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="<?php the_permalink();?>" class="block3-img dis-block hov-img-zoom">
                        <img src="<?= get_the_post_thumbnail_url($post->ID,'fashe-post-thumbnail-front');?>" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="<?php the_permalink();?>" class="m-text11">
                                <?php the_title();?>
                            </a>
                        </h4>

                        <span class="s-text6">By</span> <span class="s-text7"><?php the_author();?></span>
                        <span class="s-text6">on</span> <span class="s-text7"><?php the_time('M d Y');?></span>

                        <p class="s-text8 p-t-16">
                            <?php the_excerpt();?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php wp_reset_postdata()?>
        </div>
            <?php wp_reset_query();?>
    </div>
</section>