
<?php
    include("include/top.php");
?>

<?php
	
	if(isset($_GET['pt'])){
		$_SESSION['SSCF_order_id'] = $_GET['donhang'];
	}

	if(isset($_GET['vnp_Amount'])){
		//Thêm dữ liệu vào bảng vnp


		$columnName = $tableName = $whereValue = null;
		$tableName = "vnpay";
		$columnName['id_giaodich'] = $_GET['vnp_TransactionNo'];
		$columnName['id_donhang'] =  $_GET['vnp_TxnRef'];
		$columnName['nganhang'] = $_GET['vnp_BankCode'];
		$columnName['trangthai'] =$_GET['vnp_TransactionStatus'];
		$dateTime = $_GET['vnp_PayDate'];
		$date = DateTime::createFromFormat('YmdHis', $dateTime);
		$thoigian = $date->format('Y-m-d H:i:s');	
		$columnName['thoigian'] = $thoigian;
		$columnName['tongtien'] = $_GET['vnp_Amount'];
		$columnName['noidung'] = $_GET['vnp_OrderInfo'];
		$insertVNP = $Model->insertData($tableName,$columnName );
		$Model->connection->commit();
		$_SESSION['SSCF_order_id'] = $_GET['vnp_TxnRef'];
		
	}

	if(isset($_GET['partnerCode'])){
		
		//Thêm dữ liệu vào bảng vnp
		$columnName = $tableName = $whereValue = null;
		$tableName = "momo";
		$columnName['id_giaodich'] = $_GET['requestId'];
		$columnName['id_donhang'] =  $_GET['orderId'];
		$columnName['loai'] = $_GET['orderType'];
		$columnName['tinhtrang'] =$_GET['resultCode'];
		$dateTime = $_GET['extraData'];
		$date = DateTime::createFromFormat('YmdHis', $dateTime);
		$thoigian = $date->format('Y-m-d H:i:s');	
		$columnName['thoigian'] = $thoigian;
		$columnName['tongtien'] = $_GET['amount'];
		$columnName['noidung'] = $_GET['orderInfo'];

		var_dump($columnName);

		$insertMOMO= $Model->insertData($tableName,$columnName );

		$Model->connection->commit();
		$_SESSION['SSCF_order_id'] = $_GET['orderId'];

		
	}


	//Lấy dữ liệu từ dơn hàng load lên
	$columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
	$columnName="*";    
	$tableName['MAIN'] = "donhang";
	$tableName['1'] ='ctdh';
	$tableName['2'] ='sanpham';
	$whereValue['donhang.id_nguoidung'] = $_SESSION['SSCF_login_id'];
	$whereValue['donhang.id'] = $_SESSION['SSCF_order_id'];


	$joinCondition = array ("1"=>array ('donhang.id', 'ctdh.id_donhang'), "2"=>array ('ctdh.id_sp', 'sanpham.id'));

	$OrderDetail = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);
	// var_dump($OrderDetail);
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg " data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>XÁC NHẬN</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <a>Giỏ hàng</a><span>Hóa đơn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<body>

	<div class="container  pt-5">
		<div class="text-center printClose">
		</div>
		<div class="text-right">
			<button type="submit" onclick="print_current_page()" target="_blank" class="btn btn-sm btn-outline-warning printClose" style="width:200px">🖶 In hóa đơn</button>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-header">
					<div class="row">
						<div class="col-md-3 col-xs-2">
							<div class="invoice-title">
								<h1>HÓA ĐƠN</h1>
								<img class="logo-print" src="" alt="" style="width: 220px; height: 60px;">
							</div>
						</div>
						<div class="invoice-info  col-md-9 col-xs-10">
							<div style="padding-left: 320px;">
								<div class="row">
									<!-- <div class="col-md-6 col-sm-6 text-left">
									<span>Người nhận hàng</span>
										<p>Số điện thoại: 01654952508<br></p>	
									</div> -->
									<div class="col-md-6 col-sm-6 text-left">
										<span>SHOP LINH KIỆN MÁY TÍNH 4.2GRP</span>
										<p>Số điện thoại: 0123456789<br> Email :  4-2.group@gmail.com</p>											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row invoice-to">
					<div class="col-md-9 col-sm-4 pull-left">
						<h4>Đơn hàng của:</h4>
						<h2><?= $_SESSION['SSCF_login_user_showname'] ?></h2>
							<!-- <p>
							</p>								 -->
					</div>
					<div class="col-md-3 col-sm-5 pull-right">
						<div class="row">
							<div class="col-md-4 col-sm-5 inv-label">Mã vận chuyển #</div>
							<?php 
								if(empty($OrderDetail[0]['mavanchuyen'])){
									$mavanchuyen = "Đang cập nhật";
								}
								else{
									$mavanchuyen = $OrderDetail[0]['mavanchuyen'];
								}
							?>
							<div class="col-md-8 col-sm-7"> <?= $mavanchuyen ?></div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-5 inv-label">Ngày đặt #</div>
							<div class="col-md-8 col-sm-7"><?= $OrderDetail[0]['ngaydat'] ?></div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 inv-label">
								<h3 class="inv-label">TỔNG TIỀN</h3>
								<h2 style="font-size: 40px; font-weight: bold"><?= $controller->currency_format($OrderDetail[0]['giatri']) ?></h2>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-invoice">
					<thead>
						<tr>
							<th>#</th>
							<th>Sản phẩm</th>
							<th class="text-center">Gía</th>
							<th class="text-center">Số lượng</th>
							<th class="text-center">Tổng tiền</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($OrderDetail as $eachProduct){
								echo 
								'
									<tr>
										<td>'.$eachProduct['id_sp'].'</td>
										<td>
											<div style="font-weight: bold;">'.$eachProduct['tensp'].'</div>
										</td>
										<td class="text-center">'.$controller->currency_format($eachProduct['giasp']).'</td>
										<td class="text-center">'.($eachProduct['soluong']).'</td>
										<td class="text-center">'.$controller->currency_format($eachProduct['giasp']*$eachProduct['soluong']).'</td>
									</tr>
								';
							}
						?>
						
															
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-8 col-xs-7 payment-method">
						<?php 
							if($OrderDetail[0]['pt_thanhtoan'] == 1)
							{
								$pt = "Thanh toán sau khi nhận hàng";
							}
							else if($OrderDetail[0]['pt_thanhtoan'] == 2){
								$pt = "Thanh toán bằng VNPAY";
							}
							else if($OrderDetail[0]['pt_thanhtoan'] == 3){
								$pt = "Thanh toán bằng MOMO";
							}
							else if($OrderDetail[0]['pt_thanhtoan'] == 4){
								$pt = "Thanh toán bằng PAYPAL";
							}

						?>
						<h4>Phương thức thanh toán</h4>
						<p class="pt-4 pb-3"><?= $pt ?></p>

						<p style="font-style: normal; font-size: 17px;" class="inv-label mt-1 mb-2"> 
							<span style="color: orange; font-weight: bold;">BẰNG CHỮ: </span>
							MỘT TRIỆU BỐM TRĂM NĂM MUOI NGHÌN ĐỒNG								</p>
						<h3 class="inv-label itatic">Cảm ơn vì đã mua hàng của chúng tôi</h3>
					</div>
					<div class="col-md-4 col-xs-5 invoice-block pull-right">
						<ul class="unstyled amounts">
							<li>Tổng tiền hàng : <?= $controller->currency_format($OrderDetail[0]['tongtienhang']) ?> </li>
							<li>Phí vận chuyển : <?= $controller->currency_format($OrderDetail[0]['tienship']) ?> </li>
							<li class="grand-total">Tổng tiền: <?= $controller->currency_format( $OrderDetail[0]['giatri']) ?> </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="checkout-steps-action">
					<a href="index.php" class="btn btn-outline-success float-right printClose">Hoàn thành</a>
				</div>
			</div>
		</div>
	</div>	

	<form name="tesstttt" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"  >
		<input type="text" class="total-hidden" name="total-hidden" hidden>
		<input type="text" class="shipfee-hidden" name="shipfee-hidden" hidden>
		<input type="text" class="discount-hidden" name="discount-hidden" hidden>
		<input type="text" class="total-producPrice-hidden" name="total-producPrice-hidden" hidden>
		<input type="text" class="note-order" name="ghichu" hidden>
		<input type="text" class="phone-number" name="sdt" hidden>
		<input type="text" class="provice-order" name="tinh_thanhpho" hidden>
		<input type="text" class="district-order" name="quan_huyen" hidden>
		<input type="text" class="town-order" name="phuong_xa" hidden>
		<input type="text" class="address-order" name="diachi" hidden>
	</form>

	<!-- <input type="button" class="btn"> -->

</body>
</html>

<?php
    include("include/footer.php");
?>


<script>

	var url_string = window.location;
	var url = new URL(url_string);
	var status = url.searchParams.get("vnp_ResponseCode");
	var vnp_TxnRef = url.searchParams.get("vnp_TxnRef");
	var orderId =  url.searchParams.get("orderId");
	var vnp_TransactionStatus =  url.searchParams.get("vnp_TransactionStatus");

	var myData = JSON.parse(localStorage['address_customer']);
	var tinh_thanhpho = myData['tinh_thanhpho'];
	var quan_huyen = myData['quan_huyen'];
	var phuong_xa = (myData['phuong_xa']);
	var diachi = (myData['diachi']);
	var sdt = (myData['sdt']);
	var ghichu = (myData['ghichu']);
	var historyPrice = JSON.parse(localStorage['history-cart-price']);
    var giatri = (historyPrice['total_price_product'].replace(/\D/g, ""));
   	var phiship = (historyPrice['ship_fee'].replace(/\D/g, ""));
    var giamgia = (historyPrice['discount'].replace(/\D/g, ""));
    var giahang = (historyPrice['total_price_order'].replace(/\D/g, ""));

	var url = window.location.href;

	if(vnp_TxnRef != null  && vnp_TransactionStatus == 0 ){
			// window.addEventListener('load', function () {
		$.ajax({
		url: "http://localhost/doanweb/DoAnWeb_testMVC/Controller/Payment/VNPAY/insert-order.php",
		type: "POST",
		data:{
			ghichu: ghichu,
			sdt: sdt,
			tinh_thanhpho: tinh_thanhpho,
			quan_huyen: quan_huyen,
			phuong_xa: phuong_xa,
			diachi:diachi,
			total_hidden: giatri,
			shipfee_hidden: phiship,
			discount_hidden: giamgia,
			total_producPrice_hidden: giahang,
			status: status,
			vnp_TxnRef: vnp_TxnRef,
			url: url,

		},
		success: function(data){
			if(data==1){
				location.reload();
			}
		}

	});
		
	}
	else if(vnp_TxnRef != null  && vnp_TransactionStatus != 0){
		window.location.href = 'http://localhost/DoAnWeb/DoAnWeb_testMVC/View/payment.php';

	}

	if((orderId)!= null){
		$.ajax({
		url: "http://localhost/doanweb/DoAnWeb_testMVC/Controller/Payment/MOMO/insert-order.php",
		type: "POST",
		data:{
			ghichu: ghichu,
			sdt: sdt,
			tinh_thanhpho: tinh_thanhpho,
			quan_huyen: quan_huyen,
			phuong_xa: phuong_xa,
			diachi:diachi,
			total_hidden: giatri,
			shipfee_hidden: phiship,
			discount_hidden: giamgia,
			total_producPrice_hidden: giahang,
			status: status,
			orderId: orderId,
			url: url,

		},
		success: function(data){
			if(data==1){
				location.reload();
			}
		}

	});
	}


</script>

<script>
	//xóa dữ liệu lưu trong localstored
	// localStorage.removeItem( 'history-cart-price' );
	// localStorage.removeItem( 'history-cart-price' );

</script>


