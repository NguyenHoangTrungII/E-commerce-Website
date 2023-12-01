<?php
    include("include/session.php");
    include("include/top.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/Controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/DoAnWeb/DoAnWeb_TEstMVC/Controller/HomeController.php");
    require_once('../Controller/ProductList/getall-product.php');
    require_once('../Admin/Model/Pagination.php');
    require_once('../Controller/HomeController.php');
?>

<?php 

    if(isset($_REQUEST['id']))
    {
        $_SESSION['category_id'] = $_REQUEST['id'];
    }

    if(empty($_SESSION['category_id']))
    {
        $_SESSION['category_id'] = 1;
    }


    // Lấy thương hiệu hiện có của danh mục được chọn
    $tableName = $columnName =$whereValue = $joinCondition= null;
    $tableName['MAIN']= "ct_danhmuc";
    $tableName['1'] = 'nhacungcap';
    $columnName['1'] = "ct_danhmuc.id_thuonghieu id_thuonghieu";
    $columnName['2'] = "nhacungcap.tenncc tenncc";
    $whereValue['id_danhmuc']=$_SESSION['category_id'];
    $joinCondition = array("1"=>array("ct_danhmuc.id_thuonghieu", "nhacungcap.id"));

    $brandsList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue);

    //Lấy giá cao nhất của sản phẩm thuộc danh mục
    $tableName = $columnName =$whereValue = $joinCondition= null;
    $tableName['MAIN']= "danhmucsp";
    $tableName['1'] = 'sanpham';
    $columnName['1'] = "giagoc";
    // $columnName['2'] = "nhacungcap.tenncc tenncc";
    $whereValue['id_danhmuc']=$_SESSION['category_id'];
    $paginate["POINT"]=0;
    $paginate["LIMIT"]=1;
    $formatBy["DESC"] = "giagoc";

    $joinCondition = array("1"=>array("danhmucsp.id", "sanpham.id_danhmuc"));

    $maxPriceList = $Model->selectJoinData($columnName, $tableName, null, $joinCondition, $whereValue, "=", $formatBy, $paginate);



$pagination = new Pagination;

  $config = array(
    'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1,
    'total_record'  => count_all_member($_SESSION['category_id']), 
    'limit'         => 5,
    'link_full'     => 'productlist.php?id='.$_SESSION['category_id'].'& page={page}',
    'link_first'    => 'productlist.php?id='.$_SESSION['category_id'].'',
    'range'         => 3
  );


$pagination->init($config);

// Lấy limit, start
$limit = $start= null;
$limit = $pagination->get_config('limit');
$start = $pagination->get_config('start');


// Lấy danh sách sản phẩm
$productList = getAll($limit, $start, $_SESSION['category_id']);

// var_dump($config);


?>

     <!-- Breadcrumb Section Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb/classes-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>SẢN PHẨM</h2>
                        <div class="breadcrumb-option">
                            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                            <a>Sản phẩm</a><span>tên sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
</section>
<!-- Hero Section End -->


    <!-- Product List Section Begin -->
    <section class="product-list pt-5">
        <div class="container">
            <div class="bg-white rounded d-flex align-items-center justify-content-between toolbox horizontal-filter"
                id="header">

                <div class="toolbox-left pl-3">

                    <span>Lọc:</span>
                    <label class="toggle-switchy pl-2" for="fitter-product" data-size="sm" data-text="false"
                        data-style="rounded" data-toggle="collapse" data-target="#filterbar" aria-expanded="false"
                        aria-controls="filterbar" id="filter-btn">
                        <input checked type="checkbox" id="fitter-product">
                        <span class="toggle">
                            <span class="switch"></span>
                        </span>
                    </label>

                </div>
                <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynav"
                        aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation"
                        onclick="changeIcon()" id="icon"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="mynav">
                        <ul class="navbar-nav d-lg-flex align-items-lg-center">
                            <li class="nav-item active"> <select name="sort " id="sort-product-detail">
                                    <option value="-1" hidden selected>Sắp xếp theo</option>
                                    <!-- <option value="price">Phổ biến</option> -->
                                    <option value="0">Mới nhất</option>
                                    <option value="1">Giá tăng dần</option>
                                    <option value="2">Giá giảm dần</option>
                                </select> </li>
                            <li class="nav-item d-lg-none d-inline-flex"> </li>
                        </ul>
                    </div>
                </nav>

            </div>
            <div id="content" class="my-5">
                <div id="filterbar" class="collapse">
                    <div class="box border-bottom">
                        <div class="form-group text-center">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-success form-check-label"> <input id="filtter-reset" class="form-check-input"
                                        type="radio"> Đặt lại </label>
                                <label class="btn btn-success form-check-label active"> <input id="filtter-apply" class="form-check-input"
                                        type="radio" checked> Áp dụng </label>
                            </div>
                        </div>
                        <div> <label class="tick">Hàng mới <input class="new_old" type="checkbox" checked="checked"> <span
                                    class="check"></span> </label> </div>
                        <div> <label class="tick">Sale sốc <input class="new_old" type="checkbox"> <span class="check"></span> </label>
                        </div>
                    </div>
                    <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Thương hiệu<button
                                class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box2"
                                aria-expanded="false" aria-controls="inner-box2"><span
                                    class="fas fa-plus"></span></button> </div>
                        <div id="inner-box2" class="brands-selected collapse mt-2 mr-1">
                            <?php 
                                foreach($brandsList as $eachBrand){
                                    echo 
                                    '
                                        <div class="my-1"> <label class="tick" id="'.$eachBrand['id_thuonghieu'].'">'.$eachBrand['tenncc'].'<input class="brand-select" type="checkbox" >
                                        <span class="check"></span> </label> </div>
                                    ';
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="box border-bottom">
                        <!-- <div class="box"> -->

                        <!-- <div class="container"> -->
                        <div class="row pt-4">
                            <div class="col-sm-12">
                            <div id="slider-range"></div>
                            </div>
                        </div>
                        <div class="row slider-labels">
                            <div class="col-xs-6 caption">
                            <strong>Từ:</strong> <span id="slider-range-value1"></span>
                            </div>
                            <div class="col-xs-6 caption">
                            <strong>Đến:</strong> <span id="slider-range-value2"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <form>
                                <input type="hidden" name="min-value" value="">
                                <input type="hidden" name="max-value" value="">
                            </form>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div id="products">
                <div id="products-show" class="row mx-0">

                <?php 
                    $homecontroller = new HomeController;
                    echo $homecontroller ->mainProduct($productList);
                ?>

                </div>
            </div>
            <div class="row">
                <div id="padding-link" class="paging d-flex justify-content-end px-5 py-4">
                        <?php echo $pagination->html(); ?>
                    </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product List Section End -->

    <!-- <div class="container"> -->


    <!-- <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header"> -->

    <!-- <div class="row"> -->

    <!-- <div class="col-12">
                <nav class="toolbox horizontal-filter">
                    <div class="toolbox-left">
                        <div class="filter-toggle opened" data-toggle="collapse" data-target="#filterbar"
                            aria-expanded="false" aria-controls="filterbar" id="filter-btn" onclick="changeBtnTxt()">
                            <span>Lọc:</span>
                            <a href="#">&nbsp;</a>
                        </div>
                    </div>
                    <div class="toolbox-item toolbox-sort">
                        <div class="select-custom">
                            <select name="orderby" class="form-control orderby ">
                                <option value="menu_order" selected="selected">DEFAULT SORTING</option>
                                <option value="popularity">POPULARITY</option>
                                <option value="date">NEW PRODUCT</option>
                                <option value="price">PRICE (LOW to HIGH)</option>
                                <option value="price-desc">PRICE (HIGH to LOW)</option>
                            </select>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                        <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set
                                Ascending
                                Direction</span></a>
                    </div>
                    <div class="toolbox-item">
                        <div class="toolbox-item toolbox-show">

                            <label>Showing 0-0 of 0 results</label>

                        </div>
                        <div class="layout-modes">
                            <a href="category.php" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="category-list.php" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                    </div>
                    <div class="toolbox-item">
                    </div>
                </nav>
            </div> -->


    <!-- <div class="col-12">
                <div id="content" class="my-5">
                    <div id="filterbar" class="collapse">
                        <div class="box border-bottom">
                            <div class="form-group text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                            type="radio"> Đặt lại </label>
                                    <label class="btn btn-success form-check-label active"> <input
                                            class="form-check-input" type="radio" checked> Áp dụng </label>
                                </div>
                            </div>
                            <div> <label class="tick">Hàng mới <input type="checkbox" checked="checked"> <span
                                        class="check"></span> </label> </div>
                            <div> <label class="tick">Sale sốc <input type="checkbox"> <span class="check"></span>
                                </label>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Phân loại <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box"
                                    aria-expanded="false" aria-controls="inner-box" id="out" onclick="outerFilter()">
                                    <span class="fas fa-plus"></span> </button> </div>
                            <div id="inner-box" class="collapse mt-2 mr-1">
                                <div class="my-1"> <label class="tick">Mainboard <input type="checkbox"
                                            checked="checked">
                                        <span class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Bộ nhớ SSD <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Bộ nhớ HDD <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">CPU <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Sound Card <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">VGA <input type="checkbox" checked> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Case <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">Keo tản nhiệt <input type="checkbox" checked>
                                        <span class="check"></span> </label> </div>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Bộ lọc 2 <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#inner-box2"
                                    aria-expanded="false" aria-controls="inner-box2"><span
                                        class="fas fa-plus"></span></button> </div>
                            <div id="inner-box2" class="collapse mt-2 mr-1">
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox" checked="checked">
                                        <span class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox" checked> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="my-1"> <label class="tick">bộ lọc <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Giá <button
                                    class="btn ml-auto" type="button" data-toggle="collapse" data-target="#price"
                                    aria-expanded="false" aria-controls="price"><span
                                        class="fas fa-plus"></span></button>
                            </div>
                            <div class="collapse" id="price">
                                <div class="middle">
                                    <div class="multi-range-slider"> <input type="range" id="input-left" min="0"
                                            max="100" value="10"> <input type="range" id="input-right" min="0" max="100"
                                            value="50">
                                        <div class="slider">
                                            <div class="track"></div>
                                            <div class="range"></div>
                                            <div class="thumb left"></div>
                                            <div class="thumb right"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <div> <span id="amount-left" class="font-weight-bold"></span> VND </div>
                                    <div> <span id="amount-right" class="font-weight-bold"></span> VND </div>
                                </div>
                            </div>
                        </div>
                        <-- <div class="box"> -->
    <!-- <div class="box-label text-uppercase d-flex align-items-center">size <button class="btn ml-auto"
                            type="button" data-toggle="collapse" data-target="#size" aria-expanded="false"
                            aria-controls="size"><span class="fas fa-plus"></span></button> </div>
                    <div id="size" class="collapse">
                        <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox"> 80 </label> <label class="btn btn-success form-check-label">
                                <input class="form-check-input" type="checkbox" checked> 92 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 102 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 104 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 106 </label> <label
                                class="btn btn-success form-check-label"> <input class="form-check-input"
                                    type="checkbox" checked> 108 </label> </div>
                    </div>
                    </div>
                </div>
            </div>  -->
    <!-- </div> -->

    <!-- </div> -->
    <?php
    include("include/footer.php");
?>

<script>
    $('.tick').on("click", function(){
        // history.pushState("state", "", "productlist.php?page=3");
    })
</script>

<script>
    $(document).on('click','a.page-link' ,function (e)
    {
    e.preventDefault();

    // $('.page-item').removeClass('active');
    // $(this).closest('li').addClass('active');

    var url = $(this).attr('href');
    var flag = true;
    var matchedPos =  url.search("page=\\d");
    var matched = url.substr(matchedPos);
    var num = parseInt(matched.split("=")[1]);
    if( num > 0) {
        page = num;
    } else { 
        page = 1;
    }
    $.ajax({
            url :  "http://localhost/doanweb/DoAnWeb_testMVC/Controller/ProductList/productlist-paging.php",
            type : "POST",
            data: {flag: flag, page:page},
            dataType : "json",
            success : function (data)
            {
                // console.debug(data)
                // console.debug(data);
                $('#products-show').html("");
                $('#products-show').append(data['productListHtml']);

                $("#padding-link").html(data['paging']);

                window.history.pushState({path:url},'',url);
            }
        });
        
    })
</script>

<script>
    $('#filtter-apply').on('click', function(){
        //Lấy thương hiệu được chọn
        var brands = {};
        var new_old ={}
        var price ={};
        var i= 0;
        var order_by_request =  $( "#sort-product-detail option:selected" ).val();

        $('#filterbar').find('.new_old').each(function(k, elm){
            new_old[k] = elm.checked;
        })

        console.debug(new_old);


        $('.brands-selected').find('.brand-select').each(function(k, elm){
            if(elm.checked)
            {
                brands[i] = $(elm).parent().attr('id');
                i++;
            }        

            })

        //Lấy khoản giá
        price['tu'] = ($('#slider-range-value1').text()).replace(/\D/g, "");
        price['den'] =($('#slider-range-value2').text()).replace(/\D/g, "") ;

        $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/ProductList/fitter-product.php",
            type:"POST",
            data:{
                brand: JSON.stringify(brands),
                new_old: JSON.stringify(new_old), 
                price: JSON.stringify(price),
                order_by: order_by_request

            },
            dataType:"json",
            success: function(data){
                $('#products-show').html("");
                $('#products-show').append(data['productListHtml']);
                $("#padding-link").html();
                $("#padding-link").html(data['paging']);

                window.history.pushState({path:url},'',url);
                // let sql_code = data['productListHtml'];
            }     
        });
    })
</script>

<script>
    //Order by
      $('#sort-product-detail').on('change', function(){
        //Lấy giá trị bộ lộc
        var brands = {};
        var new_old ={}
        var price ={};
        var i= 0;

        $('#filterbar').find('.new_old').each(function(k, elm){
            new_old[k] = elm.checked;
        })

        $('.brands-selected').find('.brand-select').each(function(k, elm){
            if(elm.checked)
            {
                brands[i] = $(elm).parent().attr('id');
                i++;
            }        

            })

        //Lấy khoản giá
        price['tu'] = ($('#slider-range-value1').text()).replace(/\D/g, "");
        price['den'] =($('#slider-range-value2').text()).replace(/\D/g, "") ;

        //Lấy order by
       var order_by_request =  $( "#sort-product-detail option:selected" ).val();

    //    alert(order_by_request);

        $.ajax({
            url: "http://localhost/DoAnWeb/DoAnWeb_testMVC/Controller/ProductList/fitter-order-by.php",
            type:"POST",
            data:{
                brand: JSON.stringify(brands),
                new_old: JSON.stringify(new_old), 
                price: JSON.stringify(price),
                order_by: order_by_request
            },
            dataType:"json",
            success: function(data){
                $('#products-show').html("");
                $('#products-show').append(data['productListHtml']);
                $("#padding-link").html();
                $("#padding-link").html(data['paging']);

                window.history.pushState({path:url},'',url);
                // let sql_code = data['productListHtml'];
            }     
        });
    })

</script>

<style>
    /* .container {
    margin-top: 125px;
    } */

    .slider-labels {
    margin-top: 10px;
    }

    /* Functional styling;
    * These styles are required for noUiSlider to function.
    * You don't need to change these rules to apply your design.
    */
    .noUi-target,.noUi-target * {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -ms-touch-action: none;
    touch-action: none;
    -ms-user-select: none;
    -moz-user-select: none;
    user-select: none;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }

    .noUi-target {
    position: relative;
    direction: ltr;
    }

    .noUi-base {
    width: 100%;
    height: 100%;
    position: relative;
    z-index: 1;
    /* Fix 401 */
    }

    .noUi-origin {
    position: absolute;
    right: 0;
    top: 0;
    left: 0;
    bottom: 0;
    }

    .noUi-handle {
    position: relative;
    z-index: 1;
    }

    .noUi-stacking .noUi-handle {
    /* This class is applied to the lower origin when
    its values is > 50%. */
    z-index: 10;
    }

    .noUi-state-tap .noUi-origin {
    -webkit-transition: left 0.3s,top .3s;
    transition: left 0.3s,top .3s;
    }

    .noUi-state-drag * {
    cursor: inherit !important;
    }

    /* Painting and performance;
    * Browsers can paint handles in their own layer.
    */
    .noUi-base,.noUi-handle {
    -webkit-transform: translate3d(0,0,0);
    transform: translate3d(0,0,0);
    }

    /* Slider size and handle placement;
    */
    .noUi-horizontal {
    height: 4px;
    }

    .noUi-horizontal .noUi-handle {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    left: -7px;
    top: -7px;
    background-color: #345DBB;
    }

    /* Styling;
    */
    .noUi-background {
    background: #D6D7D9;
    }

    .noUi-connect {
    background: #345DBB;
    -webkit-transition: background 450ms;
    transition: background 450ms;
    }

    .noUi-origin {
    border-radius: 2px;
    }

    .noUi-target {
    border-radius: 2px;
    }

    .noUi-target.noUi-connect {
    }

    /* Handles and cursors;
    */
    .noUi-draggable {
    cursor: w-resize;
    }

    .noUi-vertical .noUi-draggable {
    cursor: n-resize;
    }

    .noUi-handle {
    cursor: default;
    -webkit-box-sizing: content-box !important;
    -moz-box-sizing: content-box !important;
    box-sizing: content-box !important;
    }

    .noUi-handle:active {
    border: 8px solid #345DBB;
    border: 8px solid rgba(53,93,187,0.38);
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    left: -14px;
    top: -14px;
    }

    /* Disabled state;
    */
    [disabled].noUi-connect,[disabled] .noUi-connect {
    background: #B8B8B8;
    }

    [disabled].noUi-origin,[disabled] .noUi-handle {
    cursor: not-allowed;
    }
</style>