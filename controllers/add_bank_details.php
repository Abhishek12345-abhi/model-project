<?php   
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";

if(isset($_POST['post_chk']) && $_POST['post_chk']=="acc_details")
{
  include "../db/connect.php";

  sqlValidate($_POST['post_acc_number']);
  sqlValidate($_POST['post_acc_type']);
  sqlValidate($_POST['post_ifsc_code']);
  sqlValidate($_POST['post_footer']);

  $acc_number=mysqli_real_escape_string($con,$_POST['post_acc_number']);
  $acc_type=mysqli_real_escape_string($con,$_POST['post_acc_type']);
  $ifsc=mysqli_real_escape_string($con,$_POST['post_ifsc_code']);
  $tkn_no=mysqli_real_escape_string($con,$_POST['post_footer']);
  $retailer_id=$_SESSION['agent_user'];
  

  if($retailer_id !="" &&  $tkn_no!="" && $acc_number!="" && $ifsc!="" && $acc_type!="")
  {
      $data['retailer_id']=$retailer_id;
      $data['account_number']=$acc_number;
      $data['account_type']=$acc_type;
      $data['IFSC_code']= $ifsc;
      $data['Token_No']= $tkn_no;
     //echo  $res['status']=true;
      //print_r($data);
      $jsondata=json_encode($data);
      //print_r($jsondata);
      $jsonData=encrypt($jsondata);
      $calhttp=new httpCall("retl3_Bank_up8Date.php",$jsonData);
	   $httpReturn=$calhttp->httpPost();  
	

												  
	  echo $decryptHttp=decrypt($httpReturn);

  }
  else
  {
  	$res['status']=false;
    $res['reason']="Request Time out Please Reload The page!";
    echo json_encode($res);
  }



}
else
{
$res['status']=false;
$res['reason']="Somthing Went Wrong";
echo json_encode($res);
}



?>