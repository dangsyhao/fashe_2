
<?php
global $current_user ;

?>

<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header-wrapicon1 dis-block">
    <?php if(!is_user_logged_in()) :?>
        <img src="<?= ASSETS_PATH;?>images/icons/icon-header-01.png" class="header-icon1" alt="ICON" title="User not Loggin !">
    <?php else :?>
        <img src="<?= get_avatar_url($current_user->ID ,array('size'=>27)) ;?>" class="header-icon1" alt="ICON" title="<?php echo $current_user->user_email.' Logged !'?>">
    <?php endif ; ?>
</a>
