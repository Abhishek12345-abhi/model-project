<?php 
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";

if(isset($_POST['post_txn']) && $_POST['post_txn']=="chk_c")
{
	include "../db/connect.php";
    include "../autocode_new.php";

    
    sqlValidate($_POST['post_amount']);
	sqlValidate($_POST['post_remark']);
    $remarks=mysqli_real_escape_string($con,$_POST['post_remark']);
    $amount=mysqli_real_escape_string($con,$_POST['post_amount']);
	
	



	$tokenReturn=$_POST['post_footer'];

	if($tokenReturn==false)
	{
		$response['status']=false;
	    $response['reason']="Somthing Went Wrong";
	    echo json_encode($response);
	}
	else
	{
		                $_SESSION['credit_to_bank']=1;

		                $footer_tkn=$_POST['post_footer'];
	                    $user=$_SESSION['agent_user'];
	                    $txn_no=$_POST['post_txn'];
	                    $auth=$_SESSION['k3yAdmPa5wdt'];



                        $data['retailer_id']=$user;
						$data['amount']=$amount;
						$data['Token_No']=$footer_tkn;
						$data['remarks']=$remarks;
						$data['chk_txn_no']=$txn_no;
						$data['auth_token']=$auth;
						
						// print_r($data);
						// exit();

						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall(" ",$jsonData);
								 $httpReturn=$calhttp->httpPost();  
	
												  
								 $decryptHttp=decrypt($httpReturn);

								if($decryptHttp!=null || $decryptHttp!="")
								{
									echo $decryptHttp;
									$decryptHttp=json_decode($decryptHttp,true);
									if($decryptHttp['status']!=true)
									{
									   echo "hiiiii";

										// resetToken($_POST['post_footer']);
									}
									else
									{
										echo "ffffffff";
									}

								}


						//if(1==1)
					 else
						{

							$response['status']=true;
	                        $response['reason']="otp_send_success";
							echo json_encode($response);
						}
	}
	

}
else
{
	$response['status']=false;
	$response['reason']="Somthing Went Wrong";
	echo json_encode($response);
}

?>