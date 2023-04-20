<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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

if(isset($_POST['wsubmit']))
{
$wpid=$_POST['wpid'];
$userid= $_SESSION['msmsuid'];
$query=mysqli_query($con,"insert into tblwish(UserId,ProductId) values('$userid','$wpid') ");
if($query)
{
 echo "<script>alert('Mobile has been added to the wishlist');</script>";
 echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
  ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mobile Store Management System||Shop Mobile</title>
   
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


    <!-- Main Style CSS File -->
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
                        <li class="page-breadcrumb__nav active">Mobile Shop </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                 <!-- Start Rightside - Content -->
                <div class="col-12">
                    <!-- ::::::  Start banner Section  ::::::  -->
                    <div class="banner">
                        <div class="row">
                            <div class="col-12">
                                <div class="banner__box">
                                    <a href="shop-mobile.php" class="banner__link">
                                        <img src="assets/img/banner/banner-shop-1-img-1.jpg"  alt="" class="banner__img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ::::::  End banner Section  ::::::  -->

                    <!-- ::::::  Start Sort Box Section  ::::::  -->
                    <div class="sort-box m-tb-30">
                        <!-- Start Sort Left Side -->
                        <div class="sort-box__left">
                           
                            <span style="font-size: 20px;">Mobile Shop.</span>
                        </div> <!-- Start Sort Left Side -->

                        
                    </div> <!-- ::::::  Start Sort Box Section  ::::::  -->

                    <div class="product-tab-area">
                        <div class="tab-content ">
                            <div class="tab-pane show active clearfix" id="sort-grid">
                                <!-- Start Single Default Product -->
                                <?php
//Getting default page number
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
// Formula for pagination
        $no_of_records_per_page = 12;
        $offset = ($pageno-1) * $no_of_records_per_page;
// Getting total number of pages
        $total_pages_sql = "SELECT COUNT(*) FROM tblproducts where Status='1'";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
                    
$ret=mysqli_query($con,"select * from tblproducts where Status='1' LIMIT $offset, $no_of_records_per_page");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="product__box product__box--default product__box--border-hover text-center float-left float-4">
                                    <div class="product__img-box">
                                        <a href="single.php?pid=<?php  echo $row['ID'];?>" class="product__img--link">
                                            <img class="product__img" src="admin/images/<?php echo $row['Image1'];?>" width="150" height="150" alt="">
                                        </a>

                                         <?php if($_SESSION['msmsuid']==""){?>
                                    <a href="login.php" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to Cart</a>
<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">Add to Cart</button>
  </form> 
<?php }?>
                                       
                                       <?php if($_SESSION['msmsuid']==""){?>
                                                    <a href="login.php" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                    <?php } else {?>
                                                        <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="wsubmit" class="product__wishlist-icon"><i class="icon-heart"></i></button>
  </form> 
<?php }?>
                                    </div>
                                    <div class="product__price m-t-10">
                                       
                                        <span class="product__price-reg">₹<?php echo $row['Price'];?></span>
                                    </div>
                                    <a href="single.php?pid=<?php  echo $row['ID'];?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                        <?php echo $row['ProductName'];?>
                                    </a>
                                </div><?php } ?> <!-- End Single Default Product -->
                                <!-- Start Single Default Product -->
                                
                                
                            </div>
                        </div>
                    </div>

                      <div class="page-pagination" align="center">


    <ul class="page-pagination__list" >
        <li class="page-pagination__item"><a href="?pageno=1" class="page-pagination__link btn btn--gray" >First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-pagination__item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-pagination__link btn btn--gray" >Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-pagination__item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-pagination__link btn btn--gray" >Next</a>
        </li>
        <li class="page-pagination__item"><a href="?pageno=<?php echo $total_pages; ?> " class="page-pagination__link btn btn--gray" >Last</a></li>
    </ul>
</div>


                     
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
