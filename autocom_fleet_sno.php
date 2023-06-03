<?php
session_start();

if(isset($_GET['term']))
{
include "db/connect.php";
$data=array();
$rs=mysqli_query($con,"select * from mine_fleet where serial_no like '". $_GET['term'] ."%'");

while($rs_row=mysqli_fetch_array($rs))
{
$data[]=array(

'label'=>$rs_row['serial_no']

);
}
mysqli_free_result($rs);

mysqli_close($con);

echo json_encode($data);

}

?>