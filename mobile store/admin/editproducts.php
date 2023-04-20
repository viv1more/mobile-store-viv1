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
    $pname=$_POST['pname'];
    $bname=$_POST['bname'];
    $modelno=$_POST['modelno'];
    $stock=$_POST['stock'];
     $price=$_POST['price'];
    $status=$_POST['status'];
     $color=$_POST['color'];
    $RAM=$_POST['RAM'];
    $ROM=$_POST['ROM'];
     $expandable=$_POST['expandable'];
    $fcamera=$_POST['fcamera'];
    $kfeatures=$_POST['kfeatures'];
    $specification=$_POST['specification'];
     $processor=$_POST['processor'];
    $display=$_POST['display'];
    $query=mysqli_query($con, "update tblproducts set ProductName='$pname',BrandName='$bname',ModelNumber='$modelno',Stock='$stock',Price='$price',Status='$status',Color='$color',RAM='$RAM',ROM='$ROM',ExpandableUpto='$expandable',FrontCamera='$fcamera',KeyFeature='$kfeatures',Specification='$specification',Processor='$processor',Display='$display' where ID='$eid'");
    if ($query) {
   
    echo '<script>alert("Product has been updated.")</script>';
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
          <form method="post" class="form-horizontal">
            <?php
            $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblproducts where tblproducts.ID='$eid'");

$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
           <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="pname" id="pname" value="<?php echo $row['ProductName'];?>" required='true'/>
              </div>
            </div>
            
            
            <div class="control-group">
              <label class="control-label">Brand Name: :</label>
              <div class="controls">
                <select type="text" class="span11" name="bname" id="bname" value="" required='true' />
                  <option value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName'];?></option>
                  <?php $query1=mysqli_query($con,"select * from tblbrand where Status='1'");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>
                  <option value="<?php echo $row1['BrandName'];?>"><?php echo $row1['BrandName'];?></option><?php } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Model Number :</label>
              <div class="controls">
                <input type="text" class="span11"  name="modelno" id="modelno" value="<?php echo $row['ModelNumber'];?>" required="true" maxlength="5"  />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Color :</label>
              <div class="controls">
                <input type="text" class="span11"  name="color" id="color" value="<?php echo $row['Color'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">RAM :</label>
              <div class="controls">
                <input type="text" class="span11"  name="RAM" id="RAM" value="<?php echo $row['RAM'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">ROM :</label>
              <div class="controls">
                <input type="text" class="span11"  name="ROM" id="ROM" value="<?php echo $row['ROM'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Expandable Upto :</label>
              <div class="controls">
                <input type="text" class="span11"  name="expandable" id="expandable" value="<?php echo $row['ExpandableUpto'];?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Front Camera :</label>
              <div class="controls">
                <input type="text" class="span11"  name="fcamera" id="fcamera" value="<?php echo $row['FrontCamera'];?>" required="true" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Processor :</label>
              <div class="controls">
                <input type="text" class="span11"  name="processor" id="processor" value="<?php echo $row['Processor'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Display :</label>
              <div class="controls">
                <input type="text" class="span11"  name="display" id="display" value="<?php echo $row['Display'];?>" required="true" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Key Features :</label>
              <div class="controls">
                <textarea type="text" class="textarea_editor span12"  name="kfeatures" id="kfeatures" value="" required="true"/><?php echo $row['KeyFeature'];?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Specification :</label>
              <div class="controls">
                <textarea type="text" class="textarea_editor span12"  name="specification" id="specification" value="" required="true" /><?php echo $row['Specification'];?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image1 :</label>
              <div class="controls">
                <img src="images/<?php echo $row['Image1'];?>" width="100" height="100" value="<?php echo $row['Image1'];?>>"><a href="changeimage1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image2 :</label>
              <div class="controls">
               <img src="images/<?php echo $row['Image2'];?>" width="100" height="100" value="<?php echo $row['Image2'];?>>"><a href="changeimage2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Image3 :</label>
              <div class="controls">
                <img src="images/<?php echo $row['Image3'];?>" width="100" height="100" value="<?php echo $row['Image3'];?>>"><a href="changeimage3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Stock(units) :</label>
              <div class="controls">
                <input type="text" class="span11"  name="stock" id="stock" value="<?php echo $row['Stock'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Price(perunits) :</label>
              <div class="controls">
                <input type="text" class="span11" name="price" id="price" value="<?php echo $row['Price'];?>" required="true"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <?php  if($row['Status']=="1"){ ?>
                <input type="checkbox"  name="status" id="status" value="1"  checked="true"/>
                <?php } else { ?>
                  <input type="checkbox" value='1' name="status" id="status" />
                  <?php } ?>
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