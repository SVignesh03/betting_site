<?php
include 'db.php';

$qry = "select * from `tbl_gameid` where status=1";
$result = $conn->query($qry);
$periodid = 000;
while ($row = $result->fetch_assoc()) {
    $periodid = $row['gameid'];
}
echo $periodid;