<?php
session_start();
$_SESSION['sl'];
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_device_qr']))
	{
		include("db/connect.php");
		
		
		$deviceqr=trim($_POST['post_device_qr']);
		$deviceimei=trim($_POST['post_device_imei']);
		$mejorno=trim($_POST['post_major_no']);
		$minorno=trim($_POST['post_minor_no']);
	
		
		$check_id=mysqli_query($con,"select * from  mine_device where device_imei='".$deviceimei."'");
		if(mysqli_num_rows($check_id)>0)
		{
			
			$response['status']=false;
			$response['reason']="Device IMI already exists";
		}
		else
		{
				
				$ins_device=mysqli_query($con,"INSERT INTO `mine_device` (`device_qr`,
				                                                `device_imei`, 
																`major_no`, 
																`minor_no`, 
																`client_id`) 
																VALUES ('".$deviceqr."', 
																'".$deviceimei."', 
																'".$mejorno."', 
																'".$minorno."', 
																'".$_SESSION['sl']."'
																);");
																
			if($ins_device)
			{
				$response['status']=true;
			    $response['reason']="Device added successfully";
				
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