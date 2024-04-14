<?php 
include("../db.php"); 

if($_REQUEST == "POST") {
    $userid = $_POST['userid'] ?? '';
    // $tabtype = $_POST['tabtype'] ?? '';
    $periodid = $_POST['periodid'] ?? '';
    $startdate = $_POST['startdate'] ?? '';
    $enddate = $_POST['enddate'] ?? '';

    $where = '';

    if($userid != '') {
        $where .= ($where ? " AND" : "") . " tbl_userresult.`userid` = '$userid'";
    }

    // if($tabtype != '') {
    //     $where .= ($where ? " AND" : "") . " tbl_userresult.`tab` = '$tabtype'";
    // }

    if($periodid != '') {
        $where .= ($where ? " AND" : "") . " tbl_userresult.`periodid` = '$periodid'";
    }

    $date_condition = " tbl_userresult.`periodid` BETWEEN '$startdate 001' AND '$enddate 480'";
    $where .= ($where ? " AND" : "") . $date_condition;

    $sql = "SELECT tbl_user.id, tbl_user.mobile, tbl_user.code, tbl_user.owncode, 
                   DATE_FORMAT(tbl_userresult.createdate, '%d-%b-%Y') AS createdate,
                   tbl_userresult.periodid, tbl_userresult.tab, tbl_userresult.amount, 
                   tbl_userresult.value, tbl_result.result, tbl_result.color,
                   CASE WHEN tbl_userresult.status = 'success' THEN 'Win' ELSE 'Lose' END AS status,
                   tbl_userresult.paidamount 
            FROM tbl_userresult 
            INNER JOIN tbl_user ON tbl_user.id = tbl_userresult.userid
            INNER JOIN tbl_result ON tbl_result.periodid = tbl_userresult.periodid 
                                    AND tbl_result.tabtype = tbl_userresult.tab 
            WHERE $where";

    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    echo (mysqli_num_rows($result) ? "1" : "2");
} else {
    // Handle GET request if needed
}
?>
