<?php 
        require_once('phpScripts/FCount.php');

        $user="";

        if (isset($_GET['kpi'])) {
            $user=$_GET['kpi'];
        }

        $adm_count=$num_of_admins;
        $pending_requests=$num_of_pending_requests;
        $num_of_usrs=$num_of_users;
        $num_racks=$num_of_racks;
        $num_chairs=$num_of_chair;
        $num_carts=$num_cart_itms;
        $num_tables=$num_of_tables;
        $num_canddles=$num_of_canddles;
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
                                <li class="nav-item">
                                    <a class="nav-link" href="viewAll.php">view All Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutMe.php">about Me</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Selection
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="addProducts.php"> Add product</a>
                                        <a class="dropdown-item" href="viewCart.php">View Cart Details</a>
                                        <a class="dropdown-item" href="penddingCartItms.php">Pending Cart items</a>
                                        <!--<a class="dropdown-item" href="single-product.php">View Confirmation Details</a>-->
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
                                    <a class="nav-link" href="pendingRequest.php">Pending Requests <sup style="font-size: 19px;"><span class="badge badge-danger badge-counter"><?php echo $pending_requests; ?></span></sup></a>
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
                <h3><font color="green">Welcome to Admin Panel</font></h3>
                </center>
                <br>
            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: green;">
                        <h4><font color="white">Number of Users</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_of_usrs; ?></center></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: orange;">
                        <h4><font color="white">Number of Admins</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $adm_count; ?></center></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: blue;">
                        <h4><font color="white">Number of Wrought Iron Racks</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_racks; ?></center></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: brown;">
                        <h4><font color="white">Number of Wrought Iron Tables</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_tables; ?></center></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: purple;">
                        <h4><font color="white">Number of Wrought Iron Chairs</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_chairs; ?></center></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: green;">
                        <h4><font color="white">Number of Wrought Iron Candles</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_canddles; ?></center></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: orange;">
                        <h4><font color="white">Number of Bags</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center>0</center></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header" style="background-color: blue;">
                        <h4><font color="white">Number of Cart Items</font></h4>
                    </div>
                    <div class="card-body">
                        <h5><center><?php echo $num_carts; ?></center></h5>
                    </div>
                </div>
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