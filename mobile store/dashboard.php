<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Mobile Store Management System||My Account-Dashboard</title>
   
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.css">
    <link rel="stylesheet" href="assets/css/vendor/plaza-icon.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="assets/css/plugin/swiper.min.css">
    <link rel="stylesheet" href="assets/css/plugin/material-scrolltop.css">
    <link rel="stylesheet" href="assets/css/plugin/price_range_style.css">
    <link rel="stylesheet" href="assets/css/plugin/in-number.css">
    <link rel="stylesheet" href="assets/css/plugin/venobox.min.css">


    <!-- Main Style CSS File -->
    <link rel="stylesheet" href="assets/css/main.css">
    
</head>

<body>

   <?php include_once('includes/header.php');?>
    
    <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Home</a></li>
                        <li class="page-breadcrumb__nav active">My Account Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                                  <div class="row">
                        <?php include_once('includes/sidebar.php');?>
                        <?php
$uid=$_SESSION['msmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

    <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                               <p>Hello, <strong><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></strong> (If Not <strong><?php  echo $row['LastName'];?> !</strong> <a
                                                        href="logout.php">Logout</a> )</p>
                                            </div>
                                            <p class="m-t-25">From your account dashboard. you can easily check &amp; view your
                                                recent orders, manage your shipping and billing addresses and edit your password and
                                                account details.</p>
                                        </div>
                                    </div>
                                </div></div>
                            <?php } ?>

                     
                </div>
            </div>
        </div>
        </div></div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- ::::::  Start  Footer Section  ::::::  -->
    <?php include_once('includes/footer.php');?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>
    

    <!-- ::::::::::::::All Javascripts Files here ::::::::::::::-->

    <!-- Vendor JS Files -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.js"></script>

    <!-- Plugins JS Files -->
    <script src="assets/js/plugin/swiper.min.js"></script>
    <script src="assets/js/plugin/jquery.countdown.min.js"></script>
    <script src="assets/js/plugin/material-scrolltop.js"></script>
    <script src="assets/js/plugin/price_range_script.js"></script>
    <script src="assets/js/plugin/in-number.js"></script>
    <script src="assets/js/plugin/jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="assets/js/plugin/venobox.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html><?php } ?>
