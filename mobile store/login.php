<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname','$contno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['msmsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Mobile Store Management System | Login Page</title>
   
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
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
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
                        <li class="page-breadcrumb__nav active">Login Page</li>
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
                <!-- login area start -->
                <div class="login-register-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                                <div class="login-register-wrapper">
                                    <div class="login-register-tab-list nav">
                                        <a class="active" data-toggle="tab" href="#lg1">
                                            <h4>login</h4>
                                        </a>
                                        <a data-toggle="tab" href="#lg2">
                                            <h4>register</h4>
                                        </a>
                                    </div>
                                    <div class="tab-content">
                                        <div id="lg1" class="tab-pane active">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <form action="#" method="post">
                                                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                                        <div class="form-box__single-group">
                                                            <input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="password" name="password" placeholder="Password" required="true">
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                           
                                                            <a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot Password?</a>
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit" name="login">LOGIN</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="lg2" class="tab-pane">
                                            <div class="login-form-container">
                                                <div class="login-register-form">
                                                    <form action="#" method="post" name="signup" onsubmit="return checkpass();">
                                                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="First Name" name="firstname" required="true">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="text"  name="lastname" placeholder="Last Name" required="true">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="text"  name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}" placeholder="Mobile Number" required="true">
                                                        </div>
                                                        <div class="form-box__single-group">
                                                            <input type="email" name="email" placeholder="Email address" required="true">
                                                        </div>
                                                        <div class="form-box__single-group m-b-20">
                                                            <input type="password" name="password" placeholder="Password" required="true">
                                                        </div>
                                                        <div class="form-box__single-group m-b-20">
                                                            <input type="password" name="repeatpassword" placeholder="Repeat password" required="true">
                                                        </div>
                                                        <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit" name="submit">REGISTER</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- login area end -->
               </div>
            </div>
        </div>
    </main> <!-- ::::::  End  Main Container Section  ::::::  -->

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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="assets/js/main.js"></script>
</body>

</html>
