
<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
    <h4 class="s-text12 p-b-30">
        GET IN TOUCH
    </h4>

    <div>
        <?php $get_touch = get_field('get_in_touch','option') ;?>
        <?php if($get_touch): ?>
            <p class="s-text7 w-size27">
               <?php echo $get_touch ;?>
            </p>
        <?php endif ;?>

        <?php while(have_rows('social_menu_link','option')): the_row() ;?>
            <div class="flex-m p-t-30">
                <a href="<?= get_sub_field('facebook') ;?>" class="topbar-social-item fa fa-facebook"></a>
                <a href="<?= get_sub_field('instagrams') ;?>" class="topbar-social-item fa fa-instagram"></a>
                <a href="<?= get_sub_field('pink_test') ;?>" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="<?= get_sub_field('snapchat') ;?>" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="<?= get_sub_field('youtube') ;?>" class="topbar-social-item fa fa-youtube-play"></a>
            </div>
        <?php endwhile;?>

    </div>
</div>