
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">

        <!-- Logo -->
        <?php get_template_part('template-parts/footer/footer_content/get_touch')?>

        <!-- Logo -->
        <?php get_template_part('template-parts/footer/footer_content/categories')?>

        <!-- Logo -->
        <?php get_template_part('template-parts/footer/footer_content/links')?>

        <!-- Logo -->
        <?php get_template_part('template-parts/footer/footer_content/help')?>

        <!-- Logo -->
        <?php get_template_part('template-parts/footer/footer_content/contact')?>

    </div>

    <!-- Logo -->
    <?php get_template_part('template-parts/footer/footer_content/credit_link')?>

</footer>

<!-- Back to top -->
<?php get_template_part('template-parts/footer/back_top')?>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>

<!-- Modal Video 01-->
<?php get_template_part('template-parts/footer/modal_video')?>


<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/select2/select2.min.js"></script>
<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
</script>


<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/slick/slick.min.js"></script>

<script type="text/javascript" src="<?= ASSETS_PATH;?>js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?= ASSETS_PATH;?>vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->

<script type="text/javascript">

    $('.block2-btn-addcart').each(function(){

        var nameCart = $(this).find('.add_to_cart_button').html();

        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();

        $(this).on('click', function(){

            $("a.add_to_cart_button ").addClass("added_to_cart");

            if(nameCart ==='Add to cart') {
                swal(nameProduct, "is added to cart !", "success");
            }

        });

    });

        $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="<?=ASSETS_PATH;?>vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>

<!--===============================================================================================-->
<script src="<?= ASSETS_PATH;?>js/main.js"></script>
<!--===============================================================================================-->
<!--Jquery footer-->
<?php wp_footer();?>

</body>
</html>




