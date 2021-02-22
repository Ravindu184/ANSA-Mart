<?php 
        require_once('phpScripts/DBConnection.php');

        $cart=$_GET['id'];

        $full_name="";
        $contact;
        $email;

        $pro_type;
        $quantity;
        $pro_price;
        $ship_rate=200;
        $total=0;
        $grant_total=0;
        $c_id;

        $query="SELECT *FROM cart WHERE id=$cart";
        $result=mysqli_query($con,$query);

        if ($result) {
            
            $data=mysqli_fetch_assoc($result);
            $full_name=$data['full_name'];
            $u_id=$data['user_id'];
            $pro_type=$data['product_type'];
            $pro_price=$data['product_price'];
            $quantity=$data['quantity'];
            $c_id=$data['id'];

            $total=$pro_price * $quantity;
            $grant_total=$ship_rate + $total;

            $query="SELECT *FROM buyer WHERE id=$u_id";
            $result=mysqli_query($con,$query);

            if ($result) {
                
                $data=mysqli_fetch_assoc($result);
                $contact=$data['contact_no'];
                $email=$data['email'];
            }
        }

        if (isset($_POST['proceed_transaction'])) {
        	echo "ok";
        	$f=$_POST['cart_id'];
        	$address=$_POST['address'];
        	$city=$_POST['city'];
        	$district=$_POST['district'];
        	$Postcode=$_POST['Postcode'];
        	//$ship_deff=$_POST['selector'];

        	$query="SELECT *FROM cart WHERE id=$f";
        	$result=mysqli_query($con,$query);

        	if ($result) {
        		
        		$data=mysqli_fetch_assoc($result);

        		$name=$data['full_name'];
        		$u_id=$data['user_id'];

        		
        		$query="SELECT *FROM buyer WHERE id=$u_id";
        		$result=mysqli_query($con,$query);

        		if ($result) {
        			
        			$data2=mysqli_fetch_assoc($result);
        			$contact=$data2['contact_no'];
        			$email=$data2['email'];

        			$query="INSERT INTO payment(name,contact_no,email,address,city,district,postcode,card_id,shipping_rate) VALUES('$name','$contact','$email','$address','$city','$district','$Postcode','$f','$ship_rate')";
        			$result=mysqli_query($con,$query);

        			if ($result) {
        				
        					$get_date=date("d/m/Y");
        					
        						
        							$query="INSERT INTO ship(user_id,cart_id,is_shipped,created_date,address) VALUES($u_id,$f,0,'$get_date','$address')";
        							$result=mysqli_query($con,$query);

        							if ($result) {
        								header("Location:confirmation.php?cart=$f");
        							}
        							else  
        								echo "nooooo";
        					
        					
        			}
        			else
        				echo "no";
        		}
        	}
        	else
        		echo "no bn";
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
                        <a class="navbar-brand" href="index.html"> <h2 style="margin-left: 33px;">ANSA-Mart</h2> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="buyerHome.php">My Account</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cartList.php">Cart List</a>
                                </li>
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        product
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="product_list.html"> product list</a>
                                        <a class="dropdown-item" href="single-product.html">product details</a>
                                        
                                    </div>
                                </li>
                              -->
                              <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> 
                                            login
                                            
                                        </a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li>
                                -->
                                <!--
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li>
                                -->
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="hearer_icon d-flex align-items-center">
                            <!--<a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>-->
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
    
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <img src="img/shop.gif">
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <!-- breadcrumb part end-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      
      <div class="billing_details" style="">
        <div class="row">
          <div class="col-lg-8">
            <h3 style="font-size: 30px;color: purple;">Billing Details</h3>
            <form class="row contact_form" action="checkout.php" method="post" >
              <div class="col-md-6 form-group p_star">
                  <span style="font-size: 16px;">Your Name : <?php echo $full_name; ?></span>
              </div>
              <!--
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" name="name" required/>
                <span class="placeholder" data-placeholder="Contact No"></span>
              </div>
            -->
              <!--
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
              </div>
            -->
              <div class="col-md-6 form-group p_star">
                  <span style="font-size: 16px;">Your Contact : <?php echo $contact; ?>
              </div>
              <div class="col-md-6 form-group p_star">
                  <span style="font-size: 16px;">Your email : <?php echo $email; ?>
              </div>
              <!--
              <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">Country</option>
                  <option value="2">Country</option>
                  <option value="4">Country</option>
                </select>
              </div>
            -->
              <div class="col-md-12 form-group p_star">
              	<input type="hidden" name="cart_id" value=<?php echo $c_id; ?>>
                <input type="text" class="form-control" name="address" id="add1" name="add1" required placeholder="Address"/>
                <!--<span class="placeholder" data-placeholder="Address"></span>-->
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" name="city" id="add2" name="add2" required placeholder="Town/City"/>
                <!--<span class="placeholder" data-placeholder="Town/City"></span>-->
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" name="district" id="city" name="city" required placeholder="District"/>
                <!--<span class="placeholder" data-placeholder="District"></span>-->
              </div>
              <!--
              <div class="col-md-12 form-group p_star">
                <select class="country_select">
                  <option value="1">District</option>
                  <option value="2">District</option>
                  <option value="4">District</option>
                </select>
              </div>
            -->
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="Postcode" placeholder="Postcode/ZIP" required/>
              </div>
              <!--
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <input type="checkbox" id="f-option2" name="selector" />
                  <label for="f-option2">Create an account?</label>
                </div>
              </div>
            -->
              <div class="col-md-12 form-group">
              	<!--
                <div class="creat_account">
                  <h3>Shipping Details</h3>
                  <input type="radio" id="f-option3" name="selector"  value="true" />
                  <label for="f-option3">Ship above mention address</label><br>
                  <input type="radio" id="f-option3" name="selector"  value="false" />
                  <label for="f-option3">Ship to a different address?</label>
                </div>
            -->
            	<!--
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Shipping Address(If you choosed ship different address then you type bellow the address)"></textarea><br>-->
                <input type="submit" name="proceed_transaction" class="btn btn-success" value="Proceed Transaction" style="color:white;">  
              </div>
              </form>

          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a href="#">Product
                    <span>Total</span>
                  </a>
                </li>
                <li>
                  <a href="#">Wrought Iron <?php echo $pro_type; ?>
                    <span class="middle">x <?php echo $quantity; ?></span>
                    <span class="last"><?php echo $total; ?></span>
                  </a>
                </li>
                
              </ul>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span>Rs.<?php echo $total; ?> LKR/-</span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Flat rate: Rs.<?php echo $ship_rate ?> LKR/-</span>
                  </a>
                </li>
                <li>
                  <a href="#">Full Payment
                    <span>Rs.<?php echo $grant_total; ?> LKR/-</span>
                  </a>
                </li>
              </ul>
              <!--
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option5" name="selector" />
                  <label for="f-option5">Deposit Money</label>
                  <div class="check"></div>
                </div>
                <p>
                    so if you filled required text fields then you can click bellow button.
                </p>
              </div>
            -->
              <!--
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" />
                  <label for="f-option6">Paypal </label>
                  <img src="img/product/single-product/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please try First method to proceed to Transaction, becouse currently paypal service are processing.
                </p>
              </div>
            -->
              <!--
              <div class="creat_account">
                <input type="checkbox" id="f-option4" name="selector" />
                <label for="f-option4">I’ve read and accept the </label>
                <a href="#">terms & conditions*</a>
              </div>
              -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->

  <!--::footer_part start::-->
  <footer class="footer_part">
            
      <div class="copyright_part">
          <div class="container">
              <div class="row ">
                  <div class="col-lg-12">
                      <div class="copyright_text">
                          <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This WebSite made <i class="ti-heart" aria-hidden="true"></i> by <a href="" target="_blank">Mithila Madushanka</a>
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