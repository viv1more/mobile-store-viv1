<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{
  if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['msmsuid'];
$query=mysqli_query($con,"insert into tblorders(UserId,PId) values('$userid','$pid') ");
if($query)
{
 echo "<script>alert('Mobile has been added in to the cart');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
// Code for deleting product from wishlist
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from tblwish where ID='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'wishlist.php'</script>";     


}
  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mobile Store Management System||Wishlist</title>
   
    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->

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

   <?php include_once('includes/header.php');?>
   <!-- ::::::  Start  Breadcrumb Section  ::::::  -->
    <div class="page-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="page-breadcrumb__menu">
                        <li class="page-breadcrumb__nav"><a href="index.php">Home</a></li>
                        <li class="page-breadcrumb__nav active">Wishlist Page</li>
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
                        <h5 class="section-content__title">Your Wishlist items</h5>
                    </div>
                    <!-- Start Wishlist Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                
                                    <th>Subtotal</th>
                                    <th>Remove</th>
                                    <th>ADD TO CART</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <?php 
$userid= $_SESSION['msmsuid'];
$query=mysqli_query($con,"select tblproducts.Image1,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ModelNumber,tblproducts.Price,tblproducts.Stock,tblwish.ProductId,tblwish.ID from tblwish join tblproducts on tblproducts.ID=tblwish.ProductId where tblwish.UserId='$userid'");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
                                    <td class="product-thumbnail">
                                        <a href="single.php?pid=<?php  echo $row['ID'];?>"><img class="img-fluid" src="admin/images/<?php echo $row['Image1'];?>" width="150" height="150" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="single.php?pid=<?php  echo $row['ID'];?>"><?php echo $row['ProductName'];?></a></td>
                                    <td class="product-price-cart"><span class="amount">$<?php echo $row['Price'];?></span></td>
                                    
                                    <td class="product-subtotal">$<?php echo $row['Price'];?></td>
                                     <td class="product-remove">
                                      
                                        <a href="wishlist.php?delid=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td class="product-add-cart">
                                       
                                        <?php if($_SESSION['msmsuid']==""){?>
                                    <a href="login.php" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">Add to Cart</a>
<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">Add to Cart</button>
  </form> 
<?php }?>
                                    </td>
                                </tr>
                               
                              <?php } }?>

                              
                            </tbody>
                        </table>
                    </div>  <!-- End Wishlist Table -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

 <?php include_once('includes/footer.php');?>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center">Product Successfully Added To Your Shopping Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="modal__product-img">
                                        <img class="img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="modal__product-title">SonicFuel Wireless Over-Ear Headphones</span>
                                    <span class="modal__product-price m-tb-15">$31.59</span>
                                    <ul class="modal__product-info ">
                                        <li>Size:<span> S</span></li>
                                        <li>Quantity:<span>3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 modal__border">
                            <span class="modal__product-cart-item">There are 3 items in your cart.</span>
                            <ul class="modal__product-shipping-info m-tb-15">
                                <li>Total products:<span>$94.78</span></li>
                                <li>Total shipping:<span>$7.00</span></li>
                                <li>Taxes:<span>$0.00</span></li>
                                <li>Total: <span>$101.78 (tax excl.)</span></li>
                            </ul>
                            
                            <div class="modal__product-cart-buttons">
                                <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight" data-dismiss="modal">Continue Shopping</a>
                                <a href="checkout.html" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Process to checkout</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div> <!-- End Modal Add cart -->

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
