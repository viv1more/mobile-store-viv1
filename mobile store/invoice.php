<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{ 

 

    ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mobile Store Management Ssytem-Invoice</title>
</head>
<body>

<div style="margin-left:50px;">

<?php  
$oid=$_GET['oid'];
$query=mysqli_query($con,"select tblorderaddresses.OrderTime,tblproducts.Image1,tblproducts.ProductName,tblproducts.Color,tblproducts.Price,tblorders.PId,tblorders.OrderNumber from tblorders 
  join tblproducts on tblproducts.ID=tblorders.PId 
  join tblorderaddresses on tblorderaddresses.Ordernumber=tblorders.OrderNumber
  where tblorders.OrderNumber='$oid' and tblorders.IsOrderPlaced=1");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="6" >Invoice of #<?php echo  $oid;?></th> 
  </tr>
  <tr>
    <th colspan="2">Order Date :</th>
<td colspan="3">  </b> <?php echo $_GET['odate'];?></td>
  </tr>
  <tr>
     <th>#</th>
                                
                <th>Image</th>
                <th>Item Name</th>
                <th>Color</th>
                <th>Price</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($query)) {
  ?>


<tr>
  <td><?php echo $cnt;?></td>

 <td><img src="admin/images/<?php echo $row['Image1'];?>" width="60" height="40" alt=""></td> 
  <td><?php echo $row['ProductName'];?></td>   
   <td><?php echo $row['Color'];?>  </td> 
   <td>₹ <?php  echo $total=$row['Price'];?></td> 
</tr>
<?php 
$grandtotal+=$total;
$cnt=$cnt+1;} ?>
<tr>
  <th colspan="4" style="text-align:center">Grand Total </th>
<td>₹ <?php  echo $grandtotal;?></td>
</tr>
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

  <?php } ?>   