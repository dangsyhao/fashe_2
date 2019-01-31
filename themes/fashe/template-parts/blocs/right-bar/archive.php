
<h4 class="m-text23 p-t-50 p-b-16">
    <?php _e('Archive','fashe'); ?>
</h4>

<ul>
<?php
$args = array(
	'type'            => 'monthly',
	'limit'           => '',
	'format'          => '',
	'before'          => '<li class="flex-sb-m">',
	'after'           => '<span class="s-text13">',
	'show_post_count' => true,
	'echo'            => 1,
	'order'           => 'DESC',
    'post_type'     => 'post'
);
wp_get_archives( $args );

?>
</ul>