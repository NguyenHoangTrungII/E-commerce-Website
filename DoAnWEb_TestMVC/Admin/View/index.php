<?php
    // session_start();
    include("include/menu.php");
    include("include/session.php");
    include("include/top.php");
?>

<!-- get role -->
<?php
  if($_SESSION['SMC_login_admin_type']==1){
    $_SESSION['SMC_login_admin_role']="Admin";
  }
  else {
    $_SESSION['SMC_login_admin_role']="Quản lý";
  }
?>


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

        </div>

<?php
    include("include/tail.php");
?>