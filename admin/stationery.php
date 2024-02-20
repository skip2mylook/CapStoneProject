<?php

    include "conn.php";
    session_start();
    if (empty($_SESSION)) {
        ?>
        <script>
        alert("Session Expired!\nPlease Login!");
        window.location.href="adminlogin.php";
        </script>
        <?php
    }

    $user = $_SESSION['user'];

    $get_name = mysqli_query($conn, "SELECT * FROM admin
    WHERE Username='$user'");
    while($row = mysqli_fetch_object($get_name)){

        $name = $row -> Name;
		    $user = $row -> Username;
		    $password = $row -> Password;
		   
    }

    $countclothing_query = mysqli_query($conn,  "SELECT * FROM addproducts WHERE category = 'Clothing'");
    $num_clothing = mysqli_num_rows($countclothing_query);

    $countuniform_query = mysqli_query($conn,  "SELECT * FROM addproducts WHERE category = 'Uniform'");
    $num_uniform = mysqli_num_rows($countuniform_query);

    $countstationery_query = mysqli_query($conn,  "SELECT * FROM addproducts WHERE category = 'Stationery'");
    $num_staionery = mysqli_num_rows($countstationery_query);

    $countaccessories_query = mysqli_query($conn,  "SELECT * FROM addproducts WHERE category = 'Accessories'");
    $num_accessories = mysqli_num_rows($countaccessories_query);

    $countsouvenirs_query = mysqli_query($conn,  "SELECT * FROM addproducts WHERE category = 'Souvenirs'");
    $num_souvenirs = mysqli_num_rows($countsouvenirs_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - PhinmaUI Merch.</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/uilogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/uilogo.png" alt="">
        <span class="d-none d-lg-block"><?php echo $user;?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/uilogo.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $user;?></h6>
              <span>Faculty Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminprofile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminprofile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../landingpage.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="adminindex.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#list-nav" data-bs-toggle="collapse" href="#">
          <i class="fa-solid fa-list"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="list-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="categories.php">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
        </ul>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Products Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tableproducts.php">
              <i class="bi bi-circle"></i><span>Product Inventory</span>
            </a>
          </li>
        </ul>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bag"></i><span>Orders Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>All Orders</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Delivered</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Pending</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Cancelled</span>
            </a>
          </li>
        </ul>
      </li><!-- End Order Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Student Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="studentdata.php">
              <i class="bi bi-circle"></i><span>List of Account</span>
            </a>
          </li>
        </ul>
      </li><!-- End Products Nav -->

      


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="adminprofile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminindex.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 p-4">
          <div class="row">

            <!-- Clothing Card -->
            <div class="col-xxl-2 col-md-2">
              <div class="card info-card sales-card bg-dark">

                <div class="card-body">
                  <a href="categories.php">
                  <h5 class="card-title fs-5 text-white">Clothing</h5>
                  </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="text-white">

                      <?php
                        echo $num_clothing;
                      ?>

                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Clothing Card -->


            <!-- Uniform Card -->
            <div class="col-xxl-2 col-md-6">
              <div class="card info-card sales-card bg-dark">

              <div class="card-body">
                  <a href="uniform.php">
                  <h5 class="card-title fs-5 text-white">Uniform</h5>
                    </a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="text-white">
                      <?php
                        echo $num_uniform;
                      ?>
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Uniform Card -->

            <!-- Stationery Card -->
            <div class="col-xxl-2 col-md-6">

              <div class="card info-card sales-card bg-dark">

                <div class="card-body">
                  <a href="stationery.php">
                  <h5 class="card-title fs-5 text-white">Stationery</h5>
                  </a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="text-white">
                      <?php
                        echo $num_staionery;
                      ?>
                    
                      </h6>

                    </div>
                  </div>

                </div>
              </div>
            </div><!-- End Stationery Card -->

            <!--- Accessories Card -->
            <div class="col-xxl-2 col-md-6">
              <div class="card info-card sales-card bg-dark">

                <div class="card-body">
                  <a href="accessories.php">
                  <h5 class="card-title fs-5 text-white ">Accessories</h5>
                  </a>
                
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-glasses"></i>
                    </div>
                    <div class="ps-3">
                   <h6 class="text-white">
                   <?php
                        echo $num_accessories;
                      ?>
                    </h6>
                    </div>
                    </div>
                  </div>
                </div>

            </div><!-- End Sales Card -->


            <!-- Clothing Card -->
            <div class="col-xxl-2 col-md-6">
              <div class="card info-card sales-card bg-dark">


                <div class="card-body">
                  <a href="souvenirs.php">
                  <h5 class="card-title text-white">Souvenirs</h5>
                  </a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-business-time"></i>
                    </div>
                    <div class="ps-3">
                      <h6 class="text-white">

                      <?php
                        echo $num_souvenirs;
                      ?>

                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Clothing Card -->   


          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <!-- Table with stripped rows -->
              <table class="table datatable text-center">
              <?php
                  $query = "SELECT * FROM addproducts WHERE `category` = 'Stationery'";
                  $query_run = mysqli_query($conn, $query);
              ?>
                <thead>
                  <tr>
                    <th class="text-center">Category</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Availability</th>
                    <th class="text-center">Description</th>
                    <th>Size/Type</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($query_run)
                  {
                    foreach($query_run as $row)
                  {
                  ?>
                  <tr>
                    <td><?php echo $row['category']?></td>
                    <td><img src="assets/img/<?php echo $row['picture'];?>"
                    width="130px" height="100px"></td>
                    <td><?php echo $row['itemName']?></td>
                    <td><?php echo $row['availability']?></td>
                    <td><?php echo $row['description']?></td>
                    <td><?php echo $row['sizes']?></td>
                    <td><?php echo $row['stock']?></td>
                    <td>₱<?php echo $row['price']?></td>
                    <td><button type="submit" value="Update" class="action btn btn-success"  
                     data-bs-toggle="modal" data-bs-target="#Update-<?php echo $row['id'];?>"><i class="fas fa-pencil-alt"></i></button></td>

                    <td><a class="action delete btn btn-danger" href="admindelete.php?id=<?php echo $row['id']; ?>"
                    ><i class="fas fa-trash-alt"></i></a></td>

                    <!-------------------------- UPDATE PRODUCTS MODAL-------------------------------------->
<!-- ############################################################################################################################################# -->
                    
            <div class="modal fade" id="Update-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content" style="font-weight: bold;">
                        <div class="modal-header bg-success">
                          <h5 class="modal-title" id="ModalLabel" style="font-size: 30px; font-weight: bold;">Update Products</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="adminprocess.php" method="POST" enctype="multipart/form-data">

                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                          
                          <div class="row">
                            <div class="col">

                          <label>Categories: </label>
                          <div class="input-group">
                            <select id="inputState" name="category" id="category" value="<?php echo $row['category']; ?>"class="form-select" style="border: 1px solid" required>
                            <option selected>...</option>
                            <option>Clothing</option>
                            <option>Uniform</option>
                            <option>Stationery</option>
                            <option>Accessories</option>
                            <option>Souvenirs</option>
                          </select>
                          </div>
                          </p>

                            <label>Image:</label>
                          <div class="input-group mb-3">
                              <input type="file" name="pic" id="pic" value="<?php echo $row['picture']; ?>" accept=".jpg, .jpeg, .webp, .png, .gif, .jfif" class="form-control" required style="border: 1px solid">
                          </div>
                          </p>

                          <label>Product Name: </label>
                          <div class="input-group">
                            </div>
                            <input type="text" name="itemName" id="itemName" value="<?php echo $row['itemName']; ?>"
                            style="border: 1px solid" class="form-control" required>
                            </p>

                            <label>Availability: </label>
                          <div class="input-group">
                            </div>
                            <input type="radio" id="available" name="availability" value="Available">
                            <label for="available">Available</label>
                            &nbsp; &nbsp;
                            <input type="radio" id="available" name="availability" value="Not Available">
                            <label for="notAvailable">Not Available</label>
                            </div>


                          <div class="col">

                          <label>Description: </label>
                          <div class="input-group">
                          </div>
                            <input type="text" name="description" id="description" value="<?php echo $row['description']; ?>"
                            style="border: 1px solid" class="form-control" required>
                          </p>

                        <label>Sizes: </label>
                          <div class="input-group">
                          <select id="inputState" name="sizes" id="sizes" value="<?php echo $row['sizes']; ?>"class="form-select" style="border: 1px solid" required>
                            <option selected>All Size</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>N/A</option>
                          </select>
                          </div>
                        </p>

                        <label>Stock: </label>
                          <div class="input-group">
                            <input type="text" name="stock" id="stock" value="<?php echo $row['stock']; ?>" style="border: 1px solid" class="form-control" required>
                          </div>
                        </p>

                        <label>Price: </label>
                          <div class="input-group">
                            <input type="text" name="price" id="price" value="<?php echo $row['price'];?>"class="form-control" style="border: 1px solid" required>
                          </div>
                        </div>
                      </div>
                        
                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-secondary" value="Close" data-bs-dismiss="modal"></input>
                          <input type="submit" name="update_btn" value="Update Item"  class="btn btn-success"></input>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

                  </tr>
                  <?php
                      }
                  }
                  else
                  {
                      echo "no record";
                  }         
                  ?>
 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PhinmaUI Merch. Admin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>