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
		    $Password = $row -> Password;
		   
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - Dashboard - PhinmaUI Merch.</title>
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
              <h6>Admin</h6>
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
    <a class="nav-link collapsed" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-people-fill"></i><span>Student Management</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="students-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
      <h1>Student Account List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminindex.php">Home</a></li>
          <li class="breadcrumb-item">Student Management</li>
          <li class="breadcrumb-item active">List of Accounts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <!-- Table with stripped rows -->
              <table class="table datatable text-center">
                <?php
                  $query = "SELECT * FROM user";
                  $query_run = mysqli_query($conn, $query);
                ?>
                <thead>
                  <tr>
                    <th>
                      ID
                    </th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Initial</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">DoB</th>
                    <th class="text-center">Number</th>
                    <th class="text-center">Password</th>
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
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['fname']?></td>
                    <td><?php echo $row['mname']?></td>
                    <td><?php echo $row['lname']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['dob']?></td>
                    <td><?php echo $row['pn']?></td>
                    <td><?php echo $row['password']?></td>

                    <td>
                      <button type="submit" class="action btn btn-success" 
                        data-bs-toggle="modal" data-bs-target="#Updateuser-<?php echo $row['id'];?>">
                      <i class="fas fa-pencil-alt"></i>
                      </button>
                    </td>


                    <td>
                      <button type="button" class="action btn btn-danger" onclick="window.location.href='userdelete.php?id=<?php echo $row['id']; ?>';">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                  </td>


                    <!-------------------------- UPDATE STUDENTS MODAL-------------------------------------->
<!-- ############################################################################################################################################# -->
  
            <div class="modal fade" id=Updateuser-<?php echo $row['id'];?> tabindex="-1" aria-labelledby="ModalLabel2" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content fw-bold">
                        
                        <div class="modal-header bg-success">
                          <h5 class="modal-title fs-2 fw-bold"  id="ModalLabel2">Update User</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="adminprocess.php" method="POST">

                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="row">
                            <div class="col">

                            <label>First Name: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                              <i class="fa fa-solid fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $row['fname']; ?>" required>
                          </div>

                            <label>Middle Initial: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                              <i class="fa fa-solid fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" name="mname" id="mname" value="<?php echo $row['mname']; ?>" required>
                          </div>

                            <label>Last Name: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                              <i class="fa fa-solid fa fa-user"></i>
                            </div>
                            <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $row['lname']; ?>" required>
                          </div>

                            <label>Email: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                              <i class="fa fa-solid fa fa-envelope"></i>
                            </div>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" autocomplete="off" name="email" required>
                          </div>
                          </div>

                            <div class="col">

                            <label>Address: </label>
                            <div class="input-group mb-3"style="border: 1px solid">
                            <div class="input-group-text">
                            <i class="fa fa-solid fa fa-address-book"></i>
                            </div>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $row['address']; ?>" required>
                          </div>

                          <label>Date of Birth: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                            <i class="fa fa-solid fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row['dob']; ?>" required>
                          </div>

                          <label>Phone Number: </label>
                            <div class="input-group mb-3" style="border: 1px solid">
                            <div class="input-group-text">
                            <i class="fa fa-solid fa fa-phone"></i>
                            </div>
                            <input type="text" class="form-control" name="pn" id="pn" value="<?php echo $row['pn']; ?>" required>
                          </div>

                          <label>Password: </label>
                          <div class="input-group" style="border: 1px solid">
                            <div class="input-group-text">
                              <i class="fa fa-solid fa fa-key"></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="myInput2" value="<?php echo $row['password']; ?>" required  aria-label="Text input with radio button"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                          </div>
                          
                          <div class="float-end">
                            <input type="checkbox" onclick="myFunction2()"> Show Password 
                          </div> 
                        </div>
                        <div class="modal-footer">
                            <a href="studentdata.php" class="btn btn-secondary btn-lg">Back</a>
                            <input type="submit" name="update_acc" value="Update"  class="btn btn-success btn-lg">
                        </div>
                        </div>
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
  <script>
        function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      </script> 
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