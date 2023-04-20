<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['msmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $uid=$_SESSION['msmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$uid'");


    if ($query) {
 echo '<script>alert("Profile updated successully.")</script>';
echo '<script>window.location.href=my-account.php</script>';
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

}
if(isset($_POST['change']))
{
$userid=$_SESSION['msmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query1=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query1);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
$msg= "Your password successully changed"; 
} else {

$msg="Your current password is wrong";
}



}

 } ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Mobile Store Management System||My Account</title>
   
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


    <!-- Main Style CSS File -->
    <link rel="stylesheet" href="assets/css/main.css">
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
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
                        <li class="page-breadcrumb__nav active">My Account Page</li>
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
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <?php include_once('includes/sidebar.php');?>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                                <?php
$uid=$_SESSION['msmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  
                                                <p>Hello, <strong><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></strong> (If Not <strong><?php  echo $row['LastName'];?> !</strong> <a
                                                        href="login.php">Logout</a> )</p>
                                            </div>
                                            <p class="m-t-25">From your account dashboard. you can easily check &amp; view your
                                                recent orders, manage your shipping and billing addresses and edit your password and
                                                account details.</p>
                                        </div><?php } ?>
                                    </div>
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                                        <div class="my-account-order account-wrapper">
                                            <h4 class="account-title">Orders</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="no">No</th>
                                                            <th class="name">Name</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Status</th>
                                                            <th class="total">Total</th>
                                                            <th class="action">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Mostarizing Oil</td>
                                                            <td>Aug 22, 2020</td>
                                                            <td>Pending</td>
                                                            <td>$100</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Katopeno Altuni</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Approved</td>
                                                            <td>$45</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Murikhete Paris</td>
                                                            <td>June 22, 2020</td>
                                                            <td>On Hold</td>
                                                            <td>$99</td>
                                                            <td><a href="#">View</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-download" role="tabpanel"
                                        aria-labelledby="pills-download-tab">
                                        <div class="my-account-download account-wrapper">
                                            <h4 class="account-title">Download</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="name">Product</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Expire</th>
                                                            <th class="action">Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mostarizing Oil</td>
                                                            <td>Aug 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Katopeno Altuni</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Never</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                        aria-labelledby="pills-payment-tab">
                                        <div class="my-account-payment account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <p class="m-t-30">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-address" role="tabpanel"
                                        aria-labelledby="pills-address-tab">
                                        <div class="my-account-address account-wrapper">
                                            
                                            <div class="account-address m-t-30">
                                               
                                                    
                                                    <div class="col-md-12">
                                                        <form method="post" name="changepassword" onsubmit="return checkpass();">
                                                        <div class="form-box__single-group">
                                                            <h4 class="title">Password change</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Current Password" id="currentpassword" name="currentpassword" value="" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="New Password" id="newpassword" name="newpassword" value="" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" value=""  required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <button class="btn btn--box btn--small btn--uppercase btn--blue" name="change">Save Change</button>
                                                        </div>
                                                    </div>
                                                </div></form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-account" role="tabpanel"
                                        aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Account Details</h4>
<?php
$uid=$_SESSION['msmsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?> 
                                            <div class="account-details">
                                                <div class="row">
                                                    
                                                   
                                                    <div class="col-md-6">
                                                         <form method="post">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="firstname" value="<?php  echo $row['FirstName'];?>" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="lastname" value="<?php  echo $row['LastName'];?>" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="email" value="<?php  echo $row['Email'];?>"  readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true">
                                                        </div>
                                                    </div><?php }?>
                                                  
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <button class="btn btn--box btn--small btn--uppercase btn--blue" name="submit">Save Change</button>
                                                        </div>
                                                    </div>
                                               </form> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-address-tab" role="tabpanel"
                                        aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Password Change</h4>

                                            <div class="account-details">
                                                <div class="row">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- ::::::  Start  Footer Section  ::::::  -->
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
    <script src="assets/js/main.js"></script>
</body>

</html><?php} ?>
