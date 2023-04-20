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
<title>Mobile Store Management System|| Order Count Report</title>
<?php include_once('includes/cs.php');?>
</head>
<body>

<!--Header-part-->
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="stock-report.php" class="tip-bottom">Order Count Report</a></div>
  <h1>Order Count Report</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Order Count Report</h5>
        </div>
        <div class="widget-content nopadding">
         
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
<h5 align="center" style="color:blue">Order Count Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
<tr>
<th>S.NO</th>
<th>Total Order</th>
<th>Total Order not confirmed</th>
<th>Total Order Confirmed</th>
<th>Total Order Cancelled</th>
<th>Total Order Pickup</th>
<th>Total Delivered</th>
</tr>
</thead>
<?php
$ret=mysqli_query($con,"select month(OrderTime) as lmonth,year(OrderTime) as lyear,count(ID) as totalcount,count(if(OrderFinalStatus='',0,null)) as uncofirmedorder,count(if(OrderFinalStatus='Order Confirmed',0,null)) as confirmedorder,count(if(OrderFinalStatus='Mobile Pickup',0,null)) as mpickup,count(if(OrderFinalStatus='Mobile Delivered',0,null)) as mdel,count(if(OrderFinalStatus='Order Cancelled',0,null)) as mcancel from tblorderaddresses where OrderTime between '$fdate' and '$tdate' group by lmonth,lyear");
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalcount'];?></td>
              <td><?php  echo $npytotal=$row['uncofirmedorder'];?></td>
                  <td><?php  echo $ntotal=$row['confirmedorder'];?></td>
                    <td><?php  echo $tctotal=$row['mcancel'];?></td>
                <td><?php  echo $intotal=$row['mpickup'];?></td>
                <td><?php  echo $aritotal=$row['mdel'];?></td>
                    </tr>
                <?php
$ftotal+=$total;
$ttlny+=$npytotal;
$fntotal+=$ntotal;
$fctotal+=$tctotal;

$fintotal+=$intotal;
$faritotal+=$aritotal;

}?>
   
   <tr>
                  <td>Total </td>
              <td><?php  echo $ftotal;?></td>
              <td><?php echo $ttlny;?></td>
                  <td><?php  echo $fntotal;?></td>
                      <td><?php  echo $fctotal;?></td>
                 
                <td><?php  echo $fintotal;?></td>
                <td><?php  echo $faritotal;?></td>
                 
                 
                </tr>   

</table>
        </div>
      </div>
    
    </div>
  </div>
 </div>
</div>
<?php include_once('includes/footer.php');?>
<?php include_once('includes/js.php');?>
</body>
</html>
<?php } ?>