<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
   header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    
    $rid=$_GET['rid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
     
   $query=mysqli_query($con, "update   tblreview set Status='$ressta',Remark='$ressta' where ID='$rid'");
    if ($query) {
   
    echo '<script>alert("Review status has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-reviews.php'; </script>";
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
<title>Mobile Store Management System|| View Reviews</title>
<?php include_once('includes/cs.php');?>
</head>
<body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="all-order.php" class="current">View Reviews</a> </div>
    <h1>View Reviews</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
     
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Reviews</h5>
          </div>
          <div class="widget-content nopadding">
             <?php
 $rid=$_GET['rid'];
$ret=mysqli_query($con,"select tblreview.ID,tblreview.ProductID,tblreview.ReviewTitle,tblreview.Name,tblreview.DateofReview,tblreview.Review,tblreview.Remark,tblreview.Status,tblproducts.ProductName,tblproducts.BrandName,tblproducts.ModelNumber,tblproducts.Processor,tblproducts.Display from tblreview join tblproducts on tblproducts.ID=tblreview.ProductID where tblreview.ID='$rid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="2" style="font-size:20px;color:blue">
 Product Details</td></tr>

    <tr>
    <th>Product Name</th>
    <td><?php  echo $row['ProductName'];?></td>
    <th>Brand Name</th>
    <td><?php  echo $row['BrandName'];?></td>
 </tr>
    
 <tr>
    <th>Model Number</th>
    <td><?php  echo $row['ModelNumber'];?></td>
    <th>Processor</th>
    <td><?php  echo $row['Processor'];?></td>
  </tr>
  
  
  <tr>
    <th>Order Final Status</th>
    <td> <?php  
    $status=$row['Status'];
if($row['Status']=="Review Accept")
{
  echo "Review Accept";
}


if($row['Status']=="Review Reject")
{
  echo "Review Reject";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}


     ;?></td>
      <th>Display</th>
    <td><?php  echo $row['Display'];?></td>
  </tr>

  <tr align="center">
<td colspan="2" style="font-size:20px;color:blue">
 Review Details</td></tr>
 <tr>
    <th>Review By</th>
    <td><?php  echo $row['Name'];?></td>
    <th>Review Title</th>
    <td><?php  echo $row['ReviewTitle'];?></td>
  </tr>
  <tr>
    <th>Review</th>
    <td><?php  echo $row['Review'];?></td>
    <th>Date of Review</th>
    <td><?php  echo $row['DateofReview'];?></td>
  </tr>
</table><?php }?>

<table class="table table-bordered data-table">
<?php

  if($status=="" ){ ?>
<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="span11" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="span11" required="true" >
     <option value="Review Accept" selected="true">Review Accept</option>
          <option value="Review Reject">Review Reject</option>
     
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td ><button type="submit" name="submit" class="btn btn-primary">Update Review</button></td>
  </tr>
</form>

</table>

<?php } ?>



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