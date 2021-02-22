<?php 
        session_start();

        require_once('phpScripts/DBConnection.php');

        $user=$_SESSION['user_name'];

        $name="";
        $email="";
        $contact="";
        $address="";
        $user_name="";
        $u_id=0;

        $query="SELECT *FROM buyer WHERE user_name='$user'";
        $result=mysqli_query($con,$query);

        if ($result) {
            
            $data=mysqli_fetch_assoc($result);
            $name=$data['full_name'];
            $email=$data['email'];
            $contact=$data['contact_no'];
            $address=$data['address'];
            $user_name=$data['user_name'];
            $u_id=$data['id'];
        }

        $msg=0;
        if (isset($_GET['msg'])) {
            
            $msg=$_GET['msg'];
        }
 ?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ANSA.com</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <h2 style="margin-left: 33px;">ANSA-Mart</h2> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link" href="viewAll.php">view All Users</a>
                                </li>
                            -->
                                <li class="nav-item">
                                    <a class="nav-link" href="buyerHome.php">about Me</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Selection
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <!--<a class="dropdown-item" href="addProducts.php"> Add product</a>-->
                                        <a class="dropdown-item" href="cartList.php">View Cart Details</a>
                                        <!--<a class="dropdown-item" href="single-product.php">View Checkout Details</a>
                                        <a class="dropdown-item" href="single-product.php">View Confirmation Details</a>-->
                                    </div>
                                </li>
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.php"> 
                                            login
                                            
                                        </a>
                                        
                                        <a class="dropdown-item" href="checkout.php">product checkout</a>
                                        <a class="dropdown-item" href="cart.php">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.php">confirmation</a>
                                        <a class="dropdown-item" href="elements.php">elements</a>
                                    
                                    </div>

                                </li>
                            -->
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.php"> blog</a>
                                        <a class="dropdown-item" href="single-blog.php">Single blog</a>
                                    </div>
                                </li>
                                -->

                                 <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <center>
                <h3><font color="black">Welcome <b><?php echo $name; ?></b> to Your Account</font></h3>
                </center>
                <br>
            </div>
            <div class="col-md-6">
                <br><br><br>
                <img src="img/blog.gif">
                <br>
                <table class="table table-white">
                    <tr><td><b>Full name</b></td></tr>
                    <tr><td><font style="font-size: 16px;"><?php echo $name; ?></font></td></tr>
                    <tr><td><b>Email</b></td></tr>
                    <tr><td><font style="font-size: 16px;"><?php echo $email; ?></font></td></tr>
                </table>
            </div>
            <div class="col-md-6">
                <br>
                <form action="phpScripts/updateUserPassword.php" method="post">
                <table class="table table-white">
                    <tr><td><input type="hidden" name="u_id" value=<?php echo $u_id; ?>></td></tr>
                    <tr><td><b>Contact No</b></td></tr>
                    <tr><td><font style="font-size: 16px;"><?php echo $contact; ?></font></td></tr>
                    <tr><td><b>Address</b></td></tr>
                    <tr><td><font style="font-size: 16px;"><?php echo $address; ?></font></td></tr>
                    <tr><td><b>User name</b></td></tr>
                    <tr><td><font style="font-size: 16px;"><?php echo $user_name; ?></font></td></tr>
                    <tr><td><font style="font-size: 16px;color: green;">If you want to change password then you can change bellow,</font></td></tr>
                    <tr><td><b>New Password</b></td></tr>
                    <tr><td><input type="password" name="password" class="form-control" required></td></tr>
                    <tr><td><b>Re type Enter Password</b></td></tr>
                    <tr><td><input type="password" name="re_password" class="form-control" required></td></tr>
                    <tr><td>
                        <?php 
                                if($msg == 404)
                                    echo "<font color='green'>"."Password Update Successfully!"."</font>";
                                else if($msg == 506)
                                    echo "<font color='red'>"."Seems like some fields are Missing!!"."</font>";
                                else if($msg == 808)
                                    echo "<font color='red'>"."PASSWORD DOESN'T MATCH!!"."</font>";
                                else
                                    echo "";
                         ?>
                    </td></tr>
                    <tr><td><input type="submit" name="update_user_password" class="btn btn-success" value="Update Password"></td></tr>
                </table>
                </form>
            </div>
        </div>
    </div> 

    
   <br><br>
    <footer class="footer_part">
                
        <div class="copyright_part">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="copyright_text"><br>
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website Made <i class="ti-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Mithila madushanka</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                            <div class="copyright_link">
                                <a href="#">Turms & Conditions</a>
                                <a href="#">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- magnific popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>