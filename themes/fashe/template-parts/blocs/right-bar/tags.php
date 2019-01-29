
<h4 class="m-text23 p-t-50 p-b-25">
    <?php _e('Tags','fashe');?>
</h4>

<div class="wrap-tags flex-w">

    <?php $tags=get_tags();?>
    <?php foreach ($tags as $tag):?>
        <a href="<?= get_tag_link($tag->term_id);?>" class="tag-item">
            <?= $tag->name;?>
        </a>
    <?php endforeach;?>

</div>