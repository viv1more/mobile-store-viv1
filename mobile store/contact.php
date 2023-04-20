<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     
    $query=mysqli_query($con, "insert into tblcontact(Name,Email,Message) value('$name','$email','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Mobile Store Management System||Contact Page</title>
   
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

    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <!-- ::::::  Start  Header Section  ::::::  -->
  <?php include_once('includes/header.php');?>
    
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Home</a></li>
                        <li class="page-breadcrumb__nav active">Contact Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  Start  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="map">
                        <img src="assets/img/banner/banner-home-4-img-2 (3).jpg" height="500" width="870" alt="" class="banner__img">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="contact-info-wrap gray-bg m-t-40">
                        <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a>+<?php  echo $row['MobileNumber'];?></a>
                                
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-globe-asia"></i>
                            </div>
                            <div class="contact-info-dec">
                                <a><?php  echo $row['Email'];?></a>
                               
                            </div>
                        </div>
                        <div class="single-contact-info">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-info-dec">
                                <span>Address goes here,</span>
                                <span><?php  echo $row['PageDescription'];?>.</span>
                            </div>
                        </div>
                        <div class="contact-social m-t-40">
                            <div class="section-content">
                                <h5 class="section-content__title">Follow Us</h5>
                            </div>
                            <div class="social-link m-t-30">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><?php } ?>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form gray-bg m-t-40">
                        <div class="section-content">
                            <h5 class="section-content__title">Get In Touch</h5>
                        </div>
                        <form class="contact-form-style" id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-box__single-group">
                                        <input type="text" placeholder="Name" required="true" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-box__single-group">
                                        <input type="email" placeholder="Email" required="true" name="email">
                                    </div>
                                </div>
                               
                                <div class="col-lg-12">
                                    <div class="form-box__single-group">
                                        <textarea rows="10" placeholder="Your Messege" required="true"name="message"></textarea>
                                    </div>
                                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30" type="submit" name="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="assets/js/main.js"></script>
</body>

</html>
