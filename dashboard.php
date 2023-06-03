<?php
session_start();

if(!isset($_SESSION['sl']))
{
  header("Location:login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="assets/img/EDHA-Final-Logo.png">-->
  <title>
    <?php include "title.php"; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="assets/css/operation_menu-style.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.5" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->

</head>


<body class="g-sidenav-show   bg-gray-100" style="overflow-x: hidden !important;">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php
  include("menu.php");
  ?>


  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   <?php
   include("header.php");
   ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-lg-12">
      <div class="row">
      <div class="col-lg-3 col-md-6 col-12">
      <div class="card  mb-4">
      <div class="card-body p-3">
      <div class="row">
      <div class="col-8">
      <div class="numbers">
      <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
      <h5 class="font-weight-bolder">
      $53,000
      </h5>
      <p class="mb-0">
      <span class="text-success text-sm font-weight-bolder">+55%</span>
      since yesterday
      </p>
    </div>
    </div>
<div class="col-4 text-end">
<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
<div class="card  mb-4">
<div class="card-body p-3">
<div class="row">
<div class="col-8">
<div class="numbers">
<p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
<h5 class="font-weight-bolder">
2,300
</h5>
<p class="mb-0">
<span class="text-success text-sm font-weight-bolder">+3%</span>
since last week
</p>
</div>
</div>
<div class="col-4 text-end">
<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
<i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
<div class="card  mb-4">
<div class="card-body p-3">
<div class="row">
<div class="col-8">
<div class="numbers">
<p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
<h5 class="font-weight-bolder">
+3,462
</h5>
<p class="mb-0">
<span class="text-danger text-sm font-weight-bolder">-2%</span>
since last quarter
</p>
</div>
</div>
<div class="col-4 text-end">
<div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
<i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-12">
<div class="card  mb-4">
<div class="card-body p-3">
<div class="row">
<div class="col-8">
<div class="numbers">
<p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
<h5 class="font-weight-bolder">
$103,430
</h5>
<p class="mb-0">
<span class="text-success text-sm font-weight-bolder">+5%</span> than last month
</p>
</div>
</div>
<div class="col-4 text-end">
<div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
<i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
      </div>



<!-- ============================================================== -->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>    
   
  <?php
  include("footer.php");
  include("settings.php");

  ?>

  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="assets/js/argon-dashboard.min.js?v=2.0.5"></script>
</body>

</html>
