<?php
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";


if(isset($_POST['post_ret_txn']) && $_POST['post_ret_txn']=='wallet_l4_ret')
{
    include "../db/connect.php";
    include "../autocode_new.php";
  
   $ret_id= $_SESSION['agent_user'];


    sqlValidate($_POST['post_page_no']);
    sqlValidate($_POST['post_itemPerPage']);
    sqlValidate($_POST['post_footer']);
    
   
    $retailer_id=mysqli_real_escape_string($con,$ret_id);
    $tkn_no=mysqli_real_escape_string($con,$_POST['post_footer']);
    $page_no=mysqli_real_escape_string($con,$_POST['post_page_no']);
    $itemperpage=mysqli_real_escape_string($con,$_POST['post_itemPerPage']);
    
 
 
   if($retailer_id!="" && $tkn_no!="" && $page_no!="" && $itemperpage!="")
    {

     // echo "fffffff";
            if(isset($_POST['post_btn']) && $_POST['post_btn']=="src_btn")
             {

              sqlValidate($_POST['post_frm_date']);
              sqlValidate($_POST['post_to_date']);
              sqlValidate($_POST['post_btn']);

               $frm_date=mysqli_real_escape_string($con,$_POST['post_frm_date']);
               $to_date=mysqli_real_escape_string($con,$_POST['post_to_date']);
               $btn=mysqli_real_escape_string($con,$_POST['post_btn']);
            
    	        $postData['retailer_id']=$retailer_id;
   						$postData['Token_No']=$tkn_no;
   						$postData['page_no']=$page_no;
   						$postData['itemperpage']=$itemperpage;
							$postData['from_date']=$frm_date;
							$postData['to_date']=$to_date;
							$postData['src_btn']=$btn;
             }
             
        else
             {

              $postData['retailer_id']=$retailer_id;
              $postData['Token_No']=$tkn_no;
              $postData['page_no']=$page_no;
              $postData['itemperpage']=$itemperpage;
             } 


  						$postJson=json_encode($postData);
  						$postJson=encrypt($postJson);
							$calhttp=new httpCall("ret34Wlr_txn_List.php",$postJson);
               $httpReturn=$calhttp->httpPost();
              echo $httpresponce=decrypt($httpReturn);
    }
    else
    {
    	 $response['status']=false;
  	    $response['reason']="Invalid Request!";
  
        echo json_encode($response);
    }


}
else
{
     $response['status']=false;
     $response['reason']="Somthing Went Wrong!";
     echo json_encode($response);
}

?>