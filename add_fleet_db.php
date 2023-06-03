<?php
session_start();
$_SESSION['sl'];
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_machine_type']))
	{
		include("db/connect.php");
		// $response="";
		
		$m_type=$_POST['post_machine_type'];
		$model=$_POST['post_model'];
		$sl_no=$_POST['post_sl_no'];
		$image=$_POST['post_photo'];
		$l_id=$_POST['post_l_id'];
		$s_hours=$_POST['post_s_hours'];
		$fuel_con=$_POST['post_fuel_con'];
		$car_emsion=$_POST['post_carbon_emsion'];
		$con_id=$_POST['post_contractor_id'];
	
		
		
				
				$ins_fleet=mysqli_query($con,"INSERT INTO `mine_fleet`(`machine_type`, `model`, `serial_no`, `picture`, `location_id`, `contractor_id`, `shift_hours`, `fuel_consumption`, `carbon_emission`) VALUES ('".$m_type."','".$model."','".$sl_no."','".$image."','".$l_id."','".$con_id."','".$s_hours."','".$fuel_con."','".$car_emsion."')");
																
			if($ins_fleet)
			{
				$response['status']=true;
			    $response['reason']="Fleet added successfully";
				
			}
			else
			{
				$response['status']=false;
			  $response['reason']="Server Not Responding in this time!";
			}
			
		
	
	
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