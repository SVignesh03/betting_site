<?php
include 'db.php';

$pid = $_GET['pid'];
$btype = $_GET['btype'];
$bcn = $_GET['bcn'];
$amt = $_GET['amt'];
$q = $_GET['q'];
$t = $_GET['t'];
$username = 'venkat';

$qry = "INSERT INTO tbl_betting (userid, periodid, bidtype, bidcolornumber, amount, quantity, totalamount) VALUES ('$username', '$pid', '$btype', '$bcn', '$amt', '$q', '$t')";

if ($conn->query($qry)) {
    // Insertion successful, redirect back to the same page
    header("Location: bet.php");
    exit();
} else {
    // Insertion failed, handle error
    echo "Error: " . $qry . "<br>" . $conn->error;
}

$cn->close();
?>
