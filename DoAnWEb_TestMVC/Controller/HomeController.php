<?php
class HomeController extends Controller
{

    public function categoryHeroBanner($categoryList){
        foreach($categoryList as $eachCategory){
            echo
            '
                <li><a href="#">'.$eachCategory['tendanhmuc'].'</a></li>

            ';
        }
    }


	public function hotSealProductList($productList){
        foreach($productList AS $eachProduct)
		{
							
			echo 
            '
                <div class="col-lg-3 col-xl-3 col-md-6">
                    <div class="product product__hot--style">
                        <div class="product-img">
                            <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachProduct['anh'].'" alt="">
                            <div class="product-label">
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a onclick="cart.add("1000")"><i
                                            class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-another ">
                                <p class="product-category">'.$eachProduct['tendanhmuc'].'</p>
                                <h3 class="product-name"><a href="#">'.$eachProduct['tensp'].'</a></h3>
                                <h4 class="product-price">'.$eachProduct['giagoc']*$eachProduct['phantram'].'<del
                                        class="product-old-price">'.$eachProduct['tendanhmuc'].'</del>
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
		}
    }

    public function CategoryMainProduct($brandList){
        foreach($brandList as $eachBrand){
            $lowBrandName = $eachBrand;
            echo 
            '
                <li class="item" data-owl-filter="'.'.'.$lowBrandName.'">'.$eachBrand.'</li>
                <li class="item" data-owl-filter=".gigabyte">Gigabyte</li>

            ';
        }
    }

    public function menuMainProduct($brandList, $categoryName){
				
			echo 
            '
                <div class="row under-line-product" style="border-bottom: 2px solid #b7b7b7">
                    <div class="col-lg-4 col-md-4 p-0">
                        <div class="main-product-title">
                            <h4>'.$categoryName.'</h4>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <ul class="filter__controls line_1">
                            <li class="item active" data-owl-filter="*">Tất cả</li>
                            '.HomeController::categoryMainProduct($brandList).'
                        </ul>
                    </div>
                </div>
            ';
    }

    public function mainProduct($productList){
        foreach($productList AS $eachProduct)
		{

            if($eachProduct['phantram'] > 30)
            {
                $labelSale = '<span class="sale">'.$eachProduct['phantram'].'</span>';
            }
            else{
                $labelSale = "";
            }

            // label mới sẽ làm nếu có time
            // <span class="new">MỚI</span>

			echo 
            '
                <div class="col-lg-3 col-xl-3 col-md-6 item asus">
                    <div class="product ">
                        <div class="product-img">
                            <img src="'.$GLOBALS['PRODUCT_DIRECTORY_SHOW'].$eachProduct['anh'].'" alt="">
                            <div class="product-label">
                                '.$labelSale.'
                            </div>

                            <ul class="product-chose">
                                <li><a href="#"><i class="add-to-wishlist fa fa-eye"></i></a></li>
                                <li><a  onclick="cart.add("1000")" href="#"><i class="add-to-wishlist fa-solid fa-cart-shopping"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-body">
                            <div class="product-band">
                                <span class="band">'.$eachProduct['tenncc'].'</span>
                            </div>
                            <div class="product-another ">
                                <p class="product-category">'.$eachProduct['tendanhmuc'].'</p>
                                <h3 class="product-name"><a href="#">'.$eachProduct['tensp'].'</a></h3>
                                <h4 class="product-price">'.$eachProduct['giagoc']*$eachProduct['phantram'].'<del class="product-old-price">'.$eachProduct['giagoc'].'</del>
                                </h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-all text-center pt-3">

                 <a href="productlist.php?id='.$eachProduct['id'].'" class="primary-btn all-product"> Xem tất cả sản phẩm</a>
                </div>
            ';
		}
    }
}
?>