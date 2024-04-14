<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "casino";

$conn = new mysqli($servername, $username, $password, $dbname);

function wallet($a, $id){
    $selectwallet = mysqli_query($a, "SELECT amount FROM tbl_wallet WHERE user_id = '$id'");
    $walletResult = mysqli_fetch_array($selectwallet);
    return $walletResult["amount"];
}


function gameid($a){
    $selectruser=mysqli_query($a,"select `gameid` from `tbl_gameid` order by id desc limit 1");
    $userresult=mysqli_fetch_array($selectruser);
    return $userresult["gameid"];
}

function content($a,$page) {
	$sql_page="select `$page` from `content` where `id`='1'";
	$query_page=mysqli_query($a,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
}

function user($a,$field,$id){
    $selectruser=mysqli_query($a,"select `$field` from `cno_users` where `id`='".$id."'");
    $userresult=mysqli_fetch_array($selectruser);
    return $userresult["$field"];
}
?>