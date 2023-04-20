<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{ 
// Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblorders where ID='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'cart.php'</script>";     


}

  

    ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mobile Store Management System||Cart</title>
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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css"/>
    <link rel="stylesheet" href="assets/css/plugin/plugins.min.css"/>
    <link rel="stylesheet" href="assets/css/main.min.css"> -->

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
                        <li class="page-breadcrumb__nav active">Cart Page</li>
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
                    <div class="section-content">
                        <h5 class="section-content__title">Your cart items</h5>
                    </div>
                    <!-- Start Cart Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
                            <thead class="gray-bg" >
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                 
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
$userid= $_SESSION['msmsuid'];
$query=mysqli_query($con,"select tblproducts.Image1,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ModelNumber,tblproducts.Price,tblproducts.Stock,tblorders.PId,tblorders.ID from tblorders join tblproducts on tblproducts.ID=tblorders.PId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="single.php?pid=<?php  echo $row['ID'];?>"><img class="img-fluid" src="admin/images/<?php echo $row['Image1']?>" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="single.php?pid=<?php  echo $row['ProductName'];?>"><?php  echo $row['ProductName'];?></a></td>
                                    <td class="product-price-cart"><span class="amount">₹<?php echo $total=$row['Price']?></span></td>
                                    <?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                           
 ?>
                                    <td class="product-subtotal">₹<?php echo $total ?></td>
                                    <td class="product-remove">
                                       
                                        <a href="cart.php?delid=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr><?php $cnt++; } }?>
                            </tbody>
                        </table>
                    </div>  <!-- End Cart Table -->
                     <!-- Start Cart Table Button -->
                    <div class="cart-table-button m-t-10">
                        <div class="cart-table-button--left">
                            <a href="shop-mobile.php" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">CONTINUE SHOPPING</a>
                        </div>
                       
                    </div>  <!-- End Cart Table Button -->
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="sidebar__widget gray-bg m-t-40">
                        <div class="sidebar__box">
                            <h5 class="sidebar__title">Cart Total</h5>
                        </div>
                        <h6 class="total-cost">Sub Total<span>₹<?php echo $grandtotal;?></span></h6>
                        
                        <h4 class="grand-total m-tb-25">Grand Total <span>₹<?php echo $grandtotal;?></span></h4>
                       
                        <a class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" href="checkout.php">Proceed to Checkout</a>
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

</html><?php } ?>
