<?php 
        session_start();

        require_once('phpScripts/DBConnection.php');

        
        if (isset($_GET['pro_id'])){
            $id=$_GET['pro_id'];
            $_SESSION['pro_id']=$id;
        }

        $u_id=0;
        $full_name="";

        $p_id=$_SESSION['pro_id'];

        $product_type="";
        $product_price="";
        $show="";
        $status="";
        $image="";
        $query="SELECT *FROM products WHERE id=$id";
        $result=mysqli_query($con,$query);

        if ($result) {
                
            $data=mysqli_fetch_assoc($result);
            $product_type=$data['type'];
            $product_price=$data['price'];
            $status=$data['status'];
            $image=$data['file_name'];
            $show="<img src='phpScripts/uploads/$image' width=400px height=400px class='img-fluid'>";
        }

        if (!isset($_SESSION['user_name'])) {
            
            header("Location:login2.php?prod=".$p_id);
        }
        else
        {
            $user_name=$_SESSION['user_name'];
            $query="SELECT *FROM buyer WHERE user_name='{$user_name}'";
            $re=mysqli_query($con,$query);
            if ($re) {
                
                $data=mysqli_fetch_assoc($re);
                $u_id=$data['id'];
                $full_name=$data['full_name'];
            }
        }  

        $notify="";
        $notify2="";

        if (isset($_POST['upload_cart_details'])) {

            $id=$_SESSION['pro_id'];
            $count=$_POST['count'];
            $query="SELECT *FROM products WHERE id=$id";
            $result=mysqli_query($con,$query);

            if ($result) {
                
                $data=mysqli_fetch_assoc($result);
                $product_type=$data['type'];
                $product_price=$data['price'];
                $status=$data['status'];
                $image=$data['file_name'];
                //$show="<img src='phpScripts/uploads/$image' width=400px height=400px class='img-fluid'>";

                if (!empty(trim($full_name)) || !empty(trim($product_type)) || !empty(trim($product_price)) || empty(trim($status)) || $u_id!=0) {
                  
                    $query="INSERT INTO cart(user_id,full_name,product_type,product_price,status,image,quantity) VALUES($u_id,'{$full_name}','{$product_type}','{$product_price}','{$status}','{$image}',$count)";
                    $result=mysqli_query($con,$query);

                    if ($result) {
                      
                         header("Location:cartList.php");
                    }
                    else
                        $notify2="Unable to add to Cart!!";
                }
            }  
              
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
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="product_list.php">Products</a>
                                </li>
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Add Other Products
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="product_list.php">Add </a>
                                        <a class="dropdown-item" href="single-product.php">product details</a>
                                        
                                    </div>
                                </li>
                            -->
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
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
                                    <a class="nav-link" href="BuyerHome.php">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <!--<a class="nav-link" href="logout.php">Logout</a>-->
                                </li>
                            </ul>
                        </div>
                        
                        <div class="hearer_icon d-flex align-items-center">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="cartList.php">
                                <i class="flaticon-shopping-cart-black-shape"></i>
                            </a>
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

    <!-- breadcrumb part start-->
    <!--
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>product list of ANSA-Mart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <!--
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Wrought Iron Chairs</a></p>
                                    <p><a href="#">Wrought Iron Tables</a></p>
                                    <p><a href="#">Wrought Iron Candles</a></p>
                                    <p><a href="#">Wrought Iron Rack</a></p>
                                    <p><a href="#">Bags</a></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/SAH0031-960x775.jpg" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php"></a> Wrought Iron Rack</h3>
                                    <p>From $5</p>
                                    <button  name="" class="btn btn-success ">Add to Cart
                                    <i class="flaticon-shopping-cart-black-shape"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/rack.jpg" alt="#" class="img-fluid" height="300px">
                                    <h3> <a href="single-product.php">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_3.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Foam filling cotton slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_4.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_5.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_6.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_7.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_8.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_9.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_10.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.php">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- product list part end-->
    
    <!-- client review part here -->
    <!--
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- client review part end -->

    <!-- feature part here -->
    <!--
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        where as standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- feature part end -->

    <!-- subscribe part here -->
    <!--
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get In Touch</h2>
                        <p>Mobile No</p>
                        <p><b>0765792187</b></p>
                        <p>Email</p>
                        <p><b>Sanjaya700018@gmail.com</b></p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- subscribe part end -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <center><h3><font color="green">Welcome to Add to Cart Panel</font></h3></center>
            </div>
            <div class="col-md-6">
                <br><br><br>
                <?php echo $show; ?>
            </div>
            <div class="col-md-6">
                <br><br>
                <form action="addCart.php" method="post" enctype="multipart/form-data">
                <table class="table table-white">
                    <tr><td><b>Your Name</b></td></tr>
                    <tr><td><p><?php echo $full_name; ?></p></td></tr>
                    <tr><td><b>Product Type</b></td></tr>
                    <tr><td><p><?php echo $product_type; ?></p></td></tr>
                    <tr><td><b>Product Price</b></td></tr>
                    <tr><td><p><?php echo $product_price; ?></p></td></tr>
                    <tr><td><b>Product Status</b></td></tr>
                    <tr><td>
                        <p><?php echo $status; ?></p>
                    </td></tr>
                    <tr><td><b>Quantity</b></td></tr>
                    <tr><td>
                        <div class='product_count'>
                            <span class='input-number-decrement'><i class='ti-minus'></i></span>
                            <input class='input-number' type='text' name=count value='1' min='0' max='10' style='width:30px;'>
                            <span class='input-number-increment'><i class='ti-plus'></i></span>
                        </div>    
                    </td></tr>
                    <tr><td><?php echo "<font color='green'>".$notify."</font>"; ?></td></tr>
                    <tr><td><input type="submit" name="upload_cart_details" class="btn btn-warning" value="Confirm"></td></tr>
                </table>
                </form>
                <br><br><br><br>
            </div>
        </div>
    </div>

    <!--::footer_part start::-->
    <footer class="footer_part">
            <!--
            <div class="footer_iner">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8">
                            <div class="footer_menu">
                                <div class="footer_logo">
                                    <a href="index.php"><h3>ANSA-Mart</h3></a>
                                </div>
                                <div class="footer_menu_item">
                                    <a href="adminHome.php">Admin Home</a>
                                    <a href="aboutMe.php">About Me</a>
                                    <a href="product_list.php">Products</a>
                                    <a href="login.php">Login</a>
                                    <a href="blog.php">Blog</a>
                                    <a href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    -->
                        <div class="col-lg-4">
                            <div class="social_icon">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright_part">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="copyright_text">
                                <br><P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website made <i class="ti-heart" aria-hidden="true"></i> by <a href="" target="_blank">Mithila Madushanka</a>
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
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/mixitup.min.js"></script>
    <!-- particles js -->
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