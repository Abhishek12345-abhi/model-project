<?php
//echo("hiii");
session_start();
$_SESSION['sl']=1;
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_device_qr']))
	{
		include("db/connect.php");
		
		
		$deviceqr=trim($_POST['post_device_qr']);
		$deviceimei=trim($_POST['post_device_imei']);
		$mejorno=trim($_POST['post_major_no']);
		$minorno=trim($_POST['post_minor_no']);
		$devicesl=trim($_POST['post_device_sl']);
	
	

		$check_id=mysqli_query($con,"select * from  mine_device where SL!='".$devicesl."' and device_imei='".$deviceimei."'");
		if(mysqli_num_rows($check_id)>0)
		{
			
			$response['status']=false;
			$response['reason']="Device IMI already exists";
		}
		else
		{
				
				$ins_device=mysqli_query($con,"UPDATE `mine_device` SET `device_qr`='".$deviceqr."',`device_imei`='".$deviceimei."',`major_no`='".$mejorno."',`minor_no`='".$minorno."' WHERE `SL`='".$devicesl."'");
																
			if($ins_device)
			{
				$response['status']=true;
			  $response['reason']="Device update successfully";
				
			}
			else
			{
				$response['status']=false;
			  $response['reason']="Server Not Responding in this time!";
			}
			
		}
		
		
		
		
	mysqli_free_result($check_id);
		
	
	mysqli_close($con);
	}
//mysql_free_result($query9);
 	else
	{
		$response['status']=false;
    $response['reason']="invalid parameters";
	}
  
  
}
else
{
	$response['status']=false;
  $response['reason']="no_session";

	   
	  
}
 echo json_encode($response);  
?>