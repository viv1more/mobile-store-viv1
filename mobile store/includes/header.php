<!-- ::::::  Start  Header Section  ::::::  -->
    <header>
        <!-- ::::::  Start Large Header Section  ::::::  -->
        <div class="header header--1">
            <!-- Start Header Top area -->
            <div class="header__top header__top--style-1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="header__top-content">
                                <div class="header__top-content--left">
                                    <div class="contact_cms">
                                        <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <span class="cms1">Telephone Enquiry: </span>
                                        <span class="cms2"><?php  echo $row['MobileNumber'];?></span>
                                        <span class="cms1">Email: </span>
                                        <span class="cms2"><?php  echo $row['Email'];?></span><?php } ?>
                                    </div>
                                </div>
                                <div class="header__top-content--right">
                                    <?php if (strlen($_SESSION['msmsuid']==0)) {?>
                                    <div class="user-info user-set-role">
                                       
                                       
                                        <a class="user-set-role__button" href="login.php" aria-haspopup="true" style="color:blue;padding-right: 20px;">Sign in</a>
                                         <a class="user-set-role__button" href="login.php" aria-haspopup="true" style="color:blue;padding-right: 20px;">Sign Up</a>
                                    </div>

                                    <a class="user-set-role__button" href="admin/login.php" aria-haspopup="true" style="color:blue;padding-right: 20px;">Admin</a><?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Start Header Top area -->

            <!-- Start Header Middle area -->
            <div class="header__middle header__top--style-1 p-tb-30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="header__logo">
                                <a href="index.php" class="header__logo-link">
                                   <h3>Mobile Store</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row align-items-center">
                                <div class="col-lg-10">
                                    <form class="header__search-form" action="search.php" method="post">
                                       
                                        <div class="header__search-input">
                                            <input type="search" name="searchdata" placeholder="Enter your search key">
                                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit" name="search">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2">
                                    <?php if (strlen($_SESSION['msmsuid']>0)) {?>
                                    <div class="header__wishlist-box">
                                        <!-- Start Header Wishlist Box -->
                                        <?php
                            $userid= $_SESSION['msmsuid'];
$ret2=mysqli_query($con,"select * from tblwish where UserId='$userid'");
$num1=mysqli_num_rows($ret2);

?>
                                        <div class="header__wishlist pos-relative">
                                            <a href="wishlist.php" class="header__wishlist-link">
                                                <i class="icon-heart"></i>
                                                <span class="wishlist-item-count pos-absolute"><?php echo $num1;?></span>
                                            </a>
                                        </div> <!-- End Header Wishlist Box -->

                                        <!-- Start Header Add Cart Box -->
                                        <?php
                            $userid= $_SESSION['msmsuid'];
$ret1=mysqli_query($con,"select * from tblorders where IsOrderPlaced is null && UserId='$userid'");
$num=mysqli_num_rows($ret1);

?>
                                        <div class="header-add-cart pos-relative m-l-40">
                                            <a href="cart.php" >
                                                <i class="icon-shopping-cart"></i>
                                                <span class="wishlist-item-count pos-absolute"><?php echo $num;?></span>
                                            </a>
                                        </div> <!-- End Header Add Cart Box -->
                                    </div><?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Middle area -->

            <!-- Start Header Menu Area -->
            <div class="header-menu">
                <div class="container">
                    <div class="row col-12">
                        <nav>
                            <ul class="header__nav">
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    
                                    <li class="header__nav-item pos-relative">
                                     <a href="index.php" class="header__nav-link">Home</a>
                                </li>
                                </li> <!-- End Single Nav link-->
<li class="header__nav-item pos-relative">
                                    
                                    <li class="header__nav-item pos-relative">
                                     <a href="about.php" class="header__nav-link">About</a>
                                </li>
                                 <li class="header__nav-item pos-relative">
                                     <a href="shop-mobile.php" class="header__nav-link">Shop Mobile</a>
                                </li>
                                <li class="header__nav-item pos-relative">
                                     <a href="track-order.php" class="header__nav-link">Track Order</a>
                                </li>
                                </li>
                                

                                <!--Start Single Nav link--> <?php if (strlen($_SESSION['msmsuid']>0)) {?>
                                <li class="header__nav-item pos-relative">
                                    <a href="#" class="header__nav-link">My Account<i class="icon-chevron-down"></i></a>
                                    <!--Single Dropdown Menu-->
                                    <ul class="dropdown__menu pos-absolute">
                                        <li class="dropdown__list">

                                            <a href="dashboard.php" class="dropdown__link">Dashboard</a>
                                          
                                        </li>
                                        <li class="dropdown__list">

                                            <a href="profile.php" class="dropdown__link">Profile</a>
                                          
                                        </li>
                                        <li class="dropdown__list">
                                            <a href="change-password.php" class="dropdown__link">Change Password</a>
                                           
                                        </li>
                                       
                                        <li class="dropdown__list">
                                            <a href="logout.php" class="dropdown__link">Logout</a>
                                           
                                        </li>
                                    </ul>
                                    <!--Single Dropdown Menu-->
                                </li>
                                <li class="header__nav-item pos-relative">
                                     <a href="wishlist.php" class="header__nav-link">Wishlist</a>
                                </li>
<li class="header__nav-item pos-relative">
                                     <a href="cart.php" class="header__nav-link">Cart Page</a>
                                </li>
                                <li class="header__nav-item pos-relative">
                                     <a href="my-order.php" class="header__nav-link">My Order</a>
                                </li>
                                <?php } ?> <!-- End Single Nav link-->

                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                     <a href="contact.php" class="header__nav-link">Contact Us</a>
                                </li>
                                <!-- End Single Nav link-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- End Header Menu Area -->
        </div> <!-- ::::::  Start Large Header Section  ::::::  -->
        
        <!-- ::::::  Start Mobile Header Section  ::::::  -->
        <div class="header__mobile mobile-header--1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Header Mobile Top area -->
                        <div class="header__mobile-top">
                            <div class="mobile-header__logo">
                                <a href="index.html" class="mobile-header__logo-link">
                                    <img src="assets/img/logo/logo-color.jpg" alt="" class="mobile-header__logo-img">
                                </a>
                            </div>
                            <div class="header__wishlist-box">
                                <!-- Start Header Wishlist Box -->
                                <div class="header__wishlist pos-relative">
                                    <a href="wishlist.html" class="header__wishlist-link">
                                        <i class="icon-heart"></i>
                                        <span class="wishlist-item-count pos-absolute">3</span>
                                    </a>
                                </div> <!-- End Header Wishlist Box -->

                                <!-- Start Header Add Cart Box -->
                                <div class="header-add-cart pos-relative m-l-20">
                                    <a href="#offcanvas-add-cart__box" class="header__wishlist-link offcanvas--open-checkout offcanvas-toggle">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute">3</span>
                                    </a>
                                </div> <!-- End Header Add Cart Box -->

                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i class="icon-menu"></i></a>

                            </div>
                        </div> <!-- End Header Mobile Top area -->

                        <!-- Start Header Mobile Middle area -->
                        <div class="header__mobile-middle header__top--style-1 p-tb-10">
                            <form class="header__search-form" action="#">
                                <div class="header__search-category header__search-category--mobile">
                                    <select class="bootstrap-select">
                                        <option value="0">All</option>
                                        <option value="12">
                                            Fashion
                                        </option>
                                        <option value="27">
                                            - - Women
                                        </option>
                                        <option value="30">
                                            - - - - Dresses
                                        </option>
                                        <option value="31">
                                            - - - - Shirts &amp; Blouses
                                        </option>
                                        <option value="32">
                                            - - - - Blazers
                                        </option>
                                        <option value="33">
                                            - - - - Lingerie
                                        </option>
                                        <option value="34">
                                            - - - - Jeans
                                        </option>
                                        <option value="28">
                                            - - Men
                                        </option>
                                        <option value="35">
                                            - - - - Shorts
                                        </option>
                                        <option value="36">
                                            - - - - Sportswear
                                        </option>
                                        <option value="37">
                                            - - - - Swimwear
                                        </option>
                                        <option value="38">
                                            - - - - Jackets &amp; Suits
                                        </option>
                                        <option value="39">
                                            - - - - T-shirts &amp; Tank Tops
                                        </option>
                                        <option value="29">
                                            - - Kids
                                        </option>
                                        <option value="40">
                                            - - - - Trousers
                                        </option>
                                        <option value="41">
                                            - - - - Shirts &amp; Tops
                                        </option>
                                        <option value="42">
                                            - - - - Knitwear
                                        </option>
                                        <option value="43">
                                            - - - - Jackets
                                        </option>
                                        <option value="44">
                                            - - - - Sandals
                                        </option>
                                        <option value="13">
                                            Electronics
                                        </option>
                                        <option value="45">
                                            - - Cameras
                                        </option>
                                        <option value="49">
                                            - - - - Cords and Cables
                                        </option>
                                        <option value="50">
                                            - - - - gps accessories
                                        </option>
                                        <option value="51">
                                            - - - - Microphones
                                        </option>
                                        <option value="52">
                                            - - - - Wireless Transmitters
                                        </option>
                                        <option value="46">
                                            - - Audio
                                        </option>
                                        <option value="53">
                                            - - - - Other Accessories
                                        </option>
                                        <option value="54">
                                            - - - - Portable Audio
                                        </option>
                                        <option value="55">
                                            - - - - Satellite Radio
                                        </option>
                                        <option value="56">
                                            - - - - Visual Accessories
                                        </option>
                                        <option value="47">
                                            - - Cell Phones
                                        </option>
                                        <option value="57">
                                            - - - - iPhone
                                        </option>
                                        <option value="58">
                                            - - - - Samsung Galaxy
                                        </option>
                                        <option value="59">
                                            - - - - SIM Cards
                                        </option>
                                        <option value="60">
                                            - - - - Prepaid Cell Phones
                                        </option>
                                        <option value="48">
                                            - - TV &amp; Video
                                        </option>
                                        <option value="61">
                                            - - - - 4K Ultra HDTVs
                                        </option>
                                        <option value="62">
                                            - - - - All TVs
                                        </option>
                                        <option value="63">
                                            - - - - Refurbished TVs
                                        </option>
                                        <option value="64">
                                            - - - - TV Accessories
                                        </option>
                                        <option value="14">
                                            Toys &amp; Hobbies
                                        </option>
                                        <option value="65">
                                            - - Books &amp; Board Games
                                        </option>
                                        <option value="67">
                                            - - - - Arts &amp; Crafts
                                        </option>
                                        <option value="68">
                                            - - - - Baby &amp; Toddler Toys
                                        </option>
                                        <option value="69">
                                            - - - - Electronics for Kids
                                        </option>
                                        <option value="70">
                                            - - - - Dolls &amp; Accessories
                                        </option>
                                        <option value="66">
                                            - - Baby Dolls
                                        </option>
                                        <option value="71">
                                            - - - - Baby Alive Dolls
                                        </option>
                                        <option value="72">
                                            - - - - Barbie
                                        </option>
                                        <option value="73">
                                            - - - - Baby Annabell
                                        </option>
                                        <option value="74">
                                            - - - - Bratz
                                        </option>
                                        <option value="15">
                                            Sports &amp; Outdoors
                                        </option>
                                        <option value="16">
                                            Smartphone &amp; Tablets
                                        </option>
                                        <option value="17">
                                            Health &amp; Beauty
                                        </option>
                                        <option value="18">
                                            Computers &amp; Networking
                                        </option>
                                        <option value="19">
                                            Accessories
                                        </option>
                                        <option value="20">
                                            Jewelry &amp; Watches
                                        </option>
                                        <option value="21">
                                            Flashlights &amp; Lamps
                                        </option>
                                        <option value="22">
                                            Cameras &amp; Photo
                                        </option>
                                        <option value="23">
                                            Holiday Supplies &amp; Gifts
                                        </option>
                                        <option value="24">
                                            Automotive
                                        </option>
                                        <option value="25">
                                            cosmetic
                                        </option>
                                    </select>
                                </div>
                                <div class="header__search-input header__search-input--mobile">
                                    <input type="search" placeholder="Enter your search">
                                    <button class="btn btn--submit btn--blue btn--uppercase btn--weight" type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div> <!-- End Header Mobile Middle area -->

                    </div>
                </div>
            </div>
        </div> <!-- ::::::  Start Mobile Header Section  ::::::  -->

        <!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas__close offcanvas-close">&times;</button>
            <div class="offcanvas-inner">
                <div class="offcanvas-userpanel m-b-30">
                    <ul>
                        <li class="offcanvas-userpanel__role">
                            <a href="#">Setting</a>
                            <ul class="user-sub-menu">
                                <li><a href="my-account.html">My account</a></li>
                                <li><a href="wishlist.html">My wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="login.html">Sign in</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#">USD $</a>
                            <ul class="user-sub-menu">
                                <li><a href="#">USD $</a></li>
                                <li><a href="#">EURO €</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English </a>
                            <ul class="user-sub-menu">
                                <li><a href="#"><img src="assets/img/icon/flag/icon_usa.png" alt="">English</a></li>
                                <li><a href="#"><img src="assets/img/icon/flag/icon_france.png" alt=""> Français</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="offcanvas-menu m-b-30">
                    <h4>Menu</h4>
                    <ul>
                        <li>
                            <a href="#"><span>Home</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.php"><span class="menu-text">Home 1</span></a></li>
                                <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                                <li> <a href="index-3.html"><span class="menu-text">Home 3</span></a></li>
                                <li><a href="index-4.html"><span class="menu-text">Home 4</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="compare.html">Compare</a></li>
                                <li><a href="empty-cart.html">Empty Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="404-page.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Shop</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-1.html">Shop Default</a></li>
                                        <li><a href="shop-4-grid.html">Shop 4grid</a></li>
                                        <li><a href="shop-5-grid.html">Shop 5grid</a></li>
                                        <li><a href="shop-grid-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-grid-right-sidebar.html">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Shop List</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-list.html">Shop List</a></li>
                                        <li><a href="shop-list-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-list-right-sidebar.html">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Product Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="single-1.html">Single</a></li>
                                        <li><a href="single-variable.html">Variable</a></li>
                                        <li><a href="single-left-tab.html">Left Tab</a></li>
                                        <li><a href="single-right-tab.html">Right Tab</a></li>
                                        <li><a href="single-slider.html">Single Slider</a></li>
                                        <li><a href="single-gallery-left.html">Gallery Left</a></li>
                                        <li><a href="single-gallery-right.html">Gallery Right</a></li>
                                        <li><a href="single-sticky-left.html">Sticky Left</a></li>
                                        <li><a href="single-sticky-right.html">Sticky Right</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span>Blogs</span></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">Blog Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-left-sidebar.html"> Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-right-sidebar.html"> Blog Grid Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Blog List</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-list-left-sidebar.html"> Blog List Left Sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html"> Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Blog Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-single-left-sidebar.html"> Blog List Left Sidebar</a></li>
                                        <li><a href="blog-single-right-sidebar.html"> Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="offcanvas-buttons m-b-30">
                    <a href="my-account.html" class="user"><i class="icon-user"></i></a>
                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                    <a href="cart.html"><i class="icon-shopping-cart"></i></a>
                </div>
                <div class="offcanvas-social">
                    <span>Stay With Us</span>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- ::::::  End Mobile-offcanvas Menu Section  ::::::  -->

        <!-- ::::::  Start Popup Add Cart ::::::  -->
        <div  id="offcanvas-add-cart__box" class="offcanvas offcanvas-cart offcanvas-add-cart">
            <div class="offcanvas-add-cart__top m-b-40">
                <span class="offcanvas-add-cart__top-text"><i class="icon-shopping-cart"></i> Total Items: 4</span>
                <button class=" offcanvas-close">&times;</button>
            </div>
            <!-- Start Add Cart Item Box-->
            <ul class="offcanvas-add-cart__menu">
                <!-- Start Single Add Cart Item-->
                <li class="offcanvas-add-cart__list pos-relative">
                    <div class="offcanvas-add-cart__img-box pos-relative">
                        <a href="single-1.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-1.jpg" alt="" class="add-cart__img"></a>
                        <span class="offcanvas-add-cart__item-count pos-absolute">2x</span>
                    </div>
                    <div class="offcanvas-add-cart__detail">
                        <a href="single-1.html" class="offcanvas-add-cart__link">PlayStation 4 Pro 1TB Star Wars Battlefront II Bundle</a>
                        <span class="offcanvas-add-cart__price">$29.00</span>
                        <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>

                    </div>
                    <button class="offcanvas-add-cart__item-dismiss pos-absolute">&times;</button>
                </li> <!-- Start Single Add Cart Item-->
                <!-- Start Single Add Cart Item-->
                <li class="offcanvas-add-cart__list pos-relative">
                    <div class="offcanvas-add-cart__img-box pos-relative">
                        <a href="single-1.html" class="offcanvas-add-cart__img-link img-responsive"><img src="assets/img/product/size-small/product-home-1-img-2.jpg" alt="" class="add-cart__img"></a>
                        <span class="offcanvas-add-cart__item-count pos-absolute">1x</span>
                    </div>
                    <div class="offcanvas-add-cart__detail">
                        <a href="single-1.html" class="offcanvas-add-cart__link">PlayStation 4 Pro 1TB Star Wars Battlefront II Bundle</a>
                        <span class="offcanvas-add-cart__price">$29.00</span>
                        <span class="offcanvas-add-cart__info">Dimension: 40x60cm</span>

                    </div>
                    <button class="offcanvas-add-cart__item-dismiss pos-absolute">&times;</button>
                </li> <!-- Start Single Add Cart Item-->
            </ul> <!-- Start Add Cart Item Box-->
            <!-- Start Add Cart Checkout Box-->
            <div class="offcanvas-add-cart__checkout-box-bottom">
                <!-- Start offcanvas Add Cart Checkout Info-->
                <ul class="offcanvas-add-cart__checkout-info">
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Subtotal</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$60.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Shipping</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$7.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Taxes</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$0.00</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                    <!-- Start Single Add Cart Checkout Info-->
                    <li class="offcanvas-add-cart__checkout-list">
                        <span class="offcanvas-add-cart__checkout-left-info">Total</span>
                        <span class="offcanvas-add-cart__checkout-right-info">$67.59</span>
                    </li> <!-- End Single Add Cart Checkout Info-->
                </ul> <!-- End offcanvas Add Cart Checkout Info-->

                <div class="offcanvas-add-cart__btn-checkout">
                    <a href="checkout.html" class="btn btn--block btn--box btn--gray btn--large btn--uppercase btn--weight">Checkout</a>
                </div>
            </div> <!-- End Add Cart Checkout Box-->
        </div> <!-- :::::: End Popup Add Cart :::::: -->

        <div class="offcanvas-overlay"></div>
    </header> <!-- ::::::  End  Header Section  ::::::  -->