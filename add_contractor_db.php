<?php
session_start();
if(isset($_SESSION['sl']))
  {
	  
	 
	 
	if(isset($_POST['post_contractor_id']))
	{
		include("db/connect.php");
		// $response="";
		
		$id=$_POST['post_contractor_id'];
		$name=$_POST['post_contractor_name'];
		$address=$_POST['post_contractor_address'];
		$contact=$_POST['post_contractor_contact'];
		$email=$_POST['post_contractor_email'];
	
		
		$check_id=mysqli_query($con,"select * from  mine_contractor where contractor_id='".$id."'");
		if(mysqli_num_rows($check_id)>0)
		{
			$response['status']=false;
			$response['reason']="Contractor ID already exists";
		
		}
		else
		{
			    $allow_spclChr="#@";
                $allow_num="123456789";
                $allow_chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';

                $randspcl= substr(str_shuffle($allow_spclChr),0,2);
                $randnum= substr(str_shuffle($allow_num),0,3);
                $randchr= substr(str_shuffle($allow_chars),0,3);

                $string_pass= substr(str_shuffle($randchr.$randspcl.$randnum),0,8);
				
				
				$ins_contractor=mysqli_query($con,"INSERT INTO `mine_contractor` (`contractor_id`,
				                                                `contractor_name`, 
																`contractor_address`, 
																`contractor_contact`, 
																`contractor_email`, 
																`password`, 
																`client_id`) 
																VALUES ('".$id."', 
																'".$name."', 
																'".$address."', 
																'".$contact."', 
																'".$email."', 
																'".$string_pass."', 
																'".$_SESSION['sl']."'
																);");
																
			if($ins_contractor)
			{
				$response['status']=true;
			    $response['reason']="Contractor added successfully";
				
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