<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{ 

//placing order

if(isset($_POST['placeorder'])){
//getting address
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$cod=$_POST['cod'];
$userid=$_SESSION['msmsuid'];
//genrating order number
$orderno= mt_rand(100000000, 999999999);
$query="update tblorders set OrderNumber='$orderno',IsOrderPlaced='1',CashonDelivery='$cod' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City,Zipcode,Phone,Email) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city','$zipcode','$phone','$email');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-order.php'</script>";

}
}    

 }   ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mobile Store Management System||Checkout Page</title>
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
                        <li class="page-breadcrumb__nav active">Checkout Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Client Shipping Address -->
                <div class="col-lg-7">
                    <div class="section-content">
                        <h5 class="section-content__title">Billing Details</h5>
                    </div>
                    <form action="#" method="post" class="form-box">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Flat or Building Number *</label>
                                    
                                    <input type="text" name="flatbldgnumber"  placeholder="Flat or Building Number" class="form-control" required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-last-name">Street Name *</label>
                                    <input type="text" name="streename" placeholder="Street Name" class="form-control" required="true">
                                </div>
                            </div>
                            
                          
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-address-1">Area</label>
                                    <input type="text" name="area"  placeholder="Area" class="form-control" >
                                   
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode">* Zip/Postal Code</label>
                                    <input type="text" id="zipcode" class="form-control" name="zipcode" required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Landmark if any</label>
                                    <input type="text" id="zipcode" class="form-control" name="landmark">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Town / City *</label>
                                    <input type="text" name="city" placeholder="City" class="form-control" required="true">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-phone">*Phone</label>
                                    <input type="text" id="form-phone" class="form-control" name="phone" maxlength="10" pattern="[0-9]+">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-email">*Email Address</label>
                                    <input type="email" id="form-email" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                    
                </div> <!-- End Client Shipping Address -->
                
                <!-- Start Order Wrapper -->
                <div class="col-lg-5">
                    <div class="your-order-section">
                        <div class="section-content">
                            <h5 class="section-content__title">Your order</h5>
                        </div>
                        <div class="your-order-box gray-bg m-t-40 m-b-30">
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left">Product</h6>
                                    <h6 class="your-order-top-right">Total</h6>
                                </div>
                                 <?php 
$userid= $_SESSION['msmsuid'];
$query=mysqli_query($con,"select tblproducts.Image1,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ModelNumber,tblproducts.Price,tblproducts.Stock,tblorders.PId,tblorders.ID from tblorders join tblproducts on tblproducts.ID=tblorders.PId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
                                <ul class="your-order-middle">
                                    <li class="d-flex justify-content-between">
                                        <span class="your-order-middle-left"><?php echo $row['ProductName']?></span>
                                        <span class="your-order-middle-right">₹<?php echo $total=$row['Price']?></span>
                                        <?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                           
 ?>
                                    </li>
                                    
                                </ul><?php $cnt++; } }?>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left">Shipping</h6>
                                    <span class="your-order-bottom-right">Free shipping</span>
                                </div>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h5 class="your-order-total-left">Total</h5>
                                    <h5 class="your-order-total-right">₹<?php echo $grandtotal;?></h5>
                                </div>
    
                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div class="panel-group" id="accordion">
                                            
                                            
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-three">
                                                    <h5 class="panel-title">
                                                       <input type="checkbox" name="cod" id="cod" value="Cash on Delivery">
                                                   <strong style="padding-left: 20px;">Cash on Delivery(cod)</strong>
                                                       
                                                    </h5>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight" type="submit" name="placeorder">PLACE ORDER</button></form> 
                    </div>
                </div> <!-- End Order Wrapper -->
            </div>
        </div>
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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="assets/js/main.js"></script>
</body>

</html>
