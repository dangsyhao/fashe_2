
<div class="filter-color p-t-22 p-b-50 bo3" id="filter-product-color">
    <div class="m-text15 p-b-12">
        Color
    </div>

    <?php

    global $wpdb;

    $taxonomy_name = "pa_product-color";
    $term_color_query=$wpdb->get_col($wpdb->prepare(
                                "
                                        SELECT wp_terms.name 
                                        FROM wp_terms 
                                        INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id 
                                        WHERE wp_term_taxonomy.taxonomy = %s
                                    ",
                                    $taxonomy_name
                                    ));
    ?>

    <ul class="flex-w">
        <?php foreach ($term_color_query as $term_color ): ?>

        <li class="m-r-10">
            <input class="checkbox-color-filter" id="input_<?php echo $term_color ;?>" type="checkbox" value="<?php echo $term_color ;?>">
            <label class="color-filter"  for="input_<?php echo $term_color ;?>" style="background-color: <?php echo $term_color ;?>" title="<?php echo $term_color ;?>"></label>
        </li>

            <?php if(count($term_color_query) > 7) break;?>

        <?php endforeach ;?>
    </ul>
</div>