<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['imsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
  $images=$_FILES["images"]["name"];
  $extension = substr($images,strlen($images)-4,strlen($images));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".pdf");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Product Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$images=md5($images).time().$extension;
 move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$images);
    $query=mysqli_query($con, "update tblproducts set Image3='$images' where ID='$eid'");
    if ($query) {
   
    echo '<script>alert("Product Image has been updated.")</script>';
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mobile Store Management System|| Update Products</title>
<?php include_once('includes/cs.php');?>

</head>
<body>

<!--Header-part-->
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <strong>Update Product</strong></div>
  <h1>Update Product</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Update Product</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal" enctype="multipart/form-data">
            <?php
            $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblproducts where tblproducts.ID='$eid'");

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
           <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="pname" id="pname" value="<?php echo $row['ProductName'];?>" readonly='true'/>
              </div>
            </div>
           
           
            <div class="control-group">
              <label class="control-label">Old Image3 :</label>
              <div class="controls">
                <img src="images/<?php echo $row['Image3'];?>" width="100" height="100" value="<?php echo $row['Image3'];?>>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">New Image3 :</label>
              <div class="controls">
                <input type="file" class="span11" name="images" id="images" value="" required="true"/>
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