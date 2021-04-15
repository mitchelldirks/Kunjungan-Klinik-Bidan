<?php 
include "config/koneksi.php";
if (isset($_GET['logout']) || !isset($_SESSION['id_user'])) {
  session_destroy();
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "layout/head.php"; ?>
</head>

<body class="">
  <div class="wrapper ">
    <?php include "layout/sidebar.php"; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">
              <?php echo @$_GET['module'] ? ucwords($_GET['module']) : "Dashboard"; ?>
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="?">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <a class="dropdown-item" href="#">Profile</a> -->
                  <!-- <a class="dropdown-item" href="#">Settings</a> -->
                  <!-- <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="?logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php
            $page = isset($_GET['module']) ? $_GET['module'] : 'dashboard.php';
            if (isset($_GET['module'])) {
              $act = isset($_GET['act']) ? '/'.$_GET['act'].'.php' : '/index.php';
            }else{
              $act = '';
            }
            include 'module/'.$page.$act;
            ?>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <?php include "layout/script.php"; ?>
</body>
<?php unset($_SESSION['flash']) ?>
</html>