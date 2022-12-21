<?php
require_once("controller.php");
    class Role extends Controller{
        function menuByRole($listRole){
            $user = " ";
            $menu = array("list-slider.php", "list-rate.php", "list-question.php", "list-order.php", "list-employee.php", "list-category.php", "list_warehouse.php", "list_product.php", "list_discount.php", "list_customer");
            if(Controller::checkprivilege($listRole, $menu[9])){
                $user .= 
                '
                    
                ';

            }
            
        }
    }
?>