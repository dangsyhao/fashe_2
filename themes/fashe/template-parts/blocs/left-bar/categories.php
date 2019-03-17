<h4 class="m-text14 p-b-7">
    Categories
</h4>
<?php $product_cats = get_terms( array(
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => false,
                                        ) );?>

<ul class="p-b-54" id ="get_product_cat_ajax">

        <li class="p-t-4" value = "">
            <a href="#" class="s-text13 active1" >
                All
            </a>
        </li>

    <?php foreach ($product_cats as $product_cat ) :?>
        <li class="p-t-4" value="<?php echo $product_cat->name ;?>">
            <a href="#" class="s-text13">
                <?php echo $product_cat->name ;?>
            </a>
        </li>
    <?php endforeach; ?>

</ul>