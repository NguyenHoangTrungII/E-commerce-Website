

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
            'cart_empty': function () {
                addProductNotice('Giỏ hàng bạn không có gì', '', '<h3>Vui lòng vui thêm sản phẩm</h3>', 'success');
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

<footer class="footer">
  	    <div class="container">
  	 	    <div class="row">
  	 		    <div class="footer-col">
  	 			    <h4>Trong đề tài này, nhóm chọn phát triển một trang web bán linh kiện máy tính đơn giản 
                        cùng với những chức năng của khách hàng, người quán lý trang web 
                        để cải thiện theo thời gian.
                    </h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
  	 		    </div>
  	 		<div class="footer-col2">
  	 			<h4>Trang</h4>
  	 			<ul>
  	 				<li><a href="#">Trang chủ</a></li>
  	 				<li><a href="#">Sản phẩm</a></li>
  	 				<li><a href="#">Liên hệ</a></li>
  	 				<li><a href="#">Về chúng tôi</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col2">
  	 			<h4>Chính sách</h4>
  	 			<ul>
  	 				<li><a href="#">Bảo hành</a></li>
  	 				<li><a href="#">Đổi trả</a></li>
  	 				<li><a href="#">Vận chuyển</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col2">
  	 			<h4>Địa chỉ</h4>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d42447.584134537115!2d106.79088278497441!3d10.889031664139125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1667316792990!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  	 		</div>
  	 	    </div>
  	    </div>
    </footer>

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


<!-- add to cart khi ở chi tiết giỏ hàng -->
<script>
    $(".add-to-cart").on("click", function(){
        var id_product = $(this).attr('id');
        var product_name = $('.name-product-detail ').text();
        var product_img = $('.img-product-detail').attr('src');
        var product_price =( $('.price-product-detail').text());
        var soluong =( $('.input-qty').val());
        // product_price = product_price.substring(0, product_price.indexOf('đ'));

        // console.debug(soluong);

        $.ajax({
            url: 'http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/HomePage/add-to-cart-detail.php',
            type: 'POST',
            data: {id_product: id_product,
                    soluong: soluong
                    },
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