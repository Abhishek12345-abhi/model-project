<?php
session_start();
if(!isset($_SESSION['sl']))
  {
	  echo "Session Error";
  }

if (isset($_POST['post_id'])) 
{
    $sl=$_POST['post_id'];
	include("db/connect.php");

	$query=mysqli_query($con ,"select * from mine_contractor where SL=".$sl);
	if(mysqli_num_rows($query) > 0)
	{
		$result=mysqli_fetch_assoc($query);
		$data_array=array(

					  "c_id"=>$result['contractor_id'],
					  "con_name"=>$result['contractor_name'],
					  "c_address"=>$result['contractor_address'],
					  "c_con"=>$result['contractor_contact'],
					  "c_email"=>$result['contractor_email']

			          );

		$res['status']=true;
		$res['total_data']=$data_array;

	}
	else
	{
	$res['status']=false;
	$res['reason']='Somthing Went Wrong!';
	}

	mysqli_free_result($query);

}
else
{
	$res['status']=false;
	$res['reason']='undefined';
	echo json_decode($res);
}
mysqli_close($con);
echo json_encode($res);

?>