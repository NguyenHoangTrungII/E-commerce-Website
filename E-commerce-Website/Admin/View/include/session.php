<?php
if(@$_REQUEST['exit'] == "yes")
{
	session_start();
	session_destroy();
	header("Location: login.php");
}


if(empty($_SESSION['SMC_login_time']) && empty($_SESSION['SMC_login_id']))
{
	header("Location: login.php"); 
}

?>