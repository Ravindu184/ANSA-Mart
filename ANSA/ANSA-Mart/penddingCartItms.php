
<?php 
        require_once('phpScripts/DBConnection.php');

		$table="";

		$query="SELECT *FROM ship WHERE is_shipped=0";
		$result=mysqli_query($con,$query);

		if ($result) {
		       
		       	while ($data=mysqli_fetch_assoc($result)) {
		       		$id=$data['id'];
		       		$table.="<tr>";
		       			$table.="<td>".$data['created_date']."</td>";
		       			$table.="<td>"."ANSCUS".$data['user_id']."</td>";
		       			$table.="<td>"."<a href='penddingCartItms.php?pick={$id}'>"."<input type='button' class='btn btn-success' value='View'>"."</a>"."</td>";
		       		$table.="</tr>";
		       	}

		 }

		 $full_name="";
		 $address="";
		 $is_shipped="";
         $u_id=0;
         $date="";
         $c_id=0;

		 if (isset($_GET['pick'])) {
		       
		       $id=$_GET['pick'];
		       $query="SELECT *FROM ship WHERE id=$id";
		       $result=mysqli_query($con,$query);

		       if ($result) {
		       		$data=mysqli_fetch_assoc($result);
                    $c_id=$data['id'];
                    $u_id=$data['user_id'];
		       		$date=$data['created_date'];
		       		$address=$data['address'];
		       		if ($data['is_shipped'] ==0) {
		       			$is_shipped="Not Ship";
		       		}
		       		else
		       			$is_shipped="Its Shipped";
		       		
                    $query2="SELECT *FROM buyer WHERE id=$u_id";
                    $result2=mysqli_query($con,$query2);

                    if ($result2) {
                        
                        $data2=mysqli_fetch_assoc($result2);
                        $full_name=$data2['full_name'];
                    }
		       }
		 }

        $msg="";

        if (isset($_GET['msg'])) {
            
            $msg=$_GET['msg'];
        }

        $notify="You given  Approved Ship Item";
        $notify2="You not given  Ship Item";        
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
                                    <a class="nav-link" href="adminHome.php">Admin Home</a>
                                </li>
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link" href="aboutMe.php">about Me</a>
                                </li>
                            -->
                            <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Selection
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="product_list.php"> product list</a>
                                        <a class="dropdown-item" href="single-product.php">View Cart Details</a>
                                        <a class="dropdown-item" href="single-product.php">View Checkout Details</a>
                                        <a class="dropdown-item" href="single-product.php">View Confirmation Details</a>
                                    </div>
                                </li>
                            -->
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
                                <!--
                                 <li class="nav-item">
                                    
                                </li>
                            -->
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
                <h3><font color="green">Welcome to Pending Ship Items Panel</font></h3>
                </center>
                <br>
            </div>

            <div class="col-md-6">
                <br>
                <table class="table table-white">
                    <tr>
                        <th>Ordered</th>
                        <th>Buyer ID</th>
                        <th>Action</th>
                    </tr>
                    <?php echo $table; ?>
                </table>
            </div>

            <div class="col-md-6">
            	<br>
            	
            	<font color="green">You can see your result bellow.</font><br>
                <form action="phpScripts/changeShip.php" method="post">
            	<table class="table table-white">
                    <tr><td><input type="hidden" name="u_id" value=<?php echo $c_id; ?>></td></tr>
            		<tr><td><b>Created date</b></td></tr>
            		<tr><td><?php echo $date; ?></td></tr>
                    <tr><td><b>Buyer ID</b></td></tr>
                    <tr><td><?php echo "ANSCUS".$u_id; ?></td></tr>
            		<tr><td><b>Buyer Name</b></td></tr>
            		<tr><td><?php echo $full_name; ?></td></tr>
                    <tr><td><b>Buyer Address</b></td></tr>
                    <tr><td><?php echo $address; ?></td></tr>
            		<tr><td><b>Is Shipped</b></td></tr>
            		<tr><td><?php echo $is_shipped; ?></td></tr>
            		
            	</table>
            	<font color="green">If you want to give Approvel then You can change bellow</font><br><br>
            	<input type="radio" name="ship_item" value="true"> Yes he/she Paid <br>
            	<input type="radio" name="ship_item" value="false" > No he/she Not Paid <br><br>
            	<input type="submit" name="ship_user" class="btn btn-warning" value="Ship Item">
                </form>
                <br>
                <?php 
                        if($msg==404)
                            echo "<font color='green'>".$notify."</font>";
                        else if($msg==506)
                            echo "<font color='green'>".$notify2."</font>";
                        else if($msg==1008)
                            echo "<font color='red'>"."Please select one of Buyer within table."."</font>";
                        else
                            echo "";
                 ?>
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