<?php
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";
 
 if(isset($_POST['post_ret_txn']) && $_POST['post_ret_txn']=="wallet_ret")
 {



    include "../db/connect.php";
    include "../autocode_new.php";

 $ret_id=$_SESSION['agent_user'];
 
//echo ($_POST['post_page_no']);

sqlValidate($_POST['post_footer']);
sqlValidate($_POST['post_page_no']);
sqlValidate($_POST['post_itemPerPage']);

$retailer_id=mysqli_real_escape_string($con,$ret_id);
$tkn_no=mysqli_real_escape_string($con,$_POST['post_footer']);
$page_no=mysqli_real_escape_string($con,$_POST['post_page_no']);
$itemperpage=mysqli_real_escape_string($con,$_POST['post_itemPerPage']);

// echo $itemperpage;
// echo $page_no;
// exit();

 if($retailer_id !=""  &&  $tkn_no!="" )  
 {
   
 

 							  $postData['retailer_id']=$retailer_id;
                $postData['Token_No']=$tkn_no;
                $postData['page_no']=$page_no;
                $postData['itemperpage']=$itemperpage;
							
              
  						$postJson=json_encode($postData);
  						$postJson=encrypt($postJson);
							$calhttp=new httpCall("reta1l3r_tr4nSacti0n_List.php",$postJson);
                 $httpReturn=$calhttp->httpPost();
     						echo $httpReturn=decrypt($httpReturn);
   						    
     					 if($httpReturn!="" || $httpReturn!=null)
               {
                resetToken($tkn_no);
               }


   

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