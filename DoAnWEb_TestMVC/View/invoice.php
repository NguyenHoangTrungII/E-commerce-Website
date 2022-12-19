
<?php
    include("include/top.php");
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
                            <a>Giỏ hàng</a><span>Xác nhận đơn hàng</span>
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
								<h1>invoice</h1>
								<img class="logo-print" src="" alt="" style="width: 220px; height: 60px;">
							</div>
						</div>
						<div class="invoice-info  col-md-9 col-xs-10">
							<div style="padding-left: 340px;">
								<div class="row">
									<!-- <div class="col-md-6 col-sm-6 text-left">
										 <p> trung<br>a</p>											
									</div> -->
									<div class="col-md-6 col-sm-6 text-left">
										<p>Số điện thoại: 01654952508<br> Email : trungne1@gmail.com</p>											
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row invoice-to">
					<div class="col-md-9 col-sm-4 pull-left">
						<h4>Đơn hàng của:</h4>
						<h2>tên khách hàng</h2>
							<p>
							</p>								
					</div>
					<div class="col-md-3 col-sm-5 pull-right">
						<div class="row">
							<div class="col-md-4 col-sm-5 inv-label">Mã vận chuyển #</div>
							<div class="col-md-8 col-sm-7">Đang cập nhật...</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-5 inv-label">Ngày đặt #</div>
							<div class="col-md-8 col-sm-7"><?= date("Y-m-d h:i:sa") ?></div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12 inv-label">
								<h3 class="inv-label">TỔNG TIỀN</h3>
								<h2 style="font-size: 40px; font-weight: bold">750.000đ</h2>
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
						
						
								<tr>
									<td>1</td>
									<td>
										<div style="font-weight: bold;">Tên</div>
									</td>
									<td class="text-center">3599</td>
									<td class="text-center">1</td>
									<td class="text-center">3599</td>
								</tr>							
					</tbody>
				</table>
				<div class="row">
					<div class="col-md-8 col-xs-7 payment-method">
						<h4>Phương thức thanh toán</h4>
						<p>Thanh toán sau ki nhận hàng.</p>

						<p style="font-style: normal; font-size: 17px;" class="inv-label mt-1 mb-2"> 
							<span style="color: orange; font-weight: bold;">BẰNG CHỮ: </span>
							MỘT TRIỆU BỐM TRĂM NĂM MUOI NGHÌN ĐỒNG								</p>
						<h3 class="inv-label itatic">Cảm ơn vì đã mua hàng của chúng rôi</h3>
					</div>
					<div class="col-md-4 col-xs-5 invoice-block pull-right">
						<ul class="unstyled amounts">
							<li>Tổng tiền hàng : </li>
							<li>Phí vận chuyển :</li>
							<li>Phí giảm giá</li>
							<li class="grand-total">Tổng tiền</li>
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
</body>
</html>


