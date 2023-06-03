<?php 
include "../include_common.php";
include "../common/ip_check.php";
include "../common/checkSql.php";
include "../common/FlipFlop.php";
include "../common/httpHandler.php";
include "../common/t0kenV4lidat0r.php";

if(isset($_POST['post_chk_txn']) && $_POST['post_chk_txn']=='chk_c')
{
	include "../db/connect.php";
    include "../autocode_new.php";
  
  if($_SESSION['numrend']==$_POST['post_rend_txn'])
  {

  	sqlValidate($_POST['post_amount']);
	sqlValidate($_POST['post_remark']);
    $remark=mysqli_real_escape_string($con,$_POST['post_remark']);
    $amt=mysqli_real_escape_string($con,$_POST['post_amount']);
  	$footer_tkn=$_POST['post_footer'];
  	$auth=$_SESSION['k3yAdmPa5wdt'];
  	$user=$_SESSION['agent_user'];

  	                    

						$data['retailer_id']=$user;
						$data['amount']=$amt;
						$data['Token_No']=$footer_tkn;
						$data['remarks']=$remark;
						$data['chk_txn_no']=$_POST['post_chk_txn'];
						$data['auth_token']=$auth;
						
						// print_r($data);
						// exit();
						$jsonData=json_encode($data);
						$jsonData=encrypt($jsonData);
						//$jsonData=($jsonData);
	
								$calhttp=new httpCall("WLR/wallet_balance_load_Fst1_chk.php",$jsonData);
								    $httpReturn=$calhttp->httpPost();  
										 
									  
								 $decryptHttp=decrypt($httpReturn);
								 if($decryptHttp!="" || $decryptHttp!=null)
								 {
								 	//echo $decryptHttp;
								 	$httpdata=json_decode($decryptHttp,true);
								 	if($httpdata['status']==true)
								 	{
								 		$_SESSION['check_wallet']=1;
								 		// echo $httpdata['chk_txn_no'];
								 		// exit();
								 		//print_r($httpdata);
								 		$response['status']=true;
								 		$_SESSION['retailer_id']= $httpdata['retailer_id'];
								 	    $_SESSION['remarks']= $httpdata['remarks'];
								 	    $_SESSION['Token_No']= $httpdata['Token_No'];
								 	    $_SESSION['amount']= $httpdata['amount'];
								 	    $_SESSION['chk_txn_no']= $httpdata['chk_txn_no'];
								 	    
								 	    echo json_encode($response);
								 		
								 		
								 		//header("location:retWallet_Cr_Fast_Tcr");
								 		// $url="retWallet_Cr_Fast_Tcr";
								 		// $login_ok=1;
								 		

								 	
								 	}
								 	else
								 	{								 		
								 		if($httpdata['status']==false)
								 	{
								 		$response['status']=false;
									    $response['reason']=$httpdata['reason'];
									    echo json_encode($response);
									 } 
									 else
									 {
									 	$response['status']=false;
									    $response['reason']="Server Error";
									    echo json_encode($response);

									 }  
								 	}

								 

								 }
								 else
								 {
								 	$response['status']=false;
									$response['reason']="Somthing Went Wrong!!";
									echo json_encode($response);

								 }
								 


  }
  else
  {

  	$response['status']=false;
	$response['reason']="Somthing Went Wrong!!!";
	echo json_encode($response);

  }


}
else
{
	$response['status']=false;
	$response['reason']="Somthing Went Wrong!!!!";
	echo json_encode($response);

}



?>