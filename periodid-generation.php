<?php 
include("db.php");
if($_POST['type']=='generate'){
	$checkperiod_Query=mysqli_query($conn,"select * from `tbl_gameid` order by id desc limit 1");
	$periodidRow=mysqli_fetch_array($checkperiod_Query);
	$gameid = $periodidRow['gameid']+1;
	$qry = "insert into tbl_gameid(gameid) values(" . $gameid . ")";
	$checkperiod_Query=mysqli_query($conn,$qry);
	// $periodidRow=mysqli_fetch_array($checkperiod_Query); 
	echo $gameid;
}
?>