<!--Header-part-->
<div id="header">
  <h2 style="padding-top: 20px;padding-left: 10px"><a href="dashboard.php"><strong style="color: white">Mobile Store</strong></a></h2>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <?php

$ret=mysqli_query($con,"select AdminName from tbladmin");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $name; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="profile.php"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="change-password.php"><i class="icon-check"></i> Setting</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    

  </ul>
</div>
<!--close-top-Header-menu-->
