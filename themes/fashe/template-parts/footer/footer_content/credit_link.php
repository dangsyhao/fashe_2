

<div class="t-center p-l-15 p-r-15">

    <?php while (have_rows('payment_methods' , 'option')): the_row() ;?>
        <a href="<?=get_sub_field('payment_link');?>">
            <img class="h-size2" src="<?=get_sub_field('payment_logo');?>" alt="IMG-DISCOVER">
        </a>
    <?php endwhile;?>

    <?php $copyright = get_field('copyright_information','option') ;?>
    <?php if($copyright): ?>
    <div class="t-center s-text8 p-t-20">
        <?php echo $copyright ;?>
    </div>
    <?php endif ;?>
</div>