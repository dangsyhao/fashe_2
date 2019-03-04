
<div class="filter-color p-t-22 p-b-50 bo3" id="filter-product-color">
    <div class="m-text15 p-b-12">
        Color
    </div>

    <?php
    $terms_color = get_terms(array( 
                                'taxonomy' => 'pa_product-color',
                                'hide_empty' => false
                                )) ;

    ?>

    <ul class="flex-w">
        <?php foreach ($terms_color as $term_color ): ?>

        <li class="m-r-10">
            <input class="checkbox-color-filter" id="input_<?php echo $term_color->slug ;?>" type="checkbox" value="<?php echo $term_color->slug ;?>">
            <label class="color-filter"  for="input_<?php echo $term_color->slug ;?>" style="background-color:#<?php echo $term_color->slug ;?>" title="<?php echo $term_color->name ;?>"></label>
        </li>

        <?php endforeach ;?>
    </ul>
</div>