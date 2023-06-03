<?php
session_start();
if(!isset($_SESSION['sl']))
  {
	  echo "Session Error";
  }
  


include "db/connect.php";
  

//---------------------------------------------
	$tableNum="mine_device";
	$limit=$_POST['post_itemPer_page'];
	$page_no=$_POST['post_page_no'];
	$start_row=($page_no*$limit)-$limit;
	$pagination=" limit $start_row,$limit";
//----------------------------------------------	
	$data_arr=array();
	
	if(isset($_POST["s_srch_btn"]) && $_POST["s_srch_btn"]=="srch1")
	{
	
		$pre_sql="";
		$sql="";
		$space=" ";
		$post_sql="";
		$pre_sql="select * from  ".$tableNum." where 	client_id='".$_SESSION['sl']."'";
		
		
		$order_by="order by SL DESC";
			
	
	
	$sql=$pre_sql;
	for($i=1;$i<=2;$i++)
	{
	    
		if($sql=="")
		{
			$and="";
		}
		else
		{
			$and=" and ";
		}
				
				if($i==1){$key='device_qr';$val=$_POST['s_srch_qr'];}
				if($i==2){$key='device_imei';$val=$_POST['s_srch_imei'];}
				
			   
			   if($val!="")
			   {
			   
					  
					   
					   if($i==1 || $i==2)
					   {
						  $sql=$sql .  $and  . $key ."='".$val."'";   
					   }		
			   }
		
		
	
	}
	
	
	$order_by=" order by SL DESC ";
	
	$lending_sql=" order by SL DESC ".$pagination;
	$sql_query=$sql.$lending_sql;
	

	$total_count_query=mysqli_query($con,$sql.$space.$order_by);
	$total_count_record=mysqli_num_rows($total_count_query);
	//echo $sql_query;
	
	$qr_search=mysqli_query($con,$sql_query);
	
		
	}	
	else	
	{		

		$total_count_query2=mysqli_query($con,"select * from ".$tableNum." where client_id='".$_SESSION['sl']."' order by  SL DESC");
$total_count_record=mysqli_num_rows($total_count_query2);
mysqli_free_result($total_count_query2);

	
	
		 $qr_search=mysqli_query($con,"select * from ".$tableNum." where client_id='".$_SESSION['sl']."' order by SL DESC".$pagination);	;



	}
	
	
	if(mysqli_num_rows($qr_search)>0)
	{
			while($search_row=mysqli_fetch_array($qr_search))
			{	
			    
				$data_arr[]=array(
					  'page_no'=>$page_no,
					  'end_list'=>0,
					  //----------- SET Array Value to Generate Table ----------
					  'sl'=>$search_row['SL'],
					  'dev_qr'=>$search_row['device_qr'],
					  'dev_imei'=>$search_row['device_imei'],
					  'dev_mejr_no'=>$search_row['major_no'],
					  'dev_minor_no'=>$search_row['minor_no']
					  
					  // ------------------------------------------------------
					  
					);
						
			}
	}
	else
	{
			$data_arr[]=array(
			  'page_no'=>$page_no,
			  'end_list'=>1,
			 			  
		);
	}
	  
	$main_array['total_records']=$total_count_record;
	$main_array['table_data']=$data_arr;
 echo json_encode($main_array);
	
	mysqli_free_result($qr_search);
	
	mysqli_close($con);
	
	
	

?>