<?php
//echo("hiii");
session_start();
$_SESSION['sl']=1;
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_location_id']))
	{
		include("db/connect.php");
		
		
		$location_id=trim($_POST['post_location_id']);
		$location_num=trim($_POST['post_location_name']);
		
	

		$check_id=mysqli_query($con,"select * from  mine_location_master where 	location_id!='".$location_id."' and location_name='".$location_num."'");
		if(mysqli_num_rows($check_id)>0)
		{
			
			$response['status']=false;
			$response['reason']="Location Name already exists";
		}
		else
		{
				
				$ins_device=mysqli_query($con,"UPDATE `mine_location_master` SET `location_name`='".$location_num."'WHERE `location_id`='".$location_id."' ");
																
			if($ins_device)
			{
				$response['status']=true;
			  $response['reason']="Location update successfully";
				
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