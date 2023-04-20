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
                                    <a href="single-1.html" class="banner__link">
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
                            <div class="sort-box__tab">
                                <ul class="sort-box__tab-list nav">
                                    <li><a class="sort-nav-link active" data-toggle="tab" href="#sort-grid"><i class="icon-grid"></i>  </a></li>
                                    <li><a class="sort-nav-link" data-toggle="tab" href="#sort-list"><i class="icon-list"></i></a></li>
                                </ul>
                            </div>
                            <span>There Are 13 Products.</span>
                        </div> <!-- Start Sort Left Side -->

                        <div class="sort-box__right">
                            <span>Sort By:</span>
                            <div class="sort-box__option">
                                <label class="select-sort__arrow">
                                    <select name="select-sort" class="select-sort">
                                        <option value="1">Relevance</option>
                                        <option value="2">Name, A to Z</option>
                                        <option value="3"> Name, Z to A </option>
                                        <option value="4"> Price, low to high</option>
                                        <option value="5">Price, high to low</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div> <!-- ::::::  Start Sort Box Section  ::::::  -->

                    <div class="product-tab-area">
                        <div class="tab-content ">
                            <div class="tab-pane show active clearfix" id="sort-grid">
                                <!-- Start Single Default Product -->
                                <?php
                                $bname=$_GET['bname'];
 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }

    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 

    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblproducts where BrandName='$bname'");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1
                    
$ret=mysqli_query($con,"select * from tblproducts where BrandName='$bname' LIMIT $offset, $total_records_per_page");
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
                                        <span class="product__tag product__tag--discount">-13%</span>
                                       <?php if($_SESSION['msmsuid']==""){?>
                                                    <a href="login.php?wpid=<?php  echo $row['ID'];?>" class="product__wishlist-icon"><i class="icon-heart"></i></a>
                                                    <?php } else {?>
                                                        <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['ID'];?>">   
<button type="submit" name="wsubmit" class="product__wishlist-icon"><i class="icon-heart"></i></button>
  </form> 
<?php }?>
                                    </div>
                                    <div class="product__price m-t-10">
                                        <span class="product__price-del"></span>
                                        <span class="product__price-reg">₹ <?php echo $row['Price'];?></span>
                                    </div>
                                    <a href="single.php?pid=<?php  echo $row['ID'];?>" class="product__link product__link--underline product__link--weight-light m-t-15">
                                        <?php echo $row['ProductName'];?>
                                    </a>
                                </div><?php } ?> <!-- End Single Default Product -->
                                <!-- Start Single Default Product -->
                                
                                
                            </div>
                        </div>
                    </div>

                    <div class="page-pagination">
                        <span>Showing 1-12 of 13 item(s)</span>
                        <ul class="page-pagination__list">
                            <li class="page-pagination__item">
                              <a class="page-pagination__link btn btn--gray"  href="#"><i class="icon-chevron-left"></i> Previous</a>
                            </li>
                            <li class="page-pagination__item"><a class="page-pagination__link active btn btn--gray"  href="#">1</a></li>
                            <li class="page-pagination__item"><a class="page-pagination__link btn btn--gray"  href="#">2</a></li>
                            <li class="page-pagination__item">
                              <a class="page-pagination__link btn btn--gray"  href="#">Next<i class="icon-chevron-right"></i></a>
                            </li>
                          </ul>
                          
                    </div>
                </div>  <!-- Start Rightside - Content -->
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- ::::::  Start  Footer Section  ::::::  -->
  <?php include_once('includes/footer.php');?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

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
                                    <span class="modal__product-price m-tb-15">₹359</span>
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

    <!-- Start Modal Quickview cart -->
    <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center">Quick View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery-box m-b-60">
                                    <div class="modal-product-image--large overflow-hidden">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-1.jpg" alt=""></div>
                                            <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-2.jpg" alt=""></div>
                                            <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-3.jpg" alt=""></div>
                                            <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-4.jpg" alt=""></div>
                                            <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-large/product-gallery-large-5.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <div class="pos-relative">
                                        <div class="modal-product-image--thumb overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                            <div class="swiper-wrapper ">
                                                <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-thumb/product-gallery-thumb-1.jpg" alt=""></div>
                                                <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-thumb/product-gallery-thumb-2.jpg" alt=""></div>
                                                <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-thumb/product-gallery-thumb-3.jpg" alt=""></div>
                                                <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-thumb/product-gallery-thumb-4.jpg" alt=""></div>
                                                <div class="swiper-slide"><img class="img-fluid" src="assets/img/product/gallery/gallery-thumb/product-gallery-thumb-5.jpg" alt=""></div>
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
                                    <h5 class="section-content__title">Canon Vista Fhd 4k Camcorder 2214c002</h5>
                                    <span class="text-reference">Reference: Jhon Doe</span>
                                    <div class="review-box">
                                        <ul class="product__review m-t-10 m-b-15">
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--blank"><i class="icon-star"></i></li>
                                        </ul>
                                    </div>
                                    <div class="product__price">
                                        <span class="product__price-del">$35.90</span>
                                        <span class="product__price-reg">$31.69</span>
                                    </div>
                                    <div class="product__desc m-t-25 m-b-30">
                                        <p>The ATH-S700BT offers clear, full-bodied audio reproduction with Bluetooth® wireless operation. The headphones are equipped with a mic, and music and volume controls, allowing you to ...</p>
                                    </div>
                                    <div class="product-var p-t-30">
                                        <div class="product-size product-var__item">
                                            <span class="product-var__text">Size</span>
                                            <select id="product-size">
                                                <option value="small">S</option>
                                                <option value="medium">M</option>
                                                <option value="large">L</option>
                                                <option value="extraLarge">XL</option>
                                                <option value="doubleLarge">XXL</option>
                                            </select>
                                        </div>
                                        <div class="product-color product-var__item">
                                            <span class="product-var__text">Color</span>
                                            <div class="sidebar__color-filter ">
                                                <label class="product-color"><input name="product-color" type="radio" class="product-color-select" value="color-red"><span></span></label>
                                                <label class="product-color" ><input name="product-color" type="radio" class="product-color-select"   value="color-green" checked><span></span></label>
                                                <label class="product-color" ><input name="product-color" type="radio" class="product-color-select"   value="color-blue"><span></span></label>
                                            </div>
                                        </div>
                                        <div class="product-quantity product-var__item">
                                            <span class="product-var__text">Quantity</span>
                                            <div class="product-quantity-box">
                                                <div class="quantity">
                                                    <input type="number" min="1" max="9" step="1" value="1">
                                                </div>
                                                <a href="#modalAddCart" data-toggle="modal" data-dismiss="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20">Add to cart</a>
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
                                        <a href="wishlist.html" class="link--gray link--icon-left shop__wishlist-icon m-b-5"><i class="icon-heart"></i>Add To Wishlist</a>
                                    </div>
                                </div>
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
