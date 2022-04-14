<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $result = mysqli_fetch_assoc($result);
  $subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE year='".$result["year"]."' and branch='".$result["branch"]."' ");
 
  $today_date=date("Y-m-d");
  $date = mysqli_query($conn, "SELECT count(1) c FROM holidays where date='".$today_date."'"); 
  $date = mysqli_fetch_assoc($date); 





  
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - RGUKT Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/rgukt.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
  * Template Name: RGUKT - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
/* table, th, td {
    border: 1px solid black;
} */

  table{
    border-collapse:collapse;
    width:100%;
    font-size:18px;
    text-align:left;
  }
  th{
    background-color: #4154f1;
    color:white;
  }
  .marked{
    background-color:orange;
  }
</style>
</head>

<body>

  <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/rgukt.png" alt="">
        <span class="d-none d-lg-block">OAMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

      

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/profile/<?php echo ($result['idno'].'.jpg'); ?>" alt="Profile" >
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $result["idno"]; ?></span>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $result["name"]; ?></h6>
              <span>Student</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class='logout'>
                 <a href="logout.php"><span>Logout</span></a>
            </li>
           

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-capture.php">
          <i class="ri-camera-line"></i>
          <span>Subjects</span>
        </a>
      </li><!-- End Error 404 Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="tables-general.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Summary</span>
        </a>
      </li>

  

  <!-- <li class="nav-heading">Pages</li> -->


</ul>

</aside><!-- End Sidebar-->
   
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row ">
        <div class="col-lg-10 ">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>
              <table >
               <thead>
                  <tr>
                    <th>Year</th>
                    <th >Branch</th>
                    <th >Subject</th>
                    <th >Mark Attendance</th>
                 </tr>
                </thead>
               
              <?php

              while($row = mysqli_fetch_array($subjects))
              {[]

              ?>

              <form class='table-form' method='post' >

              <tr>

                  <td>
                      <?php echo ($row['year']); ?>
                  </td>
                  <td>
                      <?php echo ($row['branch']); ?>
                  </td>
                  <td id='myId'>
                      <?php echo ($row['subject_name']); ?>
                  </td>
                  <?php
                    $ismarked = mysqli_query($conn, "SELECT count(1) c FROM mark_attendance WHERE year='".$row["year"]."' and branch='".$row["branch"]."' and subject='".$row['subject_name']."' and idno='".$result['idno']."' and date='".$today_date."'  "); 
                    $ismarked = mysqli_fetch_assoc($ismarked);
                    if($date['c']==0){

                      ?>
                       <td>
                         <?php
                          if($ismarked['c']==0){?>
                            <button> <a href=capture_php.php?subject_code=<?php echo ($row['subject_code']); ?>>Capture</a></button>
                            <?php
                          }
                          else{?>
                            <button class='marked'>Marked</button>
                          <?php }
                         ?>
                      </td>
                    <?php }
                    else{?>
                       <td><button>Holiday</button></td>
                    <?php }
                  
                  ?>
                 
              </tr>

              </form>

              <?php
              }
              ?>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RGUKT</span></strong>. All Rights Reserved
    </div>

  </footer> -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>