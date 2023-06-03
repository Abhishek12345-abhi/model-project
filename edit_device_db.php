<?php
session_start();
$_SESSION['sl']=1;
if(isset($_SESSION['sl']))
  {


  	if(isset($_POST['post_device_sl']))
	{
		include("db/connect.php");

		$device_sl=trim($_POST['post_device_sl']);

		$query=mysqli_query($con,"SELECT * FROM `mine_device` WHERE SL='".$device_sl."' ");

		if(mysqli_num_rows($query)>0)
		{
			if($result=mysqli_fetch_array($query))
			{
				$response['d_qr']=$result['device_qr'];
				$response['d_imei']=$result['device_imei'];
				$response['m_no']=$result['major_no'];
				$response['min_no']=$result['minor_no'];
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