<?php 
session_start();
if(!isset($_SESSION['sl']))
{
  header("locatio:logout.php");
}

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
                    <img src="assets/img/my-profile.png" class="w-100 border-radius-lg shadow-sm">
                </div>
              </div>
              <div class="col-lg-6 my-auto ">
                <div class="h-100">
                    <!--<span id="res"></span>-->
                    <h5 class="mb-1"> &nbsp; Contractor Master</h5>
                </div>
              </div> 
              
              <div class="col-lg-4 my-auto" align="right">
                <button class="btn btn-icon btn-3 bg-gradient-info" id="add_btn" type="button" data-bs-target="#srch_modal">Add</button>&nbsp;
                <button class="btn btn-icon btn-3 bg-gradient-success" id="src_btn" type="button" data-bs-target="#srch_modal">Search</button>
              </div>       
            </div> 
          </div>
        </div>
      </div>   
       
  
    <div class="container-fluid py-4">
      <div class="row mt-3">

      <div class="col-12">
          <div class="card">
            <div class="table-responsive">

              <table class="table align-items-center mb-0">
                <thead  class="" >
                  <tr class="" style="border-top-left-radius:50% !important">
                  <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7 ps-5 bg-warning" style="border-top-left-radius:18px !important"  >action</th>
                  <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7 ps-5 bg-warning"  >SL NO</th>
                    <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7 ps-5 bg-warning" >Contractor ID</th>
                    <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7 ps-5 bg-warning">Name</th>
                    <th class="text-uppercase text-white text-xs font-weight-bolder opacity-7 ps-6 bg-warning">Address</th>
                    <th class="text-center text-uppercase text-white text-xs font-weight-bolder opacity-7 bg-warning">Contact</th>
                    <th class="text-center text-uppercase text-white text-xs font-weight-bolder opacity-7 bg-warning">Email</th>
                    <th class="text-center text-uppercase text-white  text-xxs font-weight-bolder opacity-7 bg-warning" style="border-top-right-radius:18px !important">Password</th>
                    
                    
                  </tr>
                </thead>
                <tbody id="show_table">

                
                    
                  
                </tbody>
              </table>
            </div>
          </div>


          <!-- PAGINATION HOLDER -->
             </br>
           
                       <div id=pagi_holder></div>                         

                          <div id="pagi_total_records"></div>

                          <div style="width:200px">
                          <label> 
                                 
                                <select id="pagi_record_per_page">
                                  <?php
                                  include("pagination/pagination_record_perPage.php");
                                  pagination_dropdown();
                                  ?>
                                              
                                </select>

                                :Records per page
                                <label>
                          </div> 
                          
                       <!-- END PAGINATION HOLDER-->

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
<!-- ==================================start src  modal================================ -->
 <div class="modal fade" id="date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header pb-0 text-left">
      <h4 class="modal-title font-weight-bolder text-success text-gradient"><i class="ni ni-key-25 text-success text-m opacity-10"></i>  SEARCH</h4>
    </div>
<div class="modal-body">

<div class="form-group">
<form method="get" action="">

<label for="recipient-name" class="col-form-label">Contractor Name</label>
<input type="text" class="form-control sub_date" id="c_name" name="c_name" placeholder="Name">
</div>
<div class="form-group">
<label for="recipient-name" class="col-form-label">Contractor  Contact NO</label>
<input type="text" class="form-control sub_date" id="c_no" name="c_no" placeholder="Contact No">

</div>

</div>
<div class="modal-footer">

<button type="submit" class="btn btn btn-success" id="srch_button" name="srch_button" value="srch1">
Submit
</button>

<button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">
Close
</button>


</form>
</div>
</div>
</div>
</div>



<!-- =========================================end  src modal============================-->



<!-- ====================================edit modal============================= -->

    
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-body p-0">
<div class="card card-plain">
<div class="modal-header pb-0 text-left">
<h4 class="font-weight-bolder text-info text-gradient"><i class="fa fa-edit"></i>  EDIT CONTRACTOR</h4>
</div>
<div class="card-body">
<form>
    <div style="text-align: center;">
      <span id="msg"></span>
    </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <label>Contractor ID</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-control " id="c_id" placeholder="Contractor ID" readonly>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label>Contractor Name</label>
      </div>
      <div class="form-group">
        <input type="text"  id="con_name" class="form-control form_check" placeholder="Contractor Name">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <label>Contractor Address</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-control form_check" id="c_address" placeholder="Contractor Address">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
      <label>Contractor Number</label>
      </div>
      <div class="form-group">
        <input type="text" placeholder="Contractor Number" id="c_ph" class="form-control form_check" maxlength="10" onKeyPress="return IsAlphaNumeric(event)">
      </div>
        <span style="color: red;" id="msge"></span>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <label>Contractor Email</label>
      </div>
      <div class="form-group">
        <input type="email" class="form-control form_check" id="c_email" placeholder="Contractor Email">
      </div>
      <span id="msge1" style="color: red;"></span>
    </div>
  </div>

  <div class="modal-footer" style="text-align:center;">
    <button type="button" id="update" class="btn btn-info">Update</button>
    <button type="button" id="edit_reset" class="btn btn-secondary">Reset</button>
  </div>
  
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- =========================================end edit modal======================== -->

<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

   
      <div class="modal-header pb-0 text-left">
        <h4 class="modal-title font-weight-bolder text-info text-gradient"><i class="ni ni-single-02 text-danger text-m opacity-10"></i>  ADD CONTRACTOR</h4>
      </div>

   
      <div class="modal-body">
          <form>
            <div style="text-align: center;">
              <span id="msg"></span>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Contractor ID</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control frm_check" id="cont_id" placeholder="Contractor ID">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contractor Name</label>
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Contractor Name" id="cont_name" class="form-control frm_check">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Contractor Address</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control frm_check" id="cont_address" placeholder="Contractor Address">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label>Contractor Number</label>
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Contractor Number" id="cont_ph" class="form-control frm_check" maxlength="10" onKeyPress="return IsAlphaNumeric(event)">
                </div>
                  <span style="color: red;" id="message"></span>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label>Contractor Email</label>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control frm_check" id="cont_email" placeholder="Contractor Email">
                </div>
                <span id="message1" style="color: red;"></span>
              </div>
            </div>

            <div class="modal-footer" style="text-align:center;">
              <button type="button" id="submit" class="btn btn-info">Submit</button>
              <button type="button" id="add_reset" class="btn btn-secondary">Reset</button>
            </div>
          
          </form>
      </div>


    </div>
  </div>
</div>


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
    <script src="app_js/contactor_view.js"></script>

    <script type="text/javascript">

 // $("#srch_button").click(function(){
 //  var vl=$("#from_date").val();
 //  alert(vl);
 // });

//    $('#from_date,#to_date').datepicker({format:'dd-mm-yyyy',autoclose: true ,changeMonth:true ,changeYear:true});
   
//     $("#src_btn").click(function(){
//       //alert("ggg");
//       $("#from_date").val("");
//       $("#to_date").val("");
//       $("#date_modal").modal('show');
//     });

//     //===============================pagination=========================================

//   var itemPerPage=$("#pagi_record_per_page").val();

//   var currentPageNo=1;

//    var getUrlParameter = function getUrlParameter(sParam) {
//   var sPageURL = decodeURIComponent(window.location.search.substring(1)),
//     sURLVariables = sPageURL.split('&'),
//     sParameterName,
//     i;

//   for (i = 0; i < sURLVariables.length; i++) {
//     sParameterName = sURLVariables[i].split('=');

//     if (sParameterName[0] === sParam) {
//       return sParameterName[1] === undefined ? true : sParameterName[1];
//     }
//   }
// };      

//       $("#pagi_holder").pagination({
//           items: 0,
//           itemsOnPage: itemPerPage,
//           useAnchors: false,
//           cssStyle: 'light-theme',
//           onPageClick: function(pageNumber, event) {
           
//               currentPageNo=pageNumber;
//            load_page(currentPageNo);
//       }
//       }); 

//       //$("#loading_spinner").hide();

//       load_page(currentPageNo);


//      $("#pagi_record_per_page").on('change',function(){

//       itemPerPage=$("#pagi_record_per_page").val();

//         $(function() {  
//            $("#pagi_holder").pagination('updateItemsOnPage',itemPerPage);
//         });

//       });



   
//       function load_page(pageNo)
//     {


     
//       var overlay = jQuery('<div id="overlay"></div>');

//         // $("#loading_spinner").show();
//          overlay.appendTo(document.body);
        
//         $("#show_table").html('');
//         rec_no=((pageNo*itemPerPage)-itemPerPage)+1;

        

       
       
//         var footer=$("#footer-content").html();
//         var wallet_load_ret="wallet_l4_ret";
        

//         //alert(btn);
          
//        $.post("process_wallet_load_report",
//           {
//             post_page_no:pageNo,
//             post_itemPerPage:itemPerPage,
//             post_footer:footer,
//             post_frm_date:getUrlParameter('from_date'),
//             post_to_date:getUrlParameter('to_date'),
//             post_ret_txn:wallet_load_ret,
//             post_btn:getUrlParameter('srch_button')
//           },
//           function(retdata)
//           {
//             //alert(retdata);
//              overlay.remove();
//              var result=JSON.parse(retdata);
//              // alert(result['status']);

//              if(result['status']==false)
//              {
//               Swal.fire(result['reason']);
//              }
//              else
//              {
//                $(function() 
//                 {
                  
//                    $("#pagi_holder").pagination('updateItems', result['total_records']);

//                 });

//                 $("#pagi_total_records").html("Total Records: "+ result['total_records']);


//                $.each(result['txn_data'],function(indx,item){

//                 //alert(item.txn_type);
//                 var status="";
//                 var amt="";
//             if(item.txn_status=='Successful')
//             {
//               status="<p style='color:#2F9720'>"+item.txn_status+"</p>";
//               amt="<p style='color:#2F9720'>"+item.amount+"</p>";
//             }
//            if(item.txn_status=='Pending')
//             {
//               status="<p style='color:#ffd11a'>"+item.txn_status+"</p>";
//               amt="<p style='color:#ffd11a'>"+item.amount+"</p>";
//             }
//              if(item.txn_status=='Failed')
//             {
//               status="<p style='color:#E95345'>"+item.txn_status+"</p>";
//               amt="<p style='color:#E95345'>"+item.amount+"</p>";
//             }

//                 $("#show_table").append('\
//                     <tr cellspacing="20" style="border:2px solid #E8E8E8 ; height:60px">\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+rec_no+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.payment_type+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.txn_id+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.date+'&nbsp'+item.time+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.bank_txn_id+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+item.api_resp+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-sm font-weight-normal">'+amt+'</td>\
//                     <td style="white-space:nowrap;text-align:center" class="text-lg font-weight-normal">'+status+'</td>\
//                            </tr>\
//                            ')

               
//                       rec_no=rec_no+1;

//           });

//        //}.'json');

//      }

//        });
     

//       };

 
  
        
     
    </script>

   
  

</body>

</html>