
<section class="shipping bgwhite p-t-62 p-b-46">
    <div class="flex-w p-l-15 p-r-15">
        <?php while(have_rows('support_programs_section_bar' , 'option')): the_row() ;?>
        <?php
            $shipping_obj = get_sub_field('shipping_policy');
            $return_obj = get_sub_field('return_policy') ;
            $open_obj = get_sub_field('store_opening') ;

         ?>
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                <?= $shipping_obj['main_title'];?>
            </h4>

            <a href="<?= $shipping_obj['link_page'] ?>" class="s-text11 t-center">
                <?php _e('Click here for more info' ,'fashe')?>
            </a>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                <?= $return_obj['main_title'];?>
            </h4>
            <span class="s-text11 t-center"><?= $return_obj['sub_title'];?></span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                <?= $open_obj['main_title'];?>
            </h4>
            <span class="s-text11 t-center"><?= $open_obj['sub_title'];?></span>
        </div>

        <?php endwhile;?>
    </div>
</section>