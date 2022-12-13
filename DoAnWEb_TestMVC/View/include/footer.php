<!-- Javascript -->
<script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.slicknav.js"></script>
    <script src="../assets/js/mixitup.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/popup.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/fitter.js"></script>
    <script src="../assets/js/range-price.js"></script>
    <script src="../assets/js/lightslider.js"></script>



    <script>
        // Cart add remove functions
        var cart = {
            'add': function (product_id, quantity) {
                addProductNotice('Thêm thành công', '<img src="./assets/img/homepage/product-card.jpg" alt="lỗi">', '<h3><a href="#">'+product_id+'</a> đã được thêm <a href="#">giỏ hàng</a>!</h3>', 'success');
            }
        }

        var wishlist = {
            'add': function (product_id) {
                addProductNotice('Product added to Wishlist', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>You must <a href="#">login</a>  to save <a href="#">Apple Cinema 30"</a> to your <a href="#">wish list</a>!</h3>', 'success');
            }
        }
        var compare = {
            'add': function (product_id) {
                addProductNotice('Product added to compare', '<img src="image/demo/shop/product/e11.jpg" alt="">', '<h3>Success: You have added <a href="#">Apple Cinema 30"</a> to your <a href="#">product comparison</a>!</h3>', 'success');
            }
        }

        /* ---------------------------------------------------
            jGrowl â€“ jQuery alerts and message box
        -------------------------------------------------- */
        function addProductNotice(title, thumb, text, type) {
            $.jGrowl.defaults.closer = false;
            //Stop jGrowl
            $.jGrowl.defaults.sticky = true;
            var tpl = thumb + '<h3>' + text + '</h3>';
            $.jGrowl(tpl, {
                life: 4000,
                header: title,
                speed: 'slow',
                theme: type
            });
        }    
    </script>
</body>

</html>


<script type="text/javascript">
		$(document).ready(function(){
			$('#query').on("keyup", function(){
				var data = $(this).val();
                // alert(data);
				
				if(data!='') {
					$.ajax({
						url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/HomePage/Auto-Search.php',
						type: 'POST',
						data: {search: data},
						success: function(response) {
							$('#show-list').html(response);
						}
					});
					} else{
					$('#show-list').html('');
				}
			});
			$(document).on('click', '.loadData', function() {
				$('#query').val($(this).text());
				$('#show-list').html('');
			});
		});
	</script>

<!-- ajax thêm vào giỏ hàng -->