<?php

session_start();
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";

if ( date('m') > 3 )
{
   $year = date('y')+1;
   $year=date('y')."-".$year;
}
else
{
	
    $year = date('y') - 1 ."-".date('y');
}
$financial_year=$year;

if(isset($_POST['post_userid']) && isset($_POST['post_pass']) && isset($_POST['post_otp']))
{
	include "../db/connect.php";
    include "../autocode_new.php";
	
	sqlValidate($_POST['post_userid']);
	sqlValidate($_POST['post_pass']);
    sqlValidate($_POST['post_otp']);
	$user=mysqli_real_escape_string($con,$_POST['post_userid']);
	$pass=mysqli_real_escape_string($con,$_POST['post_pass']);
	$otp=mysqli_real_escape_string($con,$_POST['post_otp']);

	   // echo $user;
	   // echo $otp;
	
						$data['puser']=$user;
						$data['popass']=$pass;
						$data['otp']=$otp;
						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall("retail_logOtp_V4lidat4",$jsonData);
								 $httpReturn=$calhttp->httpPost();  
	
												  
								echo $decryptHttp=decrypt($httpReturn);
								
								//echo $decryptHttp=($httpReturn);


								 if($decryptHttp!="" || $decryptHttp!=null)
							   {
								  $httpdata=json_decode($decryptHttp,true);

								//echo $httpdata['status'];
								  if(($httpdata['status']==true))
								  {
								  	//echo $httpdata['status'];

								  	//echo "okey";
									$_SESSION['agent_user']=$httpdata['suser'];
									$_SESSION['k3yAdmPa5wdt']=$httpdata['autht0k3n'];
									 $_SESSION['Year_Module']=$financial_year;
									$_SESSION['agent_category']=$httpdata['scategory'];
                                    $_SESSION['showDashboradNotice']=1;
									
									//echo $httpdata['status'];
	
								  }
								  else
								  {
									 //echo $httpdata['status'];
									 //echo $httpdata['status'];

	
								  }	
	
	
							   }

	
					  
	
				   
		


		


	mysqli_close($con);
}
else
{
	$resp['status']="unsuccess";
	 echo json_encode($resp);
}
?>