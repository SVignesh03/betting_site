<?php
    include("../db.php");
    $id = $_REQUEST["id"];
    $qry1 = "SELECT * from tbl_recharge_confirmation WHERE id = '$id'";
    $result1 = $conn->query($qry1);
    $row = $result1->fetch_assoc();
    $user_id = $row['user_id'];
    $amount_new = $row['amount'];
    $qry2 = "SELECT * from tbl_wallet WHERE user_id = '$user_id'";
    $result2 = $conn->query($qry2);
    $row2 = $result2->fetch_assoc();
    $amount_old = $row2["amount"];
    $amount = $amount_new + $amount_old;
    $qry3 = "UPDATE tbl_wallet SET amount = '$amount' WHERE user_id = '$user_id'";
    $conn->query($qry3);
    $qry = "UPDATE tbl_recharge_confirmation SET status = '1' WHERE id = '$id'";
    $conn->query($qry);
    header("Location: RechargeConfirm.php");
    exit();
?>