<!-- Javascript -->
<script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.nice-select.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/jquery.slicknav.js"></script>
    <script src="../assets/js/mixitup.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/popup.js"></script>
    <script src="../assets/css/main.js"></script>
    <script src="../assets/js/fitter.js"></script>
    <script src="../assets/js/range-price.js"></script>
    <script src="../assets/js/lightslider.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../Admin/public/js/select2.min.js"></script>
    <link href="../Admin/public/assets/css/select2.min.css" rel="stylesheet" />
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>


    <!-- <link rel="stylesheet" href="../Admin/public/assets/vendor/css/core.css" /> -->
    <link rel="stylesheet" href="../Admin/public/assets/vendor/fonts/boxicons.css" />


    <script>
        // Cart add remove functions
        var cart = {
            'add': function (productName, pathImg) {
                addProductNotice('Thêm thành công','<img class = "product-img-link" src="'+pathImg+'" alt="">', '<h3><a href="#">'+productName+'</a> đã được thêm <a href="#">giỏ hàng</a>!</h3>', 'success');
            }
        }

        var warning = {
            'warrning': function () {
                addProductNotice('Bạn chưa đăng nhập', '', '<h3>Vui lòng đăng nhâp để mua hàng</h3>', 'warning');
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
            $.jGrowl.defaults.sticky = false;
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

<script>
    $(document).on("click", ".add_to_cart", function(){
        var id_product = $(this).attr('id');
        var product_name = $(this).parent().parent().parent().parent().find('.product-name').text();
        var product_img = $(this).parent().parent().parent().find('.product-img-link').attr('src');
        var product_price =( $(this).parent().parent().parent().parent().find('.product-price').text());
        // var qty_product = $('.input-qty').val();

        // alert(qty_product);

        product_price = product_price.substring(0, product_price.indexOf('đ'));

        // alert(product_price);

        // console.debug(product_img, product_img );
        $.ajax({
            url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/HomePage/add-to-cart.php',
            type: 'POST',
            data: {id_product: id_product},
            success: function(response) {
                if(response != -1){
                    cart.add(product_name, product_img  );
                    addProductCart(id_product, product_name, product_img, product_price);
                }
                else{
                    warning.warrning();
                }
            }
		});
    });
</script>

<script>

    
    function addProductCart(id_product, product_name, product_img, product_price){
        var html = " ";
        var flag_number = 0;
        var total_money =0;
        var flag = false;
        var total_product = parseInt($('.total-count').text()) ;
        var new_total = total_product+1;
        $('.cart-product-deatil').find('.name-product').each(function(i, elm){
           if($(elm).attr('id') == id_product){
                var current_qty = parseInt($(elm).parent().parent().find('.qty-product').text());
                var new_qty = current_qty +1 ;
                $(elm).parent().parent().find('.qty-product').html(new_qty);
                flag = true;
           }
        });

        $('.shopping-list').find('li').each(function(i, elm){
            flag_number = flag_number+1;
            total_money_in = parseInt(($(elm).find('.qty-product').text()))* parseInt(($(elm).find('.amount').text()).replace(/\D/g, ""));
            total_money =  total_money + (total_money_in) ;
        });

        var current_total =0;
        var current_total = (total_money + parseInt(product_price.replace(/\D/g, "")));
        
        //format dạng tiền
        const config = { style: 'currency', currency: 'VND', maximumFractionDigits: 9}
        const money_format = new Intl.NumberFormat('vi-VN', config).format(current_total);
        // alert(money_format);

        if(flag == false){
            $('.total-count').html(new_total);
            $('.total-count-cart').html(new_total + "  SẢN PHẨM");
            html +=
            '<li>'
                        + '<div class="content-shopping-list-item">'
                        +   ' <div class="remove-icon">'
                        +        '<a href="#" class="remove" title="Xóa sản phẩm"><i '
                        +                'class="fa fa-remove"></i></a>'
                        +   '</div>'
                        +    '<a class="cart-img" href="#"><img'
                        +            ' src="'+ product_img+'" alt="#"></a>'
                        +    '<div class="cart-product-deatil">'
                        +        '<h4><a class= "name-product" id="'+id_product+'"  href="productdetail.php?id='+id_product+'" style="overflow-wrap: break-word;">'+product_name+'</a></h4>'
                        +        '<p class="quantity"> <span class="qty-product">1 </span>x- <span class="amount"> '+product_price+'</span>'
                        +        '</p>'
                        +   '</div>' 
                        + '</div>'
                    + '</li>';
        }

        $('.shopping-list').append(html);
        $('.total-amount').html(money_format);


        if(flag_number == 0){
            $('.img-when-no--cart').remove();
            $('.notify-when-no--cart').remove();

            html2 ='<div class="bottom">'
                    +        '<div class="total">'
                    +            '<span>Tổng </span>'
                    +            '<span class="total-amount">'+money_format+'</span>'
                    +        '</div>'
                    +        '<a href="checkout.php" class="btn animate">Thanh toán</a>'
                    +    '</div>';

            $('.shopping-item').append(html2);
        }

       

        // console.debug(html);
    }
</script>