
<?php global $product;?>

<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
        Reviews (0)
        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
    </h5>

    <div class="dropdown-content dis-none p-t-15 p-b-23">
        <?php do_action('fashe_woocommerce_review_display_comment_text');?>
    </div>
</div>