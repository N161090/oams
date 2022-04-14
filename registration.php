<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $idno = $_POST['idno'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $year = $_POST['year'];
  $branch = $_POST['branch'];
  // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $password = $_POST['password'];
  
  $out = mysqli_query(
      $conn,
      "SELECT count(1) c FROM user where idno='" .$idno. "'"
  );

  while ($row = $out->fetch_assoc()) {
      $data = $row['c'];
  }
  if ($data >= 1) {
      echo 'Record Already Exists';
  } else {
      $sql = "INSERT INTO `user` (`idno`, `name`, `email`, `year`, `branch`,`password`) VALUES ('$idno', '$name', '$email', '$year', '$branch', '$password');";
      $rs = mysqli_query($conn, $sql);
      if ($rs) {
          echo 'Contact Records Inserted';
          header("Location: login.php");
      }
      else{
          echo 'Error';
      }
  }
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
</head>

<body>

  <!-- ======= Header ======= -->


  <!-- ======= Sidebar ======= -->
  

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/rgukt.png" alt="">
                  <span class="d-none d-lg-block">OAMS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="" method="post" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">ID Number</label>
                      <input type="text" name="idno" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-4">
                        <label for="yourPassword" class="form-label">Year</label>
                        <select name="year" id="year">
                          <option value="E4">E4</option>
                          <option value="E1">E1</option>
                          <option value="E2">E2</option>
                          <option value="E3">E3</option>
                          
                        </select>
                      </div>
                      <div class="col-6">
                        <label for="yourPassword" class="form-label">Branch</label>
                        <select name="branch" id="branch">
                          <option value="CSE">CSE</option>
                          <option value="ECE">ECE</option>
                          <option value="MECH">MECH</option>
                          <option value="CIVIL">CIVIL</option>
                          <option value="MME">MME</option>
                          <option value="CHEM">Chemical</option>
                        </select>
                      </div>
                      <!-- <div class="col-12 mt-3">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms"
                            required>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
                              conditions</a></label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div> -->
                      <div class="col-12 mt-4">
                        <button class="btn btn-primary w-100" type="submit" name='submit'>Create Account</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                      </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RGUKT</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

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