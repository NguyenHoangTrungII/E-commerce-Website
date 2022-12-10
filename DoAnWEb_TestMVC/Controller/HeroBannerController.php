<?php
include("../config/site.php");
class HeroBannerController extends Controller
{

    public function cartDetailHeader($cartDetail2){
        $listProduct=" ";
        foreach($cartDetail2 as $eachRow){
            $listProduct .= 
            '
                    <li>
                        <div class="content-shopping-list-item">
                            <div class="remove-icon">
                                <a href="#" class="remove" title="Xóa sản phẩm"><i
                                        class="fa fa-remove"></i></a>
                            </div>
                            <a class="cart-img" href="#"><img
                                    src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW']."thumbail/".$eachRow['anhsp'].'" alt="#"></a>
                            <div class="cart-product-deatil">
                                <h4><a href="productdetail.php?id='.$eachRow['id_sp'].'" style="overflow-wrap: break-word;">'.$eachRow['tensp'].'</a></h4>
                                <p class="quantity">'.$eachRow['soluongsp'].'x- <span class="amount">.'.Controller::currency_format($eachRow['giagoc']*$eachRow['phantram'], "đ") .'</span>
                                </p>
                            </div>
                        </div>
                    </li>

            ';
        }

        return $listProduct;
    }

    public function countProductInCart($cartDetail){
        $n =0;
        foreach($cartDetail as $eachRow){
            $n++;
        }

        return $n;
    }

    public function totalCart($cartDetail){
        $total =0;
        foreach($cartDetail as $eachRow){
            $total += $eachRow['giagoc']*$eachRow['phantram'];
        }

        return $total;
    }

    public function checkLogIn($seasionUser, $cartDetail){
        $numberOfProduct = self::countProductInCart($cartDetail);
        $totalMoney = self::totalCart($cartDetail);
        if(!empty($seasionUser) && $numberOfProduct > 0){
            echo 
            '
                <div class="user-header">
                    <span>'.$seasionUser['SSCF_login_user_showname'].'</span>
                    <a><i class=" user-icon-header fa-regular fa-user"></i></a>

                    <div class="user-item">
                        <div class="dropdown-user-header">
                        </div>
                        <ul class="user-list">
                            <li>
                                <a href=""><i class="fa-solid fa-gear"></i>
                                    <span>Tài khoản của tôi</span></a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <span>Đơn mua của tôi</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-solid fa-lock"></i>
                                    <span>Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fa-solid fa-circle-info"></i>
                                    <span>Thông tin cá nhân</span></a>
                            </li>

                        </ul>
                        <div class="bottom">
                            <!-- <div class="total">
                                <span>Đăng xuất</span>
                                <span>Đăng ký</span>

                            </div> -->
                            <a href="?exit=yes" class="btn animate">Đăng xuất</a>

                        </div>
                    </div>
                </div>

                <!-- Cart -->
                <div class="sinlge-bar shopping">
                    <a href="#" class="single-icon"><i
                            class="header-mid-icon fa-solid fa-cart-shopping"></i> <span
                            class="total-count">'. $numberOfProduct.' </span></a>

                    <div class="shopping-item">
                        <div class="dropdown-cart-header">
                            <span>'. $numberOfProduct.' SẢN PHẨM</span>
                            <a href="#">Xem giỏ hàng</a>
                        </div>
                        <ul class="shopping-list" style="overflow-y: auto;height: 200px;word-break: break-all;">
                            '.self::cartDetailHeader($cartDetail).'
                        </ul>
                        <div class="bottom">
                            <div class="total">
                                <span>Tổng </span>
                                <span class="total-amount"> '.Controller::currency_format($totalMoney).'</span>
                            </div>
                            <a href="checkout.php" class="btn animate">Thanh toán</a>
                        </div>
                    </div>

                </div>
                <!-- /Cart -->

            ';
        }
        else if(!empty($seasionUser) && $numberOfProduct == 0){
            echo 
            '
                <div class="user-header">
                    <span>'.$seasionUser['SSCF_login_user_showname'].'</span>
                    <a><i class=" user-icon-header fa-regular fa-user"></i></a>

                    <div class="user-item">
                        <div class="dropdown-user-header">
                        </div>
                        <ul class="user-list">
                            <li>
                                <a href=""><i class="fa-solid fa-gear"></i>
                                    <span>Tài khoản của tôi</span></a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <span>Đơn mua của tôi</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa-solid fa-lock"></i>
                                    <span>Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fa-solid fa-circle-info"></i>
                                    <span>Thông tin cá nhân</span></a>
                            </li>

                        </ul>
                        <div class="bottom">
                            <!-- <div class="total">
                                <span>Đăng xuất</span>
                                <span>Đăng ký</span>

                            </div> -->
                            <a href="?exit=yes" class="btn animate">Đăng xuất</a>

                        </div>
                    </div>
                </div>

                <!-- Cart -->
                <div class="sinlge-bar shopping">
                    <a href="#" class="single-icon"><i
                            class="header-mid-icon fa-solid fa-cart-shopping"></i> <span
                            class="total-count">'. $numberOfProduct.' </span></a>

                    <div class="shopping-item">
                        <div class="dropdown-cart-header">
                            <span>'. $numberOfProduct.' SẢN PHẨM</span>
                            <a href="#">Xem giỏ hàng</a>
                        </div>
                        <ul class="shopping-list" style="overflow-y: auto;height: 200px;word-break: break-all;">
                            <img src="../assets/img/cart/cart--empty.png" alt="#"></a>
                            <div><span>Bạn chưa có gì trong giỏ hàng</span></div>
                        </ul>
                        
                    </div>

                </div>
                <!-- /Cart -->

            ';
        }
        else
        {
            echo
            '
                <div class="header-mid-side--no-login font-weight-bold" style="padding-right: 100px;">
                    <a href="login.php">Đăng nhập / Đăng ký</a>
                </div>
            ';
        }
    }

    //Banner thích hợp cho homepage và các  trang còn lại

    public function setHeroBanner($sliderList){
        $bannerHero = '<div class="hero-silder owl-carousel">';
        foreach($sliderList as $eachRow){
            $bannerHero .=
            '              
                            <div class="col-lg-12">
                                <div class="hero__item set-bg" data-setbg="'.$GLOBALS['SLIDES_DIRECTORY_SHOW'].$eachRow['url'].'">
                                    <div class="hero__text">

                                    </div>
                                </div>
                            </div>
            ';
        }

        $bannerHero .= 
        ' </div>
                    </div>
                </div>
                </div>
                </section>
                <!-- Hero Section End -->
                </header>';

        echo  $bannerHero;
    }
}
?>