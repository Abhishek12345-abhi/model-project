<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="mine_pcbl";
$con=mysqli_connect($server,$dbuser,$dbpass,$dbname);
//$con=mysql_connect("localhost","uatwlbl_dumusr","uJMg#Y4vg@2fta");

if($con==false)
{
	
	echo "Connection Not Established";
	exit();
	
}
$db=mysqli_select_db($con,$dbname);
if($db==false)
{
	echo "Database Not Connected";
	exit();
  	
}



$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

// set timeout period in seconds
$inactive =1800;
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { 
		  header("Location:logout.php"); 
		}
}
$_SESSION['timeout'] = time();


?>