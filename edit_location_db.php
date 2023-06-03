<?php
session_start();
$_SESSION['sl']=1;
if(isset($_SESSION['sl']))
  {


  	if(isset($_POST['post_location_id']))
	{
		include("db/connect.php");

		$location_id=trim($_POST['post_location_id']);

		$query=mysqli_query($con,"SELECT * FROM `mine_location_master` WHERE location_id='".$location_id."' ");

		if(mysqli_num_rows($query)>0)
		{
			if($result=mysqli_fetch_array($query))
			{
				$response['l_name']=$result['location_name'];
			}
		}

	   else
	    {
			$response['status']=false;
			$response['reason']="Server Not Responding in this time!";
		}
	}

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