<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);


  ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Mobile Store Management System | Track Order</title>
   
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
                        <li class="page-breadcrumb__nav active">Track Order</li>
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
                <!-- login area start -->
                <div class="login-register-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                                <div class="login-register-wrapper">
                                  
                                    <div class="tab-content">
                                        <div id="lg1" class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                  <div class="main_title">
                    
                    <h5>Track Your Order by your provided order number.</h5>
                </div>
                                                      <div class="main_title">
                   <form action="" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Track Your Order">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <button type="submit" value="submit" name="search" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">submit now</button>
                            </div>
                        </form>
                </div>
                 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>

                                 <table class="table table-bordered mg-b-0">
                                    <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Order Number</th>
                  <th>Order Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
$ret=mysqli_query($con,"select * from tblorderaddresses where Ordernumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

     <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['Ordernumber'];?></td>
                  <td><?php  echo $row['OrderTime'];?></td>
                                    <td><a href="trackinvorder.php?oid=<?php echo $row['Ordernumber'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
               
              </tbody>
            </table>
                                                       
                                                </div>
                                            </div>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login area end -->
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
