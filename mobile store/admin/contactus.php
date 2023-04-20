<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$mobnumber=$_POST['mobnumber'];
$timing=$_POST['timing'];
     
    $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',Email='$email',MobileNumber='$mobnumber',Timing='$timing',PageDescription='$pagedes' where  PageType='contactus'");
    if ($query) {
   
    echo '<script>alert("Contact us has been updated.")</script>';
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mobile Store Management System|| Contact Us</title>
<?php include_once('includes/cs.php');?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>

<!--Header-part-->
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <strong>Contact Us</strong></div>
  <h1>Update Contact Us</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Update Contact Us</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal">
            <?php
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <div class="control-group">
              <label class="control-label">Page Title :</label>
              <div class="controls">
                
                <input type="text"  class="span11"  name="pagetitle"  id="pagetitle"  value="<?php  echo $row['PageTitle'];?>" required="true">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Page Description :</label>
              <div class="controls">
                
                <textarea name="pagedes"  id="pagedes"  rows="5"  class="span11">
        <?php  echo $row['PageDescription'];?></textarea>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                
                <input type="text"  class="span11"  name="email"  id="email"  value="<?php  echo $row['Email'];?>" required="true">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mobile Number :</label>
              <div class="controls">
                
                <input type="text"  class="span11"  name="mobnumber"  id="mobnumber"  value="<?php  echo $row['MobileNumber'];?>" required="true">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Timing :</label>
              <div class="controls">
                
                <input type="text"  class="span11"  name="timing"  id="timing"  value="<?php  echo $row['Timing'];?>" required="true">
              </div>
            </div>
            
           <?php } ?>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="submit">Update</button>
            </div>
          </form>
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