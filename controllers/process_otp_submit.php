<?php
session_start();
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";

if(isset($_POST['post_userid']) && isset($_POST['post_otp']))
{
	include "../db/connect.php";
    include "../autocode_new.php";
	
	sqlValidate($_POST['post_userid']);
    sqlValidate($_POST['post_otp']);
	$usr=mysqli_real_escape_string($con,$_POST['post_userid']);
	$otp=mysqli_real_escape_string($con,$_POST['post_otp']);

	  // echo $usr;
	  // echo $otp;
	
						$data['retailer_id']=$usr;
						$data['otp']=$otp;
						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall("res3t_Passw0rd_Otp_V4lidat3",$jsonData);
								 $httpReturn=$calhttp->httpPost();  
	
												  
								echo $decryptHttp=decrypt($httpReturn);
								
								//echo $decryptHttp=($httpReturn);
							   
							  
							   
	
		
	
	
	
	
		
		
	
	

	mysqli_close($con);
}
else
{
	$resp['status']="unsuccess";
	 echo json_encode($resp);
}
?>