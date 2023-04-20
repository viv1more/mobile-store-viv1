<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
   header('location:logout.php');
  } else{

$vid=$_GET['viewid'];
$isread=1;
$query=mysqli_query($con, "update   tblcontact set IsRead ='$isread' where ID='$vid'");
  

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mobile Store Management System|| View Enquiry</title>
<?php include_once('includes/cs.php');?>
</head>
<body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="all-order.php" class="current">View Enquiry</a> </div>
    <h1>View Enquiry</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        
       
     
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Enquiry</h5>
          </div>
          <div class="widget-content nopadding">
             <?php
             
$ret=mysqli_query($con,"select * from tblcontact where ID=$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                 <table class="table table-bordered mg-b-0" style="font-size: 20px;">
                                   
                                   <tr style="color: blue;font-size: 30px;text-align: center;"><td>View Enquiry</td></tr>
              
                <tr>
    <th scope style="font-size: 15px;">Name</th>
    <td><?php  echo $row['Name'];?></td>
    <th style="font-size: 15px;" scope>Email</th>
    <td><?php  echo $row['Email'];?></td>
  
                </tr>
                <tr>
    
    <th style="font-size: 15px;">Message</th>
    <td colspan="4"><?php  echo $row['Message'];?></td>
  </tr>
              </table><?php $cnt=$cnt+1;} ?>



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