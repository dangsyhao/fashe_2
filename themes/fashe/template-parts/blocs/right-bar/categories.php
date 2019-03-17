
<h4 class="m-text23 p-t-56 p-b-34">
    <?php _e('Categories','fashe');?>
</h4>

<?php
$product_categories = get_terms( 'category' );
?>

<ul>
    <?php foreach ($product_categories as $category):?>
    <li class="p-t-6 p-b-8 bo6">
        <a href="<?= get_category_link($category->term_id)?>" class="s-text13 p-t-5 p-b-5">
            <?= $category->name;?>
        </a>
    </li>
    <?php endforeach;?>

</ul>