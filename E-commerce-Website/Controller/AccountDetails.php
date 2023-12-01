<?php
class AccountDetails extends Controller
{

    function checkStatusOrder($statusOrder){
        // $status;
        if($statusOrder==1)
        {
           return "";
        } else{
            return "hidden";
        }

        // return $status;
    }

    function stringStatus($numberStatus){
        $array_check = array();
        switch($numberStatus){
            case 1:{
                $array_check['trangthaichu']= "Chưa xác nhận";
                $array_check['trangthai_ht']= '<li class="active step0"></li> <li class=" step0"></li> <li class=" step0"></li> <li class="step0"></li>';
            } break;

            case 2:{
                $array_check['trangthaichu'] = "Đã xác nhận";
                $array_check['trangthai_ht']= '<li class="active step0"></li> <li class="active step0"></li> <li class="active step0"></li> <li class="step0"></li>';

            } break;
            case 3:{
                $array_check['trangthaichu'] = "Đang vận chuyển";
                $array_check['trangthai_ht']= '<li class="active step0"></li> <li class="active step0"></li> <li class=" step0"></li> <li class="step0"></li>';

            } break;
            
            case 5:{
                $array_check['trangthaichu'] = "Đã hủy";
                $array_check['trangthai_ht']= '<li class="active step0"></li> <li class="active step0"></li> <li class="active step0"></li> <li class="active step0"></li>';

            } break;

            case 4:{
                $array_check['trangthaichu'] = "Đã giao";
                $array_check['trangthai_ht']= '<li class="active step0"></li> <li class="active step0"></li> <li class="active step0"></li> <li class="step0"></li>';
            } break;
        }

        return $array_check;
    }

    function historyOrder($dataOrder){
        foreach($dataOrder  as $eachData){
            $statusOrder = self::checkStatusOrder($eachData['tinhtrang']);
            $string = self::stringStatus($eachData['tinhtrang']);

            // var_dump($string['trangthai_ht']);
            
            echo 
            '
                <div class="col-xl-12">
                    <div class="card-product-ordered pt-4">
                        <div class="card-product order-details">
                            <nav class="status-check">
                                <div class="status-tittle order-details">
                                    <button class="fake-btn-status-check"
                                        data-toggle="modal"
                                        data-target="#status-check-header">'.$string['trangthaichu'].'
                                    </button>
                                </div>
                            </nav>
                            <div class="row">
                                <div class="col-3">
                                    <div class="order-item-img">
                                        <img
                                            src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachData['tendanhmuc']."/"."thumbnail/".$eachData['anhsp'].'">
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="description order-details">
                                        <div class="contet-product-order">
                                            <h2 class="name-product-order" id="'.$eachData['idsp'].'">'.$eachData['tensp'].'</h2>
                                            <div class="qty-and-price">
                                                <h2>'.$eachData['soluong'].' x</h2>
                                                <h1>'.controller::currency_format($eachData['giasp']).'</h1>
                                            </div>

                                            <div class="total-product order-detail">
                                                <span class="tittle">TỔNG</span>
                                                <span
                                                    class="price-total">'.controller::currency_format($eachData['giasp']*$eachData['soluong']).'</span>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="btn-product-detail pt-4">
                                        <button
                                            class="cancel-order btn btn-primary order-details" '.$statusOrder.'>Hủy
                                            đơn
                                        </button>
                                        <button
                                            class="btn btn-primary order-details  " '.$statusOrder.'
                                            data-toggle="modal"
                                            data-target="#login_itech">Chỉnh sửa
                                            đơn</button>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <div class="modal animated fadeIn edit-order-details"
                                    id="login_itech" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog position-edit-order-deatils"
                                        role="document">
                                        <div class="modal-content ">
                                            <div
                                                class="modal-header edit-order-details">
                                                <h5
                                                    class="modal-title edit-order-details">
                                                    Chỉnh
                                                    sửa đơn
                                                    hàng
                                                </h5>
                                                <button type="button"
                                                    class="close edit-details"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        class="text-center">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1">Số
                                                        lượng</label>
                                                    <input type="text"
                                                        class="form-control" value="'.$eachData['soluong'].'">
                                                </div>
                                                <div class=" form-group">
                                                    <label for="">Địa chỉ nhận
                                                        hàng</label>
                                                    <textarea
                                                        class="form-control edit-details ">'.$eachData['diachi'].'</textarea>
                                                </div>

                                            </div>

                                            <div class="text-center pb-2"
                                                id="loader_itech">
                                                <button type="button"
                                                    class="btn btn-primary order-details">XÁC
                                                    NHẬN</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal animated fadeIn edit-order-details"
                            id="status-check-header" tabindex="-1" role="dialog"
                            aria-hidden="true">

                            <div
                                class="container d-flex justify-content-center position-status-order-deatils">

                                <div class="card status-check order-details">
                                    <div class="close-btn status-check ">
                                        <button type="button"
                                            class="close edit-details"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"
                                                class="text-center">&times;</span>
                                        </button>
                                    </div>

                                    <div class="container px-5">
                                        <div
                                            class="row d-flex justify-content-evenly px-3 header-status-check deatil">
                                            <div class="col-md-6 d-flex">
                                                <h5>Đơn <span
                                                        class="text-primary font-weight-bold" id="order-id-account">'.$eachData['madonhang'].' </span>
                                                </h5>
                                            </div>
                                            <div
                                                class="col-md-6 d-flex flex-column text-sm-right code-order-details">
                                                <p class="mb-0">Ngày đặt
                                                    <span>'.$eachData['ngaydat'].' </span>
                                                </p>
                                                <p>Mã đơn hàng <span
                                                        class="font-weight-bold">'.$eachData['mavanchuyen'].'</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12">
                                            <ul id="progressbar"
                                                class="text-center">
                                                '.$string['trangthai_ht'].'
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="row justify-content-between d-flex header-status-check">
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bx-circle" style="font-size: 40px;color: #33A0FF;"></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Hủy <br>
                                                    đơn
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bx-check-circle" style="font-size: 40px;color: #33A0FF;" ></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Xác <br>
                                                    Nhận</p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i
                                                class="icon status-check fa-solid fa-truck-fast"></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Đang
                                                    <br>
                                                    vận chuyển
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bxs-home" style="font-size: 40px;color: #33A0FF;" ></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Đã <br>
                                                    giao
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            ';
        }
    }

    function historyCloneOrder($eachData){
        // foreach($dataOrder  as $eachData){
            $statusOrder = self::checkStatusOrder($eachData[0]['tinhtrang']);
            $string = self::stringStatus($eachData[0]['tinhtrang']);

            // var_dump($string['trangthai_ht']);
            
            return 
            '
                <div class="col-xl-12">
                    <div class="card-product-ordered pt-4">
                        <div class="card-product order-details">
                            <nav class="status-check">
                                <div class="status-tittle order-details">
                                    <button class="fake-btn-status-check"
                                        data-toggle="modal"
                                        data-target="#status-check-header">'.$string['trangthaichu'].'
                                    </button>
                                </div>
                            </nav>
                            <div class="row">
                                <div class="col-3">
                                    <div class="order-item-img">
                                        <img
                                            src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachData[0]['tendanhmuc']."/"."thumbnail/".$eachData[0]['anhsp'].'">
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="description order-details">
                                        <div class="contet-product-order">
                                            <h2 class="name-product-order" id="'.$eachData[0]['idsp'].'">'.$eachData[0]['tensp'].'</h2>
                                            <div class="qty-and-price">
                                                <h2>'.$eachData[0]['soluong'].' x</h2>
                                                <h1>'.controller::currency_format($eachData[0]['giasp']).'</h1>
                                            </div>

                                            <div class="total-product order-detail">
                                                <span class="tittle">TỔNG</span>
                                                <span
                                                    class="price-total">'.controller::currency_format($eachData[0]['giasp']*$eachData[0]['soluong']).'</span>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="btn-product-detail pt-4">
                                        <button
                                            class="cancel-order btn btn-primary order-details" '.$statusOrder.'>Hủy
                                            đơn
                                        </button>
                                        <button
                                            class="btn btn-primary order-details  " '.$statusOrder.'
                                            data-toggle="modal"
                                            data-target="#login_itech">Chỉnh sửa
                                            đơn</button>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <div class="modal animated fadeIn edit-order-details"
                                    id="login_itech" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog position-edit-order-deatils"
                                        role="document">
                                        <div class="modal-content ">
                                            <div
                                                class="modal-header edit-order-details">
                                                <h5
                                                    class="modal-title edit-order-details">
                                                    Chỉnh
                                                    sửa đơn
                                                    hàng
                                                </h5>
                                                <button type="button"
                                                    class="close edit-details"
                                                    data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"
                                                        class="text-center">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label
                                                        for="exampleInputEmail1">Số
                                                        lượng</label>
                                                    <input type="text"
                                                        class="form-control" value="'.$eachData[0]['soluong'].'">
                                                </div>
                                                <div class=" form-group">
                                                    <label for="">Địa chỉ nhận
                                                        hàng</label>
                                                    <textarea
                                                        class="form-control edit-details ">'.$eachData[0]['diachi'].'</textarea>
                                                </div>

                                            </div>

                                            <div class="text-center pb-2"
                                                id="loader_itech">
                                                <button type="button"
                                                    class="btn btn-primary order-details">XÁC
                                                    NHẬN</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal animated fadeIn edit-order-details"
                            id="status-check-header" tabindex="-1" role="dialog"
                            aria-hidden="true">

                            <div
                                class="container d-flex justify-content-center position-status-order-deatils">

                                <div class="card status-check order-details">
                                    <div class="close-btn status-check ">
                                        <button type="button"
                                            class="close edit-details"
                                            data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"
                                                class="text-center">&times;</span>
                                        </button>
                                    </div>

                                    <div class="container px-5">
                                        <div
                                            class="row d-flex justify-content-evenly px-3 header-status-check deatil">
                                            <div class="col-md-6 d-flex">
                                                <h5>Đơn <span
                                                        class="text-primary font-weight-bold" id="order-id-account">'.$eachData[0]['madonhang'].' </span>
                                                </h5>
                                            </div>
                                            <div
                                                class="col-md-6 d-flex flex-column text-sm-right code-order-details">
                                                <p class="mb-0">Ngày đặt
                                                    <span>'.$eachData[0]['ngaydat'].' </span>
                                                </p>
                                                <p>Mã đơn hàng <span
                                                        class="font-weight-bold">'.$eachData[0]['mavanchuyen'].'</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12">
                                            <ul id="progressbar"
                                                class="text-center">
                                                '.$string['trangthai_ht'].'
                                            </ul>
                                        </div>
                                    </div>
                                    <div
                                        class="row justify-content-between d-flex header-status-check">
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bx-circle" style="font-size: 40px;color: #33A0FF;"></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Hủy <br>
                                                    đơn
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bx-check-circle" style="font-size: 40px;color: #33A0FF;" ></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Xác <br>
                                                    Nhận</p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i
                                                class="icon status-check fa-solid fa-truck-fast"></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Đang
                                                    <br>
                                                    vận chuyển
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-3 d-flex icon-content status-check">
                                            <i class="bx bxs-home" style="font-size: 40px;color: #33A0FF;" ></i>
                                            <div class="d-flex flex-column">
                                                <p class="font-weight-bold">Đã <br>
                                                    giao
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            ';
        // }
    }
}
?>