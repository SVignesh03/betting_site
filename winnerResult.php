<?php
include 'db.php';

$pid = $_REQUEST['pid'];
date_default_timezone_set('Asia/Kolkata');
$tdy = date('Y-m-d H:i:s');

$qry = "select * from `tbl_gameid` where gameid='$pid' and status=1";
$result = $conn->query($qry);
if ($result->num_rows > 0) {
    $win_select_qry = "select * from `tbl_randomdata` order by RAND() LIMIT 1;";
    $win_qry_result = $conn->query($win_select_qry);
    $win_result=mysqli_fetch_array($win_qry_result);
    $win = $win_result["result"];//rand(1, 9);
    $price = $win_result["price"];
    $r_color = $win_result["color"];
    $resulttype = "real";

    
    $result_insert_qry = "INSERT INTO tbl_result(periodid, price, result, color, resulttype, createdate) VALUES ('$pid', '$price', '$win', '$r_color', '$resulttype', '$tdy')";
    $result_insert_status = $conn->query($result_insert_qry);
    
    
    $qry = "select * from tbl_betting where periodid='$pid' and bidtype=2 and bidcolornumber='$win'";
    $result = $conn->query($qry);
    
        $username = $row['userid'];
        $total = $row['totalamount'];
        $bidid = $row['id'];
        $winprice = $total * 5;

        $qry2 = "INSERT INTO tbl_winners(userid,periodid,bidamt,winamt,bidid) VALUES('$username','$pid','$total','$winprice','$bidid')";
        $result2 = $conn->query($qry2);


    //                1 5 9 green
    //                2,3,8 red
    //                4,6,7 blue

    $qry = "select * from tbl_betting where periodid='$pid' and bidtype=1";
    $result = $conn->query($qry);
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $total = $row['totalamount'];
        $bidid = $row['id'];
        $color = $row['bidcolornumber'];
        $winprice = 0;
        if ($color == 1) {
            if ($win == 1 || $win == 3 || $win == 7 || $win == 9) {
                $winprice = $total * 2;
            }
        } else if ($color == 2) {
            if ($win == 0 || $win == 5) {
                $winprice = $total * 1.5;
            }
        } else if ($color == 3) {
            if ($win == 2|| $win == 4 || $win == 6 || $win == 8) {
                $winprice = $total * 2;
            }
        }
        if($winprice != 0 ) {
            $qry2 = "INSERT INTO tbl_winners(username,periodid,bidamt,winamt,bidid) VALUES('$username','$pid','$total','$winprice','$bidid')";
            $result2 = $conn->query($qry2);
        }
    }

    $qry = "UPDATE tbl_gameid SET status = 0 WHERE gameid = '$pid'";
    $conn->query($qry);

    $tdy = date('Y-m-d H:i:s');
    $prefix = date('Ymd');
    if(strlen($pid) >= 0){
        $n = 3;
        $subpid = substr($pid, -$n);
        $subpid += 1; 
        $newpid = $prefix. sprintf("%03d", $subpid);
    }else if((substr($pid, 0 ,8)) != $prefix){
        $subpid = 1; 
        $newpid = $prefix. sprintf("%03d", $subpid);
    }else{
        $subpid = $pid+1;
        $newpid = $prefix. sprintf("%03d", $subpid);
    }
    $qry = "INSERT INTO tbl_gameid(gameid,createdate) VALUES('$newpid','$tdy')";

    $conn->query($qry);
    header("Location: bet.php");
    exit();
} 
else {
    echo "Error";
}