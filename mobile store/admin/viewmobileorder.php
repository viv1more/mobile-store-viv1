<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
   header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $oid=$_GET['orderid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
 
    
    $query=mysqli_query($con,"insert into tbltracking(OrderId,remark,status) value('$oid','$remark','$ressta')"); 
   $query=mysqli_query($con, "update   tblorderaddresses set OrderFinalStatus='$ressta' where Ordernumber='$oid'");
    if ($query) {
   
    echo '<script>alert("Order Has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-order.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}
  

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mobile Store Management System|| View Orders Details</title>
<?php include_once('includes/cs.php');?>
</head>
<body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="all-order.php" class="current">All Orders</a> </div>
    <h1>View Orders Details</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
     
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Orders Details</h5>
          </div>
          <div class="widget-content nopadding">
             <?php
 $oid=$_GET['orderid'];
$ret=mysqli_query($con,"select * from tblorderaddresses join tbluser on tbluser.ID=tblorderaddresses.UserId where tblorderaddresses.Ordernumber='$oid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="2" style="font-size:20px;color:blue">
 User Details</td></tr>

    <tr>
    <th>Order Number</th>
    <td><?php  echo $row['Ordernumber'];?></td>
    <th>First Name</th>
    <td><?php  echo $row['FirstName'];?></td>
 </tr>
    
 
    <th>Last Name</th>
    <td><?php  echo $row['LastName'];?></td>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
    
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th>Flat no./buldng no.</th>
    <td><?php  echo $row['Flatnobuldngno'];?></td>
  </tr>
  
  <tr>
    
       <th>StreetName</th>
    <td><?php  echo $row['StreetName'];?></td>
     <th>Area</th>
    <td><?php  echo $row['Area'];?></td>
  </tr>
 
  <tr>
   
     <th>Land Mark</th>
    <td><?php  echo $row['Landmark'];?></td>
     <th>City</th>
    <td><?php  echo $row['City'];?></td>
  </tr>
  
  <tr>
    <th>Order Final Status</th>
    <td> <?php  
    $orserstatus=$row['OrderFinalStatus'];
if($row['OrderFinalStatus']=="Order Confirmed")
{
  echo "Order Confirmed";
}


if($row['OrderFinalStatus']=="Mobile Pickup")
{
  echo "Mobile Pickup";
}
if($row['OrderFinalStatus']=="On The Way")
{
  echo "Mobile On The Way";
}
if($row['OrderFinalStatus']=="Mobile Delivered")
{
  echo "Mobile Delivered";
}
if($row['OrderFinalStatus']=="")
{
  echo "Wait for shop approval";
}
if($row['OrderFinalStatus']=="Order Cancelled")
{
  echo "Order Cancelled";
}


     ;?></td>
      <th>Order Date</th>
    <td><?php  echo $row['OrderTime'];?></td>
  </tr>
</table>

  
<table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Order  Details</td></tr> 

 <tr>
    <th>#</th>
<th>Product Image </th>
<th>Product Name</th>
<th>Delivey Type</th>
<th>Price</th>
</tr>
<?php  
$oid=$_GET['orderid'];
$query=mysqli_query($con,"select tblproducts.Image1,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ModelNumber,tblproducts.Price,tblproducts.Color,tblproducts.RAM,tblproducts.ROM,tblproducts.ExpandableUpto,tblproducts.FrontCamera,tblproducts.KeyFeature,tblproducts.Specification,tblproducts.Processor,tblproducts.Display,tblorders.PId,tblorders.CashonDelivery from tblproducts join tblorders on tblproducts.ID=tblorders.PId where tblorders.IsOrderPlaced=1 and tblorders.OrderNumber='$oid'");
$num=mysqli_num_rows($query);

$cnt=1;
while ($row1=mysqli_fetch_array($query)) {?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><img src="images/<?php echo $row1['Image1']?>" width="60" height="40" alt="<?php echo $row1['ProductName']?>"></td> 
  <td><?php  echo $row1['ProductName'];?></td> 
  <td><?php  echo $row1['CashonDelivery'];?></td>
   <td>₹ <?php  echo $total=$row1['Price'];?></td> 
</tr>
<?php 
$grandtotal+=$total;
$cnt=$cnt+1;} ?>
<tr>
  <th colspan="4" style="text-align:center;color: red;">Grand Total </th>
<td>₹ <?php  echo $grandtotal;?></td>
</tr> 


</table>  


    

<?php } ?>


<?php  if($orserstatus!=""){
$ret=mysqli_query($con,"select tbltracking.OrderCanclledByUser,tbltracking.remark,tbltracking.status as fstatus,tbltracking.StatusDate from tbltracking where tbltracking.OrderId ='$oid'");
$cnt=1;

 $cancelledby=$row['OrderCanclledByUser'];
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; margin-top:1%;">
  <tr align="center">
   <th colspan="4" >Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['remark'];?></td> 
  <td><?php  echo $row['fstatus'];
if($cancelledby==1){
echo "("."by user".")";
} else {

echo "("."by Shop".")";
}

  ?></td> 
   <td><?php  echo $row['StatusDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
                      

<?php

  if($orserstatus=="Order Confirmed" || $orserstatus=="Mobile Pickup" || $orserstatus=="On The Way" || $orserstatus=="" ){ ?>

   <table class="table table-bordered data-table">
<form name="submit" method="post"> 
<tr>
    <th>Shop Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="span11" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Shop Status :</th>
    <td>
   <select name="status" class="span11" required="true" >

    <?php  if($orserstatus==''): ?>
     <option value="Order Confirmed" selected="true">Order Confirmed</option>
      <option value="Order Cancelled">Order Cancelled</option>
<?php endif;
if($orserstatus=='Order Confirmed'):
?>
     <option value="Mobile Pickup">Mobile Pickup</option>
     <option value="On The Way">On The Way</option>
     <option value="Mobile Delivered">Mobile Delivered</option>
<?php endif;
if($orserstatus=='Mobile Pickup'):
?>
     <option value="On The Way">On The Way</option>
     <option value="Mobile Delivered">Mobile Delivered</option>
<?php endif;
if($orserstatus=='On The Way'):
?>
<option value="Mobile Delivered">Mobile Delivered</option>
<?php endif;
?>
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td ><button type="submit" name="submit" class="btn btn-primary">Update order</button></td>
  </tr>
</form>
  <?php } ?>
 


</table>   


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<?php include_once('includes/footer.php');?>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
<?php } ?>