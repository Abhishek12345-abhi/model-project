<?php 
session_start();
if(!isset($_SESSION['sl']))
{
  header("locatio:logout.php");
}
$contractor_id=$_REQUEST['con_id'];

include "db/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/EDHA-Final-Logo.png">
  <title>
  mine
  <?php //include("titel.php"); ?> 
  </title>
   
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <link type="text/css" rel="stylesheet" href="pagination/simplePagination.css"/>
  
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- <link href="assets/css/datepicker3.css" rel="stylesheet" type="text/css"/> -->
    <link rel="stylesheet" type="text/css" href="autocom/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="assets/old/jquery-ui/jquery-ui.min.css" />
  
  <!-- CSS Files -->
   <link href="assets/old/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.5" rel="stylesheet" />

  <style type="text/css">
    body{
      overflow-x: hidden;
    }
  </style>

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

#loading_spinner{
  position: fixed;
  top: 0;
  right: 0;  bottom: 0;
  left: 0;
  margin: auto;
  margin-top: 200px;
  visibility:hidden;
  z-index: 0;
  
} 

.ui-autocompletec {
   z-index:2147483647;
   overflow: scroll;
   height:auto;
    }

 #rcorners2 {
  border-radius: 500px;
  border: 2px solid;
}   
</style>

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-100 bg-primary position-absolute w-100"></div>
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
          		
      <div class="row ">

      <div class="card shadow-lg mx-3">
      <div class="card-body p-3">
        <div class="row gx-1 col-lg-12">
          <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
              <img src="assets/img/fleet.jpg" class="w-100 border-radius-lg shadow-sm">
           </div>
          </div>
          <div class="col-lg-6 my-auto ">
            <div class="h-100">
                <!--<span id="res"></span>-->
                <h5 class="mb-1"> &nbsp;Add Fleet</h5>
                <h6 class="mb-1">&nbspContractor ID: &nbsp<?php echo $contractor_id ?></h6>
            </div>
          </div>     
        </div>  
      </div>
    </div>
      </div>   
       
  
    <div class="container-fluid py-4">
      <div class="row mt-3">
      <div class="col-12">


          <div class="card" style="border-radius-lg">
            <div class="p-4 bg-white">
  		<form>
    	<div style="text-align: center;">
      	<span id="msg"></span>
   	    </div>

   	    	<input type="text" name="store_data" id="store_data" value="<?php echo $contractor_id?>" hidden>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
      <label>Machine Type</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-control frm_check" id="m_type" placeholder="Machine Type">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
      <label>Model</label>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Model" id="model" class="form-control frm_check">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
      <label>Serial No</label>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Serial No" id="sl_no" class="form-control frm_check">
      </div>
    </div>
  </div>

 <div class="row">
    <div class="col-md-4">
      <div class="form-group">
      <label>Image Link</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-control frm_check" id="picture" placeholder="Picture">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
      <label>Location ID</label>
      </div>
      <div class="form-group">
        <select class="form-control frm_check add_reg " id="location_id">
  			 <option value="">----Select Location----</option>
  			 <?php
  			 $data_arr=array();
  			 $query=mysqli_query($con,"SELECT * FROM `mine_location_master`");
  			 if(mysqli_num_rows($query)>0)
  			 {
  			 	while($search_row=mysqli_fetch_array($query))
  			 	{

  			 		  $data_arr[]=array(
					 
					  //----------- SET Array Value to Generate Table ----------
					 
					  'loc_id'=>$search_row['location_id'],
					  'loc_name'=>$search_row['location_name']
					  
					  // ------------------------------------------------------
					  
					);
  			 	}
  			 }
  			foreach ($data_arr as $location) 
  			 {
  			?>	
  			  <option value="<?php echo $location['loc_id']; ?>"><?php echo $location['loc_name']; ?></option>
  		<?php  } ?>
		</select>
      </div>
    </div>
     <div class="col-md-4">
      <div class="form-group">
      <label>Shift Hours</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-control frm_check txt_num" id="shift_hours" placeholder="Shift Hours">
      </div>
    </div>
  </div>


  <div class="row">
   
    <div class="col-md-4">
      <div class="form-group">
      <label>Fuel Consumption</label>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Fuel Consumption" id="f_con" class="form-control frm_check txt_num">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
      <label>Carbon Emission</label>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Carbon Emission" id="carbon_emision" class="form-control frm_check txt_num">
      </div>
    </div>
  </div>


  <div class="form-group" style="text-align:center;">
    <button type="button" id="submit" class="btn btn-success">Submit</button>
    <button type="button" id="reset" class="btn btn-secondary">Reset</button>
  </div>
  
</form>

</div>
          </div>

        </div> 

         
      </div>
    </div>    

</div>
</div>  
</div>
</div>    



   
  <?php
  include("footer.php");

  ?>
 


  </main>
  

 <!--  //==========================settings start============================ -->

    


<!--  //==========================settings end============================ -->


  <!--   Core JS Files   -->
  <script src="assets/js/jQuery-2.2.0.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
<!--================ pagination script ==================-->
  <script type="text/javascript" src="pagination/simplePagination.js"></script>
  <!-- <script src="assets/js/bootstrap-datepicker.js"></script> -->
  <script src="assets/old/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

  <script src="autocom/js/jquery-ui.js"></script>

  <!--<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>-->

  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
   
  
 
  
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
    <script src="assets/js/plugins/sweetalert.min.js"></script>
    <script src="app_js/add_fleet.js"></script>
  

</body>

</html>