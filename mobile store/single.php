<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['review']))
  {
    $name=$_POST['name'];
    $review=$_POST['review'];
    $reviewtitle=$_POST['reviewtitle'];
     $pid=$_GET['pid'];
    $query=mysqli_query($con, "insert into tblreview(ProductID,ReviewTitle,Review,Name) value('$pid','$reviewtitle','$review','$name')");
    if ($query) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
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
    <title>Mobile Store Management System||Single Product</title>
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
                        <li class="page-breadcrumb__nav active">Single Product Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- ::::::  End  Breadcrumb Section  ::::::  -->

    <!-- ::::::  Start  Main Container Section  ::::::  -->
    <main id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <!-- Start Product Details Gallery -->
                <?php
$pid=$_GET['pid'];
                    
$ret=mysqli_query($con,"select * from tblproducts where ID='$pid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery-box m-b-60">
                                    <div class="product-image--large overflow-hidden">
                                        <img class="img-fluid" id="img-zoom" src="admin/images/<?php echo $row['Image1'];?>" data-zoom-image="admin/images/<?php echo $row['Image1'];?>" alt="">
                                    </div>
                                    <div class="pos-relative m-t-30">
                                        <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <a class="zoom-active" data-image="admin/images/<?php echo $row['Image1'];?>" data-zoom-image="admin/images/<?php echo $row['Image1'];?>">
                                                        <img class="img-fluid" src="admin/images/<?php echo $row['Image1'];?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="swiper-slide">
                                                    <a data-image="admin/images/<?php echo $row['Image2'];?>" data-zoom-image="admin/images/<?php echo $row['Image2'];?>">
                                                        <img class="img-fluid" src="admin/images/<?php echo $row['Image2'];?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="swiper-slide">
                                                    <a data-image="admin/images/<?php echo $row['Image3'];?>" data-zoom-image="admin/images/<?php echo $row['Image3'];?>">
                                                        <img class="img-fluid" src="admin/images/<?php echo $row['Image3'];?>" alt="">
                                                    </a>
                                                </div>
                                             
                                               
                                            </div>
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next gallery__nav gallery__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details-box">
                                    <h5 class="section-content__title"><?php echo $row['ProductName'];?></h5>
                                    <span class="text-reference">Brand: <?php echo $row['BrandName'];?></span>
                                    <div class="review-box">
                                         <?php
                            $pid=$_GET['pid'];
$ret2=mysqli_query($con,"select * from tblreview where ProductID='$pid' && Status='Review Accept'");
$num1=mysqli_num_rows($ret2);

?>
                                        <a href="#product-review" class="link--gray link--icon-left  m-b-5"><i class="fal fa-comment-dots"></i>Read reviews (<?php echo $num1;?>) </a>
                                        <a href="#modalReview" data-toggle="modal" class="link--gray link--icon-left m-b-5"><i class="fal fa-edit"></i> Write a review</a>
                                    </div>
                                    <div class="product__price">
                                        
                                        <span class="product__price-reg">₹ <?php echo $row['Price'];?></span>
                                    </div>
                                    <div class="product__desc m-t-25 m-b-30">
                                        <p><?php echo $row['Specification'];?> </p>
                                    </div>
                                    <div class="product-var p-t-30">
                                        
                                        <div class="product-color product-var__item">
                                            <span class="product-var__text">Color: <?php echo $row['Color'];?></span>
                                           
                                        </div>
                                        <div class="product-quantity product-var__item">
                                            <div class="product-quantity-box">
                                        
                                               <?php if($_SESSION['msmsuid']==""){?>
                                    <a href="login.php" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">Add to Cart</a>
<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="submit" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">Add to Cart</button>
  </form> 
<?php }?>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="product-links ">
                                        <div class="product-social m-tb-30">
                                            <span>Share</span>
                                            <ul class="product-social-link">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                         <?php if($_SESSION['msmsuid']==""){?>
                                        <a href="login.php" class="link--gray link--icon-left shop__wishlist-icon m-b-5"><i class="icon-heart"></i>Add To Wishlist</a>
                                        <?php } else {?>
                                            <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="wsubmit" class="product__wishlist-icon"><i class="icon-heart"></i></button>
  </form> 
<?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- End Product Details Gallery -->
                
                <!-- Start Product Details Tab -->
                <div class="col-12">
                    <div class="product product--1 border-around product-details-tab-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content--border">
                                    <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-70 nav">
                                        <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Description</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-dis">Product Details</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-review">Reviews</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="product-details-tab-box m-t-50">
                                <div class="tab-content">
                                    <!-- Start Tab - Product Description -->
                                    <div class="tab-pane show active" id="product-desc">
                                        <div class="para__content">
                                            <p class="para__text"><?php echo $row['Specification'];?>.</p>

                                            <h6 class="para__title">Product Highlights:</h6>
                                            <ul class="para__list">
                                                <li>Model Number: <?php echo $row['ModelNumber'];?></li>
                                                <li>RAM: <?php echo $row['RAM'];?></li>
                                                <li>ROM: <?php echo $row['ROM'];?></li>
                                                <li>Expandable Upto<?php echo $row['ExpandableUpto'];?></li>
                                                <li>Front Camera: <?php echo $row['FrontCamera'];?></li>
                                                <li>Processor: <?php echo $row['Processor'];?></li>
                                                <li>Dispay: <?php echo $row['Display'];?></li>
                                                <br>
                                               <h6 class="para__title">Key Features:</h6>
                                               <p class="para__text"><?php echo $row['KeyFeature'];?>.</p>
                                            </ul>

                                        </div>    
                                    </div>  <!-- End Tab - Product Description -->

                                    <!-- Start Tab - Product Details -->
                                    <div class="tab-pane" id="product-dis">
                                        <div class="product-dis__content">
                                            <h3>Mobile Detail</h3>
                                            <div class="table-responsive-md">
                                                <table class="product-dis__list table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="product-dis__title">Model Number</td>
                                                            <td class="product-dis__text"><?php echo $row['ModelNumber'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="product-dis__title">RAM</td>
                                                            <td class="product-dis__text"><?php echo $row['RAM'];?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="product-dis__title">ROM</td>
                                                            <td class="product-dis__text"><?php echo $row['ROM'];?></td>
                                                        </tr>
                                                        <tr> 
                                                            <td class="product-dis__title">Expandable Upto</td>
                                                            <td class="product-dis__text"><?php echo $row['ExpandableUpto'];?></td>
                                                        </tr>
                                                        <tr> 
                                                            <td class="product-dis__title">Front Camera</td>
                                                            <td class="product-dis__text"><?php echo $row['FrontCamera'];?></td>
                                                        </tr>
                                                        <tr> 
                                                            <td class="product-dis__title">Processor</td>
                                                            <td class="product-dis__text"><?php echo $row['Processor'];?></td>
                                                        </tr>
                                                        <tr> 
                                                            <td class="product-dis__title">Dispay</td>
                                                            <td class="product-dis__text"><?php echo $row['Display'];?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><?php } ?>  <!-- End Tab - Product Details -->
                                     <!-- Start Tab - Product Review -->
                                    <div class="tab-pane " id="product-review">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <?php
$pid=$_GET['pid'];
                    
$ret=mysqli_query($con,"select * from tblreview where ProductID='$pid' && Status='Review Accept'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                                    
                                                    <div class="comment__content">
                                                     
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text"><?php echo $row['Review'];?> </p>
                                                          <strong> Review by</strong> <?php echo $row['Name'];?> at <?php echo $row['DateofReview'];?>
                                                        </div>
                                                    </div>
                                                </div><?php }?> 
                                                <!-- Start - Review Comment Reply-->
                                                
                                            </li> <!-- End - Review Comment list-->
                                            <!-- Start - Review Comment list-->
                                            
                                        </ul>  <!-- End - Review Comment -->

                                        <a href="#modalReview" data-toggle="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Write a review</a>
                                    </div>  <!-- Start Tab - Product Review -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>  <!-- End Product Details Tab -->

               
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

<?php include_once('includes/footer.php');?>

    <!-- material-scrolltop button -->
   

    
    
    <!-- Start Modal Review cart -->
    <div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center">WRITE YOUR REVIEW</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6">
                            <?php
$pid=$_GET['pid'];
                    
$ret=mysqli_query($con,"select * from tblproducts where ID='$pid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="modal-review-img">
                                    <img class="img-fluid  border-around" src="admin/images/<?php echo $row['Image1'];?>" height="300" width="300" alt="">
                                </div>
                                <span class="modal__product-title m-t-25"><?php echo $row['ProductName'];?></span>
                                <div class="product__desc m-t-15">
                                    <p><?php echo $row['Specification'];?> ...</p>
                                </div>
                            <?php }?></div>
                            <div class="col-md-6">
                                <h6>Write Your Review</h6>
                                <div class="review-box">
                                    <span>Quality</span>
                                    <ul class="product__review">
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--fill"><i class="icon-star"></i></li>
                                        <li class="product__review--blank"><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <form action="#" method="post" class="form-box">
                                    <div class="form-box__single-group">
                                        <label for="form-message">Title for your review*</label>
                                        <input type="text" id="reviewtitle" name="reviewtitle" required="true">
                                    </div>
                                    <div class="form-box__single-group">
                                        <label for="form-review">Your review*</label>
                                        <textarea id="review" rows="5" name="review" required="true"></textarea>
                                    </div>
                                    <div class="form-box__single-group">
                                        <label for="form-name">Your name*</label>
                                        <input type="text" id="name" name="name">
                                    </div>
                                    <div class="from-box__buttons d-flex justify-content-between d-flex-warp m-t-25 align-items-center">
                                        <div class="from-box__left">
                                            <span>* Required fields</span>
                                        </div>
                                        <div class="form-box-right">
                                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit" name="review">Send</button>
                                            or
                                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Quickview cart -->

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
