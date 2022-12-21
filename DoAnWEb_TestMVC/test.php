<?php
function check(){
    preg_match('/edit_employee\.php\?id=\d+$/', 'http://localhost/doanweb/DoAnWeb_testMVC/admin/View/edit_employee.php?id=5', $match);
    return $match;

}
var_dump( $_SERVER['REQUEST_URI']
);