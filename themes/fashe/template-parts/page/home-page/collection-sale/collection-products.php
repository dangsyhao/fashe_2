<?php

global $post ;
$post_beauty = get_field('beauty_collection' , 'option') ;
$post_beauty_id = $post_beauty['beauty_item'];
$collection_name = $post_beauty['collection_name'];

if($post_beauty_id):
    $the_post = new WP_Query(array('post_type' => 'post' , 'p' =>$post_beauty_id)) ;
?>
    <?php while($the_post->have_posts()): $the_post->the_post() ;?>
    <?php setup_postdata($the_post) ?>
    <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
        <div class="hov-img-zoom pos-relative">
            <img src="<?php echo get_the_post_thumbnail_url($post->ID,'Post-image-thumnail-beauty-collection') ?>" alt="IMG-BANNER">
            <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
            <span class="m-text9 p-t-45 fs-20-sm"><?= $collection_name ;?></span>
                <h3 class="l-text1 fs-35-sm"><?php _e('Lookbook','fashe') ;?></h3>
                <a href="<?php the_permalink() ;?>" class="s-text4 hov2 p-t-20 "><?php _e('View Collection','fashe') ;?></a>
            </div>
        </div>
    </div>
    <?php endwhile;?>
<?php endif ;?>