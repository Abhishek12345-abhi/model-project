<?php
session_start();
if(!isset($_SESSION['sl']))
  {
	  echo "Session Error";
  }
  


include "db/connect.php";
  

//---------------------------------------------
	$tableNum="mine_fleet";
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
		$pre_sql="select * from mine_fleet";
		
		
		$order_by="order by SL DESC";
			
	
	
	$sql="";
	for($i=1;$i<=5;$i++)
	{
	    
		if($sql=="")
		{
			$and="";
		}
		else
		{
			$and=" and ";
		}
				
				if($i==1){$key='machine_type';$val=$_POST['s_srch_mtype'];}
				if($i==2){$key='contractor_id';$val=$_POST['s_srch_cid'];}
				if($i==3){$key='serial_no';$val=$_POST['s_srch_sno'];}
				if($i==4){$key='model';$val=$_POST['s_srch_model'];}
				if($i==5){$key='location_id';$val=$_POST['s_srch_lid'];}
				
			   
			   if($val!="")
			   {
			   
					  
					   
					   if($i==1 || $i==2 || $i==3 || $i==4 || $i==5)
					   {
						  $sql=$sql . $and  . $key ."='".$val."'";   
					   }		
			   }
		
		
	
	}
	
	
	if($post_sql!="")
	{		
	  if($sql=="")
	  {
		$post_sql=" where ".$post_sql;		
	  }
	  else
	  {
		$post_sql=" where ".$post_sql . " and ";		
	  }	  
		  
	}
	else
	{		
		if($sql!="")
		{
			$sql=" where ".$sql;		
		}
				
	}
	
			$order_by=" order by SL DESC ";
	
			$lending_sql=$space.$order_by.$space.$pagination;
			$sql_query=$pre_sql.$space.$post_sql.$space.$sql.$lending_sql;
			
			
			//echo $sql_query;
			$total_count_query=mysqli_query($con,$pre_sql.$space.$post_sql.$space.$sql.$space.$order_by);
			$total_count_record=mysqli_num_rows($total_count_query);
			mysqli_free_result($total_count_query);
			//echo $sql_query;
	
			$qr_search=mysqli_query($con,$sql_query);
	
		
	}	
	else	
	{		

		$total_count_query2=mysqli_query($con,"select * from mine_fleet order by  SL DESC");
		$total_count_record=mysqli_num_rows($total_count_query2);
		mysqli_free_result($total_count_query2);

	
	
		 $qr_search=mysqli_query($con,"select * from mine_fleet order by SL DESC".$pagination);



	}
	
	
	if(mysqli_num_rows($qr_search) > 0)
	{
			while($search_row=mysqli_fetch_array($qr_search))
			{	

				$get_location =mysqli_query($con,"select * from mine_location_master where location_id='".$search_row['location_id']."'");

				$location_row = mysqli_fetch_array($get_location);

			    mysqli_free_result($get_location);

				$get_cont=mysqli_query($con,"select * from mine_contractor where contractor_id='".$search_row['contractor_id']."'");	;

				$rs_cont = mysqli_fetch_array($get_cont);
				
				mysqli_free_result($get_cont);

				$data_arr[]=array(
					  'page_no'=>$page_no,
					  'end_list'=>0,
					  //----------- SET Array Value to Generate Table ----------
					  'sl'=>$search_row['SL'],
					  'con_id'=>$search_row['contractor_id'],
					  'con_name'=>$rs_cont['contractor_name'],
					  'mac_type'=>$search_row['machine_type'],
					  'model'=>$search_row['model'],
					  'serial_no'=>$search_row['serial_no'],
					  'image_link'=>$search_row['picture'],
					  'attached_device'=>$search_row['attached_device'],
					  'location_id'=>$search_row['location_id'],
					  'location_nm'=>$location_row['location_name'],
					  'shift_hours'=>$search_row['shift_hours'],
					  'fuel_consumption'=>$search_row['fuel_consumption'],
					  'carbon_emission'=>$search_row['carbon_emission']
					 
					
					
					  
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