<?php
function pagination_dropdown()
{
	$pagi_rec_per_page=array();

	$pagi_rec_per_page[]=array("rec_no"=>5,"isSelected"=>"");
	$pagi_rec_per_page[]=array("rec_no"=>10,"isSelected"=>"selected");
	$pagi_rec_per_page[]=array("rec_no"=>15,"isSelected"=>"");
	$pagi_rec_per_page[]=array("rec_no"=>30,"isSelected"=>"");
	$pagi_rec_per_page[]=array("rec_no"=>50,"isSelected"=>"");
	$pagi_rec_per_page[]=array("rec_no"=>100,"isSelected"=>"");
	$pagi_rec_per_page[]=array("rec_no"=>200,"isSelected"=>"");



	foreach ($pagi_rec_per_page as $value) {
		
	echo "<option ".$value['isSelected'].">" . $value['rec_no'] . "</option>";

	}
}

?>