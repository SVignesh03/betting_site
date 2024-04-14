<?php
    ob_start();
    session_start();
    if($_SESSION['frontuserid']==""){
        header("location:index.php");
        exit();
    }
    $id = $_SESSION['frontuserid'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db.php";
        $withdraw_amount = $_POST['userammount'];
        $wallet = wallet($conn, $id);
        $balance = $wallet - $withdraw_amount;
        $app = $_POST['apps'];
        $app_id = $_POST['payid'];
        $qry1 = "UPDATE tbl_wallet SET amount = '$balance' WHERE user_id = '$id'";
        $conn->query($qry1);
        $qry = "INSERT INTO tbl_withdrawal (userid, amount, payoutid, platform) VALUES ('$id', '$withdraw_amount', '$app_id', '$app')";
        if (!($conn->query($qry))){
            header("Location: withdraw.php?msg=2");
            exit();
        }
        else{
            header("Location: withdraw.php?msg=1");
            exit();
        }
    }
?> 