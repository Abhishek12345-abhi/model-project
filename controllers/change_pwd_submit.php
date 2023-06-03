<?php
session_start();
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";

if(isset($_POST['post_old_password']) && isset($_POST['post_new_password']))
{
	include "../db/connect.php";
    include "../autocode_new.php";


     $old_pwd=$_POST['post_old_password'];
	 $new_pwd=$_POST['post_new_password'];

     if(strpos($old_pwd, 'union') !==false || strpos($old_pwd, 'hex') !==false || strpos($old_pwd, 'base64') !==false || strpos($old_pwd, 'select') !==false || strpos($new_pwd, 'union') !==false || strpos($new_pwd, 'hex') !==false || strpos($new_pwd, 'base64') !==false || strpos($new_pwd, 'select') !==false)
	{
		$response['status']=false;
		$response['reason']="Somthing Went Wrong";
	    echo json_encode($response);	
	}
	else
	{

	
	sqlValidate($_POST['post_old_password']);
    sqlValidate($_POST['post_new_password']);
	$old_pwd=mysqli_real_escape_string($con,$_POST['post_old_password']);
	$new_pwd=mysqli_real_escape_string($con,$_POST['post_new_password']);



	//========================token check============

	//$_POST['post_footer'];
$tokenReturn=validToken($_POST['post_footer']);
if($tokenReturn==false)
{
	$response['status']=false;
	$response['reason']="Request Time out Please Reload The page!";
	echo json_encode($response);
}
else
{


	if(preg_match("/([%\$@\*' ]+)/", $old_pwd) || preg_match("/([%\$@\*' ]+)/", $new_pwd))
	{
		$response['status']=false;
		$response['reason']="Somthing Went Wrong";
	    echo json_encode($response);
	
	}
	
	else
	{
		
		$frsh_old_pwd=preg_replace("/[^a-zA-Z0-9@#]+/", "", $old_pwd);
		$frsh_new_pwd=preg_replace("/[^a-zA-Z0-9@#]+/", "", $new_pwd);

	
		if($old_pwd==$frsh_old_pwd && $new_pwd==$frsh_new_pwd)
		{
	
						$data['retailer_id']=$_SESSION['agent_user'];
						$data['old_pass']=$frsh_old_pwd;
						$data['new_pass']=$frsh_new_pwd;
						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall("chang3_P4sSw0rD",$jsonData);
								$httpReturn=$calhttp->httpPost();  
	
												  
								 $decryptHttp=decrypt($httpReturn);
								
								//echo $decryptHttp=($httpReturn);

								if($decryptHttp!=null || $decryptHttp!="")
								{
									echo $decryptHttp;
									$decryptHttp=json_decode($decryptHttp,true);
									if($decryptHttp['status']!=true)
									{
										///echo "hiiiii";

										resetToken($_POST['post_footer']);
									}

								}
	
		}
		else
		{
				$response['status']=false;
				$response['reason']="Somthing Went Wrong";
	            echo json_encode($response);	
			
		}
	
	}
}
}

	mysqli_close($con);

}
else
{
	$response['status']=false;
	$response['reason']="Somthing Went Wrong";
	 echo json_encode($response);
}
?>