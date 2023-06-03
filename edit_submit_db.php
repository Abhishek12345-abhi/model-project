<?php
session_start();
if(!isset($_SESSION['sl']))
  {
    echo "Session Error";
  }
if(isset($_POST['suc']) && $_POST['suc']=="eDSmtdB")
{
  include("db/connect.php");
  $sl=$_POST['p_con_sl'];
  $c_id=mysqli_real_escape_string($con,$_POST['p_con_id']);
  $c_name=mysqli_real_escape_string($con,$_POST['p_con_name']);
  $c_address=mysqli_real_escape_string($con,$_POST['p_con_add']);
  $c_phn=mysqli_real_escape_string($con,$_POST['p_con_ph']);
  $c_email=mysqli_real_escape_string($con,$_POST['p_con_email']);

  $check_id=mysqli_query($con,"select * from mine_contractor where Sl!='".$sl."' and contractor_id='".$c_id."'");
  
  if(mysqli_num_rows($check_id)>0)
  {
      $res['status']=false;
      $res['reason']="Contractor ID Already Exists!";
  }
  else
  {
     
  $query=mysqli_query($con,"UPDATE `mine_contractor` SET `contractor_id`='".$c_id."',`contractor_name`='".$c_name."',`contractor_address`='".$c_address."',`contractor_contact`='".$c_phn."',`contractor_email`='".$c_email."' WHERE SL='".$sl."' and contractor_id='".$c_id."' ");

 if($query)
 {
 	$res['status']=true;
	$res['reason']="success";
 }
 else
 {
 	$res['status']=false;
	$res['reason']="Somthing Went Wrong!";
 }
}

}
else
{
	$res['status']=false;
	$res['reason']="Somthing Went Wrong!";
}

echo json_encode($res);


?>