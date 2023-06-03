<?php
session_start();
$_SESSION['sl'];
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_location_n']))
	{
		include("db/connect.php");
		
		
		$location=trim($_POST['post_location_n']);
		
	
		
		$check_location=mysqli_query($con,"select * from  mine_location_master where location_name='".$location."'");
		if(mysqli_num_rows($check_location)>0)
		{
			
			$response['status']=false;
			$response['reason']="Location Name already exists";
		}
		else
		{
				
				$ins_device=mysqli_query($con,"INSERT INTO `mine_location_master`(`location_name`,`client_id`) VALUES ('".$location."','".$_SESSION['sl']."')");
																
			if($ins_device)
			{
				  $response['status']=true;
			    $response['reason']="Location added successfully";
				
			}
			else
			{
				  $response['status']=false;
			    $response['reason']="Server Not Responding in this time!";
			}
			
		}
		
		
		
		
		mysqli_free_result($check_location);
		
		

	
	
	
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