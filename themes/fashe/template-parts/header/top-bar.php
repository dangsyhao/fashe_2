<div class="topbar">
    <div class="topbar-social">
        <?php while(have_rows('social_menu_link','option')): the_row() ;?>
            <a href="<?= get_sub_field('facebook') ;?>" class="topbar-social-item fa fa-facebook"></a>
            <a href="<?= get_sub_field('instagrams') ;?>" class="topbar-social-item fa fa-instagram"></a>
            <a href="<?= get_sub_field('pink_test') ;?>" class="topbar-social-item fa fa-pinterest-p"></a>
            <a href="<?= get_sub_field('snapchat') ;?>" class="topbar-social-item fa fa-snapchat-ghost"></a>
            <a href="<?= get_sub_field('youtube') ;?>" class="topbar-social-item fa fa-youtube-play"></a>
        <?php endwhile;?>
    </div>
    <?php $csi = get_field('customer_support_information','option') ;?>
    <?php if($csi):?>
    <span class="topbar-child1"><?php echo $csi ;?></span>
    <?php endif ;?>
</div>