<?php
session_start();

if(isset($_GET['term']))
{
include "db/connect.php";
$data=array();
$rs=mysqli_query($con,"select * from mine_location_master where location_name like '". $_GET['term'] ."%' and client_id='".$_SESSION['sl']."'");

while($rs_row=mysqli_fetch_array($rs))
{
$data[]=array(

'label'=>$rs_row['location_name']

);
}
mysqli_free_result($rs);

mysqli_close($con);

echo json_encode($data);

}

?>