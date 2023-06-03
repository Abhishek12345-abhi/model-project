<?php
session_start();
include "common/ip_check.php";
include "common/httpHandler.php";
include "common/FlipFlop.php";
ob_start();
$_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(!isset($_SESSION['agent_user']))
{
  header("location:logout.php");
}

$user_id= $_SESSION['agent_user'];

  
  include "db/connect.php";
  include "autocode.php";
  
  //include "autocode_new.php";
   // include "access_permission.php";
  //checkPermission("Add-Merchant");
  include "common/genCsrT0kn.php";
  if(pageCsrToken()==true)
  {

    
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/EDHA-Final-Logo.png">
  <title>
    Edha
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

  <style type="text/css">
    body{
      overflow-x: hidden;
    }
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
    <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">   -->    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
 <div class="row">
      <div class="card shadow-lg mx-4">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <!-- <img src="assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               Change Password
              </h5>
              <div><a>Home > Setting > Change Password</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>   





    <div class="container-fluid py-4">
      <div class="row">           
        <div class="col-12 col-md-12 col-xl-12 mt-md-0">
              <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="">
                  <div class="card p-3 border-radius-xl bg-white">
                    <h5 class="font-weight-bolder mb-0">Change Password</h5>
                    <div class="multisteps-form__content">
                      <div style="text-align: center;" id="msg"></div>
                      <div class="row mt-3">
                        <div class="col-2 col-sm-2"></div>
                        <div class="col-8 col-sm-8">

                          <label>Old Password</label>
                          <input id="old_pwd" class="multisteps-form__input form-control frm_chk" type="password" placeholder="******" />
                        </div> 
                        <div class="col-2 col-sm-2"></div>  
                      </div>
                      <div class="row mt-3">
                        <div class="col-2 col-sm-2"></div>
                        <div class="col-8 col-sm-8">
                          <label>New Password</label>
                          <input id="new_pwd" class="multisteps-form__input form-control frm_chk" type="password" placeholder="******" />
                          <span style="color:red" id="alrt_msg"></span>
                        </div> 
                        <div style="padding-top:40px" class="col-2 col-sm-2"><i id="new_eye_close" style="display:block" class="fa fa-eye-slash" aria-hidden="true"></i>
                          <i style="display:none" id="new_eye" class="fa fa-eye" aria-hidden="true"></i></div>  
                      </div>
                      <div class="row mt-3">
                        <div class="col-2 col-sm-2"></div>
                        <div class="col-8 col-sm-8">
                          <label>Confirm Password</label>
                          <input id="con_pwd" class="multisteps-form__input form-control frm_chk" type="password" placeholder="******" />
                          <span style="color:red" id="alrt_con_msg"></span>
                        </div> 
                        <div style="padding-top:40px" class="col-2 col-sm-2"><i id="con_eye_close" style="display:block" class="fa fa-eye-slash" aria-hidden="true"></i>
                          <i style="display:none" id="con_eye" class="fa fa-eye" aria-hidden="true"></i></div>  
                      </div>
                      <div class="row">
                        <div class="col-6 col-sm-6"></div>
                        <div class="col-2 col-sm-2">
                      <div class="button-row d-flex mt-4">
                        <button id="sub" style="background-color:#0d476d; color:white;" class="btn ms-auto mb-0 js-btn-next" type="button" title="Next">Submit</button>
                      </div>

                    </div>
                    <div class="col-2 col-sm-2">
                      <div class="button-row d-flex mt-4">
                        <button id="reset" class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Reset</button>
                      </div>
                      
                    </div>
                      <div class="col-2 col-sm-2"></div> 
                    </div>
                    </div>
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

<!-- </div>  
</div>
</div>      
   </div> -->
 

  </main>

  <?php
  include("footer.php");

  ?>
   
  <?php
  include("settings.php");
   echo '<div class="footer-line"><div id="footer-content">'.pageCsrToken(). '</div></div>';

  
  ?>  



  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- Kanban scripts -->
  <script src="assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
   <script src="assets/js/jQuery-2.2.0.min.js"></script>

  <script type="text/javascript">


    //====================token=============================

    var footerlay="";
    var overlay = jQuery('<div id="overlay"></div>');
    footerlay=$("#footer-content").html();
    $(".footer-line").html('');
    $(".footer-line").remove();


    //----------------------------------------------------------
    
    $(document).ready(function(){
      var overlay = jQuery('<div id="overlay"></div>');
      $("#new_eye_close").click(function(){
          $(this).css("display","none");
          $("#new_eye").css("display","block");
          $("#new_pwd").attr("type","text");
      });
      $("#new_eye").click(function(){
          $(this).css("display","none");
          $("#new_eye_close").css("display","block");
          $("#new_pwd").attr("type","password");
      });
      $("#con_eye_close").click(function(){
          $(this).css("display","none");
          $("#con_eye").css("display","block");
          $("#con_pwd").attr("type","text");
      });
      $("#con_eye").click(function(){
          $(this).css("display","none");
          $("#con_eye_close").css("display","block");
          $("#con_pwd").attr("type","password");
      });


    $("#sub").click(function(){
        var $old_pwd= $("#old_pwd").val();
        var $new_pwd= $("#new_pwd").val();
        var $con_pwd= $("#con_pwd").val();
        var subok=1;
        $(".frm_chk").click(function(){
      $(this).css({'background':'#FFF','border':'','border-color':''});

    })
    $(".frm_chk").keypress(function(){
      $(this).css({'background':'#FFF','border':'','border-color':''});
      
    })
    $(".frm_chk").each(function(){
      if($(this).val()==""){
        $(this).css({'background':'#FDD','border':'1px solid','border-color':'#FD0'});
        var subok=0;
      }
    })

        if($old_pwd!="" && $new_pwd!="" && $con_pwd!=""){
          if($old_pwd==$new_pwd){
        var subok=0;
        $("#alrt_msg").html("Old password and new password should't be same");
        $("#new_pwd").keypress(function(){
          $("#alrt_msg").html("");
        });       
      }else{
        if($new_pwd!=$con_pwd){
          var subok=0;
          $("#alrt_con_msg").html("New password and Confirm password should be same");
        $("#con_pwd").keypress(function(){
          $("#alrt_con_msg").html("");
        });
      }else{
        var subok=1;
      }
    }
        }else{
      var subok=0;
    }
      
  
    
    if(subok==1){
                overlay.appendTo(document.body);
            $.post("process-change-password",
                {
                   post_footer:footerlay,
                   post_old_password:$old_pwd,
                   post_new_password:$new_pwd
          
           
                 
                },function(data)
        {
          //alert(data);
          overlay.remove();
          var res= JSON.parse(data);
          //alert(res['status']);
          if(res['status']==true){
            var $old_pwd= $("#old_pwd").val("");
            var $new_pwd= $("#new_pwd").val("");
            var $con_pwd= $("#con_pwd").val("");
            $("#msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
          <strong>Success ! </strong>"+res['reason']+"</div>");
            setTimeout(function(){
                      
                           $("#result").fadeOut(2000);
                                             window.location.href="logout";
                                             }, 2000);
          }else{
            
            $("#msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'>\
          <strong>Failure ! </strong>"+res['reason']+"</div>");
          }

        });

      } // subok 1
    }); //sub click
    $("#reset").click(function(){
      var $old_pwd= $("#old_pwd").val("");
      var $new_pwd= $("#new_pwd").val("");
      var $con_pwd= $("#con_pwd").val("");
      $("#alrt_con_msg").html("");
      $("#alrt_msg").html("");
      $(".frm_chk").click(function(){
    })
    }) //reset click

}) // document end

  </script>

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
</body>

</html>
<?php
}
else
  {
    include("session_error.php");
    
  }

ob_flush();
?>