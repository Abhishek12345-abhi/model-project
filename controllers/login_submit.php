<?php
session_start();
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";

if(isset($_POST['post_username']) && isset($_POST['post_password']))
{
	include "../db/connect.php";
    include "../autocode_new.php";
	
	sqlValidate($_POST['post_username']);
    sqlValidate($_POST['post_password']);
	$usr=mysqli_real_escape_string($con,$_POST['post_username']);
	$pass=mysqli_real_escape_string($con,$_POST['post_password']);

	// echo $usr;
	// echo $pass;

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
	

	
	if(preg_match("/([%\$@#\*' ]+)/", $usr) || preg_match("/([%\$\*' ]+)/", $pass))
	{
		$resp['status']=false;
		$resp['status']="unsuccess";
	    echo json_encode($resp);
	
	}
	
	else
	{
		
		$frsh_user=preg_replace("/[^a-zA-Z0-9@#]+/", "", $usr);
		$frsh_pass=preg_replace("/[^a-zA-Z0-9@#]+/", "", $pass);
	
		if($usr==$frsh_user && $pass==$frsh_pass)
		{
			
	
						$data['puser']=$frsh_user;
						$data['popass']=$frsh_pass;
						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall("adloginApiAgn",$jsonData);
								$httpReturn=$calhttp->httpPost();  
	
												  
								echo $decryptHttp=decrypt($httpReturn);
								
								//echo $decryptHttp=($httpReturn);
							   
							   if($decryptHttp!="" || $decryptHttp!=null)
							   {
								  $httpdata=json_decode($decryptHttp,true);

								//echo $httpdata['status'];
								  if(($httpdata['status']==true) && ($httpdata['otp_sent']==false))
								  {
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
							   
	
		
	
	
	
	
		}
		else
		{
				$resp['status']="unsuccess";
	            echo json_encode($resp);	
			
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