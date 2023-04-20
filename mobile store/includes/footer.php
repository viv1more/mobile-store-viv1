<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<footer class="footer">
        <div class="footer__top gray-bg p-tb-100 m-t-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="index.html" class="footer__logo-link">
                                    <h2>Mobile Store</h2>
                                </a>
                            </div>
                            <div class="footer__text">
                                <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <p><?php  echo $row['PageDescription'];?>.</p><?php } ?>
                            </div>
                            <ul class="footer__address">
                                 <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <li class="footer__address-item"><span>Address:</span> <?php  echo $row['PageDescription'];?>.</li>
                                <li class="footer__address-item"><span>Call us: </span>+(<?php  echo $row['MobileNumber'];?>)</li>
                                <li class="footer__address-item"><span>Mail us: </span> <?php  echo $row['Email'];?></li>
                             <li class="footer__address-item"><span>Shop Timing: </span> <?php  echo $row['Timing'];?></li><?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-sm-6 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Quick Link</h4>
                            <ul class="footer__nav">
                               <li><a href="index.php">Home</a></li>
                                    <li><a href="shop-mobile.php">Our Shop</a></li>
                                    <li><a href="about-us.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <?php if (strlen($_SESSION['msmsuid']==0)) {?>
                                <li><a href="registration.php">Sign up</a></li>
                                <li><a href="login.php">Sign in</a></li>
                                <li><a href="cart.html">Track Order</a></li><?php } ?>
                                <?php if (strlen($_SESSION['msmsuid']>0)) {?>
                                <li><a href="cart.php">Cart Page</a></li>
                                <li><a href="my-order.php">My Orders</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-12 col-12">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Follow Us</h4>
                            <ul class="footer__social-nav">
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-google-plus-g"></i></a></li>
                                <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer__form">
                            <h4 class="footer__nav-title">Join Our Newsletter Now</h4>
                            <form action="#" class="footer__form-box" method="post">
                                <input type="email" name="email" placeholder="Your email address">
                                <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit" value="submit" name="sub">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

             
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-12">
                        <div class="footer__copyright-text">
                            <p style="color:red;font-size: 20px;text-align: center;">Mobile Store System @2023</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer> <!-- ::::::  End  Footer Section  ::::::  -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

   