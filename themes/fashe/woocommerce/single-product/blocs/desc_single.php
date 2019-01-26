
<?php global $product;?>

<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
        Description
        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
    </h5>

    <div class="dropdown-content dis-none p-t-15 p-b-23">
        <p class="s-text8">
            <?= esc_html(get_the_content());?>
        </p>
    </div>
</div>