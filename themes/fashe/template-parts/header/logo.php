
<?php $logo_img = get_field('fashe_logo','option') ;?>
<?php if($logo_img): ?>
<a href="<?php echo get_home_url() ;?>" class="logo">
    <img src="<?=$logo_img ;?>" alt="IMG-LOGO">
</a>
<?php endif ;?>