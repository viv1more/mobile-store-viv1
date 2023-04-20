<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  }   ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Mobile Store Management System||My Orders</title>
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
     <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
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
                        <li class="page-breadcrumb__nav active">Order Page</li>
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
                        <h5 class="section-content__title">Your Order Detail</h5>
                    </div>
                    <!-- Start Cart Table -->
                    <div class="table-content table-responsive cart-table-content m-t-30">
                        <table>
                            <thead class="gray-bg" >
                                <tr>
                                    <th>#</th>
                                <th>Order ID</th>
                                <th>Order Date and Time</th>
                                <th>Order Status</th>
                                <th>Track Order</th>
                                <th>View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <?php
                                   $userid= $_SESSION['msmsuid'];
 $query=mysqli_query($con,"select * from  tblorderaddresses  where UserId='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>
               <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['Ordernumber'];?></td>
<td><p><b>Order Date :</b> <?php echo $row['OrderTime']?></p></td>  
<td><?php $status=$row['OrderFinalStatus'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

                                                    ?>  </td>   
<td><li class="list-inline-item"><i class="fa fa-motorcycle"></i> 
<?php    

$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
?>
 <a  href="javascript:void(0);" onClick="popUpWindow('trackorder.php?oid=<?php echo htmlentities($row['Ordernumber']);?>');" title="Track order">Track Order</a></li></td>
<td><a href="order-detail.php?orderid=<?php echo $row['Ordernumber'];?>" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight">View Details</a></td>       
</tr><?php $cnt=$cnt+1; } ?>
                             
                            </tbody>
                        </table>
                    </div>  <!-- End Cart Table -->
                     <!-- Start Cart Table Button -->
                   
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
