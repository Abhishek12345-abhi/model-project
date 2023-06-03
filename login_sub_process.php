<?php
session_start();

if(isset($_POST['post_user']))
{


// $user_id=$_POST['post_user'];
// $pass=$_POST['post_pass'];

// if((isset($user_id) && $user_id!="") && (isset($pass) && $pass!=""))
// {
	include "db/connect.php";

$user_id=mysqli_real_escape_string($con,$_POST['post_user']);
$pass=mysqli_real_escape_string($con,$_POST['post_pass']);


$query=mysqli_query($con,"select * from mine_client_master where mobile_no='".$user_id."' or email_id='".$user_id."' and password='".$pass."'");

if(mysqli_num_rows($query) >0)
{
  $fet_data=mysqli_fetch_assoc($query);

    $res["status"]=true;
    $res["reason"]="success";
    $_SESSION['client_id'] = $fet_data['client_id'];
    $_SESSION['sl'] = $fet_data['SL'];

}
else
{
	$res['status']=false;
	$res['reason']="Invalid Authentication!";
}

mysqli_free_result($query);
//}
}
else
{
	$res['status']=false;
	$res['reason']="Undefined!";
}
echo json_encode($res);
?>