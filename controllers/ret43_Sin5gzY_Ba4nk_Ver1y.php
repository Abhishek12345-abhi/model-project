<?php
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";
 

 if(isset($_POST['post_txn']) && $_POST['post_txn']=="chk_varify")
 {

    include "../db/connect.php";
    include "../autocode_new.php";

 $ret_id=$_SESSION['agent_user'];
 $ac_number=$_SESSION['Account_Number'];
 $ifsc_no=$_SESSION['ifsc'];


sqlValidate($_POST['post_footer']);

$retailer_id=mysqli_real_escape_string($con,$ret_id);
$ac_no=mysqli_real_escape_string($con,$ac_number);
$ifsc_code=mysqli_real_escape_string($con,$ifsc_no);
$tkn_no=mysqli_real_escape_string($con,$_POST['post_footer']);



 if($retailer_id !=""  &&  $tkn_no!="" && $ac_no!="" && $ifsc_code!="" )  
 {
   
  


 							$postData['retailer_id']=$retailer_id;
   						$postData['Token_No']=$tkn_no;
							$postData['ac_no']=$ac_no;
							$postData['ifsc_code']=$ifsc_code;
              
  						$postJson=json_encode($postData);
  						$postJson=encrypt($postJson);
							$calhttp=new httpCall("sign7zy_gE8tbAnkdeTails.php",$postJson);
                echo $httpReturn=$calhttp->httpPost();
     						//echo $httpReturn=decrypt($httpReturn);
   						    
     					 


   

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
     $response['reason']="Somthing Went Wrong";
     echo json_encode($response);
}
    unset($_SESSION['Account_Number']);
    unset($_SESSION['ifsc']);

?>