<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
    <h4 class="s-text12 p-b-30">
        Categories
    </h4>

    <?php
    $product_categories = get_terms( 'category' );
    ?>
    <ul>
        <?php foreach ($product_categories as $category):?>
            <li class="p-b-9">
                <a href="<?= get_category_link($category->term_id)?>" class="s-text7">
                    <?= $category->name;?>
                </a>
            </li>
        <?php endforeach;?>

    </ul>
</div>