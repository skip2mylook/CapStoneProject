<?php

    include "conn.php";
    session_start();
    if (empty($_SESSION)) {
        ?>
        <script>
        alert("Session Expired!\nPlease Login!");
        window.location.href="landingpage.php";
        </script>
        <?php
    }

    $email = $_SESSION['email'];

    $get_name = mysqli_query($conn, "SELECT * FROM user
    WHERE email='$email'");
    while($row = mysqli_fetch_object($get_name)){

		$fname = $row -> fname;
		$mname = $row -> mname;
		$lname = $row -> lname;
		$pn =$row -> pn;
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>PhinmaUI Merch - Comprehensive School Merchandize Online Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="uilogo.png" rel="icon">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body class="goto-here">
		<div class="py-1 bg-black">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">My Number: <?php echo $pn;?></span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Login Account: <?php echo $fname,' ',$mname,' ', $lname; ?></span>
					    </div>
					    
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">PhinmaUI Merch.</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="studentdB.php">Profile</a>
				  <a class="dropdown-item" href="cart.php">My Cart</a>
				  <a class="dropdown-item" href="checkout.php">Checkout</a>
				  <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#logoutModal">Log Out</a>
				</div>
			  </li>
			  

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Are you sure you want to Logout in this account?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="landingpage.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg4.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="landingpage.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Collection Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
				<?php
                    $get_products = mysqli_query($conn, "SELECT * FROM addproducts WHERE category = 'Stationery'");
                    while($row = mysqli_fetch_array($get_products)){
                        ?>
						
				<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
                        <form action="process.php " method="POST" class="product-form" enctype="multipart/form-data">
                            <div class="product">

							<img src="admin/assets/img/<?php echo $row['picture'];?>" width="300px" height="300px" alt="Colorlib Template">
                                        <div class="overlay"></div>

										<input type="hidden" name="pic" value="<?php echo $row['picture'];?>" >
										
                                <div class="text py-3 px-3">
                                    <h3 type="text" name="itemName"><?php echo $row['itemName']; ?></h3>

									<input type="hidden" name="itemName" value="<?php echo $row['itemName'];?>">

									<div class="d-flex">
                                        <div class="pricing">
                                            <p class="price" type="text" name="price"><span>₱<?php echo $row['price']; ?></span></p>
											
											<input type="hidden" name="price" value="<?php echo $row['price'];?>" >

                                        </div>
                                    </div>
									
								<div class="form-group">
								<label for="size"><?php echo $row['sizes']; ?></label>
								<input type="hidden" name="sizes" value="<?php echo $row['sizes'];?>" >
								<select class="form-select" name="sizes" id="size" aria-label="Default select example">
									<option selected>Choose Size</option>
									<option value="small">Small</option>
									<option value="medium">Medium</option>
									<option value="large">Large</option>
									<option value="large">N/A</option>
								</select>
							</div>
                                    <div class="form-group">
                                        <label for="stock">Quantity:</label>
                                        <input type="number" id="stock" name="stock"  value="1" min="1">
									</div>
									<div class="bottom-area text-center">
								<input type="submit" value="Add to Cart" class="btn btn-success add-to-cart-btn" name="add_to_cart">
										<input type="submit" value="Buy Now" class="btn btn-primary" name="buy_now">
									</div>


                                </div>
                            </div>
                        </form>
                    </div>
					<?php } ?>
		    	</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

				<div class="container">
				<form id="searchForm">
				<div class="fs-5">
					<input type="text" placeholder="Search..." id="searchInput" class="form-control">
					<button type="submit" class="btn"><i class="fas fa-search"></i></button>
				</div>
				</form>
			</div>
					<br>
					<br>
					<br>

				<div class="col-md-4 col-lg-2 sidebar">
				<div class="sidebar-box-2">

					<h2 class="heading mb-4 fs-4 fw-bold"><a href="clothing.php">Clothing</a></h2>
					
				</div>

					<div class="sidebar-box-2">
		    			<h2 class="heading mb-4 fs-4 fw-bold"><a href="uniform.php">Uniform</a></h2>
		    			
		    		</div>

					<div class="sidebar-box-2">
		    			<h2 class="heading mb-4 fs-4 fw-bold"><a href="stationery.php">Stationery</a></h2>
		    			
		    		</div>

						<div class="sidebar-box-2">
		    			<h2 class="heading mb-4 fs-4 fw-bold"><a href="accessories.php">Accessories</a></h2>
		    		
		    		</div>

					<div class="sidebar-box-2">
		    			<h2 class="heading mb-4 fs-4 fw-bold"><a href="souvenirs.php">Souvenirs</a></h2>
		    			
		    		</div>
    			</div>
    		</div>
    	</div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
		  <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">PhinmaUI Merch.</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Rizal St, Iloilo City Proper, Iloilo City, 5000 Iloilo</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+63 948 561 6394</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">phinmauimerch.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    



  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>