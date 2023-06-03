<?php

  $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/EDHA-Final-Logo.png">
  <title>
    <?php //include"titel.php"; 
     echo "mine" ;?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.5" rel="stylesheet" />
</head>

<style>
  #overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=50);
-moz-opacity:0.5;
-khtml-opacity: 0.5;
opacity: 0.5;
z-index: 10000;
background: black url(ajax-loader.gif) center center no-repeat;

}
</style>


<body class="bg-gray-100">
  <!-- Navbar -->
  
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-7 pb-9 m-3 border-radius-lg" style="background-image: url('assets/img/img-1.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h3 class="text-white mb-2 mt-5">Welcome To Client Panel</h3>
            <!-- <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card mt-5">
            <div class="card-header pb-0 text-start">
              <h3 class="font-weight-bolder"> <i class="fa fa-sign-in"></i>  Login  </h3>
              
            </div>
            <div class="card-body">
             <a id="result"> </a>
             
             
                <label>Mobile NO / Email ID</label>
                <div class="mb-3">
                  <input type="text" class="form-control frm_check" placeholder="User ID" aria-label="Email" name="user" id="user">
                </div>
                <label>Password</label>
                <div class="mb-3">
                  <input type="password" class="form-control frm_check" placeholder="Password" aria-label="Password" name="pass" id="pass">
                </div>
                
                <div class="text-center">
                  <button type="button" class="btn btn-primary w-100 mt-4 mb-0" value="Login" name="sub" id="sub">Sign in</button>
                </div>

              

             
            </div>


            <!--<div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Change or reset your password?
                <a href="forgot_password" class="text-primary font-weight-bold">forgot password</a>
              </p>
            </div>-->
          </div>
        </div>
      </div>
    </div>

  </main>
  <!--  START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT  -->
  <footer class="footer py-5">
    <div class="container">
      
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Edha  
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!--  END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT  -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.5"></script>
   <script src="assets/js/jQuery-2.2.0.min.js"></script>
   <script src="app_js/login.js"></script>


  <script type="text/javascript">
   
    


  </script>


</body>

</html>