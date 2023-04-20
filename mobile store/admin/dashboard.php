<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mobile Store Management System|| Dashboard</title>

<?php include_once('includes/cs.php');?>
</head>
<body>

 



<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<br />
  <div class="container-fluid">
   <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <?php $query1=mysqli_query($con,"Select * from tblbrand where Status='1'");
$brandcount=mysqli_num_rows($query1);
?>
            <div class="left peity_bar_neutral"><i class="fa fa-building-o fa-4x" aria-hidden="true"></i></div>
            <div class="right"> <strong><?php echo $brandcount;?></strong> <a href="manage-brand.php">Total Brand</a> </div>
          </li>
          
          
          <li>
            <?php $query4=mysqli_query($con,"Select * from tblproducts where Status='1'");
$productcount=mysqli_num_rows($query4);
?>
            <div class="left peity_line_good">  <i class="fa fa-mobile fa-4x"></i></div>
            <div class="right"> <strong><?php echo $productcount;?></strong> <a href="manage-product.php">Total Product</a> </div>
          </li>
          <li>
            <?php $query5=mysqli_query($con,"Select * from tbluser");
$totuser=mysqli_num_rows($query5);
?>
            <div class="left peity_bar_good"><i class="fa fa-users fa-4x" aria-hidden="true"></i></div>
            <div class="right"> <strong><?php echo $totuser;?></strong> <a href="reg-users.php">Total User</a> </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <?php
    $fstatus='Mobile Delivered';        
//todays sale
 $query6=mysqli_query($con,"
select sum(Price) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblproducts on tblproducts.ID=tblorders.PId where date(tblorderaddresses.OrderTime)=CURDATE() and tblorderaddresses.OrderFinalStatus='$fstatus'

  ");
while($row=mysqli_fetch_array($query6))
{
$todays_sale=$row['Price'];
$todysale+=$todays_sale;

}
 ?>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="50" height="24"></canvas>
              </span></div>
            <div class="right"> <strong>$<?php echo $todysale;?></strong> <a href="#">Today's Sale</a> </div>
          </li>
          <li>
           <?php
//Yesterday's sale
 $query7=mysqli_query($con,"
select sum(Price) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblproducts on tblproducts.ID=tblorders.PId where date(tblorderaddresses.OrderTime)=CURDATE()-1 and tblorderaddresses.OrderFinalStatus='$fstatus'");
while($row=mysqli_fetch_array($query7))
{
$yesterdays_sale=$row['totalitmprice'];
$yesterdaysale+=$yesterdays_sale;

}
 ?>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="50" height="24"></canvas>
              </span></div>
             <div class="right"> <strong>$<?php echo $yesterdaysale;?></strong> <a href="#">Yesterday's Sale</a> </div>
          </li>
          <li>
            <?php
//Last Sevendays Sale
 $query8=mysqli_query($con,"
select sum(Price) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblproducts on tblproducts.ID=tblorders.PId where date(tblorderaddresses.OrderTime)>=(DATE(NOW()) - INTERVAL 7 DAY) and tblorderaddresses.OrderFinalStatus='$fstatus'
  ");
while($row=mysqli_fetch_array($query8))
{
$sevendays_sale=$row['totalitmprice'];
$tseven+=$sevendays_sale;
}
 ?>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="50" height="24"></canvas>
              </span></div>
            <div class="right"> <strong>$<?php echo $tseven;?></strong> <a href="#">Last Sevenday's Sale</a> </div>
          </li>
          <li>
            <?php
//Total Sale
 $query9=mysqli_query($con,"select sum(Price) as totalitmprice from tblorders join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber join tblproducts on tblproducts.ID=tblorders.PId where tblorderaddresses.OrderFinalStatus='$fstatus'");
while($row=mysqli_fetch_array($query9))
{
$total_sale=$row['totalitmprice'];
$totalsale+=$total_sale;
}
 ?>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="50" height="24"></canvas>
              </span></div>
            <div class="right"> <strong>$<?php echo $totalsale;?></strong> <a href="#">Total Sale</a> </div>
          </li>
         
        </ul>
      </div>
    </div>
  </div>
</div>
<?php include_once('includes/footer.php');?>

<?php include_once('includes/js.php');?>
</body>
</html>
<?php } ?>