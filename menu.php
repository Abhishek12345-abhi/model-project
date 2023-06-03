<?php
 function curPageName() 
  {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }             
                
  $curpage=curPageName();
 ?> 

<aside class="sidenav bg-gradient-info navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">


<!-- <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-xl-none" aria-hidden="true" id="iconSidenav"></i> -->


<a class="navbar-brand m-0" href="dashboard">
  <!-- <img src="assets/img/EDHA-Final-Logo.png" class="navbar-brand-img h-100" alt="main_logo"> -->
  <span class="ms-1 font-weight-bold"><h2 style="color:black; text-align:center;">PCBL</h2></span>
</a>

    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">

         <?php
          if($curpage == "dashboard.php")
          {
          ?>
        <li class="nav-item">
          <a data-bs-toggle="" href="dashboard" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
               <i class="fa fa-home text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-white font-weight-bold">Home</span>
          </a>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="dashboard" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
               <i class="fa fa-home text-primary text-sm opacity-10" ></i>
            </div>

            <span class="nav-link-text ms-1 text-dark font-weight-bold">Home</span>
          </a>
          </li>
          <?php
        }
        ?>




          <?php
          if($curpage == "location_master.php")
          {
          ?>
        <li class="nav-item">
          <a data-bs-toggle="" href="location" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-compass-04 text-warning text-sm opacity-10"></i>
            </div>

            <span class="nav-link-text ms-1 text-white font-weight-bold">Location Master</span>
          </a>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="location" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-compass-04 text-warning text-sm opacity-10 font-weight-bold"></i>
            </div>

            <span class="nav-link-text ms-1 text-dark font-weight-bold">Location Master</span>
          </a>
          </li>
          <?php
        }
        ?>

        <?php
          if($curpage == "mine_device.php")
          {
          ?>
        <li class="nav-item">
          <a data-bs-toggle="" href="device" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-atom text-dark text-sm opacity-10 font-weight-bold"></i>
            </div>

            <span class="nav-link-text ms-1 text-white font-weight-bold">Device Master</span>
          </a>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="device" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-atom text-dark text-sm opacity-10 font-weight-bold"></i>
            </div>

            <span class="nav-link-text ms-1 text-dark font-weight-bold">Device Master</span>
          </a>
          </li>
          <?php
        }
        ?>

<?php
        if($curpage == "view_contactor.php")
        {
        ?>
         <li class="nav-item">
          <a data-bs-toggle="" href="contractor-details" class="nav-link active" aria-controls="pagesExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-white font-weight-bold">Contractor Master</span>
          </a>
          </li>
          <?php  
          }
          else
          {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="contractor-details" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-dark font-weight-bold">Contractor Master</span>
          </a>
          </li>
          <?php  
          }
          ?>

    


<?php
        if($curpage == "fleet_master.php")
        {
        ?>
         <li class="nav-item">
          <a data-bs-toggle="" href="fleet" class="nav-link active" aria-controls="pagesExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-spaceship text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-white font-weight-bold">Fleet Details</span>
          </a>
          </li>
          <?php  
          }
          else
          {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="fleet" class="nav-link " aria-controls="pagesExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-spaceship text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 text-dark font-weight-bold">Fleet Details</span>
          </a>
          </li>
          <?php  
          }
          ?>


      
          
        <li class="nav-item mt-3">
          <h6 class="ps-4  ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-6">REPORTS</h6>
        </li>
         <hr class="horizontal dark mt-0"> 

          <?php
          if($curpage == "retailer_wallet_transaction_view.php")
          {
          ?>
        <li class="nav-item">
          <a data-bs-toggle="" href="retailer_wallet_txn" class="nav-link active" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
             <i class="ni ni-ungroup text-success text-sm opacity-4"></i>
            </div>

            <span class="nav-link-text ms-1 text-white font-weight-bold"> Report</span>
          </a>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="nav-item">
          <a data-bs-toggle="" href="retailer_wallet_txn" class="nav-link" aria-controls="dashboardsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
             <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
            </div>

            <span class="nav-link-text ms-1 text-dark font-weight-bold"> Report</span>
          </a>
          </li>
          <?php
        }
        ?>

          <?php
          if ($curpage == "") 
          {
          ?>
        <li class="nav-item">
           <a data-bs-toggle="" href="logout" class="nav-link active" aria-controls="componentsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-danger text-sm"></i>
            </div>
            <span class="nav-link-text ms-1 text-white font-weight-bold">Logout</span>
          </a>
       </li>

        <?php
         }
        else
         {
        ?>
         <li class="nav-item">
           <a data-bs-toggle="" href="logout" class="nav-link " aria-controls="componentsExamples" role="button" aria-expanded="false">
            <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
              <i class="ni ni-button-power text-danger text-sm"></i>
            </div>
            <span class="nav-link-text ms-1 text-dark font-weight-bold">Logout</span>
          </a>
       </li>
       <?php
          }
       ?>
      
        

      </ul>
    </div>

   
  </aside>