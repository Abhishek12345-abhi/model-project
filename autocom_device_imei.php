<?php
session_start();

if(isset($_GET['term']))
{
include "db/connect.php";
$data=array();
$rs=mysqli_query($con,"select * from mine_device where device_imei  like '". $_GET['term'] ."%' and client_id='".$_SESSION['sl']."'");

while($rs_row=mysqli_fetch_array($rs))
{
$data[]=array(

'label'=>$rs_row['device_imei']

);
}
mysqli_free_result($rs);

mysqli_close($con);

echo json_encode($data);

}

?>