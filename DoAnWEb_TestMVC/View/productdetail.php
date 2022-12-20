<?php
    include("include/top.php");
?>

<?php 

    $controller = new Controller;
    $homectrl = new HomeController;
    if(isset($_REQUEST['id']))
    {
        $_SESSION['SSCF_product_id'] = $_REQUEST['id'];
    }

    $Model = new ModelAll;
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']="sanpham.id id_sp";
    $columnName['2']="danhmucsp.ten tendanhmuc";
    $columnName['3']="nhacungcap.tenncc tenncc";
    $columnName['4']="sanpham.tensp tensp";
    $columnName['5']="sanpham.anh";
    $columnName['6']="sanpham.giagoc";
    $columnName['7']="sanpham.phantram";
    $columnName['8']="sanpham.tinhtrang";
    $columnName['9']="sanpham.id_danhmuc";
    // $columnName['10']="anhsp.anh anhlienquan";
    $tableName['MAIN'] = "sanpham";
    $tableName['1'] ='danhmucsp';
    $tableName['2'] ='nhacungcap';
    // $tableName['3'] ='anhsp';
    $whereValue['sanpham.id'] = $_SESSION['SSCF_product_id'];
    // $formatBy['ASC'] = "anhsp.sothutu";

    $joinCondition = array ("1"=>array ('sanpham.id_danhmuc', 'danhmucsp.id'), "2"=>array('sanpham.id_thuonghieu', 'nhacungcap.id'));

    $productDetail = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);

    $_SESSION['SSCF_product_current_price'] = $productDetail[0]['giagoc']*$productDetail[0]['phantram'];
    $_SESSION['SSCF_product_current_category'] = $productDetail[0]['id_danhmuc'];


    // var_dump( $productDetail);

    //Lấy ảnh liên quan của sản phẩm
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName['1']="anh";
    $tableName = "anhsp";
    $whereValue['id_sp'] = $_SESSION['SSCF_product_id'];

    $photoSide = $Model->selectData($columnName, $tableName, $whereValue);


    //Lấy đánh giá sản phẩm
    // $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    // $columnName = "*";
    // $tableName = "danhgia";
    // $whereValue['id_sp'] = $_SESSION['SSCF_product_id'];

    // $rateProducts = $Model->selectData($columnName, $tableName, $whereValue);


    //Lấy số sản phẩm đã bán
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName="*";
    $tableName['MAIN'] = "ctdh";
    $tableName['1'] ='donhang';
    $whereValue['ctdh.id_sp'] = $_SESSION['SSCF_product_id'];

    $joinCondition = array ("1"=>array ('ctdh.id_donhang', 'donhang.id'));

    $qtySale = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);


    //Lấy thông số kỹ thuậ
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;

    $tableName = "cauhinh";
    $columnName['1']='noidung1';
    $whereValue['id_sp'] = $_GET['id'];
    $SpecInfo= $Model->selectData($columnName, $tableName,  $whereValue);


    //Lấy mô tả
    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;

    $tableName = "motakithuat";
    $columnName['1']='noidung1';
    $whereValue['id_sp'] = $_GET['id'];
    $DesInfo= $Model->selectData($columnName, $tableName,  $whereValue);

    //Lấy đánh giá sản phẩm

    $columnName = $tableName = $limitPaging = $formatBy= $joinCondition = $whereValue = null;
    $columnName="*";
    $tableName['MAIN'] = "danhgia";
    $tableName['1'] ='nguoidung';
    $whereValue['danhgia.id_sp'] = $_SESSION['SSCF_product_id'];

    $joinCondition = array ("1"=>array ('danhgia.id_user', 'nguoidung.id'));

    $rateProducts = $Model->selectJoinData($columnName, $tableName, "inner", $joinCondition,  $whereValue);
    // var_dump($rateProducts);


    //Lấy sản phẩm tương tự : Tiêu chuẩn : cùng danh mục, trong khoảng giá và radom
    $sql_code="SELECT sanpham.id id_sp, danhmucsp.ten tendanhmuc, nhacungcap.tenncc tenncc, sanpham.tensp tensp, sanpham.anh , sanpham.giagoc, sanpham.phantram, sanpham.tinhtrang, sanpham.id_danhmuc
                
    FROM `sanpham` inner join `nhacungcap` on sanpham.id_thuonghieu  = nhacungcap.id INNER JOIN `danhmucsp` on sanpham.id_danhmuc = danhmucsp.id  WHERE sanpham.id_danhmuc =:VALUE1 AND ( GIAGOC*PHANTRAM BETWEEN 0 AND :VALUE2 ) ORDER BY RAND()  LIMIT 4";


    $query = $controller->connection->prepare($sql_code);
    $values = array(
        ':VALUE1' =>  $_SESSION['SSCF_product_current_category'],
        ':VALUE2' =>  $_SESSION['SSCF_product_current_price']
    );

    $query->execute( $values);

    $suggestProduct = $query->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($suggestProduct);
    // var_dump($values);

?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Chi tiết sản phẩm</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <span>Chi tiết sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



    <!-- Product Detail Section Begin -->
    <div class="container">
        <div class="product-card">
            <!-- <div class="container-fliud"> -->
            <div class="wrapper row">
                <div class="preview col-xl-7 col-md-12">
                    
                    <ul id="lightSlider">
                        <li data-thumb="<?= $GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productDetail[0]['tendanhmuc']."/"."Thumbnail/".$productDetail[0]['anh'] ?>">
                            <img src="<?= $GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productDetail[0]['tendanhmuc']."/"."Thumbnail/".$productDetail[0]['anh'] ?>" alt="">
                        </li>

                        <?php 
                            if(!empty($photoSide)){
                                foreach($photoSide as $eachRow){
                                    echo 
                                    '
                                        <li data-thumb="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productDetail[0]['tendanhmuc']."/"."gallery/".$eachRow['anh'].'">
                                            <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$productDetail[0]['tendanhmuc']."/"."gallery/".$eachRow['anh'].'" alt="">
                                        </li>

                                    ';
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="details col-xl-5 col-md-12">
                    <h3 class="product-title"><?= $productDetail[0]['tensp'] ?></h3>
                    <div class="review-product">
                        <div class="row rating">
                            <div class="col-3 stars"> <span class="fa fa-star checked"></span> <span
                                    class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                            <div class="col-3 review-no"><?= count($rateProducts) ." "?>Đánh giá</div>
                            <div class="col-6"><strong><a href="#">Đánh giá</a></strong></div>
                        </div>
                        <span class="line start-0 end-0 " style="background-color: #d4d4d4;"></span>
                    </div>

                    <div class="content-detail-product">
                        <?php 
                 
                             $phantram = $controller->checkDiscountMoney($productDetail[0]['phantram']);
                 
                 
                             if($productDetail[0]['phantram'] == 0)
                             {
                                $discountPrice = "<div class='pb-4'></div>";
                                $currentPrice = $controller->currency_format($productDetail[0]['giagoc']*$phantram);
                             }
                             else{
                                $discountPrice = $controller->currency_format($productDetail[0]['giagoc']);
                                $currentPrice = $controller->currency_format($productDetail[0]['giagoc']*$phantram);
                             }
                        ?>
                        <div class="col-md-6 col-8">
                            <div>
                                <div class=" bd-hghliight text-info h5">
                                    <strong><?= $currentPrice ?></strong>
                                </div>
                                <span>
                                    <div class=" bd-highlight h6"><strong>Tình trạng</strong></div>
                                </span>
                                <span>
                                    <div class=" bd-highlight h6"><strong>Loại sản phẩm</strong></div>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <div>
                                <div class=" bd-highlight text-secondary h5 "><del><?= $discountPrice ?></del></div>
                                <span>
                                    <div class=" bd-highlight text-secondary h6 ">Còn hàng</div>
                                </span>
                                <span>
                                    <div class=" bd-highlight text-secondary h6 ">CPU</div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->

                    <span class="line start-0 end-0 " style="background-color: #d4d4d4;"></span>

                    <div class="buttons_added">
                        <div style="margin:12px 5px"> Số lượng: </div>
                        <input class="minus is-form" type="button" value="-">
                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number"
                            value="1">
                        <input class="plus is-form" type="button" value="+">
                    </div>
                    <span class="line start-0 end-0 " style="background-color: #d4d4d4;"></span>
                    <p class="product-sold">Số sản phẩm bán được: <?= count($qtySale) ?> </p>
                    <span class="line start-0 end-0 " style="background-color: #d4d4d4;"></span>
                    <p class="pt-4">✔ Bảo hành chính hãng 32 tháng. </p>
                    <p>✔ Hỗ trợ đổi mới trong 7 ngày. </p>
                    <p>✔ Miễn phí giao hàng toàn quốc.</p>


                    <div class="action">
                        <a> <button class=" add-to-cart" type="button">Thêm vào giỏ hàng
                                <span class="fa fa-shopping-cart"></span></button> </a>
                        <!-- <a href="#" target="_blank"> <button class="buy-now" type="button">Mua ngay</button> -->
                        </a>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <div id="main">
        <div class="container">
            <h2 class="title-page pb-3"><?= ($productDetail[0]['tensp']) ?></h2>
            <div class="group-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông
                            số</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Mô
                            tả kĩ thuật</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                            data-toggle="tab">Đánh giá</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-4">
                    <div role="tabpanel " class="tab-pane active" id="home">
                        <div class="container">
                            <h3>Thông số kĩ thuật</h3>
                            <table class="table table-hover">
                                <tbody>
                                    <?php 
                                        
                                        foreach($SpecInfo as $eachRow){
                                            // var_dump(json_decode(utf8_encode($eachRow['noidung2']), true));
                                            foreach(json_decode(($eachRow['noidung1']), true) as $eachRow2){
                                            
                                            echo 
                                                '
                                                <tr>
                                                    <th>'.$eachRow2['loai'].'</th>
                                                    <th>'.$eachRow2['noidung'].'</th>
                                                </tr>
                                                
                                                ';

                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <?php  
                            if(isset($DesInfo)){
                                echo $DesInfo[0]['noidung1'];
                            }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">







                        <div class="container bootdey">
                            <div class="col-md-12 bootstrap snippets">
                                <div class="panel comment">
                                    <div id="rating" style="padding: 0 0 0 10px;">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                     
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                     
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                     
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                     
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    </div>
                                    <div class="panel-body comment">
                                        <textarea class="form-control" rows="5" placeholder="Bình luận ..."></textarea>
                                        <div class="clearfix text-end pt-3">
                                            <button class="btn btn-sm btn-primary post-comment" type="submit"><i
                                                    class="fa fa-pencil fa-fw"></i> Đăng</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-body">
                                       <?php 
                                            if(isset($rateProducts)){
                                                foreach($rateProducts as $eachRow){
                                                    echo 
                                                '
                                                    <div class="media-block">
                                                        <a class="media-left" href="#"> <img class="img-circle img-sm" src="'.$GLOBALS['USER_DIRECTORY_SHOW'].$eachRow['anh'].'" alt="'.$eachRow['anh'].'" style="width:55px"></a>
                                                        <div class="media-body">
                                                            <div class="mar-btm">
                                                                <a href="#" class="btn-link text-semibold media-heading box-inline">'.$eachRow['tenhienthi'].'</a>
                                                                <p class="text-muted text-sm">'.$eachRow['ngaytao'].'</p>
                                                            </div>
                                                            <p>
                                                                '.$eachRow['noidung'].'
                                                            </p>
            
                                                            
                                                        </div>
                                                        <hr>
                                                    </div>

                                                ';
                                                }
                                            }
                                       ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--  Product suggestion Section-->
    <section class="Product-suggestion_section layout_padding">
        <div class="container">
            <div class="title-suggestion text-center">
                <h4 class="Product-suggestion-title"><span class="px-2">SẢN PHẨM TƯƠNG TỰ</span></h4>
            </div>
            <div class="row ">
                <?php 
                    echo $homectrl->mainProduct($suggestProduct);
                ?>
            </div>
        </div>

    </section>

    <?php
    include("include/footer.php");
?>

<script type="text/javascript">
    $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 6
});
</script>

<script>
    $('.add-to-cart').on('click', function(){
        var qty_update = $('.input-qty').val();
        // alert(qty_update);
        // var id_product = 
    })
</script>


