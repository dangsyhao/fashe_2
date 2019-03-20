<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
    <h4 class="s-text12 p-b-30">
        Help
    </h4>
<?php while (have_rows('help','option')): the_row() ;?>
    <ul>
        <li class="p-b-9">
            <a href="<?= get_sub_field('page_link') ;?>" class="s-text7">
                <?= get_sub_field('page_label') ?>
            </a>
        </li>

    </ul>
<?php endwhile ;?>

</div>